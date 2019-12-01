<?php

class Vote
{
    const STATUS_NEED_CAPTCHA = 1;
    const STATUS_ALREADY_VOTED = 2;
    const STATUS_VOTE_ACCEPTED = 3;
    const STATUS_VOTE_REJECTED = 4;
    
    protected static $teams = [];

    protected static function getIP()
    {
        return $_SERVER['HTTP_X_REAL_IP'];
    }
    
    protected function getTeam($id, $refresh = false)
    {
        if ($refresh || !isset(self::$teams[$id])) {
            CModule::IncludeModule('iblock');
            $rsTeam = CIBlockElement::GetByID($id);
		    $obTeam = $rsTeam->GetNextElement();
		    if (!$obTeam) {
		        return;
		    }
		    $fields = $obTeam->GetFields();
		    $props = $obTeam->GetProperties();
		    $arTeam = array_merge($fields, ['PROPERTIES' => $props]);
            self::$teams[$id] = $arTeam;
        }
        
        return self::$teams[$id];
    }
    
    protected function setRegionMarkerCookie($regionId)
    {
        setcookie('vote_region__'.$regionId, 1, time() + 60*60*24*365*5);
    }
    
    protected static function isVotedForRegion($regionId)
    {
        return isset($_COOKIE['vote_region__'.$regionId]);
    }
    
    public static function addVote(array $formData)
    {
        if (!defined('VOTING_ENABLED') || !VOTING_ENABLED) {
            return self::STATUS_VOTE_REJECTED;
        }
        
        $team = self::getTeam($formData['id']);
        if (!$team) {
            return self::STATUS_VOTE_REJECTED;
        }
        
        if (self::isVotedForRegion($team['IBLOCK_SECTION_ID'])) {
            return self::STATUS_VOTE_REJECTED;
        }
        
        if (
            !isset($formData['g-recaptcha-response']) 
            || !ReCaptcha::validate($formData['g-recaptcha-response'], self::getIP())
        ) {
            return self::STATUS_NEED_CAPTCHA;
        }
        
        $count = ((int) $team['PROPERTIES']['VOTES']['VALUE']) + 1;
        CIBlockElement::SetPropertyValueCode($formData['id'], 'VOTES', $count);
        self::setRegionMarkerCookie($team['IBLOCK_SECTION_ID']);
        
        // лог
        global $DB;
        $q = sprintf(" INSERT INTO sm_vote (datetime, iblock_id, element_id, element_name, ip, user_agent) VALUES ('%s', %d, %d, '%s', '%s', '%s') ",
            date("Y-m-d H:i:s"),
            $DB->ForSql($team['IBLOCK_ID']),
            $DB->ForSql($team['ID']),
            $DB->ForSql($team['NAME']),
            $DB->ForSql($_SERVER['HTTP_X_FORWARDED_FOR']),
            $DB->ForSql($_SERVER['HTTP_USER_AGENT']));
        $DB->Query($q);
        
        return self::STATUS_VOTE_ACCEPTED;
    }
    
    public static function getVoteCount($id)
    {
        $team = self::getTeam($id, true);
        
        return (int) $team['PROPERTIES']['VOTES']['VALUE'];
    }
    
    public static function reCount($iblock_id)
    {
        CModule::IncludeModule('iblock');
        global $DB;
        
        $ids = array(0);
        
        $q = sprintf(" SELECT COUNT(id) AS count, element_id FROM sm_vote WHERE iblock_id = %d GROUP BY element_id ", (int)$iblock_id);
        $res = $DB->Query($q);
        while ($row = $res->Fetch()) {
            CIBlockElement::SetPropertyValueCode($row['element_id'], 'VOTES', $row['count']);
            $ids[] = $row['element_id'];
        }
        
        
        $res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID" => (int)$iblock_id, "!ID" => $ids), false, false, Array("ID"));
        while ($row = $res->GetNext()) {
            CIBlockElement::SetPropertyValueCode($row['ID'], 'VOTES', '');
        }
        
    }
    
}

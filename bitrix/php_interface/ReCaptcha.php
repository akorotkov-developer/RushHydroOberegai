<?php

class ReCaptcha
{
    const PUBLIC_KEY = '6LenJx8TAAAAAGbBiLXKby8yDYEI3NRBYsE-M35w';
    const SECRET_KEY = '6LenJx8TAAAAAB4UvPvHRqUxK6BKUZUnre92eQex';
    const URL = 'https://www.google.com/recaptcha/api/siteverify';

    public static function validate($response, $ip)
    {
        $postdata = http_build_query(array(
            'secret' => self::SECRET_KEY,
            'response' => $response,
            'remoteip' => $ip,
        ));

        $opts = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata,
            )
        );

        $context = stream_context_create($opts);
        
        $apiResponse = json_decode(file_get_contents(self::URL, false, $context));
        
        return (bool) $apiResponse->success;
    }
}

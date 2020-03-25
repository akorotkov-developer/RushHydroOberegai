<?php
    class Station extends Model{
        public static $_table = 'station';
        public static $_idColumn = 'id';

        public  static function getListOfStations(){
            return Model::factory('Station')->findMany();
        }

        public static function getStationId($name,$add_new){
            if(is_numeric($name)){
                return Model::factory('Station')->findOne((int)$name);
            } else {    
                    $station=Model::factory('Station')->where('name',$name)->findOne();
                    if (!$station and $add_new){
                        $station=Model::factory('Station')->create();
                        $station->name=$name;
                        $station->save();
                    }
                    return $station;                
            }

        }
    }
<?php
    class Data extends Model{

        public static $_table = 'data';
        public static $_idColumn = 'id';
        public static $fields = array(
            'uvb'=>array('name'=>'Уровень верхнего бьефа', 'abr'=>'УВБ','index'=>'uvb'),
            'polemk'=>array('name'=>'Свободная ёмкость', 'abr'=>'СЕ','index'=>'polemk'),
            'pritok'=>array('name'=>'Приток воды к створу', 'abr'=>'Приток','index'=>'pritok'),
            'rashod'=>array('name'=>'Средний суточный расход воды', 'abr'=>'Расход','index'=>'rashod'),
            'sbros'=>array('name'=>'Расход холостых сбросов воды', 'abr'=>'Хол. сбросы','index'=>'sbros'),
        );
        public static function isAssoc(array $array){
            $keys = array_keys($array);
            return array_keys($keys) !== $keys;
        }
        
        public static function saveData($date,$station,$params,$add_new=false){
            if(is_array($params)){
                    $id_station = Station::getStationId($station,$add_new);
                    
                    if(!$id_station){echo 'exception'; return false;}
                    
                    $formatedDate=date('Y-m-d',strtotime($date));
                    $existModel = Model::factory('Data')->where('date', $formatedDate)->where('id_station',$id_station->id)->findOne();
                    
                    ($existModel<>false) ? $data=$existModel : $data=Model::factory('Data')->create();

                    $data->date=$formatedDate;
                    $data->id_station=$id_station->id;
                    $i=0;
                    if(!Data::isAssoc($params)){    
                        $record=array();
                        foreach (Data::$fields as $field){
                            if(isset($params[$i])){
                                $record[$field['index']]=$params[$i];
                            }
                            $i++;
                        }
                        $params=$record;
                    }
                    foreach(Data::$fields as $field){
                        $data->{$field['index']}=$params[$field['index']];
                    }
                    return $data->save();

            }
            else{
                return false;
            }
        }
        
        public static function deleteData($date,$station){
            return Model::factory('Data')->where('date',$date)->where('id_station',$station)->deleteMany();
        }

        public static function selectByDate($date){
            $strings=array();
            $records=Model::factory('Data')->innerJoin('station',array('data.id_station','=','station.id'))->where('date',date('Y-m-d',strtotime($date)))->findMany(); 
            foreach ($records as $string){
                $i=0;
                $params=array();
                foreach (Data::$fields as $field) {
                    $params[$i]=is_null($string->{$field['index']}) ? null : (float)$string->{$field['index']};
                    $i++;
                }
                $strings[$string->name]=$params;
            }
            return $strings;
        }

        public static function selectAllDates(){
            $dates=array();
            $records=Model::factory('Data')->groupBy('date')->orderByDesc('date')->findMany();
            foreach($records as $station){
                $dates[] = date('d.m.Y',strtotime($station->date));
            }
            return $dates;
        }
        public static function deleteByDateAll($date){
            return Model::factory('Data')->where('date',date('Y-m-d',strtotime($date)))->deleteMany();
        }

    }
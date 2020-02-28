<?php

class HydrologyExcelReader extends ExcelReader {

    protected $fields = array(
        /*'npu' => 2,
        'fpu' => 3,*/

        // version 1
        /*'uvb' => 4,
        'polemk' => 9,
        'pritok' => 12,
        'rashod' => 14,
        'sbros' => 16,*/

        //version 2
        'uvb' => 4,
        'polemk' => 9,
        'pritok' => 11,
        'rashod' => 13,
        'sbros' => 15,
    );

    protected $hydrologyData = null;

    public function read() {
        $counts = array();

        if ($this->hydrologyData === null) {
            $lines = parent::read();

            $data = array();
            foreach ($lines as $line) {
                if (
                    count($line) < 16 
                    || !$line[1] 
                    //|| isset($data[$line[1]])
                ) {
                    continue;
                }

                if (!isset($counts[$line[1]])) $counts[$line[1]] = 0;
                $counts[$line[1]]++;

                if ($counts[$line[1]] !== 2) continue;


                $parsedLine = array();
                $fail = false;
                foreach ($this->fields as $field => $index) {
                    if (!is_numeric($line[$index])) {
                        $fail = true;
                        break;
                    }   

                    $parsedLine[$field] = (float) $line[$index];
                }

                if ($fail) continue;

                $data[$line[1]] = $parsedLine;
            }

            $this->hydrologyData = $data;
        }

        return $this->hydrologyData;
    }

}
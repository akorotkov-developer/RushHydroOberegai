<?php

class ExcelReader {

    protected $withHeader = false;
    protected $fileName = '';
    protected $data = null;

    public function __construct($fileName) {
        $this->fileName = $fileName;
    }

    protected function convert() {
        putenv('LC_ALL=ru_RU.utf-8');
        $this->data = shell_exec('xls2csv -b" " -c\\; -s utf8 -d utf8  '.escapeshellarg($this->fileName).' 2>&1');
        return $this;
    }

    public function setWithHeader($val) {
        $this->withHeader = (bool)$val;
        return $this;
    }

    protected function parse() {
        $buffer = explode("\n", $this->data);
        $this->data = array();
        foreach ($buffer as $i => $v) {
            if (($this->withHeader && $i === 0) || !trim($v)) continue;
            $this->data[] = str_getcsv($v, ';', '"');
        }
        return $this;
    }

    public function read() {
        if (!is_array($this->data)) {
            $this->
                convert()->
                parse();
        }

        return $this->data;
    }

}
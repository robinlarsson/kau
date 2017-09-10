<?php

namespace php\Data;

class DataReader
{
    /**
     * @param string $file
     *
     * @return array
     */
    public function read($file)
    {
        $rows = [];
        $headers = [];

        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (empty($headers)) {
                    foreach ($data as $header) {
                        $headers[] = trim($header);
                    }
                } else {
                    $temp = [];
                    foreach ($data as $key => $column) {
                        $temp[$headers[$key]] = trim($column);
                    }
                    $rows[] = $temp;
                }
            }
            fclose($handle);
        }

        return $rows;
    }
}
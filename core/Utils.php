<?php


namespace core;


class Utils
{

    public static function ArrayFilter($row, $fields){
        $newRow = [];
        foreach ($fields as $field){
            $newRow [$field] = $row[$field];
        }
        return $newRow;
    }
}
<?php


namespace core;


class DB
{
    protected $pdo;
    public function __construct($server, $login, $password, $database){
        $this->pdo = new \PDO("mysql:host={$server};dbname={$database};charset=UTF8",$login,$password);

    }

    /**
     * select from database
     * @param $table
     * @param string $fields
     * @param null $where
     * @param null $orderBy
     * @param null $limit
     * @param null $offset
     * @return array
     */
    public function select($table, $fields = "*", $where = null, $orderBy = null, $limit = null, $offset = null)
    {
        $fieldsSTR = "*";
        if(is_string($fields)){
            $fieldsSTR = $fields;
        }
        if(is_array($fields)){
            $fieldsSTR = implode(", ", $fields);
        }
        $sql = "SELECT {$fieldsSTR} FROM {$table}";

        if(is_array($where) && count(($where))>0){
            $whereParts = [];
            foreach ($where as $key => $value)
                $whereParts[] = "{$key} = ?";
            $whereSTR = implode(" AND ", $whereParts);
            $sql .= ' WHERE '.$whereSTR;
        }
        if(is_string($where))
            $sql.= " WHERE ".$where;

        if(is_array($orderBy))
        {
            $orderByParts = [];
            foreach ($orderBy as $key => $value)
            {
                $orderByParts [] = " {$key} {$value}";
            }
            $sql .= ' ORDER BY '.implode( ", ", $orderByParts);
        }

        if(!empty($limit)){
            if (!empty($offset))
                $sql .= " LIMIT {$offset}, {$limit}";
            else
                $sql .= " LIMIT {$limit}";
        }

        $sth = $this->pdo->prepare($sql);
        if(is_array($where) && count(($where))>0)
            $sth->execute(array_values($where));
        else
            $sth->execute();

        return $sth->fetchAll();
    }

    /**
     * insert into database
     * @param $table
     * @param $row
     */
    public function insert($table, $row)
    {
        $fieldsSTR = implode(", ",array_keys($row));
        $valuesParts = [];
        foreach ( $row as $key => $value){
            $valuesParts [] = '?';
        }
        $valuesSTR = implode(', ', $valuesParts);
        $sql = "INSERT INTO {$table} ($fieldsSTR) VALUES ($valuesSTR)";
        $sth =$this->pdo->prepare($sql);
        $sth->execute(array_values($row));
    }

    /**
     * delete from database
     * @param $table
     * @param null $where
     */
    public function delete($table, $where = null){
        $sql = "DELETE FROM {$table}";
        if(is_array($where) && count(($where))>0){
            $whereParts = [];
            foreach ($where as $key => $value)
                $whereParts[] = "{$key} = ?";
            $whereSTR = implode(" AND ", $whereParts);
            $sql .= ' WHERE '.$whereSTR;
        }
        if(is_string($where))
            $sql.= " WHERE ".$where;

        $sth = $this->pdo->prepare($sql);
        if(is_array($where) && count(($where))>0)
            $sth->execute(array_values($where));
        else
            $sth->execute();
    }

    /**
     * update table in database
     * @param $table
     * @param $newRow
     * @param $where
     */
    public function update($table, $newRow, $where){
        $sql = "UPDATE {$table} SET ";
        $setParts = [];
        $paramsArr = [];
        foreach ($newRow as $key => $value)
        {
            $setParts [] = "{$key} = ?";
            $paramsArr [] = $value;
        }
        $sql .= implode(', ',$setParts);

        if(is_array($where) && count(($where))>0){
            $whereParts = [];

            foreach ($where as $key => $value)
            {
                $whereParts[] = "{$key} = ?";
                $paramsArr [] = $value;
            }
            $whereSTR = implode(" AND ", $whereParts);
            $sql .= ' WHERE '.$whereSTR;
        }
        if(is_string($where))
            $sql.= " WHERE ".$where;
        $sth = $this->pdo->prepare($sql);
        $sth->execute($paramsArr);
    }
}
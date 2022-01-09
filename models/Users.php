<?php


namespace models;

use core\Model;
use core\Utils;

class Users extends Model
{
    public function AddUser($userRow){
        $fields = ['login','password','email'];
        $userRow = Utils::ArrayFilter($userRow, $fields);
        $user = $this->GetUserByLogin($userRow['login']);
        $userEmail = $this->GetUserByEmail($userRow['email']);
        if (!empty($user) or !empty($userEmail))
            return false;
        $userRow['password'] = md5($userRow["password"]);
        \core\Core::getInstance()->getDB()->insert('user', $userRow);
        return true;
    }

    public function AuthUser($login,$password){
        $password = md5($password);
        \core\Core::getInstance()->getDB()->select('user', [
            'login'=>$login,
            'password'=>$password
        ]);
    }

    public function GetUserByLogin($login)
    {
        $rows = \core\Core::getInstance()->getDB()->select(
            'user',
            '*',
            ['login'=>$login]
        );
        if (count($rows)>0)
            return $rows[0];
        else
            return null;
    }

    public function GetUserByEmail($email)
    {
        $rows = \core\Core::getInstance()->getDB()->select(
            'user',
            '*',
            ['email'=>$email]
        );
        if (count($rows)>0)
            return $rows[0];
        else
            return null;
    }
}
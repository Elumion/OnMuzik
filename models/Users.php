<?php


namespace models;

use core\Model;
use core\Utils;

class Users extends Model
{
    public function Validate($formRow)
    {
        $errors = [];
        $userLogin = $this->GetUserByLogin($formRow['login']);
        $userEmail = $this->GetUserByEmail($formRow['email']);
        if (empty($formRow['login']))
            $errors[] = 'Поле логін не може бути порожнім';
        if (empty($formRow["password"]))
            $errors[] = 'Поле пароль не може бути порожнім';
        if ($formRow["password"] != $formRow['password2'])
            $errors[] = 'Паролі не співпадають';
        if (empty($formRow['email']))
            $errors[] = 'Поле емайл не може бути порожнім';
        if (!empty($userLogin))
            $errors[] = 'Користувач з заданим логіном уже існує';
        if (!empty($userEmail))
            $errors[] = 'Користувач з заданою поштою уже існує';
        if (count($errors) > 0)
            return $errors;
        else
            return true;
    }

    public function IsUserAuthenticated()
    {
        return isset($_SESSION['user']);
    }

    public function GetUserById($id)
    {
        $user = \core\Core::getInstance()->getDB()->select('user', '*', ['id' => $id]);
        if (empty($user))
            return false;
        return $user[0];
    }
    public function GetAllUsers()
    {
        return \core\Core::getInstance()->getDB()->select('user', '*');
    }

    public function GetCurrentUser()
    {
        if ($this->IsUserAuthenticated())
            return $this->GetUserById($_SESSION['user']['id']);
        else
            return null;
    }

    public function AddUser($userRow)
    {
        $validateResult =  $this->Validate($userRow);
        if (is_array($validateResult))
            return $validateResult;

        $fields = ['login', 'password', 'email'];
        $userRowFiltered = Utils::ArrayFilter($userRow, $fields);
        $userRowFiltered['password'] = md5($userRowFiltered["password"]);
        \core\Core::getInstance()->getDB()->insert('user', $userRowFiltered);
        return true;
    }

    public function AuthUser($email, $password)
    {
        $password = md5($password);
        $users = \core\Core::getInstance()->getDB()->select('user', '*', [
            'email' => $email,
            'password' => $password
        ]);
        if (count($users) > 0) {
            $user = $users[0];
            return $user;
        } else
            return false;
    }

    public function GetUserByLogin($login)
    {
        $rows = \core\Core::getInstance()->getDB()->select(
            'user',
            '*',
            ['login' => $login]
        );
        if (count($rows) > 0)
            return $rows[0];
        else
            return null;
    }

    public function GetUserByEmail($email)
    {
        $rows = \core\Core::getInstance()->getDB()->select(
            'user',
            '*',
            ['email' => $email]
        );
        if (count($rows) > 0)
            return $rows[0];
        else
            return null;
    }
}

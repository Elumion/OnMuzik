<?php


namespace models;


use core\Core;
use core\Model;
use core\Utils;
use Imagick;

class Account extends Model
{

    public function ChangePhoto($id,$fileName){
        $userModel = new Users();

        $folder = 'assets/images/user_images/';
        $user = $userModel->GetUserById($id);

        if( is_file($folder.$user['image']) && is_file($folder.$fileName))
            unlink($folder.$user['image']);


        $user['image'] = $fileName;
        $im = new Imagick();
        $im->readImage($_SERVER["DOCUMENT_ROOT"].'/'.$folder.$fileName);
        $im->thumbnailImage(400,400,true,false);
        $im->writeImage($_SERVER["DOCUMENT_ROOT"].'/'.$folder.$fileName);
        $this->UpdateUser($user,$id);

    }

    public function UpdateUser($row, $id){
        $userModel = new Users();
        $user = $userModel->GetCurrentUser();
        if($user == null)
            return false;
        $userAcc = $userModel->GetUserById($id);
        $validateResult =  $this->Validate($row,$id);
        if(is_array($validateResult))
            return $validateResult;

        $fields = ['login','image','email'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);

        if(!empty($row['oldPassword']) && !empty($row['newPassword'])){
            $hesh = md5( $row['oldPassword']);
            if($hesh != $userAcc['password'])
                return ['Старий пароль не вірний'];
            $rowFiltered['password'] = md5($row["newPassword"]);
        }

        Core::getInstance()->getDB()->update('user',$rowFiltered,['id'=>$id]);
        return true;
    }

    public function Validate($row,$id){
        $errors = [];
        if(empty($row['login']))
            $errors[] ='Логін не може бути порожнім';
        if(empty($row['email']))
            $errors[] = 'Поле емайл не може бути порожнім';

        if(count($errors)>0)
            return $errors;
        else
            return true;
    }

}
<?php


namespace models;


use core\Core;
use core\Model;
use core\Utils;
use Imagick;

class Songs extends Model
{

    public function GetSongsByUserId($id){
        return Core::getInstance()->getDB()->select("song",'*',['user_id'=>$id],['date'=>'DESC']);
    }

    public function GetSongsByName($name){
        return Core::getInstance()->getDB()->select("song",'*',['title'=>$name],['title'=>'ASC']);
    }

    public function ChangeMedia($id,$fileName){
        $folder = 'assets/music/';
        $song = $this->GetSongById($id);

        if( is_file($folder.$song['media']) && is_file($folder.$fileName))
            unlink($folder.$song['media']);

        $song['media'] = $fileName;
        $this->UpdateSongs($song,$id);
    }

    public function ChangePhoto($id,$fileName){
        $folder = 'assets/images/song_images/';
        $song = $this->GetSongById($id);

        if( is_file($folder.$song['image']) && is_file($folder.$fileName))
            unlink($folder.$song['image']);


        $song['image'] = $fileName;
        $im = new Imagick();
        $im->readImage($_SERVER["DOCUMENT_ROOT"].'/'.$folder.$fileName);
        $im->thumbnailImage(300,300,true,false);
        $im->writeImage($_SERVER["DOCUMENT_ROOT"].'/'.$folder.$fileName);
        $this->UpdateSongs($song,$id);

    }

    /**
     * add song to db
     * @param $row
     * @return array|bool
     */
    public function AddSongs($row)
    {
        $userModel = new Users();
        $user = $userModel->GetCurrentUser();
        if($user == null) {
            $result =[
                'error'=>true,
                'messages'=>['Користувач не аунтефікований']
            ];
            return $result;
        }
        $validateResult =  $this->Validate($row);
        if(is_array($validateResult)) {
            $result =[
                'error'=>true,
                'messages'=>$validateResult
            ];
            return $result;
        }
        $fields = ['title','media','image'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);
        $rowFiltered['date'] = date('Y-m-d H:i:s');
        $rowFiltered['user_id'] = $user['id'];

        $rowFiltered["image"] = '...image...';
        $rowFiltered["media"] = '...media...';

        $rowFiltered['band_id'] = $this->GetBandIDByBandName($row['band_name']);

        $id = Core::getInstance()->getDB()->insert('song', $rowFiltered);

        return [
            'error'=>false,
            'id'=>$id
        ];
    }

    public function GetSongsBands($rows){
        $resultArr = [];
        foreach ($rows as $row) {
           $arr = Core::getInstance()->getDB()->select('band', '*', ['id' => $row['band_id']]);
           $resultArr [] = $arr[0];
        }
        return $resultArr;
    }

    public function GetLastSongs($count){
      return Core::getInstance()->getDB()->select('song','*' ,null,['date'=>'DESC'], $count);
    }

    public function GetBandIDByBandName($bandName){
        $band = Core::getInstance()->getDB()->select('band','*' ,['name'=>$bandName]);
        if(empty($band)) {
            Core::getInstance()->getDB()->insert('band', ['name' => $bandName]);
            $bandId = Core::getInstance()->getDB()->select('band','*' ,['name'=>$bandName]);
            return $bandId[0]['id'];
        }
        else{
            $bandId = $band[0]['id'];
            return $bandId;
        }
    }

    public function GetSongById($id){
        $song = Core::getInstance()->getDB()->select('song','*' ,['id'=>$id]);
        if (!empty($song))
            return $song[0];
        else
            return null;
    }

    public function UpdateSongs($row, $id){
        $userModel = new Users();
        $user = $userModel->GetCurrentUser();
        if($user == null)
            return false;
        $validateResult =  $this->Validate($row);
        if(is_array($validateResult))
            return $validateResult;

        $fields = ['title','media','image'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);

        if(!empty( $row['band_name']))
            $rowFiltered['band_id'] = $this->GetBandIDByBandName($row['band_name']);

        Core::getInstance()->getDB()->update('song',$rowFiltered,['id'=>$id]);
        return true;
    }

    public function DeleteSongs($id){
        $song = $this->GetSongById($id);
        $userModel = new Users();
        $user = $userModel->GetCurrentUser();
        if(empty($song) || $user == null || $user['id'] != $song['user_id'] && $user['role_id']!= 1)
            return false;

        Core::getInstance()->getDB()->delete('song',['id'=>$id]);
        return true;
    }

    public function Validate($row){
        $errors = [];
        if(empty($row['title']))
            $errors[] ='Заголовок пісні не може бути порожнім';
        if(count($errors)>0)
            return $errors;
        else
            return true;
    }
}
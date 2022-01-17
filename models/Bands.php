<?php


namespace models;


use core\Core;
use core\Model;
use core\Utils;
use Imagick;

class Bands extends Model
{

    public function GetBandSongsByBandId($id)
    {
        return Core::getInstance()->getDB()->select("song", '*', ['band_id' => $id], ['date' => 'DESC']);
    }

    public function GetBandsByName($name)
    {
        return Core::getInstance()->getDB()->select("band", '*', ['name' => $name], ['name' => 'ASC']);
    }
    public function GetBandsByNameLike($name)
    {
        return Core::getInstance()->getDB()->select("band", '*', ['name' => $name], ['name' => 'ASC'], null, null, 'full');
    }

    public function ChangePhoto($id, $fileName)
    {
        $folder = 'assets/images/song_images/';
        $band = $this->GetBandById($id);

        if (is_file($folder . $band['image']) && is_file($folder . $fileName) && $fileName != 'band_img.png')
            unlink($folder . $band['image']);


        $band['image'] = $fileName;
        $im = new Imagick();
        $im->readImage($_SERVER["DOCUMENT_ROOT"] . '/' . $folder . $fileName);
        $im->thumbnailImage(1200, 800, true, false);
        $im->writeImage($_SERVER["DOCUMENT_ROOT"] . '/' . $folder . $fileName);
        $this->UpdateBand($band, $id);
    }

    public function GetBandById($id)
    {
        $band = Core::getInstance()->getDB()->select('band', '*', ['id' => $id]);
        if (!empty($band))
            return $band[0];
        else
            return null;
    }

    public function GetLastBands($count, $page)
    {
        return Core::getInstance()->getDB()->select("band", '*', null, ['name' => 'DESC'], $count, ($page - 1) * $count);
    }

    public function UpdateBand($row, $id)
    {
        $userModel = new Users();
        $user = $userModel->GetCurrentUser();
        if ($user == null)
            return false;
        $validateResult =  $this->Validate($row);
        if (is_array($validateResult))
            return $validateResult;

        $fields = ['name', 'description', 'image'];
        $rowFiltered = Utils::ArrayFilter($row, $fields);

        Core::getInstance()->getDB()->update('band', $rowFiltered, ['id' => $id]);
        return true;
    }

    public function Validate($row)
    {
        $errors = [];
        if (empty($row['name']))
            $errors[] = 'Назва групи не може бути порожня';
        if (empty($row['description']))
            $errors[] = 'Опис групи не може бути порожнім';

        if (count($errors) > 0)
            return $errors;
        else
            return true;
    }

    public function DeleteBand($id)
    {
        $band = $this->GetBandById($id);
        $userModel = new Users();
        $user = $userModel->GetCurrentUser();
        if (empty($band) || $user == null && $user['role_id'] != 1 && $user['role_id'] != 3)
            return false;

        Core::getInstance()->getDB()->delete('band', ['id' => $id]);
        return true;
    }
}

<?php


namespace controllers;


use core\Controller;

class Account extends Controller
{

    protected $user;
    protected $userModel;
    protected $songModel;
    protected $accountModel;
    public function __construct()
    {
        $this->songModel = new \models\Songs();
        $this->userModel = new \models\Users();
        $this->accountModel = new \models\Account();
        $this->user = $this->userModel->GetCurrentUser();
    }

    public function actionIndex()
    {
        $id = $_GET['id'];

        $titleForbidden = 'Доступ заборонено';

        if (empty($this->user) || $this->user['id'] != $id && $this->user['role_id'] != 1)
            return $this->render('forbidden', null, [
                'MainTitle' => $titleForbidden,
                'PageTitle' => $titleForbidden
            ]);

        $songs = $this->songModel->GetSongsByUserId($id);
        $bands = $this->songModel->GetSongsBands($songs);
        $user = $this->userModel->GetUserById($id);
        $title = 'Аккаунт';

        if ($user == false)
            return $this->renderMessage('error', 'Такого користувача не існує', null, [
                "MainTitle" => $title,
                "PageTitle" => $title
            ]);
        else
            return $this->render('index', ['songs' => $songs, 'user' => $user, 'bands' => $bands], [
                'MainTitle' => $title,
                'PageTitle' => $title,
                'style' => 'account_index'
            ]);
    }

    public function actionEdit()
    {
        $id = $_GET['id'];
        $user = $this->userModel->GetUserById($id);
        $titleForbidden = 'Доступ заборонено';

        if (empty($this->user) || $user['id'] != $this->user['id'] && $this->user['role_id'] != 1)
            return $this->render('forbidden', null, [
                'MainTitle' => $titleForbidden,
                'PageTitle' => $titleForbidden
            ]);

        $title = 'Редагування Аккаунта';

        if ($this->isPost()) {
            $result = $this->accountModel->UpdateUser($_POST, $id);

            if ($result === true) {
                $allowedTypesImg = ['image/png', 'image/jpeg'];
                if (is_file($_FILES['image']['tmp_name']) && in_array($_FILES['image']['type'], $allowedTypesImg)) {
                    switch ($_FILES['image']['type']) {
                        case 'image/png':
                            $extention = 'png';
                            break;
                        default:
                            $extention = 'jpg';
                            break;
                    }
                    $imgName = $id . '-' . uniqid() . '.' . $extention;
                    move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/user_images/' . $imgName);
                    $this->accountModel->ChangePhoto($id, $imgName);
                }
                return $this->renderMessage('ok', 'Аккаунт успішно редаговано', null, [
                    "MainTitle" => $title,
                    "PageTitle" => $title
                ]);
            } else {
                $message = implode('<br/>', $result);
                return $this->render("edit", ['user' => $user], [
                    "MainTitle" => $title,
                    "PageTitle" => $title,
                    "MessageClass" => "error",
                    "MessageText" => $message,
                    'style' => "style_form"
                ]);
            }
        } else
            return $this->render('edit', ['user' => $user], [
                'MainTitle' => $title,
                'PageTitle' => $title,
                'style' => "style_form"
            ]);
    }
}

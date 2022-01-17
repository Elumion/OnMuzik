<?php


namespace controllers;


use core\Controller;

class Bands extends Controller
{
    protected $bandsModel;
    protected $user;
    protected $userModel;
    public function __construct()
    {
        $this->bandsModel = new \models\Bands();
        $this->userModel = new \models\Users();
        $this->user = $this->userModel->GetCurrentUser();
    }

    /**
     * view band
     * @return array|mixed|null
     */
    public function actionView()
    {
        $id = $_GET['id'];
        $band = $this->bandsModel->GetBandById($id);
        $songs = $this->bandsModel->GetBandSongsByBandId($id);
        $title = $band['name'];
        return $this->render('view', ['model' => $band, 'songs' => $songs], [
            'MainTitle' => $title,
            'PageTitle' => $title,
            'style' => "bands_view"
        ]);
    }

    public function actionEdit()
    {

        $id = $_GET['id'];
        $band = $this->bandsModel->GetBandById($id);
        $titleForbidden = 'Доступ заборонено';

        if (empty($this->user) || $this->user['role_id'] != 3 && $this->user['role_id'] != 1)
            return $this->render('forbidden', null, [
                'MainTitle' => $titleForbidden,
                'PageTitle' => $titleForbidden
            ]);

        $title = 'Редагування Групи';

        if ($this->isPost()) {
            $result = $this->bandsModel->UpdateBand($_POST, $id);
            $band = $this->bandsModel->GetBandById($id);

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
                    move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/song_images/' . $imgName);
                    $this->bandsModel->ChangePhoto($id, $imgName);
                }

                return $this->renderMessage('ok', 'Групу успішно редаговано', null, [
                    "MainTitle" => $title,
                    "PageTitle" => $title
                ]);
            } else {
                $message = implode('<br/>', $result);
                return $this->render("edit", null, [
                    "MainTitle" => $title,
                    "PageTitle" => $title,
                    "MessageClass" => "error",
                    "MessageText" => $message,
                    'style' => 'style_form'
                ]);
            }
        } else
            return $this->render('edit', ['modelBand' => $band], [
                'MainTitle' => $title,
                'PageTitle' => $title,
                'style' => 'style_form'
            ]);
    }

    public function actionIndex()
    {
        $page = $_GET['page'];
        global $Config;
        $title = "Групи";
        $lastBands = $this->bandsModel->GetLastBands($Config['SongsCount'], $page);
        $isMore = false;
        if (count($lastBands) == $Config['SongsCount'])
            $isMore = true;
        return $this->render('index', ['model' => $lastBands, 'currentPage' => $page, 'isMore' => $isMore], [
            'MainTitle' => $title,
            'PageTitle' => $title,
            'style' => "bands_list"
        ]);
    }

    public function actionDelete()
    {
        $id = $_GET['id'];
        $band = $this->bandsModel->GetBandById($id);
        $title = "Видалення групи";

        $titleForbidden = 'Доступ заборонено';

        if (empty($this->user) || $this->user['role_id'] != 1 && $this->user['role_id'] != 3)
            return $this->render('forbidden', null, [
                'MainTitle' => $titleForbidden,
                'PageTitle' => $titleForbidden
            ]);

        if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
            if ($this->bandsModel->DeleteBand($id)) {
                header('Location: /bands?page=1');
            } else {
                return $this->renderMessage('error', 'Помилка видалення групи', null, [
                    "MainTitle" => $title,
                    "PageTitle" => $title
                ]);
            }
        }

        return $this->render('delete', ['band' => $band], [
            'MainTitle' => $title,
            'PageTitle' => $title
        ]);
    }
}

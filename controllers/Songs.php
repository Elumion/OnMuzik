<?php


namespace controllers;


use core\Controller;

class Songs extends Controller
{

    protected $user;
    protected $userModel;
    protected $songModel;
    protected $bandModel;
    public function __construct()
    {
        $this->songModel = new \models\Songs();
        $this->userModel = new \models\Users();
        $this->bandModel = new \models\Bands();
        $this->user = $this->userModel->GetCurrentUser();
    }

    /**
     * Shows the list of last songs added
     * @return array|mixed|null
     */
    public function actionIndex()
    {
        global $Config;
        $page = $_GET['page'];
        $title = 'Пісні';
        $lastSongs = $this->songModel->GetLastSongs($Config['SongsCount'], $page);
        $bands = $this->songModel->GetSongsBands($lastSongs);
        $isMore = false;
        if (count($bands) === $Config['SongsCount'])
            $isMore = true;
        return $this->render('index', ["lastSongs" => $lastSongs, "bands" => $bands, 'currentPage' => $page, 'isMore' => $isMore], [
            'MainTitle' => $title,
            'PageTitle' => $title

        ]);
    }

    public function actionView()
    {
    }

    /**
     * add song
     */
    public function actionAdd()
    {
        $titleForbidden = 'Доступ заборонено';

        if (empty($this->user))
            return $this->render('forbidden', null, [
                'MainTitle' => $titleForbidden,
                'PageTitle' => $titleForbidden
            ]);

        $title = 'Додавання пісні';

        if ($this->isPost()) {
            $allowedTypesImg = ['image/png', 'image/jpeg'];
            $allowedTypesMedia = ['audio/mpeg'];


            $result = $this->songModel->AddSongs($_POST);

            if ($result['error'] === false) {

                if (is_file($_FILES['image']['tmp_name']) && in_array($_FILES['image']['type'], $allowedTypesImg)) {
                    switch ($_FILES['image']['type']) {
                        case 'image/png':
                            $extention = 'png';
                            break;
                        default:
                            $extention = 'jpg';
                            break;
                    }
                    $imgName = $result["id"] . '-' . uniqid() . '.' . $extention;
                    move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/song_images/' . $imgName);
                    $this->songModel->ChangePhoto($result['id'], $imgName);
                }
                if (is_file($_FILES['media']['tmp_name']) && in_array($_FILES['media']['type'], $allowedTypesMedia)) {
                    switch ($_FILES['media']['type']) {
                        case 'audio/mpeg':
                            $extention = 'mpeg';
                            break;
                        default:
                            $extention = 'mp3';
                            break;
                    }
                    $mediaName = $result["id"] . '-' . uniqid() . '.' . $extention;
                    move_uploaded_file($_FILES['media']['tmp_name'], 'assets/music/' . $mediaName);
                    $this->songModel->ChangeMedia($result['id'], $mediaName);
                }

                return $this->renderMessage('ok', 'Пісню успішно додано', null, [
                    "MainTitle" => $title,
                    "PageTitle" => $title

                ]);
            } else {
                $message = implode('<br/>', $result['messages']);
                return $this->render("add", null, [
                    "MainTitle" => $title,
                    "PageTitle" => $title,
                    'style' => 'style_form',
                    "MessageClass" => "error",
                    "MessageText" => $message
                ]);
            }
        } else
            return $this->render('add', null, [
                'MainTitle' => $title,
                'PageTitle' => $title,
                'style' => 'style_form'
            ]);
    }

    public function actionSearch()
    {
        $name = $_GET['search'];
        $title = $name;
        $titleForbidden = 'Пісні не знайдено';
        if (empty($name))
            return $this->render('empty', null, [
                'MainTitle' => $titleForbidden,
                'PageTitle' => $titleForbidden
            ]);
        $bands = $this->bandModel->GetBandsByNameLike($name);
        $songs = $this->songModel->GetSongsByNameLike($name);
        $songBands = $this->songModel->GetSongsBands($songs);

        return $this->render('search', ['modelSongs' => $songs, 'modelBands' => $bands, 'bands' => $songBands], [
            'MainTitle' => $title,
            'PageTitle' => $title,
            'style' => 'bands_list'
        ]);
    }

    /**
     * edit song
     */
    public function actionEdit()
    {
        $id = $_GET['id'];
        $song = $this->songModel->GetSongById($id);
        $band = $this->bandModel->GetBandById($song['band_id']);
        $titleForbidden = 'Доступ заборонено';

        if (empty($this->user) || $song['user_id'] != $this->user['id'] && $this->user['role_id'] != 1)
            return $this->render('forbidden', null, [
                'MainTitle' => $titleForbidden,
                'PageTitle' => $titleForbidden
            ]);

        $title = 'Редагування пісні';

        if ($this->isPost()) {
            $result = $this->songModel->UpdateSongs($_POST, $id);
            $song = $this->songModel->GetSongById($id);

            if ($result === true) {
                $allowedTypesImg = ['image/png', 'image/jpeg'];
                $allowedTypesMedia = ['audio/mpeg'];
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
                    $this->songModel->ChangePhoto($id, $imgName);
                }
                if (is_file($_FILES['media']['tmp_name']) && in_array($_FILES['media']['type'], $allowedTypesMedia)) {
                    switch ($_FILES['media']['type']) {
                        case 'audio/mpeg':
                            $extention = 'mpeg';
                            break;
                        default:
                            $extention = 'mp3';
                            break;
                    }
                    $mediaName = $id . '-' . uniqid() . '.' . $extention;
                    move_uploaded_file($_FILES['media']['tmp_name'], 'assets/music/' . $mediaName);
                    $this->songModel->ChangeMedia($id, $mediaName);
                }
                return $this->renderMessage('ok', 'Пісню успішно редаговано', null, [
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
            return $this->render('edit', ['modelSong' => $song, 'modelBand' => $band], [
                'MainTitle' => $title,
                'PageTitle' => $title,
                'style' => 'style_form'
            ]);
    }
    /**
     * edit song
     */
    public function actionDelete()
    {
        $title = "Видалення пісні";
        $id = $_GET['id'];
        $song = $this->songModel->GetSongById($id);
        if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
            if ($this->songModel->DeleteSongs($id)) {
                header('Location: /songs?page=1');
            } else {
                return $this->renderMessage('error', 'Помилка видалення пісні', null, [
                    "MainTitle" => $title,
                    "PageTitle" => $title
                ]);
            }
        }
        return $this->render('delete', ['model' => $song], [
            'MainTitle' => $title,
            'PageTitle' => $title
        ]);
    }
}

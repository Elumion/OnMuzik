<?php


namespace controllers;


use core\Controller;

class users extends Controller
{
    protected $usersModel;

    function __construct()
    {
        $this->usersModel = new \models\Users();
    }


    public function actionRegister()
    {
        if ($this->isPost()){
          $result = $this->usersModel->AddUser($_POST);
          if($result === true){
             return $this->renderMessage('ok','Реєстрація успішна', null, [
                 "MainTitle"=>"Реєстрація",
                 "PageTitle" => "Реєстрація"
             ]);
          }else{
              $message = implode('<br/>', $result);
              return $this->render("register",null,[
                  "MainTitle"=>"Реєстрація",
                  "PageTitle" => "Реєстрація",
                  "MessageClass" =>"error",
                  "MessageText"=> $message
              ]);
          }
        }else{
        return $this->render("register",null,[
            "MainTitle"=>"Реєстрація",
            "PageTitle" => "Реєстрація"
        ]);
        }
    }

    public function actionLogout(){
        $title = 'Вихід з акаунта';
       unset( $_SESSION["user"]);
        return $this->renderMessage('ok','Ви вийшли з аккаунта', null, [
            "MainTitle"=>$title,
            "PageTitle" => $title
        ]);
    }

    public function actionLogin(){
        $title = 'Вхід';
        if(isset($_SESSION["user"]))
            return $this->renderMessage('ok','Ви вже виконали вхід на сайт', null, [
                "MainTitle"=>$title,
                "PageTitle" => $title
            ]);
        if ($this->isPost()){
            $user = $this->usersModel->AuthUser($_POST['email'],$_POST['password']);
            if(is_array($user))
            {
                $_SESSION['user'] = $user;
                return $this->renderMessage('ok','Вхід виконаний успішно', null, [
                    "MainTitle"=>$title,
                    "PageTitle" => $title
                ]);
            }
            else{
                return $this->render("login",null,[
                    "MainTitle"=>$title,
                    "PageTitle" => $title,
                    "MessageClass" =>"error",
                    "MessageText"=> 'Неправильний логін або пароль'
                ]);
            }
        }else{
            return $this->render("login",null,[
                "MainTitle"=>$title,
                "PageTitle" => $title
            ]);
        }
    }

}
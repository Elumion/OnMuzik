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


    public function actionRegister(){


        if ($this->isPost()){
          $result = $this->usersModel->AddUser($_POST);
          if(!empty($result)){
             return $this->renderMessage('ok','Реєстрація успішна', null, [
                 "MainTitle"=>"Реєстрація",
                 "PageTitle" => "Реєстрація"
             ]);
          }else{
              return $this->render("register",null,[
                  "MainTitle"=>"Реєстрація",
                  "PageTitle" => "Реєстрація",
                  "MessageClass" =>"error",
                  "MessageText"=>"Користувач з заданим логіном/поштою уже існує"
              ]);
          }
        }else{
        return $this->render("register",null,[
            "MainTitle"=>"Реєстрація",
            "PageTitle" => "Реєстрація"
        ]);
        }
    }

}
<?php


namespace controllers;


use core\Controller;

class News extends Controller
{
    public function actionIndex($id,$name){

        return $this->render("index",['count'=>10],[
            "MainTitle"=>"MUZIK",
            "PageTitle" => "Пісні"
        ]);
    }
    public function actionList(){
        echo 'ACTION List';
    }

}
<?php


namespace controllers;


use core\Controller;

class Site extends Controller
{
    public function actionIndex(){
        $result = [
            'Title'=> 'ZAGOLOVOK',
            'Content'=> 'CONTENT'
        ];
        return $this->render('index', null,[
            'MainTitle' => 'Головна сторінка',
            'PageTitle' => 'Головна сторінка'
        ]);
    }
}
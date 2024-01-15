<?php

namespace app\controllers;
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
use app\core\Controller;
use app\core\Request;
use app\core\Application;
/**
 * Description of SiteController
 *
 * @author toseef
 */
class SiteController extends Controller{
    //put your code here
    public function home() {
        $params = ['name'=>'AppKnitters'];
        return $this->render('home',$params);
    }
    public function contact() {
        return $this->render('contact');
    }
    
    public function handleContact(Request $request) {
        $body = Application::$app->request->getBody();
        var_dump($body);
        return 'Handeling Contact data';
    }
}

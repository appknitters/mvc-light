<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace app\controllers;
use app\core\Controller;
use app\core\Request;
use app\models\RegisterModel;
/**
 * Description of AuthController
 *
 * @author toseef
 */
class AuthController extends Controller{
    //put your code here
    
    public function login() {
        $this->setLayout('auth');
        return $this->render('login');
    }
    
    public function register(Request $request) {
        $this->setLayout('auth');
        if($request->isPost()){
            $registerModel = new RegisterModel();
            $registerModel->loadData($request->getBody());
            echo '<pre>';
            var_dump($registerModel);
            if($registerModel->validate() && $registerModel->register()){
                return 'success';
            }
            var_dump($registerModel->errors);
            return $this->render('register',['model' => $registerModel]);
        }
        return $this->render('register',['model' => $registerModel]);
    }
}

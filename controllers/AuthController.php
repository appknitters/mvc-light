<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace app\controllers;
use app\core\Controller;
use app\core\Request;
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
            return 'Handle submitted data';
        }
        return $this->render('register');
    }
}

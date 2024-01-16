<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace app\core;

/**
 * Description of Controller
 *
 * @author toseef
 */
class Controller {
    public string $layout = 'main';
    public function setLayout($layout){
        Application::$app->controller->layout = $layout;
    }
    
    public function render($view,$params=[]) {
        return \app\core\Application::$app->router->renderView($view,$params);
    }
}

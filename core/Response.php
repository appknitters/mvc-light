<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace app\core;

/**
 * Description of Response
 *
 * @author toseef
 */
class Response {
    
    public function setStatusCode(int $code) {
        http_response_code($code);
    }
}

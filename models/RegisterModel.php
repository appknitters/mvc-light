<?php
namespace app\models;
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
use app\core\Model;
/**
 * Description of RegisterModel
 *
 * @author toseef
 */
class RegisterModel extends Model{
   public string $firstname;
   public string $lastname;
   public string $email;
   public string $password;
   public string $confirmPassword;
   
   public function register(){
       
   }
   
   public function rules():array {
       return [
           'firstname' => [self::RULE_REQUIRED],
           'lastname' => [self::RULE_REQUIRED],
           'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
           'password' => [self::RULE_REQUIRED,[self::RULE_MIN,'min' => 8],[self::RULE_MAX,'max' => 24]],
           'confirmPassword' => [self::RULE_REQUIRED,[self::RULE_MATCH,'match' => 'password']],
       ];
   }
}

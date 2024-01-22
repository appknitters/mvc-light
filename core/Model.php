<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace app\core;

/**
 * Description of Model
 *
 * @author toseef
 */
abstract class Model {
    
   public const RULE_REQUIRED = 'required';
   public const RULE_EMAIL = 'email';
   public const RULE_MIN = 'min';
   public const RULE_MAX = 'max';
   public const RULE_MATCH = 'match';
    public array $errors = [];
    public function loadData($data){
        foreach($data as $key => $value){
            if(property_exists($this, $key)){
                $this->$key=$value;
            }
        }
    }
    
    abstract public function rules():array;


    public function validate() {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule){
                $ruleName = $rule;
                if(!is_string($ruleName)){
                    $ruleName = $rule[0];
                }
                if($ruleName === self::RULE_REQUIRED && !$value){
                    $this->addError($attribute, $ruleName);
                }
                
                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)){
                    $this->addError($attribute, $ruleName);
                }
                
                if($ruleName === self::RULE_MIN && strlen($value) < $rule['min']){
                    $this->addError($attribute, $ruleName, $rule);
                }
                
                if($ruleName === self::RULE_MAX && strlen($value) < $rule['max']){
                    $this->addError($attribute, $ruleName, $rule);
                }
            }
        }
        
        return empty($this->errors);
    }
    
    public function addError(string $attribute,string $rule,$params = [] ) {
        $message = $this->errorMessages()[$rule] ?? '';
        foreach ($params as $key => $value){
            $message = str_replace("{{$key}}", $value,$message);
        }
        $this->errors[$attribute][] = $message;
    }
    
    public function errorMessages() {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field must be a valid email address',
            self::RULE_MIN => 'Min length of this field must be {min}',
            self::RULE_MAX => 'Max length of this field must be {max}',
            self::RULE_MATCH => 'This filed must be same as {match}'
        ];
    }
}

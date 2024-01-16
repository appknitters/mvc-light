<?php
namespace app\core;
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Router
 *
 * @author toseef
 */
class Router {
    
    protected array $routes = [];
    public Request $request;
    public Response $response;
    public function __construct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }
    
    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;
    }
    
    public function resolve() {
        
        $path = $this->request->getPath();
        $method = $this->request->method();
        
        $callback = $this->routes[$method][$path]?? false;
        
        if($callback===false){
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }
        if(is_string($callback)){
            return $this->renderView($callback);
        }
        if(is_array($callback)){
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }
        
        echo call_user_func($callback, $this->request);
        
    }
    
    public function renderView($view,$params=[]) {
        
        $layoutContect = $this->layoutContent();
        $viewContent = $this->viewContent($view,$params);
        
        return str_replace('{{content}}', $viewContent, $layoutContect);
        
        
    }
    
    public function renderContent($content) {
        
        $layoutContect = $this->layoutContent();
        return str_replace('{{content}}', $content, $layoutContect);
        
    }
    
    public function layoutContent() {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/{$layout}.php";
        return ob_get_clean();
    }
    
    public function viewContent($view,$params=[]) {
        foreach ($params as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR."/views/{$view}.php";
        return ob_get_clean();
    }
    
}

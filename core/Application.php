<?php
namespace app\core;

/**
 * Description of Application
 *
 * @author toseef
 */
class Application {
    
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    public static string $ROOT_DIR;
    public Controller $controller;
    public function __construct($rootPath) {
        self::$app = $this;
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request,$this->response);
    }
    
    public function getController(){
        return $this->controller;
    }
    
    public function setController($controller){
        $this->controller = $controller;
    }
    
    public function run() {
        echo $this->router->resolve();
    }
}

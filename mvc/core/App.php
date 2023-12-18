<?php
class App
{

  protected $controller = "Home";
  protected $action = "index";
  protected $params = [];
  function __construct()
  {

    $arr = $this->UrrlProcess();

    if (!isset($arr[0])) $arr[0] = $this->controller;
    if (!isset($arr[1])) $arrr[1] = $this->action;

    //Xu li controller
    if (file_exists("./mvc/controllers/" . ucfirst($this->controller) ."Controller.php")) {
      
      $this->controller = $arr[0];
      unset($arr[0]);
    }
    require_once "./mvc/controllers/" . ucfirst($this->controller) ."Controller.php";
    //Xu li Function
    if (isset($arr[1])) {
      if (method_exists($this->controller."Controller", $arr[1])) {
        $this->action = $arr[1];
      }
      unset($arr[1]);
    }

    // Xu li Params
    $this->params = $arr ? array_values($arr) : [];
    $controller =$this->controller."Controller";
    $controller = new $controller;
   
    call_user_func([$controller, $this->action], $this->params);
  }

  function UrrlProcess()
  {
    if (isset($_GET['url'])) {
      return explode('/', filter_var(trim($_GET['url'], "/")));
    }
  }
}

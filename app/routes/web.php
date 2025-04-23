<?php

// lista de routes
//     metodos
//          endpoint -> chamar load com controller e metodo

$router = [
  "GET" => [
    "/" => load("ProductsController", "index")
  ],
  "POST" => [
    "/" => load("ProductsController", "store"),
    // "/login" => load("LoginController", "store"),
    // "/signup" => load("SignupController", "store")
  ],
];

// criar funcao load, que recebe o controller e metodo
// verifica que o controller existe, se nao, throw exception (usar class_exists), se sim, criar instância
// vefica se o metodo é valido, se nao throw exeception (usar method_exists), se sim, passar o metodo a instância do controller

function load($controllerName, $action) {
  try {
    $controllerNamespace = "app\\controllers\\{$controllerName}";

    if (!class_exists($controllerNamespace)) {
      throw new Exception("Class {$controllerName} was not found at {$controllerNamespace}");
    }
    
    $controller = new $controllerNamespace();

    if (!method_exists($controller, $action)) {
      throw new Exception("Method {$action} does not exist.");
    }

    $controller->$action();

  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

<?php

require "../vendor/autoload.php";
require "../app/routes/web.php";

// verificar se o uri e método existe no routes

try {
  $uri = parse_url($_SERVER["REQUEST_URI"])["path"];
  $request = $_SERVER["REQUEST_METHOD"];

  if (!isset($router[$request])) {
    throw new Exception("Rota inexistente.");
  }

  if (!array_key_exists($uri, $router[$request])) {
    throw new Exception("Rota inexistente.");
  }

  echo $router[$request][$uri];

} catch (Exception $e) {
  $e->getMessage();
}

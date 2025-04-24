<?php

namespace app\controllers;

use Exception;
use League\Plates\Engine;

class Controller {
  public static function view(string $view, array $data = []) {
    try {
      $viewsPath = dirname(__FILE__, 2) . "/views";

      if (!file_exists($viewsPath . "/" . $view)) {
        throw new Exception("View {$view} inexistente.");
      }

      $templates = new Engine($viewsPath);
      echo $templates->render($view, $data);

    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}

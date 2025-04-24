<?php

namespace app\controllers;

class ProductsController {

  public function index() {
    var_dump("index do produto");

    Controller::view("products");
  }

  public function store() {
    var_dump("store do produto");
  }
}

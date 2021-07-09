<?php


namespace app\controllers;
use app\views\View;

class Controller
{
    public function __construct()
    {
        $this->view = new View();
    }
}
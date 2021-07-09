<?php

namespace app\views;

class View
{
    public function render($view)
    {
        require_once($view);
    }
}
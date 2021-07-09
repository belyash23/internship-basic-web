<?php

namespace app\views;

class View
{
    public function render($view, $data, $template='baseTemplate.php')
    {
        require_once($template);
    }
}
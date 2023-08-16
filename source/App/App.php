<?php

namespace Source\App;

use League\Plates\Engine;

class App
{
    public function __construct ()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/app","php");
    }

    public function home()
    {
        echo $this->view->render("home",[]);
    }

}

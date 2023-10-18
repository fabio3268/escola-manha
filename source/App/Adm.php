<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Category;

class Adm
{
    private $view;

    public function __construct ()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/adm","php");
    }

    public function home()
    {
        echo $this->view->render(
            "home"
        );
    }

    public function teachers ()
    {
        echo $this->view->render(
            "teachers"
        );
    }

    public function courses ()
    {
        $categories = new Category();
        echo $this->view->render(
            "courses", [
                "categories" => $categories->selectAll()
            ]
        );
    }

}

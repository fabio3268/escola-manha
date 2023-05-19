<?php

namespace Source\App;

use League\Plates\Engine;

class Web
{
    private $view;

    public function __construct ()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/web","php");
    }

    public function home()
    {
        //$name = "Fábio";
        echo $this->view->render("home",[
            "name" => "Fábio",
            "age" => 47
        ]);
    }

    public function about()
    {
        echo $this->view->render("about");
    }

    public function services()
    {
        echo $this->view->render("services");
    }

    public function portfolio()
    {
        echo $this->view->render("portfolio");
    }

    public function location()
    {
        echo "Essa é a minha localização!";
    }

    public function blog ()
    {
        echo "esse é o meu blog bonitinho...";
    }

    public function contact ()
    {
        echo "Olá, esse é meu contatinho!";
    }

    public function profile ()
    {
        echo "Esse é o meu perfil legal!";
    }


}

<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Category;
use Source\Models\Course;
use Source\Models\Faq;

class Web
{
    private $view;
    private $categories;

    public function __construct ()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/web","php");
        $category = new Category();
        $this->categories = $category->selectAll();
    }

    public function home()
    {
        //$name = "Fábio";
        echo $this->view->render("home",[
            "name" => "Fábio",
            "age" => 47,
            "categories" => $this->categories
        ]);
    }

    public function register(array $data)
    {
        if(!empty($data)){
            $response = json_encode($data);
            echo $response;
            return;
        }

        echo $this->view->render("register-clean",[
            "categories" => $this->categories
        ]);
    }

    public function about()
    {
        echo $this->view->render("about",[
            "categories" => $this->categories
        ]);
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

    public function faq ()
    {
        $faqs = new Faq();
        //var_dump($faqs->selectAll());

        echo $this->view->render("faq",[
            "faqs" => $faqs->selectAll(),
            "name" => "Fábio"
        ]);
    }

    public function courses (array $data) : void
    {

        $courses = new Course();

        if(!empty($data["categoryName"])){
            echo $this->view->render("courses",[
                "courses" => $courses->selectByCategory($data["categoryName"]),
                "categories" => $this->categories
            ]);
            return;
        }

        echo $this->view->render("courses",[
            "courses" => $courses->selectAll(),
            "categories" => $this->categories
        ]);
    }

}

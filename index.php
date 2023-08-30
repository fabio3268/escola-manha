<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

ob_start();

$route = new Router(url(), ":");

$route->namespace("Source\App");

$route->group(null);

$route->get("/", "Web:home");
$route->get("/sobre", "Web:about");

$route->get("/registro","Web:register");
$route->get("/login","Web:login");

$route->get("/servicos", "Web:services");
$route->get("/portifolio", "Web:portfolio");
$route->get("/localizacao","Web:location");
$route->get("/blog","Web:blog");
$route->get("/contato","Web:contact");
$route->get("/perfil","Web:profile");
$route->get("/faq","Web:faq");
$route->get("/api-faq","Web:apiFaq");

// Rotas Cursos

$route->get("/cursos","Web:courses");
$route->get("/cursos/{categoryName}","Web:courses");

$route->group("/app");
$route->get("/", "App:home");
$route->group(null);

$route->group("/admin");
$route->get("/", "Adm:home");
$route->get("/professores", "Adm:teachers");
$route->group(null);

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();

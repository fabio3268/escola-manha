<?php
    $this->layout("_theme",[
        "categories" => $categories
    ]);
?>

<?php
  echo "Olá, Mundo com PLATES e com Theme!";
  echo "<div>Olá, {$name}! Você tem {$age}.;</div>";
?>


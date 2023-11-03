<?php
    require_once'libs/router.php';

    //creo el router
    $router = new Router();

    //defino la tabla  endpoint    verbo        controller          metodo
    $router->addRoute('productos','GET','ProductApiController','getProducts');
    $router->addRoute('productos','POST','ProductApiController','createProduct');
    $router->addRoute('productos/:ID','GET','ProductApiController','getProduct');


    //rutea
    $router->route($_GET["resourse"],$_SERVER['REQUEST_METHOD']);

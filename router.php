<?php
    require_once'libs/router.php';

    //creo el router
    $router = new Router();

    //defino la tabla  endpoint    verbo        controller          metodo
    $router->addRoute('productos','GET','ProductApiController','get');
    $router->addRoute('productos','POST','ProductApiController','create');
    $router->addRoute('productos/:ID','GET','ProductApiController','get');
    $router->addRoute('tareas/:ID', 'PUT',    'ProductApiController', 'update');


    //rutea
    $router->route($_GET["resourse"],$_SERVER['REQUEST_METHOD']);

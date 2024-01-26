<?php

    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $index = $_GET['index'];
    
    $jsonTodos = file_get_contents("todos.json");
    $todos = json_decode($jsonTodos, true);

    array_splice($todos, $index, 1);

    $jsonTodos = json_encode($todos);
    file_put_contents("todos.json", $jsonTodos);
    echo $jsonTodos;
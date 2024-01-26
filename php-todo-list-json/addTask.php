<?php
    header('Content-Type:application/json');
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $jsonTodos = file_get_contents("todos.json");
    $todos = json_decode($jsonTodos, true);

    $text = $_POST['text'];
    $newTask = [
        'type' => $text,
        'done' => false
    ];

    $todos[] = $newTask;
  
    file_put_contents("todos.json", json_encode($todos));
    echo json_encode($todos);
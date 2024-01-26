<?php
    header('Content-Type:application/json');
    header("Access-Control-Allow-Headers: X-Requested-With");
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    $jsonTodos = file_get_contents("todos.json");
    echo $jsonTodos;

    // $todos = [
    //     [
    //         'type' => 'stirare',
    //         'done' => false,
    //     ],
    //     [
    //         'type' => 'lavare i piatti',
    //         'done' => true,
    //     ],
    //     [
    //         'type' => 'portare fuori il cane',
    //         'done' => false,
    //     ],
    //     [
    //         'type' => 'pulire',
    //         'done' => true,
    //     ],
    // ];

    // $jsonTodos = json_encode($todos);
    // echo $jsonTodos;
?>
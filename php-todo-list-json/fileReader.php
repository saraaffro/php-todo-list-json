 <?php

    $jsonTodos = file_get_contents("todos.json");
    $todos = json_decode($jsonTodos, true);
    
    var_dump($todos);

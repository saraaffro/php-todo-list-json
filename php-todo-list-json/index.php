<?php
    header('Content-Type:application/json');

    $todos = [
        [
            'type' => 'stirare',
            'done' => false,
        ],
        [
            'type' => 'lavare i piatti',
            'done' => true,
        ],
        [
            'type' => 'portare fuori il cane',
            'done' => false,
        ],
        [
            'type' => 'pulire',
            'done' => true,
        ],
    ];

    $jsonTodos = json_encode($todos);
    echo $jsonTodos;
    file_put_contents("todos.json", $jsonTodos);

    echo "File creato con successo!<br>";

?>
<?php

session_start();

if ( !isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = array();
}

if ( isset ($_GET['task_name'])){
    array_push($_SESSION['tasks'], $_GET['task_name']);
    unset($_GET['task_name']);
}

if ( isset ($_GET['clear'])){
    unset($_SESSION['tasks']);

}


//var_dump($_SESSION['tasks']);


?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>
<link rel="stylesheet" href="style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,700;1,400;1,500&display=swap" rel="stylesheet"> 
<body>
    <div class="container">
    <div class="header">
        <h1>Gerenciador de Tarefas</h1>
    </div>

    <div class="form">
        <form action="" method="get">
            <label for="task_name">Tarefa:</label>
            <input type="text" name="task_name" placeholder="Nome da Tarefa">
            <button type="submit">Cadastrar</button>
        </form>
    </div>

    <div class="separator"></div>
    <div class="list-tasks">
        <?php
        if (isset($_SESSION['tasks'])){
echo "<ul>";

        foreach($_SESSION['tasks'] as $key => $task){
            echo "<li>$task</li>";
        }

echo "<ul>";
        }
     ?>
<form action="" method="get">
    <input type="hidden" name="clear" value="clear">
    <button type="submit" class="btn-clear">Limpar Tarefas</button>
</form>
   
  <!-- */  <ul>
        <li>Tarefa 1</li>
        <li>Tarefa 2</li>
        <li>Tarefa 3</li> 
    </ul> -->
    </div>
<div class="footer">
<p>Desenvolvimento por AnaElisaMueller</p>

</div>

</div>
</body>
</html>
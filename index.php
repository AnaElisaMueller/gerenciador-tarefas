<?php

session_start();

if ( !isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = array();
}

if ( isset ($_GET['clear'])){
    unset($_SESSION['tasks']);
    unset($_GET['clear']);
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
        <form action="task.php" method="post">
            <input type="hidden" name="insert" value="insert">
            <label for="task_name">Tarefa:</label>
            <input type="text" name="task_name" placeholder="Nome da Tarefa">
            <label for="task_description">Descrição:</label>
            <input type="text" name="task_description" placeholder="Descrição da Tarefa">
            <label for="task_date">Data</label>
            <input type="date" name="task_date">
            <button type="submit">Cadastrar</button>
        </form>
        <?php
        if (isset ($_SESSION['message'])){
            echo "<p style='color: #ca3939';> .$_SESSION['message'] . </p>";
            unset ($_SESSION['message']);
        }


        ?>

    </div>

    <div class="separator"></div>
    <div class="list-tasks">
        <?php
        if (isset($_SESSION['tasks'])){
echo "<ul>";

        foreach($_SESSION['tasks'] as $key => $task){
            echo "<li>
            <span>" . $task['task_name'] . "</span>
            <button type='button' class='btn-clear' onclick='deletar$key()'>Remover</button>
            <script>
            function deletar$key(){
                if ( confirm('Confirmar remoção?')){
                    window.location = 'https://localhost:8100/task.php?key=$key';
                }
             return false;
            }
            </script>

            </li>";
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
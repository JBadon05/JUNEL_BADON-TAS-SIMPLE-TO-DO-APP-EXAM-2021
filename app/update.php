<?php

if(isset($_POST['id'])){
    require '../database/dbconn.php';

    $id = $_POST['id'];

    if(empty($id)){
       echo 'error';
    }else {
        $tasks = $conn->prepare("SELECT id, completed FROM todolist WHERE id=?");
        $tasks->execute([$id]);

        $task = $tasks->fetch();
        $tID = $task['id'];
        $completed = $task['completed'];

        $tcompleted = $completed ? 0 : 1;

        $res = $conn->query("UPDATE todolist SET completed=$tcompleted WHERE id=$tID");

        if($res){
            echo $completed;
        }else {
            echo "error";
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}
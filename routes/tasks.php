<?php
require_once (dirname(__DIR__).'/config/init.php');

if($_GET['id'] == 'addTask') {
    $task = new Task(
        $_POST['title'],
        $_POST['description'],
        0
    );
    TaskController::addTask($task);
    header('Location: ../view/tasks.php');
    exit();
}

else if($_GET['id'] == 'deleteTask') {
    TaskController::deleteTask();
    header('Location: ../view/tasks.php');
    exit();
}

else if($_GET['id'] == 'updateTask') {
    TaskController::updateTask();
    header('Location: ../view/tasks.php');
    exit();
}
<?php
require_once (dirname(__DIR__).'/init.php');

class TaskController {
    public static function getAllTasks(){
        $pdo = PDOUtils::getSharedInstance();
        $results = $pdo->requestSQL('SELECT id, title, description, status, date_creation  FROM tasks');
        return $results;
    }

    public static function addTask( Task $task){
        try{
            $pdo = PDOUtils::getSharedInstance();
            $results = $pdo->execSQL('INSERT INTO tasks (title, description, status) VALUES (?,?,?)', [$task->getTitle(), $task->getDescription(),  $task->getStatus()]);
            
            $_SESSION['success'] = "Ajout de la tâche avec succès";
            
        }catch (PDOException $e){

            $_SESSION['error'] ="Il y'a eu une erreur" . $e->getMessage();
        }
        
    }

    public static function deleteTask()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_task = isset($_POST['id']) ? (int) $_POST['id'] : null;

            if ($id_task === null) {
                $_SESSION['error'] = "ID de la tâche invalide.";
                header("Location: ../view/tasks.php");
                exit();
            }

            try {
                $pdo = PDOUtils::getSharedInstance();
                $sql = "DELETE FROM tasks WHERE id = ?";
                $pdo->execSQL($sql, [$id_task]);

                $_SESSION['success'] = "La tâche a été supprimé avec succès.";
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Erreur lors de la suppression : " . $e->getMessage();
                exit();
            }
        }
    }

    public static function updateTask()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_task = isset($_POST['id_task']) ? (int) $_POST['id_task'] : null;
            $status = isset($_POST['status']) ? (int) $_POST['status'] : null;

            if ($id_task === null || $status === null) {
                $_SESSION['error'] = "Statut invalide.";
                header("Location: ../view/tasks.php");
                exit();
            }

            if (!in_array($status, [0, 1])) {
                $_SESSION['error'] = "Statut invalide.";
                header("Location: ../view/tasks.php");
                exit();
            }

            try {
                $pdo = PDOUtils::getSharedInstance();
                $sql = "UPDATE tasks SET status = ? WHERE id = ?";
                $pdo->execSQL($sql, [$status, $id_task]);
                header("Location: ../view/tasks.php");
                $_SESSION['success'] = "Le statut de la tâche a été mis à jour avec succès.";
                header("Location: ../view/tasks.php");
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Erreur SQL : " . $e->getMessage();
                exit();
            }
        }
    }
    
}
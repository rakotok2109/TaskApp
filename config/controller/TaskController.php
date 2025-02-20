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
            $results = $pdo->execSQL('INSERT INTO tasks (title, description, status, date_creation) VALUES (?,?,?,?)', [$task->getTitle(), $task->getDescription(),  $task->getStatus(), $task->getDate_creation()]);
            
            $_SESSION['success'] = "Ajout de la tâche avec succès";
            
        }catch (PDOException $e){

            $_SESSION['error'] ="Il y'a eu une erreur" . $e->getMessage();
        }
        
    }

    /*public static function deleteTask()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_task = isset($_POST['id']) ? (int) $_POST['id'] : null;

            if ($id_task === null) {
                $_SESSION['error'] = "ID de la tâche invalide.";
                header("Location: ../pages/admin/dashboard.php#tasks");
                exit();
            }

            try {
                $pdo = PDOUtils::getSharedInstance();
                $sql = "DELETE FROM tasks WHERE id = ?";
                $pdo->execSQL($sql, [$id_task]);

                $_SESSION['success'] = "La tâche a été supprimé avec succès.";
                header("Location: ../pages/admin/dashboard.php#tasks");
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Erreur lors de la suppression : " . $e->getMessage();
                header("Location: ../pages/admin/dashboard.php#tasks");
                exit();
            }
        }
    }

    public static function updatetask(task $task)
    {
        $pdo = PDOUtils::getSharedInstance();
        $pdo->execSQL('UPDATE tasks SET name = ?, type = ?, description = ?, image = ? WHERE id = ?',
        [
            $task->getTitle(),
            $task->getType(),
            $task->getDescription(),
            $task->getImage(),
            $task->getId()
        ]);
        exit();
    }
*/
    


}
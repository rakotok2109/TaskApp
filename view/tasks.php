<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de Tâches</title>
    <link rel="stylesheet" href="../assets/css/tasks.css">
</head>
<body>
    <?php
        require_once(dirname(__DIR__) . '/config/init.php');
        $tasks = TaskController::getAllTasks();
    ?>
    <div class="title-banner">
        <h1>Bienvenue sur votre Gestionnaire de tâches</h1>
    </div>

    <div class="tasks-container">
        <div class="add-task">
            <a href="add-task.php">Ajoutez une tâche</a>
        </div>

        <h2 class="page-title">Toutes les tâches</h2>
        <?php if (!empty($tasks)): ?>
            <div class="task-list">
                <?php foreach ($tasks as $task): ?>
                    <div class="task-card">
                        <h2><?= htmlspecialchars($task['title']); ?></h2>
                        <p class="description"><?= htmlspecialchars($task['description']); ?></p>
                        <form method="POST" action="../routes/tasks.php?id=updateTask">
                            <input type="hidden" name="id_task" value="<?= $task['id'] ?>">
                            <select name="status">
                                <option value="0" <?= $task['status'] == 0 ? 'selected' : '' ?>>A faire</option>
                                <option value="1" <?= $task['status'] == 1 ? 'selected' : '' ?>>Terminée</option>
                            </select>
                            <button type="submit" class="edit-btn">Modifier</button>
                        </form>
                        <form method="POST" action="../routes/tasks.php?id=deleteTask" onsubmit="return confirm('Supprimer cette tâche ?');">
                            <input type="hidden" name="id" value="<?= $task['id'] ?>">
                            <button type="submit" class="delete-btn">Supprimer</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="no-task">Aucune tâche pour le moment.</p>
        <?php endif; ?>
    </div>

</body>
</html>
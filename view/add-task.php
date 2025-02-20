<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une tâche</title>
    <link rel="stylesheet" href="../assets/css/add_task.css">
</head>
<body>

    <?php
        require_once(dirname(__DIR__) . '/config/init.php');
    ?>

    <div class="form-section">
        <form action="../routes/tasks.php?id=addTask" method="POST">
            <div class="ss">
                <label for="title">Titre</label>
                <input type="text" id="title" name="title" required>
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="3" required></textarea>
            </div>
            <button type="submit">Créer votre tâche</button>
        </form>
    </div>

</body>
</html>
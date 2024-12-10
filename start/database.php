<?php
include "base.php";

// Обработка формы добавления пользователя
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $last_name = mysqli_real_escape_string($link, $_POST['last_name']);

    $query = "INSERT INTO users (name, last_name) VALUES ('$name', '$last_name')";
    mysqli_query($link, $query);
}

// Обработка удаления пользователя
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $query = "DELETE FROM users WHERE id = $id";
    mysqli_query($link, $query);
}

// Получение списка пользователей
$result = mysqli_query($link, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>Список пользователей</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php require "blocks/header.php" ?>

    <div class="container mt-5">

    <h1>Добавить пользователя</h1>
    <form method="post" action="">
        <input type="text" name="name" placeholder="Имя" required>
        <input type="text" name="last_name" placeholder="Фамилия" required>
        <button type="submit" name="add_user">Добавить</button>
    </form>

    <h2>Список пользователей</h2>
    <ul>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <li>
                <?= $row['name'] ?> <?= $row['last_name'] ?>
                <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Вы уверены, что хотите удалить?');">Удалить</a>
            </li>
        <?php endwhile; ?>
    </ul>

    <?php
    mysqli_close($link);
    ?>
    <?php require "blocks/footer.php" ?>

    </div>
</body>
</html>

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
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <title>Список пользователей</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
            text-align: center;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
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
        <table>
            <tr>
                <th>Номер</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Действие</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['last_name'] ?></td>
                <td><a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Вы уверены, что хотите удалить?');">Удалить</a></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <?php
        mysqli_close($link);
        ?>

        <?php require "blocks/footer.php" ?>

    </div>
</body>
</html>

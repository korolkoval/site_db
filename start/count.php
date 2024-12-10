<?php
// var_dump($_POST);
$first_number = '';
$second_number = '';
$sum = '';

if (isset($_POST['reset'])) {
    // reset
    $first_number = '';
    $second_number = '';
    $sum = '';
} elseif (!empty($_POST['1_number']) && !empty($_POST['2_number'])){
    $first_number = $_POST['1_number'];
    $second_number = $_POST['2_number'];
    $sum = $first_number + $second_number;
}
?>

<!DOCTYPE html>
<html lang="ru">
<!--  -->
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>Сложи два числа</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php require "blocks/header.php" ?>

    <div class="container mt-5">
        <!-- <div>
            <p>First: <?=$first_number ?></p>
            <p>Second: <?=$second_number ?></p>
        </div> -->
        <form action="count.php" method="post">
            <div>
                <p>Введите первое число</p>
                <input placeholder="Первое число" name="1_number" type="number" value="<?=$first_number?>">
            </div>
            <br>
            <div>
                <p>Введите второе число</p>
                <input placeholder="Второе число" name="2_number" type="number" value="<?=$second_number?>">
            </div>
            <br>
            <div>
                <p>Сумма введенных чисел:</p>
                <input name="sum_number" type="number" value="<?=$sum?>">
            </div>
            <br>
            <div>
                <p>Активные кнопки</p>
                <button type="submit">Сложить</button>
                <!-- Кнопка для сброса данных -->
                <button type="submit" name="reset" value="1">Сбросить</button>
                <button type="submit">Записать в бд</button>
            </div>

            <!-- <br>
            <div>
                <button type="reset" formaction="count.php">Очистить</button>
            </div>
            <br>
            <div>
                <button>Reset</button>
                <input type="reset" value="Reset">
            </div>
            <br>
            <div>
                <button onclick="location.reload();">Обновить страницу</button>
            </div> -->

        </form>
    </div>

    <?php require "blocks/footer.php" ?>
</body>

</html>
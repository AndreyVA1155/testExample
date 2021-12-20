<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'appFiles' . DIRECTORY_SEPARATOR . 'header.php');
?>

<br>
список пользователей в БД:
<br>

<?php
$users = functionAll\getUsers();
?>

<br>
<form action="/" method="post">
    <p>введиите имя: <input type="text" name="name" /></p>
    <p>введите фамилию: <input type="text" name="surname" /></p>
    <p>введите мобильный телефон: <input type="text" name="mobilPhone" /></p>
    <p>введите комментарий: <input type="text" name="comment" /></p>
    <p><input type="submit" name="send" value=" добавить пользователя в БД "/></p>
</form>

<?php
if (isset($_POST['send'])) {
    if($_POST['name'] == '' || $_POST['surname'] == '' || $_POST['mobilPhone'] == '') {
        echo 'ничего не введено' . PHP_EOL;
    } else {
        $data = [
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'mobilPhone' => $_POST['mobilPhone'],
            'comment' => $_POST['comment']
        ];
        var_dump($data);
        functionAll\addUser($data);
        echo 'OK' . PHP_EOL;
    }
} else {
    echo 'кнопка добавить пользователя в БД  не нажата' . PHP_EOL;
}

?>

<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'appFiles' . DIRECTORY_SEPARATOR . 'footer.php');
?>
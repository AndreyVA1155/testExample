<?php
namespace functionAll;
use PDO;

/**
 * @param string connect функиция создает подключения в БД SQl, connect()
 * @return array возвращает $connect полключение к БД, connect
 */
function connect()
{
    static $connect;
    $host = 'localhost';
    $user = '1155';
    $password = '1155';
    $dbname = 'testexample';

    if (empty($connect)){
        $connect = new PDO("mysql:host=$host; dbname=$dbname", $user, $password);
        if (!$connect->errorInfo())
        {
            echo "\nPDO::errorInfo():\n";
            print_r($connect->errorInfo());
        }
    }
    return $connect;
}

/**
 * @param string getUsers() функция для создания запроса в БД  и вывода всех пользователей getUsers()
 * @return void, getUsers()
 */
function getUsers()
{
    $statement = connect()->query('SELECT * FROM users');

    while($row = $statement->fetch(PDO::FETCH_ASSOC)) {

        echo 'имя пользователя: '  . $row['name'] . '- фамилия пользователя: ' . $row['surname'] . '- email пользователя: '
            . $row['mobil_phone'] . '- комментарий по пользователю: ' . $row['comment'] .'<br>' . PHP_EOL;
    }

}

/**
 * @param $data - массив с данными пользователя которые необходимо добавить в БД
 * @param string addUser функция выводит в return массив с данными всех пользователй, кроме авторизорованного, addMessage($login, $data)
 * @return array результат выполнения запроса в БД
 */
function addUser($data)
{
    $stmt = connect()->prepare("    
    INSERT INTO `users`(name, surname, mobil_phone, comment)
    values (
            :name,
            :surname,
            :mobilPhone,
            :comment
    )");

    return $stmt->execute([
        ':name' => $data['name'],
        ':surname' => $data['surname'],
        ':mobilPhone' => $data['mobilPhone'],
        ':comment' => $data['comment']
    ]);
}
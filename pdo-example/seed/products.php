<?php

$vegetables = [
    ['name' => 'бурак', 'price' => rand(20, 40)],
    ['name' => 'морква', 'price' => rand(40, 80)],
    ['name' => 'помідори', 'price' => rand(80, 120)],
];

$username = 'root';
$password = '';
$db = 'pdo_example';
$host = '127.0.0.1';

$dsn = 'mysql:host=' . $host . ';dbname=' . $db . ';charset=utf8;';

$database = new PDO($dsn, $username, $password);

function dd($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

foreach($vegetables as $item) {
    $sql = "INSERT INTO `products` (`name`, `price`, `category_id`) VALUES ('{$item["name"]}', '{$item["price"]}', 3)";
   // $database->query($sql);
}

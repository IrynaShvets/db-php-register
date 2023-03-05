<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
</head>

<body>

    <?php

    function dd($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    $username = 'root';
    $password = '';
    $db = 'pdo_example';
    $host = '127.0.0.1';

    $dsn = 'mysql:host=' . $host . ';dbname=' . $db . ';charset=utf8;';

    $database = new PDO($dsn, $username, $password);

    $products = $database->query("SELECT * FROM `products`")->fetchAll(PDO::FETCH_ASSOC);

    $SQL = "SELECT * FROM `categories`";
    $categories = $database->query($SQL)->fetchAll(PDO::FETCH_ASSOC);

    $SQL = "SELECT *, `products`.`id` as `product_id` FROM `products` JOIN `categories` ON `categories`.`id` = `products`.`category_id`";
    $products_with_category = $database->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
    dd($products_with_category);

    ?>

    <ol>
        <?php foreach ($products as $product) : ?>
            <li>
                <?= $product['name']; ?>
            </li>
        <?php endforeach; ?>
    </ol>

    <ol>
        <?php foreach ($categories as $category) : ?>
            <li>
                <?= $category['display']; ?>
            </li>
        <?php endforeach; ?>
    </ol>

    <ol>
        <?php foreach ($products_with_category as $product) : ?>
            <li>
                <strong>Категорія: </strong><?= $product['display']; ?> <strong>Назва продукта: </strong><?= $product['name']; ?>
            </li>
        <?php endforeach; ?>
    </ol>

</body>

</html>
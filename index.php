<?php

require_once __DIR__ . '/vendor/autoload.php';

use RestaurantChain\RestaurantChain;

// サンプルデータを生成
$restaurantChains = [
    RestaurantChain::RandomGenerator(),
    RestaurantChain::RandomGenerator(),
    RestaurantChain::RandomGenerator(),
];

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profiles</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php foreach ($restaurantChains as $restaurantChain): ?>
        <?php echo $restaurantChain->toHTML(); ?>
    <?php endforeach; ?>
</body>
</html>

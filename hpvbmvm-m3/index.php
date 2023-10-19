<?php

date_default_timezone_set('Asia/Yekaterinburg');
require_once('helpers.php');
require_once('functions.php');
require_once('init.php');

$categories = get_categories($con);
$lots = get_lots($con);

$nav = include_template( 'category.php', [
    'categories' => $categories,
]);

$main = include_template( 'main.php', [
    'lots' => $lots,
    'categories' => $categories,
]);

print($layout = include_template( 'layout.php', [
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'title' => $title,
    'lots' => $lots,
    'nav' => $nav,
    'main' => $main,
]));



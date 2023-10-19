<?php
    require_once('helpers.php');
    require_once('functions.php');
    require_once('init.php');

    $categories = get_categories($con);
    
    $nav = include_template( 'category.php', [
        'categories' => $categories
    ]); 

    $new_lot_detail = include_template('add_lot.php',[
        'categories' => $categories, 
        'nav' => $nav
    ]);

    $new_lot_detail = print(include_template('layout.php', [
        'nav' => $nav,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'title' => $title,
        'main' => $new_lot_detail,
    ]));
    pr(22);
    
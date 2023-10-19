<?php
    require_once('helpers.php');
    require_once('functions.php');
    require_once('init.php');

    $categories = get_categories($con);
    $lots = lot_detail($con, $_GET['id']);
    
    $nav = include_template( 'category.php', [
        'categories' => $categories,
    ]); 
    
    if (http_response_code() === 404) {
        $detail_lot = include_template('404.php',[
            'categories' => $categories,
            'nav' => $nav
        ]);
    }else{
        $detail_lot = include_template('detale_lot.php',[
            'categories' => $categories, 
            'lots' => $lots, 
            'nav' => $nav
        ]);
    }

    $detail_lot = print(include_template('layout.php', [
        'nav' => $nav,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'title' => $title,
        'main' => $detail_lot,
    ]));
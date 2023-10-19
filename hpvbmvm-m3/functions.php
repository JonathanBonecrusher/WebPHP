<?php
function format($num)
    {
        return number_format($num,0, '', ' '). ' ₽';
    };
function get_dt_range(string $end_time):array
    {
        date_default_timezone_set('Asia/Yekaterinburg');

        $COUNT_MINUTE = 60;
        $minute = 1;

        $minutes = (strtotime($end_time) - time()) /$COUNT_MINUTE;

        $hours = str_pad(floor($minutes / $COUNT_MINUTE), 2, "0", STR_PAD_LEFT);
        $minutes = str_pad(floor($minutes -($hours * $COUNT_MINUTE) + $minute), 2, "0", STR_PAD_LEFT);

        return [$hours, $minutes];
    };
function get_lots(mysqli $con):array{
    $sql = "SELECT Lot.id, Lot.name as name, picture as photo, start_price as price, date_end as date_end, Category.sym_code as sym_code, Category.name as category FROM Lot
    LEFT JOIN Category ON Lot.category_id = Category.id
    WHERE date_end > NOW() ORDER BY date_reg DESC";

    return mysqli_fetch_all(mysqli_query($con, $sql), MYSQLI_ASSOC);
};

function get_categories(mysqli $con):array{
    $sql = "SELECT name, sym_code FROM Category";

    return mysqli_fetch_all(mysqli_query($con, $sql), MYSQLI_ASSOC);
}

function lot_detail($con, int $id_lot):array|int{
    $sql = "SELECT Lot.name as name_lot, picture, start_price, date_end as date_end, description, Category.name FROM Lot
    INNER JOIN Category ON Lot.category_id = Category.id
    WHERE Lot.id = ? ";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id_lot);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
    if(mysqli_num_rows($res) !== 0){
        return $rows[0];
    }else{
        return http_response_code(404);
    }

}

function pr ($val){
    $bt = debug_backtrace();
    $file = file($bt[0]['file']);
    $src = $file[$bt[0]['line']-1];
    $pat = '#(.*)'.__FUNCTION__.' *?\( *?(.*) *?\)(.*)#i';
    $var = preg_replace($pat, '$2', $src);
    echo '<script>console.log("'.trim($var).'='. 
        addslashes(json_encode($val,JSON_UNESCAPED_UNICODE)).'")</script>'."\n";
}

?>


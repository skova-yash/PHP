<?php
    $number = $_GET['num'];
    $select = substr($number, rand(0, strlen($number)-1), 1)
?>
<p><?php echo date('Y/m/d', time()) ?>の運勢は</p>
<p>選ばれた数字は<?php echo $select ?></p>
<?php
    switch($select) {
        case $select == 0:
            echo "凶";
            break;
        case $select <= 3:
            echo "小吉";
            break;
        case $select <= 6:
            echo "中吉";
            break;
        case $select <= 8:
            echo "吉";
            break;
        default:
            echo "大吉";
            break;
    }
?>
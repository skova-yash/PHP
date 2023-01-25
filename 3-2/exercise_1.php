<?php
    $fruits = ["リンゴ" => 150, "みかん" => 50, "もも" => 500];
    $counts = [2, 3, 6];

    $index = 0;

    foreach ($fruits as $key => $value) {
        $ret = getFruitsPrice($value, $counts[$index]);

        echo $key."は".$ret."円です。";

        if($value != end($fruits)){
            echo "<br>";
        }
        $index++;
    }

    /* フルーツの合計金額を計算して返す関数
        引数 $unitprice 単価
             $count     個数
     */
    function getFruitsPrice($unitprice, $count) {
        return $unitprice * $count;
    }
?>
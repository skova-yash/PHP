<?php
// DBの接続情報を記述したファイルを読み込む
require_once('db_connect.php');
// 関数をまとめたファイルを読み込む
require_once('function.php');

// ログインチェック関数実行
check_user_logged_in();

// post通信で値が送られているか確認(isset)
if (isset($_POST['post'])) {
    // タイトルが未入力の場合
    if (empty($_POST['title'])) {
        echo "タイトルが未入力です。";
    }
    // 発売日が未入力の場合
    if (empty($_POST['date'])) {
        echo "発売日が未入力です。";
    } 
    // 在庫数が選択されていない場合
    if (empty($_POST['stock'])) {
        echo "在庫数が選択されていません。";
    }

    // タイトル、発売日、在庫数のデータが全てあるか確認
    if (!empty($_POST['title']) && !empty($_POST['date']) && !empty($_POST['stock'])) {

        // ifがtrueだったら変数に代入
        $title = htmlspecialchars($_POST['title'],ENT_QUOTES);
        $date  = htmlspecialchars($_POST['date'],ENT_QUOTES);
        $stock = htmlspecialchars($_POST['stock'],ENT_QUOTES);

        // PDOのインスタンスを取得
        $pdo = db_connect();

        try {
            // booksテーブルにINSERTするクエリを作成
            $sql = "INSERT INTO books (title, date, stock) VALUES (:title, :date, :stock)";
            $stmt = $pdo->prepare($sql);
            // タイトルをバインド
            $stmt->bindParam(':title', $title);
            // 発売日をバインド
            $stmt->bindParam(':date', $date);
            // 在庫数をバインド
            $stmt->bindParam(':stock', $stock);
            $stmt->execute();
            header("Location: main.php");
        } catch (PDOException $e) {
            echo 'Error :' . $e->getMessage();
            die();
        }
    } 
}

?>

<style>
    .button {
        margin-top:15px;
        height:30px;
        width:150px;
        background-color:#2d7cff;
        color:white;
        border:none;
        border-radius: 5px;
    }

    body {
        margin-left:100px;
    }
</style>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>本 登録画面</title>
</head>
<body>
    <h1>本  登録画面</h1>
    <form action="" method="post">
        <input placeholder="タイトル" type="text" name="title" id="title" style="width: 250px; height: 30px;"><br>
        <input placeholder="発売日" type="date" name="date" id="date" style="width: 250px; height: 30px; margin-top: 15px;"><br>
        <h4>在庫数</h4>
        <input placeholder="選択してください" type="number" name="stock" min="0" max="100" style="width: 200px; height: 30px;">
        <br>
        <input class="button" type="submit" value="登録" name="post">
    </form>
</body>
</html>
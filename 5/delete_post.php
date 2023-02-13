<?php
// DBの接続情報を記述したファイルを読み込む
require_once('db_connect.php');
// 関数をまとめたファイルを読み込む
require_once('function.php');

// // ログインチェック関数実行
check_user_logged_in();

// URLの?以降で渡されるIDをキャッチ
$id = $_GET['id'];

// 引数の値が空だった場合、main.phpにリダイレクト
redirect_main_unless_parameter($id);

// PDOのインスタンスを取得
$pdo = db_connect();

try {
    //指定idのレコードをbooksテーブルから削除
    $sql = "DELETE FROM books WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    // idのバインド
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: main.php");
    exit;
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}
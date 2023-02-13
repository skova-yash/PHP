<link rel="stylesheet" href="style.css">
<?php
// DBの接続情報を記述したファイルを読み込む
require_once('db_connect.php');
// 関数をまとめたファイルを読み込む
require_once('function.php');

// ログインチェック関数実行
check_user_logged_in();
// PDOのインスタンスを取得
$pdo = db_connect();

try {
    // booksの全レコードを、id降順で取得するクエリを設定
    $sql = "select * from books order by id desc";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo 'Error :' . $e->getMessage();
    die();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>在庫一覧画面</title>
</head>
<body>
    <h1>在庫一覧画面</h1>
    <div>
        <button class="btn1" onclick="location.href='create_book.php'">新規登録</button>
        <button class="btn2" onclick="location.href='logout.php'">ログアウト</button><br>
    </div>
        <table border="1" style="border-collapse: collapse; border-color: #f9f8fa">
            <tr>
                <th class="c1">タイトル</th>
                <th class="c2">発売日</th>
                <th class="c3">在庫数</th>
                <th class="c4"> </th>
            </tr>

            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td><button class="btn3"><a href="delete_post.php?id=<?php echo $row['id'] ?>">削除</a></button></td>
                </tr>
            <?php } ?>
        </table>
</body>
</html>
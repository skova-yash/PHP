<?php
// DBの接続情報を記述したファイルを読み込む
require_once('db_connect.php');
// 関数をまとめたファイルを読み込む
require_once('function.php');

session_start();

if (!empty($_POST['login'])) {
    
    if (empty($_POST["name"])) {
        echo "ユーザー名が未入力です。";
    }
    if (empty($_POST["password"])) {
        echo "パスワードが未入力です。";
    }

    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        $name = htmlspecialchars($_POST["name"],ENT_QUOTES);
        $pass = htmlspecialchars($_POST["password"],ENT_QUOTES);

        $pdo = db_connect();

        try {
            $sql = "SELECT * FROM users WHERE name = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
            die();
        }

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {    
            if (password_verify($pass, $row["password"])) {
                $_SESSION["id"] = $row["id"];
                $_SESSION["name"] = $row["name"];
                header("Location: main.php");
                exit;
            } else {
                echo "ユーザー名またはパスワードに誤りがあります。";
            }
        } else {
            echo "ユーザー名またはパスワードに誤りがあります。";
        }
    }
}

?>

<style>
    .container {
        display: flex;
        position: relative;
    }

    .btn {
        position:absolute;
        left: 300px;
        top: 30px;
        height:30px;
        background-color:#34a4b4;
        color:white;
        border:none;
        border-radius: 5px;
    }

    .button {
        margin-top:15px;
        height:30px;
        width:150px;
        background-color:#2d7cff;
        color:white;
        border:none;
        border-radius: 5px;
    }

    form {
        margin-top:-25px;
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
    <title>ログイン画面</title>
</head>
<body>
    <div class="container">
        <h1>ログイン画面</h1>
        <button class="btn" onclick="location.href='register.php'">新規ユーザー登録</button>
    </div>
    <form action="" method="post"><br>
        <input placeholder="ユーザー名" type="text" name="name" id="username" style="width: 250px; height: 30px;"><br>
        <input placeholder="パスワード" type="password" name="password" id="password" style="width: 250px; height: 30px; margin-top: 15px;"><br>
        <input class="button" name="login" type="submit" value="ログイン"><br>
    </form>
</body>
</html>
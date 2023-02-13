<?php
// セッション開始
session_start();
// セッション変数のクリア
$_SESSION = array();
// セッションクリア
session_destroy();
?>

<style>
    h1 {
        margin-top:50px;
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

    body {
        margin-left:100px;
    }
</style>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ログアウト</title>
</head>
<body>
    <h1>ログアウト画面</h1><br>
    <div>ログアウトしました</div><br>
    <input class="button" type="button" onclick="location.href='login.php'" value="ログイン画面"><br>
</body>
</html>
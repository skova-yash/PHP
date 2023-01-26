<link rel="stylesheet" href="style.css">
<?php
//POST送信で送られてきた名前を受け取って変数を作成
    $in_name = $_POST['in_name'];

//①画像を参考に問題文の選択肢の配列を作成してください。
    $port_arr = [80, 22, 20, 21];
    $lang_arr = ['PHP', 'Python', 'JAVA', 'HTML'];
    $scmd_arr = ['join', 'select', 'insert', 'update'];

//② ①で作成した、配列から正解の選択肢の変数を作成してください
    $ans_port = 80;
    $ans_lang = 'HTML';
    $ans_scmd = 'select';
?>
<p>お疲れ様です<!--POST通信で送られてきた名前を出力--><?php echo $in_name; ?>さん</p>
<!--フォームの作成 通信はPOST通信で-->
<form action="answer.php" method="post">
    <h2>①ネットワークのポート番号は何番？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
        <?php $flg = true; 
            foreach($port_arr as $value) {?>
            <input type="radio" name="sel_port" value="<?php echo $value; ?>" <?php if ($flg) echo 'checked';?>><?php echo $value; ?>
            <?php if ($flg) $flg = false; ?>
        <?php }?>
    <h2>②Webページを作成するための言語は？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
        <?php $flg = true; 
            foreach($lang_arr as $value) {?>
            <input type="radio" name="sel_lang" value="<?php echo $value; ?>" <?php if ($flg) echo 'checked';?>><?php echo $value; ?>
            <?php if ($flg) $flg = false; ?>
        <?php }?>
    <h2>③MySQLで情報を取得するためのコマンドは？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
        <?php $flg = true;
            foreach($scmd_arr as $value) {?>
            <input type="radio" name="sel_scmd" value="<?php echo $value; ?>" <?php if ($flg) echo 'checked';?>><?php echo $value; ?>
            <?php if ($flg) $flg = false; ?>
        <?php }?>
    <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
    <input type="hidden" name="in_name" value="<?php echo $in_name; ?>">
    <input type="hidden" name="ans_port" value="<?php echo $ans_port; ?>">
    <input type="hidden" name="ans_lang" value="<?php echo $ans_lang; ?>">
    <input type="hidden" name="ans_scmd" value="<?php echo $ans_scmd; ?>">
    <br>
    <input type="submit" value="回答する" class="button">
</form>
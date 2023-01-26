<link rel="stylesheet" href="style.css">
<?php 
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
    $in_name = $_POST['in_name'];

    $sel_port = $_POST['sel_port'];
    $sel_lang = $_POST['sel_lang'];
    $sel_scmd = $_POST['sel_scmd'];

    $ans_port = $_POST['ans_port'];
    $ans_lang = $_POST['ans_lang'];
    $ans_scmd = $_POST['ans_scmd'];

//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
    function chkAnswer($select, $answer) {
        if ($select == $answer) {
            return "正解！";
        } else {
            return "残念・・・";
        }
    }
?>
<p><!--POST通信で送られてきた名前を表示--><?php echo $in_name; ?>さんの結果は・・・？</p>
<p>①の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php echo chkAnswer($sel_port, $ans_port); ?>
<p>②の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php echo chkAnswer($sel_lang, $ans_lang); ?>
<p>③の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php echo chkAnswer($sel_scmd, $ans_scmd); ?>

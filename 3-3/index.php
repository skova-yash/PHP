0～9の番号を使って好きな数字の羅列を入力してください。
<form action="result.php" method="get">
    <input type="text" oninput="value = value.replace(/[^0-9]+/i,'');" name="num" />
    <input type="submit" value="占う" />
</form>

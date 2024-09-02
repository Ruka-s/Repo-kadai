<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
    <tr>
    <th>登録日時</th>
    <th>名前</th>
    <th>メールアドレス</th>
    <th>年齢</th>
  </tr>
<?php
$file = fopen('./data/data.txt', 'r');// ファイルを開く
// ファイル内容を1行ずつ読み込んで出力
while ($str = fgets($file)) {
    $str2 = explode(",", $str);
    echo "<tr>";
    for($i = 0; $i < count($str2) ; $i++){
        echo "<td>".$str2[$i]."</td>" ;
    }
    echo "</tr>";
    // echo nl2br($str); // nl2br() ... 改行文字を追加
}
fclose($file); // ファイルを閉じる
?>
    </table>
</body>
</html>


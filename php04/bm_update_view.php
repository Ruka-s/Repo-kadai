<?php
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
$id = $_GET["id"];
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_bm_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //SQL実行！！

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$v = $stmt->fetch(); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]


?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<!-- Head[Start] -->
<?php include "header.php" ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="bm_update.php">
  <div class="jumbotron">
   <fieldset>
    <!-- <legend>フリーアンケート[更新画面]</legend>
     <label>名前：<input type="text" name="name" value="<?=$v["name"]?>"></label><br>
     <label>Email：<input type="text" name="email" value="<?=$v["email"]?>"></label><br>
     <label>年齢：<input type="text" name="age" value="<?=$v["age"]?>"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"><?=$v["naiyou"]?></textArea></label><br>
     <input type="submit" value="送信"> -->
     <legend>書籍登録</legend>
     <label>書籍名：<input type="text" name="name" value="<?=$v["name"]?>"></label><br>
     <label>URL：<input type="text" name="url" value="<?=$v["url"]?>"></label><br>
     <label>コメント：<br><textArea name="comment" rows="4" cols="40"><?=$v["comment"]?></textArea></label><br>
     <input type="submit" value="送信" class="inline-flex h-12 items-center justify-center rounded-md bg-neutral-950 px-6 font-medium text-neutral-50 transition active:scale-110 hover:bg-blue-500">
     <input type="hidden" name="id" value="<?=$v["id"]?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>


<?php
//0. SESSION開始！！
session_start();
//エラー表示
ini_set("display_errors", 1);

//1.  DB接続します
include("funcs.php");
$pdo = db_conn();
sschk();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<!-- Head[Start] -->
<?php include "header.php" ?>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron px-10">
   <fieldset>
    <legend>書籍登録</legend>
     <label>書籍名：<input type="text" name="name"></label><br>
     <label>URL：<input type="text" name="url"></label><br>
     <label>コメント：<br><textArea name="comment" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信" class="inline-flex h-12 items-center justify-center rounded-md bg-neutral-950 px-6 font-medium text-neutral-50 transition active:scale-110 hover:bg-blue-500">
     <!-- <button class="inline-flex h-12 items-center justify-center rounded-md bg-neutral-950 px-6 font-medium text-neutral-50 transition active:scale-110 ">Click me</button> -->
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>

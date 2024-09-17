<?php
//エラー表示
ini_set("display_errors", 1);

//1.  DB接続します

include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute(); //実行

//３．データ表示
$view="";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
//JSONに値を渡す場合に使う
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <!-- <a class="navbar-brand" href="index.php">データ登録</a> -->
      <a href='index.php' class="group relative h-12 overflow-hidden overflow-x-hidden rounded-md bg-red-300 px-8 py-2 text-neutral-50 hover:text-white hover:no-underline"><span class="relative z-10">登録画面</span><span class="absolute inset-0 overflow-hidden rounded-md"><span class="absolute left-0 aspect-square w-full origin-center -translate-x-full rounded-full bg-blue-500 transition-all duration-500 group-hover:-translate-x-0 group-hover:scale-150"></span></span></a>
  </div>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div>
    <div class="container jumbotron　px-5">
    <?php foreach($values as $v){ ?>
      <div class="bg-pink-200 my-5 ">
      <td><?=$v["id"]?></td>
        <div>登録日時：<?=$v["indate"]?></div>
      <div>本の名称：<?=$v["name"]?> &emsp; &emsp; URL：<?=$v["url"]?></div>
    <div>コメント：<?=$v["comment"]?></div>
    <div><a href="bm_update_view.php?id=<?=$v["id"]?>">[更新]</a></div>
    <div><a href="delete.php?id=<?=$v["id"]?>">[削除]</a></div>
      </div>
   
<?php } ?>
    </div>
</div>
<!-- Main[End] -->


<script>
  //JSON受け取り



</script>
</body>
</html>

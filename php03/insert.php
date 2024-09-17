<?php
//エラー表示
ini_set("display_errors", 1);

//1. POSTデータ取得
$name   = $_POST["name"];
$url = $_POST["url"];
$comment = $_POST["comment"];


//2. DB接続します
include("funcs.php");
$pdo = db_conn();


//３．データ登録SQL作成
$sql = "INSERT INTO gs_bm_table(name,url,comment,indate)VALUES(:name, :url, :comment, sysdate())";
// $stmt = $pdo->prepare("******* ***** ********( ************* )VALUES( ************");
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR); 
$stmt->bindValue(':url', $url, PDO::PARAM_STR); 
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){

  sql_error($stmt);
}else{
  //５．index.phpへリダイレクト
  redirect("index.php");
}
?>

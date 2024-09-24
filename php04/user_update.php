<?php
session_start();
include "funcs.php";
sschk();
$pdo = db_conn();
//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//   POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更
//1. POSTデータ取得
$name   = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$id     = $_POST["id"];
$lpw    = password_hash($lpw, PASSWORD_DEFAULT); 

//2. DB接続します



//３．データ登録SQL作成
$sql = "UPDATE gs_user_table SET name=:name, lid=:lid, lpw=:lpw WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid',  $lid,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw',    $lpw,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    sql_error($stmt);
}else{
    redirect("user_select.php");
}




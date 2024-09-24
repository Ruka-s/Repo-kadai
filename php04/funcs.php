<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}


//DBConnection
function db_conn(){
    try {
        //Password:MAMP='root',XAMPP=''
        $pdo = new PDO('mysql:dbname=gs_book_db;charset=utf8;host=localhost','root','');
        return $pdo;
      } catch (PDOException $e) {
        exit('DBError:'.$e->getMessage());
      }
    
}


//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}



//リダイレクト関数: redirect($file_name)
function redirect($filename){
    header("Location: ".$filename);
    exit();
}
//SessionCheck(スケルトン)
function sschk(){
    if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
      exit("Login Error");
    }else{
      session_regenerate_id(true);
      $_SESSION["chk_ssid"] = session_id();
    }
  }





?>
<?php

$name = $_POST["name"];
$mail = $_POST["mail"];
$age = $_POST["age"];

// 作成日時,名前,メールアドレス
$str = date("Y-m-d H:i:s").",".$name.",".$mail.",".$age;
//File書き込み
$file = fopen("data/data.txt","a");	// ファイル読み込み
fwrite($file, $str."\n");
fclose($file);


?>


<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<h2 class="mx-auto px-8 py-6 text-xl font-bold text-indigo-500 md:text-2xl">✳︎回答を受け付けました</h2>
<!-- <h1>書き込みしました。</h1>
<h2>./data/data.txt を確認しましょう！</h2> -->
<div class="bg-white py-6 sm:py-8 lg:py-6">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <div class="flex flex-col items-center justify-between gap-4 rounded-lg bg-gray-100 p-4 sm:flex-row md:p-8">
      <div>
        <h2 class="text-xl font-bold text-indigo-500 md:text-2xl">アンケート結果を確認する</h2>
        <!-- <p class="text-gray-600">No Credit Card required</p> -->
      </div>

      <a href="./read.php" class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Summary</a>
    </div>
  </div>
</div>
<div class="bg-white py-6 sm:py-8 lg:py-6">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <div class="flex flex-col items-center justify-between gap-4 rounded-lg bg-gray-100 p-4 sm:flex-row md:p-8">
      <div>
        <h2 class="text-xl font-bold text-indigo-500 md:text-2xl">入力画面に戻る</h2>
        <!-- <p class="text-gray-600">No Credit Card required</p> -->
      </div>

      <a href="./post.php" class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">Back</a>
    </div>
  </div>
</div>

</body>
</html>
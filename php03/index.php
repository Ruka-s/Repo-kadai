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
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- <div class="navbar-header"><a class="navbar-brand" href="select3.php">データ一覧</a></div> -->
    <!-- <button onclick="loction.href='select3.php'" class="group relative h-12 overflow-hidden overflow-x-hidden rounded-md bg-red-300 px-8 py-2 text-neutral-50"><span class="relative z-10">データ一覧</span><span class="absolute inset-0 overflow-hidden rounded-md"><span class="absolute left-0 aspect-square w-full origin-center -translate-x-full rounded-full bg-blue-500 transition-all duration-500 group-hover:-translate-x-0 group-hover:scale-150"></span></span></button> -->
    <a href='select.php' class="group relative h-12 overflow-hidden overflow-x-hidden rounded-md bg-red-300 px-8 py-2 text-neutral-50 hover:text-white hover:no-underline"><span class="relative z-10">データ一覧</span><span class="absolute inset-0 overflow-hidden rounded-md"><span class="absolute left-0 aspect-square w-full origin-center -translate-x-full rounded-full bg-blue-500 transition-all duration-500 group-hover:-translate-x-0 group-hover:scale-150"></span></span></a>
  </div>
  </nav>
</header>
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

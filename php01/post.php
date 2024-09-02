<html>
<head>
<meta charset="utf-8">
<title>POST練習</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<form action="./write.php" method="post" class="my-5 mx-10">
	<h4 class="font-bold text-3xl">アンケートフォーム</h4>
<div class="my-5">
    <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">お名前</label>
    <input type="text" name="name" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>
<div class="my-5">
    <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">EMAIL</label>
    <input type="text" name="mail" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>
<div class="my-5">
    <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">年齢</label>
    <input type="text" name="age" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>
<button type="submit" value="送信" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
	<!-- <input type="submit" value="送信"> -->
</form>

</body>
</html>
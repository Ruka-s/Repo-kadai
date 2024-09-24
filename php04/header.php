<header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
        <div class="navbar-brand" style="color:Black;"><?php echo $_SESSION["name"]; ?>さん</div>
        <!-- <a class="navbar-brand" href="index.php">データ登録</a> -->
        <!-- <a href='index.php' class="group relative h-12 overflow-hidden overflow-x-hidden rounded-md bg-red-300 px-8 py-2 text-neutral-50 hover:text-white hover:no-underline"><span class="relative z-10">登録画面</span><span class="absolute inset-0 overflow-hidden rounded-md"><span class="absolute left-0 aspect-square w-full origin-center -translate-x-full rounded-full bg-blue-500 transition-all duration-500 group-hover:-translate-x-0 group-hover:scale-150"></span></span></a> -->
        <a class="navbar-brand" href="index.php">データ登録</a>
        <a class="navbar-brand" href="select.php">データ一覧</a>
        <?php if ($_SESSION["kanri_flg"] == 1) :?>
          <a class="navbar-brand" href="user.php">ユーザ登録</a>
          <a class="navbar-brand" href="user_select.php">ユーザ一覧</a>
        <?php endif; ?>
        <a class="navbar-brand" href="logout.php">ログアウト</a>   
        
        </div>
      </div>
    </nav>
  </header>
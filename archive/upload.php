<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width" >
	<title>ファイルアップローダー</title>
</head>


<body>
	<a href="./links.php">トップージへ</a>
  <form action="./uploaded.php" method="post" enctype="multipart/form-data">
    <p>ファイルをアップロード : <input type="file" multiple name="file"></p>
    <p><input type="submit" value="送信"><input type="reset" value="リセット"></p>
  </form>
	<p>
	<?php if(isset($_GET)) echo $_GET['msg']; ?>
	</p>
</body>
</html>

<?php
// アップロードされたファイルを処理
$msg = "";
// -------------------
// ファイルを保存
// -------------------
if( strlen($_FILES['file']['name']) != 0) {
  if(is_uploaded_file($_FILES["file"]["tmp_name"])){

    // if ($_FILES['file']['type'] !== 'text/csv') {
    //   $msg = "csv以外のファイルがアップされました。<br>";
    //   header('Location: ./upload.php?msg='.$msg);
    //   exit();
    // }

    // 画像のリンクを生成
    $a = './data/'. basename($_FILES['file']['name']);

    // 画像ファイルをディレクトリ下に移動
    if(move_uploaded_file($_FILES['file']['tmp_name'], $a)){
      $msg = "アップロード成功<br>";
    }else {
      $msg = "アップロード失敗:ディレクトリ移動のエラー<br>";
    }
  } else {
    $msg = "アップロード失敗:アップロードされてないファイルです<br>";
  }
} else {
  $msg = "アップロード失敗:ファイルがありません<br>";
}

header('Location: ./upload.php?msg='.$msg);
?>

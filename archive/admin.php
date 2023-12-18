<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <table>
  <?php
  $file_names = glob('./data/*'); // ファイル名取得

  for ($i = 0; $i < count($file_names); $i++) {
    $game_title = explode("/", $file_names[$i]);
    $game_title = explode(".", $game_title[count($game_title)-1]);
    echo "<tr>\n";
    echo '<td><a target="_blank" href="./vis.php?file_name='.$file_names[$i].'">'.$game_title[0].'</a></td>'."\n";
    echo '<td><a target="_blank" href="./view_csv.php?link='.$file_names[$i].'">[csvデータを見る]</a></td>'."\n";
    echo '<td><a target="_blank" href="./vis_big_img.php?file_name='.$file_names[$i].'">高解像度で見る </a></td>'."\n";
    echo "</tr>\n";
  }
  ?>
</table>
  <p><a target="_blank" href="./upload.php">ファイルアップロードはここから</a></p>
  </body>
</html>

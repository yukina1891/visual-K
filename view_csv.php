<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" >
    <title><?php echo $_GET['link']; ?></title>
  </head>
  <body>
    <h2><?php echo $_GET['link']; ?></h2>
    <p><a href="<?php echo $_GET['link']; ?>"> csvファイルをダウンロード</a></p>
    <table border="1" style="font-size:90%">
    <?php
    // ファイルポインタをオープン
    $handle = fopen($_GET['link'], "r");
    // ファイル内容を出力
    while ($line = fgets($handle)) {
      $row = explode(",", $line);
      echo '<tr align="center">';
      for ($i=0; $i < count($row); $i++) {
        echo "<td>".$row[$i]."</td>";
      }
      echo "</tr>";
      // echo nl2br($line);
    }
    // ファイルポインタをクローズ
    fclose($handle);
    ?>
    </table>
  </body>
</html>

<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Visual K</title>
  <link rel="stylesheet" type="text/css" href="demo.css">
</head>

<body>
  <h1>Visual K</h1>

  <div>
    サーブの分析や練習をしたいテニスプレイヤー向けの、試合の進行とサーブの特徴を可視化するアプリケーション。
    試合の進行全体を把握するために行列表現を用いた。また、サーブの特徴を分析するために「落下地点」「球速」の二つのデータに
    着目し可視化を行った。今回利用したデータは2019 年の錦織圭選手の試合のものである。
  </div>

  <div>
    <h2>試合を見る</h2>
    <?php
    $file_names = glob('./data/*'); // ファイル名取得

    for ($i = 0; $i < count($file_names); $i++) {
      $game_title = explode("/", $file_names[$i]);
      $game_title = explode(".", $game_title[count($game_title) - 1]);
      // echo '<div>'."\n";
      echo '<a href="./vis.php?file_name=' . $file_names[$i] . '">' . $game_title[0] . '</a>' . "\n";
      echo "<br>\n";
    }
    ?>
  </div>
  <div>
    <h2>読み方</h2>
    <!-- <img src="./readme.png"> -->
    視覚表現は「ゲーム行列」「セット行列」「試合全体」から構成される。
    <h3>ゲーム行列</h3>
    <img src="./img/game_matrix.png">
    <div>円の配置によって1ゲーム分の特典状況を表す。上図のゲーム進行は下表の通り。</div>
    <table>
      <tr>
        <td>錦織選手</td><td>0</td><td>15</td><td>15</td><td>30</td><td>30</td><td>40</td>
      </tr>
      <tr>
        <td>相手選手</td><td>0</td><td>0</td><td>15</td><td>15</td><td>30</td><td>30</td>
      </tr>
    </table>
    <div>
      <h4>円の位置</h4>
      <div>得点状況を表す。横軸は錦織選手、縦軸は相手選手の得点で、0,15,30,40,Adと増えていく。例えば上図の緑色の円の位置は30-30の状況である。</div>
      
      <h4>円の大きさ</h4>
      <div>サーブの速度を表現する。大きいほど球速は速く、小さいほど遅い。</div>

      <h4>円の色</h4>
      <div>
        サーブが落ちた場所を表す。場所は3種類に分けられる。<br>
        <img src="./img/color.png">
      </div>
      
      <h4>行列の背景色</h4>
      <div>サーバーがどちらのプレーヤーかを示す。青が錦織選手、黄が対戦相手</div>
    </div>

    <h3>セット行列</h3>
    <img src="./img/set_matrix.png">
    <div>ゲーム行列が集まったもの。ゲーム行列の配置によってゲーム取得状況を表す。上図のセット進行は下表の通り。</div>
    <table>
      <tr>
        <td>錦織選手</td><td>0</td><td>0</td><td>1</td><td>2</td><td>3</td><td>3</td><td>4</td><td>4</td><td>5</td><td>5</td><td>6</td>
      </tr>
      <tr>
        <td>相手選手</td><td>0</td><td>1</td><td>1</td><td>1</td><td>1</td><td>2</td><td>2</td><td>3</td><td>3</td><td>4</td><td>4</td>
      </tr>
    </table>


    <h3>試合全体</h3>
    <img src="./img/match_matrix.png">
    <div>セット行列が集まったもの。セット行列の配置によってセットの取得状況を表す。上図の試合進行は下表の通り。</div>
    <table>
      <tr>
        <td>錦織選手</td><td>0</td><td>1</td><td>1</td><td>2</td>
      </tr>
      <tr>
        <td>相手選手</td><td>0</td><td>0</td><td>1</td><td>1</td>
      </tr>
    </table>
  </div>

  <hr>
  <center>(c)2020-2021 nikujaga.</center>
</body>

</html>
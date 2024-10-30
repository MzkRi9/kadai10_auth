<?php
//0.  SESSION開始！
session_start();

//1.  DB接続します
include("funcs.php"); //外部のファイルを読み込む
$pdo = db_conn(); //読み込んだファイルの中のdb_connを実行する

//２．データ登録SQL作成
$sql = "SELECT * FROM iki";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); //true or false

//３．データ表示
$values = ""; 
if($status==false) {
    sql_error($stmt);
}

//全データ取得
$values = $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
//JSONに値を渡す場合に使う
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/zone.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Yusei+Magic&family=Zen+Kaku+Gothic+New&family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
    <title>ながちゃんのスペース</title>
</head>

<body>
    <header>
        <div id="icon"><img src="./img/00_icon.jpg" style="height: 40px; border-radius:50%;"></div>
        <div id="logo"><img src="./img/00_logo_white.png" style="height: 70px;"></div>
        <div id="alert"><img src="./img/00_alert_white.png" style="height: 25px; "></div>
    </header>

    <main>
        <div>これはログイン後の画面です。<?=$_SESSION["name"]?>さん、こんにちは！</div>
    </main>

    <footer>
        <ul>
            <li><img src="./img/01_space_white.png" style="height: 30px;"></li>
            <li><img src="./img/02_daily_gray.png" style="height: 25px;"></li>
            <li><img src="./img/03_fun_gray.png" style="height: 25px;"></li>
            <li><img src="./img/04_ticket_gray.png" style="height: 25px;"></li>
            <li><img src="./img/05_shop_gray.png" style="height: 25px;"></li>
        </ul>
    </footer>
</body>

</html>
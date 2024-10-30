<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();

//POST値を受け取る
$lid = $_POST["lid"]; //lid
$lpw = $_POST["lpw"]; //lpw

//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//2. データ登録SQL作成
//* PasswordがHash化→条件はlidのみ！！
$stmt = $pdo->prepare("SELECT * FROM iki WHERE lid=:lid AND life_flg=0"); 
//ikiというtableの中に、lidという人はいますか。0は有効会員なのでログインしてOK、1は退会した人なのでログインNG
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

if ($stmt->rowCount() > 0) {
    // ログイン成功
    echo "ログイン成功";
    // セッションにユーザー情報を保存するなど
} else {
    // ログイン失敗
    echo "ログイン失敗: 会員番号またはパスワードが間違っています。";
}


//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()


//5.該当１レコードがあればSESSIONに値を代入
//入力したPasswordと暗号化されたPasswordを比較！[戻り値：true,false]
$pw = password_verify($lpw, $val["lpw"]); //$lpw = password_hash($lpw, PASSWORD_DEFAULT);   //パスワードハッシュ化
var_dump([    '入力パスワード' => $lpw,    'DBのハッシュ値' => $val["lpw"],    'password_verifyの結果' => $pw]);
if($pw){ 
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  //Login成功時（zone.phpへ）
  redirect("zone.php");

}else{
  //Login失敗時(login.phpへ)
  redirect("login.php");

}

exit();



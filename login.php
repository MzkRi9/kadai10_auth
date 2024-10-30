<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Yusei+Magic&family=Zen+Kaku+Gothic+New&family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
    <title>IKI - ログイン</title>
</head>
<body>
    <div>
        <img src="./img/00_logo_white.png" id="logo">
    </div>

    <form name="form1" action="login_act.php" method="post">
        <table>
            <tr>
                <td align="right" class="item">会員番号</td>
                <td align="left"><input type="text" class="" name="lid" ></td>
            </tr>
            <tr>
                <td align="right" class="item">パスワード</td>
                <td align="left"><input type="password" class="" name="lpw"></td>
            </tr>
        </table>
        <div>
            <button type="submit" id="btn_login">ログイン</button>
        </div>
        <div>
            <a href="" id="signup">新規入会の方はこちら</a>
        </div>
    </form>


</body>
</html>
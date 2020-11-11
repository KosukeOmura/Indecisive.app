<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_start.css">
    <title>優柔不断決断ログイン</title>
</head>
<body>

    <div class="login_start_box">
        <h1>優柔不断決断ログイン</h1>
        <form method="post" action="login_check.php" enctype="multipart/form-data">
            <p>お名前</p>
            <input type="text" name="name" class="login_code">
            <p>パスワード</p>
            <input type="text" name="pass" class="login_password">

            <div class="click_box">
                <input class="ok_button" type="submit" value="OK">
                <input class="back_button" type="button" onclick="history.back()" value="戻る">
            </div>
        </form>
        <a href="../new_user/new_user.php">初めての方はこちら</a>
    </div>
    
</body>
</html>
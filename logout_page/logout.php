<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--ログアウト画面 -->
    <link rel="stylesheet" href="logout.css">
    
    <!-- 自動リダイレクト -->
    <meta http-equiv="Refresh" content="1;URL=../login/login.php">
    
    <title>優柔不断決断アプリユーザーログアウト</title>
</head>
    <body>
        <div class="logout_box">
            <div class="logout_content">
                <?php 

                session_start();
                $_SESSION=array();
                if(isset($_COOKIE[session_name()])==true) {
                    setcookie(session_name(),'',time()-42000,'/');
                }

                //セッション破棄
                session_destroy();

                ?>

                ログアウトしました。<br />
                <br />
                <a href="../login/login.php">1秒後にログインページへ移動します。</a>
            </div>
        </div>
    </body>
</html>
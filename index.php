<?php

// // エラー表示を有効にする
// ini_set( 'display_errors', 1 );

// // 全てのエラーを表示する
// ini_set('error_reporting', E_ALL);

session_start();
session_regenerate_id(true);


// DB接続情報
define('DB_DATABASE','indecisive_app');
define('DB_USERNAME','kosuke');
define('DB_PASSWORD','komazawataxidesu');
define('PDO_DSN','mysql:host=localhost;dbname=' . DB_DATABASE);

// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

//変数の初期化
$db = null;
$now_date = null;
$sql = null;
$clean = array();
$stmt = null;
$error_message = array();
$success_message = null;
$clean = array();
$message_array = array();

if( !empty($_POST['btn_submit']) ) {
    // do1の入力チェック
    if( empty($_POST['do1'])) {
        $error_message[] = '選択①を入力してください';
    }else {
        $clean['do1'] = htmlspecialchars( $_POST['do1'], ENT_QUOTES);
    
        //セッションに表示名を保存
        $_SESSION['do1'] = $clean['do1'];
    }
    // do2の入力チェック
    if( empty($_POST['do2'])) {
        $error_message[] = '選択②を入力してください';
    }else {
        $clean['do2'] = htmlspecialchars( $_POST['do2'], ENT_QUOTES);
    
        //セッションに表示名を保存
        $_SESSION['do2'] = $clean['do2'];
    }

    try { 
        if( empty($error_message) ) {
            // データベースに接続
            $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
                // 書き込み日時を取得
                $now_date = date("Y-m-d H:i:s");
                
                // データを登録するSQL作成
                $sql = "INSERT INTO box (user_id,do1, do2, time) VALUES ('$_SESSION[login_name]', '$clean[do1]', '$clean[do2]', '$now_date')";
                
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $db = null;
                $success_message = 'メッセージを書き込みました。';
        }
    }catch(Exception $e) {
        echo 'ただいまメンテナンス中';
        exit();
    }
}

 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main_page/index_php.css">
    <link rel="stylesheet" href="main_page/php_button.css">
    <title>優柔不断選択アプリ</title>
</head>
<body>
<div class="top_back">
    <div class="top_back_container">
        <div class="login_box">
		    <div class="logout_switch">
                    <?php
                        if(isset($_SESSION['login'])==false) {
                    ?>
                <a href="login/login.php"><h1><?php	echo 'GESTさん';}
                else {?></h1></a>
                <h1><?php   echo $_SESSION['login_name']; 
                            echo 'さんログイン中 <br />';
                }?>
                </h1><div class="logout_contents"><a href="logout_page/logout.php">ログアウト</a></div>
            </div>
	    </div>
        <div class="Time_line">
            <a href="TimeLine/time_line.php">タイムライン</a>
        </div>
        <div class="profile_page">
            <a href="profile/profile.php">個人ページ</a>
        </div>
        
    </div>
</div>

<!-- 未入力エラー表示処理 -->
<?php if( !empty($error_message) ): ?>
	<ul class="error_message">
		<?php foreach( $error_message as $value ): ?>
			<li>・<?php echo $value; ?></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

    <div class="container">
        <div class="container_box">
            <div class="indecisive-top">
                <img src="img/ジャッジ.png" alt="" class="image_juge">
                <h3>悩んでること入力すると</h3>
                <h3>あなたの背後霊が決めてくれます。</h3>
            </div>

            <form method="post">
                <div class="input-area">
                        <textarea type="text" class="do1 d_text" name="do1"  value="<?php if( !empty($_SESSION['do1']) ){ echo $_SESSION['do1']; } ?>"></textarea>
                        <textarea type="text" class="do2 d_text" name="do2"  value="<?php if( !empty($_SESSION['do2']) ){ echo $_SESSION['do2']; } ?>"></textarea>
                        <input type="submit" class="fun-btn" id="this" name="btn_submit" value="GO!">
                </div>
            </form>
            <section>
                    <article>
                        <div class="info">
                        <?php
                             // データベースに接続
                            $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
                            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                            $do1 = $_POST['do1'];
                            $do2 = $_POST['do2'];
                        ?>
                        <h2>
                            <?php
                            try { 
                                // データベースに接続
                                $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
                                $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                            
                                        // 書き込み日時を取得
                                        $now_date = date("Y-m-d H:i:s");                                        
                                        // DBからデータ出力
                                        $sql = 'SELECT id,do1,do2,time FROM box LIMIT 1';
                                        
                                        $stmt = $db->prepare($sql);
                                        $stmt->execute();
                                        while(true) {
                                            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
                                            if($rec == false) {
                                                break;
                                            }
                                            $r = rand(0,1);
                                            if ($r == 0) {
                                                echo $do1;
                                            }else {
                                                echo $do2;
                                            }
                                        }
                                }catch(Exception $e) {
                                    echo 'ただいまメンテナンス中';
                                    exit();
                            }
                            ?>
                        </h2>
                        </div>
                    </article>
            </section>
        </div>
    </div>

        <!-- GOボタン実装 -->
        <script src="main_page/fun_btn.js"></script>

        <!-- アコーディオン -->
        <script src="main_page/accordion.js"></script>

        <!-- ボタンを押せなくする -->
        <script src="main_page/no_button.js"></script>
    
</body>
</html>
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




?>



<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="time_line.css">
    <title>優柔不断決断一覧</title>
</head>
<body>

<div class="top_back">
    <div class="top_back_container">
            <?php
                if(isset($_SESSION['login'])==false) {
                    header("Location: ../login/login.php");
                    exit();
                }else {
            ?>
        <div class="login_box">
		    <div class="logout_switch">
                <h1>
                    <?php
                            echo $_SESSION['login_name'];
                            echo 'さんログイン中 <br />';
                        }
                    ?>
                </h1>
                <div class="logout_contents">
                    <a href="../logout_page/logout.php">ログアウト</a>
                </div>
            </div>
	    </div>
        <div class="Time_line">
            <a href="../index.php">トップへ</a>
        </div>
    </div>
</div>


    <?php
            try { 
                // データベースに接続
                $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                            
                // 書き込み日時を取得
                $now_date = date("Y-m-d H:i:s");                                        
                // DBからデータ出力
                $sql = 'SELECT * FROM box';
                                        
                $stmt = $db->prepare($sql);
                $stmt->execute();
    ?>
                <section>
                    <!-- 取り出した件数をvalueに入れます。 -->
                    <?php foreach( $stmt as $value ){ ?>
                    <article>
                        <div class="info">
                            <h2><?php echo $value['user_id']; ?></h2>
                            <time><?php echo date('Y年m月d日 H:i', strtotime($value['time'])); ?></time>
                        </div>
                        <p class="firstt_bottom"><?php echo $value['do1']; ?></p>
                        <p><?php echo $value['do2']; ?></p>
                    </article>
                    <?php } ?>
                </section>
    <?php
        }catch(Exception $e) {
            echo 'ただいまメンテナンス中';
            exit();
        }
    ?>

        <!-- アコーディオン -->
        <script src="../main_page/accordion.js"></script>
</body>
</html>

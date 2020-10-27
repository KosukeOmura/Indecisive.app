<?php

// エラー表示を有効にする
ini_set( 'display_errors', 1 );

// 全てのエラーを表示する
ini_set('error_reporting', E_ALL);


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


try { 

    // データベースに接続
    $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            // 書き込み日時を取得
            $now_date = date("Y-m-d H:i:s");
            
            // データを登録するSQL作成
            $sql = "INSERT INTO box (do1, do2, time) VALUES ( '$clean[do1]', '$clean[do2]', '$now_date')";
            
            $stmt = $db->prepare($sql);
            $stmt->execute();

            $db = null;
}catch(Exception $e) {
    echo 'ただいまメンテナンス中';
    exit();
}

try { 

    // データベースに接続
    $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            // 書き込み日時を取得
            $now_date = date("Y-m-d H:i:s");
            
            // DBからデータ出力
            $sql = 'SELECT id,do1,do2,time FROM box WHERE 1';
            
            $stmt = $db->prepare($sql);
            $stmt->execute();

    }catch(Exception $e) {
        echo 'ただいまメンテナンス中';
        exit();
    }


 ?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>優柔不断選択アプリ</title>
</head>
<body>

    <div class="container">
        <div class="indecisive-top">
            <h3>悩んでること入力すると</h3>
            <h3>あなたの背後霊が決めてくれます。</h3>
        </div>
    </div>

    <form method="post">
        <div class="input-area">
                <input type="text" class="do1" name="do1" placeholder="選択①">
                <input type="text" class="do2" name="do2" placeholder="選択②">
                <input type="submit" name="btn_submit" value="GO!">
        </div>
    </form>

    <section>
            <article>
                <div class="info">
                    
                <?php
                            $r = rand(0,1);
                            if ($r == 0) {
                                echo 'do1';
                            }else {
                                echo 'do2';
                            }

                ?>
                </div>
            </article>
    </section>
    
</body>
</html>
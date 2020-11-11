<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

    <!--登録部分CSS-->
	<link rel="stylesheet" href="user_done.css">
	<title>新規ユーザーチェック画面</title>
</head>
	<body>	
        <div class="user_done_box">

            <?php

            ini_set("display_errors", "On");


            // DB接続情報
            define('DB_DATABASE','indecisive_app');
            define('DB_USERNAME','kosuke');
            define('DB_PASSWORD','komazawataxidesu');
            define('PDO_DSN','mysql:host=localhost;dbname=' . DB_DATABASE);

            try{

                //new_user_top.phpから入力データを受け取り処理
                $login_name = $_POST['name'];
                $login_pass =$_POST['password'];


                $login_name=htmlspecialchars($login_name,ENT_QUOTES,'UTF-8');
                $login_pass=htmlspecialchars($login_pass,ENT_QUOTES,'UTF-8');

                //DB接続
                $db = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
                //エラーをスロー
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql='INSERT INTO usersd (name,password) VALUES (?,?)';
                $stmt=$db->prepare($sql);
                $data[]=$login_name;
                $data[]=$login_pass;
                $stmt->execute($data);


                echo $login_name;
                echo 'さんを追加しました。<br />';


                $db= null;

            } catch(PDOException $e){
                echo 'ただいま障害により大変ご迷惑をお掛けしております。';
                exit();
            }

            $db=null;

            ?>

            <a href="../login/login.php"> ログインページ</a>

        </div>
	</body>
</html>
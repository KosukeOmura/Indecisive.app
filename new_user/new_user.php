<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<!--登録部分CSS-->
	<link rel="stylesheet" href="new_user.css">
    
    <title>掲示板新規ユーザー登録画面</title>
</head>
<body>


<div class="new_user_box">

    <h1>新規ユーザー登録画面</h1>

    <form method="post" action="user_heck.php" enctype="multipart/form-data">

    <p>お名前を入力してください。</p>
    <input type="text" name="name" class="name_touroku">
    <p>パスワードを入力してください</p>
    <input type="password" name="password" class="pass_touroku">
    <p>パスワードをもう１度入力してください。</p>
    <input type="password" name="pass2" class="pass_check">
    <br />
    <input type="submit" value="OK">
    <input type="button" onclick="history.back()" value="戻る" >

    </form>
</div>

    
</body>
</html>
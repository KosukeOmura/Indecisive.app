<?php



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

    <div class="input-area">
        <input type="text" class="one" placeholder="選択①">
        <input type="text" class="two" placeholder="選択②">
        <div class="btn">Go!</div>
    </div>

    <section>
        <?php if(!empty($message_array)) { ?>

        <?php foreach($message_array as $value) {?>
            <article>
                <div class="info">
                    <h2></h2>
                </div>
            </article>

        <?php } ?>
        <?php } ?>
    </section>
    
</body>
</html>
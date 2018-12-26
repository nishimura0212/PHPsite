<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>投稿内容確認画面</title>
        <link rel="stylesheet" type="text/css" href="style2.css">
    </head>
    <body>
    <div id="confirm-wrap">
        <div class="confirm">
            <h1>確認画面</h1>
        </div>
        <div class="confirm_text">
            <p>投稿する内容は以下になります。<br>よろしければ「投稿する」ボタンを押してください。</p>
            <div class="confirm_list">
                <h4>投稿者</h4>
                <p><?php echo $_POST['name']; ?></p>
                <h4>タイトル</h4>
                <p><?php echo $_POST['title']; ?></p>
                <h4>コメント</h4>
                <p><?php echo $_POST['comments']; ?></p>
                <h4>オススメ度</h4>
                <p><?php echo $_POST['evaluation']; ?></p>
                <h4>画像</h4>
                <p><img src="<?php echo $_POST['image']; ?>"></p>
            </div>
        </div>
        <div id="confirm_button_wrap">
        <div class="confirm_button">
            <form action="index.php">
                <input type="submit" class="button1" value="修正する"/>
            </form>
            <form action="insert.php" method="post">
                <input type="submit" class="button2" value="投稿する"/>
                <input type="hidden" value="<?php echo $_POST['name']; ?>" name="name">
                <input type="hidden" value="<?php echo $_POST['title']; ?>" name="title">
                <input type="hidden" value="<?php echo $_POST['comments']; ?>" name="comments">
                <input type="hidden" value="<?php echo $_POST['evaluation']; ?>" name="evaluation">
                <input type="hidden" value="<?php echo $_POST['image']; ?>" name="image">
            </form>
        </div>
        </div>
    </div>
    </body>
</html>
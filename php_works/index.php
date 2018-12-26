<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>旅行記投稿サイト「travery」</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
        <script type="text/javascript" src="slick-1.8.1/slick/slick.min.js"></script>
        <link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick-1.8.1/slick/slick-theme.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    
    <body>
        <?php
        mb_internal_encoding("utf8");
        $pdo = new PDO("mysql:dbname=php_site;host=localhost;","root","mysql");
        $stmt = $pdo->query("select * from trip_form order by id desc");
        ?>
        <header>
            <div id="header">
                <div id="header_left">
                    <div class="top">
                    <div class="top_img">
                        <img src="London.jpg">
                        <img src="ma-lion.jpg">
                        <img src="miyakojima.jpg">
                        <img src="nami.jpg">
                        <img src="British.jpg">
                        <img src="chekohurata.jpg">
                        <img src="couple.jpg">
                        <img src="portogal.jpg">
                        <img src="yama.jpg">
                        <img src="Singa.jpg">
                    </div>
                    <!-- スライドショー開始 -->
                    <script type="text/javascript" src="script.js"></script>
                    <script type="text/javascript">
                        $(function(){
                            $('.top_img').slick({
                                autoplay: true,
                                speed: 3000,
                                centerMode: true,
                                centerPadding: '0px',
                                slidesToShow: 1,
                                responsive: [
                                    {
                                    breakpoint: 768,
                                    settings: {
                                        arrows: false,
                                        centerMode: true,
                                        centerPadding: '0px',
                                        slidesToShow: 1
                                    }
                                    },
                                    {
                                        breakpoint: 480,
                                        settings: {
                                            arrows: false,
                                            centerMode: true,
                                            centerPadding: '0px',
                                            slidesToShow: 1
                                        }
                                    }
                                ]
                            });  
                        });
                    </script>
                    <!-- スライドショー終了 -->
                    </div>
                </div>
                <div id="header_right">
                    <div class="header_text">
                        <h1>travery</h1>
                        <h3>旅行の思い出、共有しませんか？</h3>
                        <div class="note">
                        <p>家族旅行、卒業旅行、一人旅、新婚旅行など、
                        <br>あなたの思い出を写真とともに投稿しましょう。</p>
                        <p>投稿された旅行記をながめれば、
                        <br>きっと行きたい場所が見つかるはずです。</p>
                        <p>さぁ、次はどこへ行きますか？</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <main>
            <div id="bar">
                <ul>
                    <li>サイトトップ</li>
                    <li>みんなの旅行記</li>
                    <li>特集記事</li>
                    <li>お問い合わせ</li>
                </ul>
            </div>
            <div id="wrap">
                <div id="contents">
                    <div id="contents_wrap">
                        <!-- 投稿された旅行記 -->
                        <?php
                            while($row = $stmt->fetch()){
                                echo"<div class='box'>";
                                echo"<img src='".$row['image']."'/>";
                                echo"<h3>".$row['title']."</h3>";
                                echo"<p class='comments'>".$row['comments']."</p>";
                                echo"<p class='x'>オススメ度：";
                                for($i = 1;$i <= (int)$row['evaluation'];$i++)
                                echo '★';
                                for($i = (int)$row['evaluation'];$i < 5;$i++)
                                echo '☆';
                                echo"<br>";
                                echo"posted by ".$row['name']."</p>";
                                echo"</div>";
                            }
                        ?>
                        <!-- 終了 -->  
                    </div>
                </div>
                
                <div id="right">
                    <div class="right_wrap">
                    <form method="post" action="form_confirm.php">
                        <h4>投稿フォーム</h4><br><br>
                        <div class="form_theme">
                            <label>投稿者：</label><br>
                            <input type="text" size="18" class="text" name="name">
                        </div>
                        <br>
                        <div class="form_theme">
                            <label>タイトル：</label><br>
                            <input type="text" size="18" class="text" name="title">
                        </div>
                        <br>
                        <div class="form_theme">
                            <label>コメント：</label><br>
                            <textarea rows="8" cols="30" name="comments"></textarea>
                        </div>
                        <br>
                        <div class="form_theme">
                            <span>オススメ度：</span>
                            <select name="evaluation">
                                <option value=5>5</option>
                                <option value=4>4</option> 
                                <option value=3>3</option>
                                <option value=2>2</option>
                                <option value=1>1</option>
                            </select>
                        </div>
                        <br>
                        <div class="form_theme">
                            <label>画像：</label><br>
                            <input type="file" name="image">
                        </div>                        
                        <br>
                        <div id="submit">
                            <input type="submit" class="submit" value="確認する">
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </main>
        
        <footer>
            <p>copyright &copy; Nagi | sample site.</p>
        </footer>
        
    </body>
</html>
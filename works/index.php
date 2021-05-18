<?php
session_start();

session_regenerate_id(TRUE);

require '../libs/functions.php';

//初回以外ですでにセッション変数に値が代入されていれば、その値を。そうでなければNULLで初期化
$company = isset($_SESSION[ 'company' ]) ? $_SESSION[ 'company' ] : NULL;
$name = isset( $_SESSION[ 'name' ]) ? $_SESSION[ 'name' ] : NULL;
$email = isset( $_SESSION[ 'email' ]) ? $_SESSION[ 'email' ] : NULL;
$tel = isset( $_SESSION[ 'tel' ]) ? $_SESSION[ 'subject' ] : NULL;
$body = isset( $_SESSION[ 'body' ]) ? $_SESSION[ 'body' ] : NULL;
$error = isset( $_SESSION[ 'error' ]) ? $_SESSION[ 'error' ] : NULL;

//個々のエラーを初期化（$errorは定義されていれば配列）
$error_company = isset( $error[ 'company' ]) ? $error[ 'company' ] : NULL;
$error_name = isset( $error[ 'name' ]) ? $error[ 'name' ] : NULL;
$error_email = isset( $error[ 'email' ]) ? $error[ 'email' ] : NULL;
$error_tel = isset( $error[ 'tel' ]) ? $error[ 'tel' ] : NULL;
$error_body = isset( $error[ 'body' ]) ? $error[ 'body' ] : NULL;

//CSRF対策の固定トークンを生成
if ( !isset( $_SESSION[ 'ticket' ] ) ) {
  $_SESSION[ 'ticket' ] = sha1( uniqid(mt_rand(), TRUE) );
}

//トークンを変数に代入
$ticket = $_SESSION[ 'ticket' ];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Ryo Saito Official Web Site</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="copyright" content="Ryo Saito">
	<meta name="description" content="Marketer and Designer Ryo Saito Official Web Site">
	<meta name="keywords" content="">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css" type="text/css">
  <!-- Googlefont -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Noto+Serif+JP:wght@300;400;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/bb34b52f2f.js" crossorigin="anonymous"></script>

  </head>
<body>
 <header>
   <h1 class="h-logo">
      <span class="logo-s">Marketer and Designer</span>
      <br>Ryo Saito
   </h1>
   <nav class="h-nav">
     <ul>
       <li><a href="../top/index.php">— Home</a></li>
       <li><a href="../about/index.php">— About</a></li>
       <li><a href="../works/index.php">— Works</a></li>
       <li><a href="#main_contact">— Contact</a></li>
       <a href="https://twitter.com/Ryo_Sjp" class="twitter-icon"><i class="fab fa-twitter"></i></a>
       <!-- Twitterアイコン -->
     </ul>
   </nav>
 </header>

 <div class="container">
    <main>
      <!-- ここからMainTop -->
      <section class="top">
        <h1 class="title1">Works</h1>
        <nav class="m-nav">
          <ul class="m-menu">
            <li><a href="#web_site"># web site</a></li>
            <li><a href="#lp"># LP</a></li>
            <li><a href="#web_app"># Web app</a></li>
            <li><a href="#restaurant"># Restaurant</a></li>
          </ul>
        </nav>
      </section>
      <!-- ここまでMainTop -->
      <!-- ここからWorks -->
      <!-- ここからwebsite -->
      <section class="m-works">
        <h2 id="web_site" class="m-h2">#web site ー</h2>
        <div class="works-wrapper">
          <div class="work">
            <div class="work-img">
              <img src="../img/orescompany.png" alt="俺カンパニー様">
            </div>
            <a href="https://www.ore-company.com/" target="_blank" rel="noopener noreferrer">
            <div class="hover-text">
              <p class="work-title">株式会社俺カンパニー</p>
              <p class="work-content">
                コーポレートサイトの運用、修正作業をやらさせていただきました。
              </p>
            </div>
            </a>
          </div>
          <div class="work">
            <div class="work-img">
              <img src="../img/yamahan.png" alt="山本のハンバーグ様">
            </div>
            <a href="https://www.yamahan.tokyo/" target="_blank" rel="noopener noreferrer">
            <div class="hover-text">
              <p class="work-title">山本のハンバーグ</p>
              <p class="work-content">
                ブランドサイトの運用、修正作業、デザインをやらさせていただきました。
              </p>
            </div></a>
          </div>
          <div class="work">
            <div class="work-img">
              <img src="../img/hospital.png" alt="work">
            </div>
            <a href="https://hospital-site1.web.app/" target="_blank" rel="noopener noreferrer">
            <div class="hover-text">
              <p class="work-title">自作医療関係コーポレート</p>
              <p class="work-content">
                医療関係業種をイメージして自作サイト作成しました。
              </p>
            </div>
            </a>
          </div>
        </div>
      </section>
      <!-- ここからLP -->
      <section class="m-works">
        <h2 id="lp" class="m-h2">#Lp ー</h2>
        <div class="works-wrapper">
          <div class="work">
            <div class="work-img">
              <img src="../img/bookcafe.png" alt="work">
            </div>
            <a href="https://bookcafe-site.web.app/" target="_blank" rel="noopener noreferrer">
            <div class="hover-text">
              <p class="work-title">自作カフェ関係</p>
              <p class="work-content">
                カフェ事業をイメージして自作P作成しました。
              </p>
            </div>
          </a>
          </div>
          <div class="work">
            <div class="work-img">
              <img src="../img/englishschool.png" alt="work">
            </div>
            <a href="https://englishschool-site.web.app/" target="_blank" rel="noopener noreferrer">
            <div class="hover-text">
              <p class="work-title">自作英会話スクール</p>
              <p class="work-content">
                英会話スクール事業をイメージして自作LPを作成しました。
              </p>
            </div>
            </a>
          </div>
        </div>
      </section>
      <section class="m-works">
        <h2 id="web_app" class="m-h2">#Web app ー</h2>
        <div class="works-wrapper">
          <div class="work">
            <div class="work-img">
              <img src="../img/stop.png" alt="stopwatch">
            </div>
            <a href="https://stopwatch-js1.web.app/" target="_blank" rel="noopener noreferrer">
            <div class="hover-text">
              <p class="work-title">ストップウォッチ</p>
              <p class="work-content">
                ストップウォッチwebアプリを作成しました。
              </p>
            </div>
          </a>
          </div>
          <div class="work">
            <div class="work-img">
              <img src="../img/quiz.png" alt="work">
            </div>
            <a href="https://quiz-app-js2.web.app/" target="_blank" rel="noopener noreferrer">
            <div class="hover-text">
              <p class="work-title">クイズゲーム</p>
              <p class="work-content">
                クイズゲームwebアプリを作成しました。
              </p>
            </div>
            </a>
          </div>
        </div>
      </section>
      <!-- ここからRestaurant -->
      <section class="m-works">
        <h2 id="restaurant" class="m-h2">#Restaurant ー</h2>
        <div class="works-wrapper">
          <div class="work">
            <div class="work-img">
              <img src="../img/katsugyu.png" alt="京都勝牛">
            </div>
            <div class="hover-text">
              <p class="work-title">牛カツ専門店<br>京都勝牛様</p>
              <p class="work-content">
                ＿季節メニュー、牛カツのブラッシュアップなど商品のディレクションを主にやらさせていただきました。
              </p>
            </div>
          </div>
          <div class="work">
            <div class="work-img">
              <img src="../img/nickstock.png" alt="NICKSTOCK">
            </div>
            <div class="hover-text">
              <p class="work-title">肉が旨いカフェ<br>NICKSTOCK様</p>
              <p class="work-content">
              ＿季節メニュー、グランドメニューなど商品のディレクションを主にやらさせていただきました。
              </p>
            </div>
          </div>
          <div class="work">
            <div class="work-img">
              <img src="../img/gotti.png" alt="Gottie's BEEF">
            </div>
            <div class="hover-text">
              <p class="work-title">熟成牛専門店<br>Gottie's BEEF様</p>
              <p class="work-content">
              ＿季節メニュー、グランドメニューなど商品のディレクションを主にやらさせていただきました。
              </p>
            </div>
          </div>
        </div>
        <div class="works-wrapper">
          <div class="work">
            <div class="work-img">
              <img src="../img/toyomaru.png" alt="地魚屋台 豊丸">
            </div>
            <div class="hover-text">
              <p class="work-title">地魚屋台<br>豊丸様</p>
              <p class="work-content">
                商品の開発、オペレーション構築などやらさせていただきました。
              </p>
            </div>
          </div>
          <div class="work">
            <div class="work-img">
              <img src="../img/hikiniku.png" alt="work">
            </div>
            <div class="hover-text">
              <p class="work-title">挽肉と米様</p>
              <p class="work-content">
                店舗運営（営業サポート）、オペレーション改善などやらさせていただきました。
              </p>
            </div>
          </div>
        </div>
      </section>
      <!-- ここまでがWorks -->
      <!-- ここからcontact -->
      <section class="m-contact">
        <h2 class="m-h2">#Contact ー</h2>
        <form id="main_contact" action="../contact/confirm.php" method="post">
          <div class="contact-inner">
            <dl>
              <dt>COMPANY</dt>
              <dd><input type="text" name="company" size="60"></dd>
              <dt for="name">NAME</dt>
                <dd>
                  <input type="text" class="validate max30 required" name="name" id="name" size="60" value="<?= h($name); ?>">
                  <span class="error"><?= h( $error_name );?></span>
                </dd>
              <dt>E-mail</dt>
                <dd>
                  <input type="text" class="validate mail required" id="email" name="email" size="60" value="<?= h($email); ?>">
                  <span class="error"><?= h( $email_error); ?></span>
                </dd>
              <dt>TEL</dt>
                <dd>
                  <input type="text" class="validate max30 tel" id="tel" name="tel" size="60" value="<?= h($tel); ?>">
                  <span class="error"><?= h($error_tel); ?></span>
                  <span class="error"><?= h($error_tel_format); ?></span>
                </dd>
              <dt>MESSAGE</dt>
                <dd>
                  <textarea class="validate max1000 required" id="body" name="body" cols="50" rows="5"></textarea>
                  <span class="error"><?= h( $error_body );?></span>
                </dd>
                  <div class="ex">
                    お返事をさせていただくまでに、お時間を要する場合がございます。<br>また、内容により、お返事が出来ない場合がございますのでご了承ください。
                  </div>
              <dd class="dd-btn">
                <button type="submit" name="submit" value="confirm" class="btn-send">SEND</button>
                <!-- 確認ページへトークンをPOST　隠しフィールド -->
                <input type="hidden" name="ticket" value="<?= h($ticket); ?>">
              </dd>
            </dl>
          </div>
        </form>
        </section>
      </main>
  </div>
  <footer class="footer-src">
    <div class="copyright">
      <small>© allrights reserved 2021  Ryo Saito</small>
    </div>
  </footer>
    <!-- ここまでがmain -->
    <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/stickyfill/2.1.0/stickyfill.min.js"></script>

  <script sec="../js/scroll.js"></script>
  <script src="../js/form.js"></script>

</body>
</html>

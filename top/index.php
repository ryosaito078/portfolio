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
  <link rel="stylesheet" href="../css/top.css" type="text/css">
  <link rel="stylesheet" href="../css/style.css" type="text/css">
  <link rel="stylesheet" href="../css/slick.css">
  <link rel="stylesheet" href="../css/slick-theme.css">
  <!-- Googlefont -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Noto+Serif+JP:wght@300;400;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/bb34b52f2f.js" crossorigin="anonymous"></script>

  </head>
<body>
  <div id="loading" class="wrap">
    <div class="bg">
      <div class="loading">
        <div class="textwrapper">
          <span class="title">LOADING</span>
          <span class="text">RyoSaito OfficialWebsite</span>
        </div>
      </div>
    </div>
  </div>
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
        <img src="../img/top.jpg" alt="一筋の光" class="t-img" width="700" height="370">
        <h1 class="m-h1">RYO</h1>
          <span class="m-subtitle">Web Designer and Marketer Restaurant Business Planner</span>
        <p class="text-l">貴方にとって一筋の光を</p>
        <p>
          適切な情報整理、分析、コミュニケーションを用いて<br>しっかり課題抽出し一筋の光を導きます。
        </p>
        <img src="../img/top2.jpg" alt="スポット" class="t-img2" width="600" height="180">
      </section>
      <!-- ここまでMainTop -->
      <!-- ここからConcept -->
      <section class="m-concept">
        <img src="../img/concept.jpg" width="450" height="260" alt="Concept">
        <h2 class="m-h2">#Concept ー</h2>
        <div class="m-wrapper">
          <p class="text-l">Beam Spotのような存在に</p>
          <p>ビームスポットをご存知でしょうか。<br>力強く一筋に伸び照らす。<br>クライアントにとっての【ビームスポット】を一緒に点ける。<br>これが僕のやるべき事</p>
          <div class="m-link">
            <a href="../about/index.php">About Me</a>
            <img src="../img/arrow.png" width="100px" height="auto" alt="続き">
          </div>
        </div>

      </section>
      <!-- ここまでがConcept -->
      <!-- ここからWorks -->
      <section class="m-works">
        <h2 class="m-h2">#Works ー</h2>
          <div class="works-wrapper slide slider">
            <div class="work">
              <div class="work-img">
                <img src="../img/orescompany.png" alt="株式会社俺カンパニー">
              </div>
              <a href="https://www.ore-company.com/" target="_blank" rel="noopener noreferrer">
              <div class="hover-text">
                <p class="work-title">株式会社俺カンパニー様</p>
                <p class="work-content">
                  [ WebSite ] コーポレートサイトの運用、修正作業をやらさせていただきました。
                </p>
              </div>
              </a>
            </div>
            <div class="work">
              <div class="work-img">
                <img src="../img/yamahan.png" alt="山本のハンバーグ">
              </div>
              <div class="hover-text">
                <p class="work-title">山本のハンバーグ様</p>
                <p class="work-content">
                  [ WebSite ]　ブランドサイトの運用、修正作業、デザインをやらさせていただきました。
                </p>
              </div>
            </div>
            <div class="work">
              <div class="work-img">
                <img src="../img/katsugyu.png" alt="牛カツ専門店京都勝牛">
              </div>
              <div class="hover-text">
                <p class="work-title">牛カツ専門店<br>京都勝牛様</p>
                <p class="work-content">
                  [ Restaurant ]＿季節メニュー、牛カツのブラッシュアップなど商品のディレクションを主にやらさせていただきました。
                </p>
              </div>
            </div>
            <div class="work">
              <div class="work-img">
                <img src="../img/hikiniku.png" alt="挽肉と米">
              </div>
              <div class="hover-text">
                <p class="work-title">挽肉と米様</p>
                <p class="work-content">
                  [ Restaurant ]＿店舗運営、オペレーション改善などやらさせていただきました。
                </p>
              </div>
            </div>
            <div class="work">
              <div class="work-img">
                <img src="../img/nickstock.png" alt="肉が旨いカフェNICKSTOCK">
              </div>
              <div class="hover-text">
                <p class="work-title">肉が旨いカフェ<br>NICKSTOCK様</p>
                <p class="work-content">
                  [ Restaurant ]＿季節メニュー、グランドメニューなど商品のディレクションを主にやらさせていただきました。
                </p>
              </div>
            </div>
            <div class="work">
              <div class="work-img">
                <img src="../img/englishschool.png" alt="英会話スクール">
              </div>
              <a href="https://englishschool-site.web.app/" target="_blank" rel="noopener noreferrer">
              <div class="hover-text">
                <p class="work-title">英会話スクール</p>
                <p class="work-content">
                [ LP ]英会話スクール事業をイメージして自作LPを作成しました。
                </p>
              </div>
              </a>
            </div>
          </div>
        <div class="m-link">
          <a href="../works/index.php">Works all</a>
        <img src="../img/arrow.png" width="100px" height="auto" alt="続き">
        </div>
      </section>
      <!-- ここまでがWorks -->
      <!-- ここからService -->
      <section class="m-service">
        <h2 class="m-h2">#Service ー</h2>
        <h3 class="m-h3">■ Web Marketing</h3>
        <div class="service-inner">
          <div class="service-item">
            <img src="../img/website.png" alt="Webサイト制作" >
            <p class="item-top">ー　Webサイト/LP 制作・保守　ー</p>
            <p class="content">しっかり現状の課題から把握し<br>売上最大化、ブランディングを意識した制作を心がけております。<br>アフターフォローや保守も幅広く対応させていただきます。</p>
          </div>
          <div class="service-item">
            <img src="../img/sistem.png" alt="システム開発" >
            <p class="item-top">ー　システム開発　ー</p>
            <p class="content">PHPを使用した開発<br>お任せください。<br>アフターフォローや無償補修期間もございます。</p>
          </div>
        </div>
        <div class="service-inner">
          <div class="service-item">
            <img src="../img/lstepbuild.png" alt="公式LINE構築" >
            <p class="item-top">ー　公式LINE/Lステップ構築代行　ー</p>
            <p class="content">ファンを獲得したい！<br>そんな御社のお望み叶えます。アフターフォローや無償補修期間もございます。</p>
          </div>
          <div class="service-item">
            <img src="../img/lstep.png" alt="公式LINE運用" >
            <p class="item-top">ー　公式LINE/Lステップ運用代行　ー</p>
            <p class="content">公式LINEを構築したが<br>どう運用したらいいか分からない<br>リソースが足りていない！などの問題にお手伝いさせていただきます。</p>
          </div>
        </div>
        <h3 class="m-h3">■ Restaurant Support</h3>
        <div class="service-inner">
          <div class="service-item">
            <img src="../img/product.png" alt="商品・業態開発" >
            <p class="item-top">ー　商品/業態開発　ー</p>
            <p class="content">しっかりとご要望をヒアリングし<br>マーケティングを意識した<br>季節メニュー、グランドメニューなど<br>開発をお手伝いさせていただきます。<br>スポットだけ１商品だけなど幅広く対応しております。</p>
          </div>
          <div class="service-item">
            <img src="../img/consulting.png" alt="コンサルティング">
            <p class="item-top">ー　コンサルティング　ー</p>
            <p class="content">商品・業態開発/オペレーション改善<br>利益構造改善/マーケティング/Webマーケティングなど<br>御社の利益最大化、業態改善にお手伝いさせていただきます。</p>
          </div>
        </div>
        <div class="service-inner">
          <div class="service-item">
            <img src="../img/support.png" alt="営業サポート" >
            <p class="item-top">ー　営業サポート　ー</p>
            <p class="content">店舗運営においてのサポート<br>オペレーション参加、データ集計などを用いて営業における問題をいち早く改善いたします。</p>
          </div>
        </div>
      </section>
      <!-- ここまでがservice -->
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
  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/stickyfill/2.1.0/stickyfill.min.js"></script>

  <script sec="../js/scroll.js"></script>
  <script src="../js/form.js"></script>

  <!-- slick -->
  <script src="../js/slick.min.js"></script>
  <script src="../js/slickcommon.js"></script>
  <!--  -->
  <script>
    window.onload = function() {
    const spinner = document.getElementById('loading');
    spinner.classList.add('loaded');
  }
  </script>
</body>
</html>

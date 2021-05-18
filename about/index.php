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
      <!-- ここからTop -->
      <section class="top">
        <h1 class="title1">About Me</h1>
      </section>
      <!-- ここからConcept -->
      <section class="m-concept">
        <img src="../img/me.jpg" class="me" width="400" height="350" alt="Concept">
        <h2 class="a-h2">#Me ー</h2>
        <div class="m-wrapper">
          <p class="text-l">Ryo Saito</p>
          <p class="prf-content">1988年生まれ兵庫県出身<br>
            10代から飲食業界に飛び込みフレンチ・イタリアン・和食と経験する。<br>
            その後マネジャーを経験し中小規模でメニュー開発・業態開発を行う<br>
            牛カツ専門店勝牛やNICKSTOCKなどを展開する企業において<br>
            事業部長・商品企画開発マネジャーを経験<br>
            また飲食企業の手助けをWeb方向でできないかと<br>
            Web制作やLステップを用いた公式LINEの構築を独学し<br>
            Webマーケターとしても活動中
            <br>
            <span class="brand">Brand as...</span>
            <br>
            [地魚屋台 豊丸][野菜とワイン V'tres][牛カツ専門店勝牛][肉カフェNICKSTOCK]<br>[熟成肉専門店Gottie's BEEF][挽肉と米]
          </p>
        </div>
      </section>
      <!-- ここからConcept -->
      <section class="m-concept">
        <h2 class="m-h2">#Concept ー</h2>
        <div class="concept-wrapper">
          <p class="text-l">「Beam Spot」</p>
          <p>
            ご存知でしょうか。ステージ上でアーティストを照らしたりするあれです。
          </p><br>
          <p>
            一筋に伸び照らす光…
          </p><br>
          <p>
            クライアントにとっての一筋の光を一緒に点ける<br>
            これが僕のやるべき事。
          </p><br>
          <p>
            そのために開発、制作において大事にしていることは<br>
            いかにユーザーへ届けるか、伝えるか。<br>
            常にユーザー目線で取り組んでいます。
          </p>
        </div>

      </section>
      <!-- ここまでがConcept -->
      <!-- ここからWorks -->
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

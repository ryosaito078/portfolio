<?php
//セッションを開始
session_start();
//エスケープ処理やデータをチェックする関数を記述したファイルの読み込み
require '../libs/functions.php';
//メールアドレス等を記述したファイル
require '../libs/mailvars.php';

//お問い合わせ時刻を日本時間に
date_default_timezone_set('Asia/Tokyo');
//POSTデータをチェック
$_POST = checkInput( $_POST );

//固定トークンを確認（CSRF対策）
if( isset( $_POST[ 'ticket' ], $_SESSION[ 'ticket' ] ) ) {
  $ticket = $_POST[ 'ticket' ];
  if ( $ticket !== $_SESSION[ 'ticket' ]) {
    //トークンが一致しない場合は処理を中止
    die( 'Access denied' );
  }
} else {
  //トークンが存在しない場合（入力ページにリダイレクト）
  //die('Access denied(直接このページにはアクセスできません)' ); //処理を中止する場合
  $dirname = dirname( $_SERVER[ 'SCRIPT_NAME' ] );
  $dirname = $dirname == DIRECTORY_SEPARATOR ? '' : $dirname;
  $url = ( empty( $_SERVER[ 'HTTPS' ]) ? 'http://' : 'https://') . $_SERVER[ 'SERVER_NAME' ] . $dirname . 'contactform.php';
  herder( 'HTTP/1.1 303 See Other' );
  herder( 'location: ' . $url );
  exit;
}

//変数にエスケープ処理したセッション変数の値を代入
$name = h( $_SESSION[ 'name' ]);
$email = h( $_SESSION[ 'email' ]);
$tel = h( $_SESSION[ 'tel' ]);
$subject = h( $_SESSION[ 'subject' ]);
$body = h( $_SESSION[ 'body' ]);

//メール本文の組み立て
$mail_body = 'コンタクトページからのお問い合わせ' . "\n\n";
$mail_body .= date("Y年m月d日 H時i分") . "\n\n";
$mail_body .= "Name: " . $name . "\n";
$mail_body .= "Email: " . $email . "\n";
$mail_body .= "Tel: " . $tel . "\n\n";
$mail_body .= "<Message>" . "\n" . $body;

// --send mail(md_send_mail)を使ったメール送信処理-- //

//メールの宛先（名前<メールアドレス>の形式）。値はmailvars.phpに記載
$mailTo = mb_encode_mimeheader(MAIL_TO_NAME) . "<" . MAIL_TO . ">";

//Return-Pathに指定するメールアドレス
$returnMail = MAIL_RETURN_PATH;

mb_language( 'ja' );
mb_internal_encoding( 'UTF-8' );

$header = "From: " . mb_encode_mimeheader($name). "<" . $email. ">\n";
$header .= "Cc: " . mb_encode_mimeheader(MAIL_CC_NAME). "<". MAIL_CC.">\n";
$header .= "Bcc: <" . MAIL_BCC. ">";

//メールの送信（結果を変数$resultに代入）

if( ini_get( 'safe_mode')) {
  //セーフモードがonのときは第5引数が使えない
  $result = mb_send_mail($mailTo, $subject,$mail_body,$header);
} else {
  $result = mb_send_mail($mailTo, $subject,$mail_body,$header,'-f' . $returnMail);
}

//メール送信の結果判定
if( $result ) {
  //成功した場合はセッションを破棄
  $_SESSION = array(); //空の配列を代入し、すべてのセッション変数を消去
  session_destroy(); //セッションを破棄
} else {
  //送信失敗時（もしあれば）
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>コンタクトフォーム（送信完了）</title>
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
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
  <div class="container message-box">
  <h2>お問い合わせフォーム</h2>
  <?php if($result): ?>
  <h3>送信完了</h3>

  <hr class="hr-style">

  <p>お問い合わせいただきありがとうございます。</p>
  <p>送信完了いたしました。</p>
  <?php else: ?>
  <p>申し訳ございませんが、送信に失敗いたしました。</p>
  <p>しばらくしてもう一度お試しに、なるかメールにてご連絡ください。</p>
  <p>ご迷惑おかけして誠に申し訳ございません。</p>
  <?php endif; ?>

  </div>
</body>
</html>

<?php
session_start();

require '../libs/functions.php';

$_POST = checkInput($_POST);

//固定トークンを確認（CSRF対策）
if( isset( $_POST['ticket'], $_SESSION['ticket'])) {
  $ticket = $_POST['ticket'];
  if( $ticket !== $_SESSION['ticket']) {
    //トークンが一致しない場合は処理をしない
    die('Access Denied!');
  }
} else {
  //トークンが存在しない場合は処理を中止（直接アクセスするとエラー）
  die('Access Denied　(直接このページにはアクセスできません）');
}

//POSTされたデータを変数に代入
$company = isset( $_POST['company']) ? $_POST['company'] : NULL;
$name = isset( $_POST['name']) ? $_POST['name'] : NULL;
$email = isset( $_POST['email']) ? $_POST['email'] : NULL;
$tel = isset( $_POST['tel']) ? $_POST['tel'] : NULL;
$body = isset( $_POST['body']) ? $_POST['body'] : NULL;

//POSTされたデータを整形（ホワイトスペースを削除）
$company = trim ($company);
$name = trim ($name);
$email = trim ($email);
$tel = trim ($tel);
$body = trim ($body);

//エラーメッセージを保存する配列を初期化
$error = array();

//値の検証（入力内容が条件を満たさない場合はエラーメッセージを配列に＄errorに設定）
if ( $name == '') {
  $error['name'] = '※お名前は必須項目です。';
} else if (preg_match( '/\A[[:^cntrl:]]{1,30}\z/u', $name) == 0) {
  $error['name'] = '※お名前は30文字以内でお願いします。';
}
if ( $email == '') {
  $error['email'] = '※メールアドレスは必須です。';
} else {
  //アドレスを正規表記でチェック
  $pattern = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/uiD';
  if ( !preg_match($pattern, $email)) {
    $error['email'] = '※メールアドレスの形式が正しくありません。';
  }
}
if ( preg_match('/\A[[:^cntrl:]]{0,30}\z/u',$tel) == 0) {
  $error['tel'] = '※電話番号は30文字以内でお願いします。';
}
if ( $tel != '' && preg_match('/\A\(?\d{2,5}\)?[-(\.\s]{0,2}\d{1,4}[-)\.\s]{0,2}\d{3,4}\z/u', $tel) == 0) {
  $error['tel_format'] = '※電話番号の形式が正しくありません。';
}
if ( $body == '') {
  $error['body'] = '※内容は必須項目です。';
  //制御文字（タブ、復帰、改行を除く）でないことと文字数をチェック
} else if ( preg_match('/\A[\r\n\t[:^cntrl:]]{1,1050}\z/u', $body) === 0) {
  $error['body'] = '※内容は1000文字以内でお願いします。';
}

//POSTされたデータとエラーの配列をセッション変数に保存
$_SESSION['company'] = $company;
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['tel'] = $tel;
$_SESSION['body'] = $body;
$_SESSION['error'] = $error;

//チェックの結果にエラーがある場合は入力ファームに戻す
if ( count( $error) > 0) {
  //エラーがある場合
  $dirname = dirname( $_SERVER[ 'SCRIPT_NAME']);
  $dirname = $dirname == DIRECTORY_SEPARATOR ? '' : $dirname;
  $url = ( empty( $_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['SERVER_NAME'] . $dirname . '../ryo-saito.com/index.php';
  header ('HTTP/1.1 303 See Other');
  header ('location:' . $url);
  exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Contact form</title>
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
  <h2>お問い合わせ確認画面</h2>
  <p>以下の内容でよろしければ「送信する」をクリックしてください。<br>
    内容を変更する場合は「戻る」をクリックして入力画面にお戻りください。</p>
  <div class="table-responsive">
    <table class="table table-bordered">

      <tr>
        <th>COMPANY</th>
        <td><?php echo h($company); ?></td>
      </tr>
      <tr>
        <th>NAME</th>
        <td><?php echo h($name); ?></td>
      </tr>
      <tr>
        <th>E-mail</th>
        <td><?php echo h($email); ?></td>
      </tr>
      <tr>
        <th>TEL</th>
        <td><?php echo h($tel); ?></td>
      </tr>
      <tr>
        <th>MESSAGE</th>
        <td><?php echo nl2br(h($body)); ?></td>
      </tr>
    </table>
  </div>
  <form action="../ryo-saito.com/index.php" method="post" class="confirm">
    <button type="submit" class="btn btn-secondary">戻る</button>
  </form>
  <form action="complete.php" method="post" class="confirm">
    <!-- 完了ページへ渡すトークンの隠しフィールド -->
    <input type="hidden" name="ticket" value="<?php echo h($ticket); ?>">
    <button type="submit" class="btn btn-success">送信する</button>
  </form>
</div>
</body>
</html>

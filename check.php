<?php
//ファイル名：check.php
  $u = $_POST['uid'] ;  //ログイン画面より送信されたユーザID、例えば,'k12jk230';
  $p = $_POST['pass'];  //ログイン画面より送信されたパスワード、例えば,'ar37';

//a. 受信データ（配列$_POST）を出力する
  //echo '<pre>'; //<pre>：整形済みテキストとして
  //print_r($_POST) ;   // print_r(): 配列の内容を出力
  //echo '</pre>';
//b. 変数を使ってSQL文を作る
  $sql = "SELECT * FROM tb_user WHERE uid= '{$u}'  AND upass='{$p}'";
   //echo $sql;

  include_once('db_inc.php'); //データベース接続のプログラムを読み込む

  $rs = mysql_query($sql, $conn);//SQL文をサーバーに送信し実行

  if (!$rs) {
    die('エラー: ' . mysql_error());
  }
  $row= mysql_fetch_array($rs);//問合せ結果を1行受け取る

 //ページヘッドを出力


 if ($row){ //問合せ結果がある場合、ログイン成功
   // echo '<h2>ログイン成功！</h2>';
   //echo '<h2>ようこそ！' . '</h2>';
   //echo '<img src="http://www.is.kyusan-u.ac.jp/gaikan.jpg"><br>';
   //$url = 'http://www.is.kyusan-u.ac.jp/';       //転送先のURL(学部HP)
   //header('Location:' . $url);   // 画面転送

 	session_start();
   $_SESSION['uid']   = $row['uid'];
   $_SESSION['uname'] = $row['uname'];
   $_SESSION['urole'] = $row['urole'];
   $url = 'index.php'; //転送先のURL(TOPページ)
   header('Location:' . $url);   // 画面転送


 }else{
 	include('page_header.php');
    echo '<h2>ログイン失敗！</h2>';
    echo '<h2>ユーザIDもしくはパスワードが間違いました！</h2>';
    echo '<a href="login.php">戻る</a>';
    include('page_footer.php');
 }

?>
<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
echo "<h2>希望状況一覧</h2>";
$where = ' WHERE 1'; // 条件なしSQLのWHERE部分を作る
$sql ="select * from tb_entry natural join tb_user natural join  tb_couser ". $where;//検索条件を適用したSQL文を作成
$rs = mysql_query($sql, $conn);
if (!$rs) {
       die ('エラー: ' . mysql_error());
}
$row = mysql_fetch_array($rs) ;
echo '<table border=3>';
echo '<tr><th>ユーザID</th><th>氏名</th><th>希望コース</th><th>興味のある研究分野や自己PR</th></tr>';
while ($row) {
       echo '<tr>';
       echo '<td>' . $row['uid'] . '</td>';
      echo '<td>' . $row['uname']. '</td>';
       echo '<td>' . $row['cname'] . '</td>';
       echo '<td>' . $row['happy'] . '</td>';
       echo '</tr>';
       $row = mysql_fetch_array($rs) ;
}
echo '<table>';
echo '<p><a href="index.php">戻る</a>';
include('page_footer.php');  //画面出力終了
?>
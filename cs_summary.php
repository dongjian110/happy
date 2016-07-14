<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続
echo "<h2>希望状況集計</h2>";
$where = ' WHERE 1'; // 条件なしSQLのWHERE部分を作る
$sql ="select cname,COUNT(*) from tb_entry NATURAL JOIN tb_couser GROUP BY cid ";//検索条件を適用したSQL文を作成
$rs = mysql_query($sql, $conn);
if (!$rs) {
      die ('エラー: ' . mysql_error());
}
$row = mysql_fetch_array($rs) ;
echo '<table border=3>';
echo '<tr><th>希望コース</th><th>希望者数</th></tr>';
while ($row) {
       echo '<tr>';
       echo '<td>' . $row['cname'] . '</td>';
       echo '<td>' . $row['COUNT(*)']. '</td>';
       //echo '<td>' . $row['cname'] . '</td>';
       //$roles = array( 1=>'学生', 2=>'教員', 9=>'管理者');
       //$r= $row['urole'];        // 種別のコード（数字）を$rに代入
       //$urole = $roles [ $r ];   // 種別の名前（配列要素）を$uroleに代入
       //echo '<td>' . $urole . '</td>';
       //echo '<td><a href="user_delete.php?uid='.$row['uid'] .'">削除</a></td>';
       echo '</tr>';
       $row = mysql_fetch_array($rs) ;
}
echo '<table>';
echo '<p><a href="index.php">戻る</a>';
include('page_footer.php');  //画面出力終了
?>
<?php
include('page_header.php');
require_once('db_inc.php');

if (isset($_SESSION['urole'])and $_SESSION['urole']==1){
	$uid = $_SESSION['uid'];
	$uname = $_SESSION['uname'];
}else{
	die('エラー：この機能を利用する権限がありません');
}
 echo"<h2>成績確認</h2>";
 $where = 'WHERE 1';
 $sql="select uid,uname,credit,gpa from tb_user WHERE uid ='$uid'";
 $rs = mysql_query($sql,$conn);
 if (!$rs){
 	die ('エラー： ' . mysql_error());
 }
$row = mysql_fetch_array($rs);
echo '<table border=3>';
echo '<tr><th>ユザーID</th><th>氏名</th><th>単位数</th><th>ＧＰＡ</th></tr>';
while ($row){
	echo'<tr>';
	echo'<td>' . $row['uid'] . '</td>';
	echo'<td>' . $row['uname'] . '</td>';
	echo'<td>' . $row['credit'] . '</td>';
	echo'<td>' . $row['gpa'] . '</td>';
	echo '</tr>';
	$row = mysql_fetch_array($rs);
}
echo '</table>';
echo'<p><a href="index.php">戻る</a>';
include ('page_footer.php');
?>
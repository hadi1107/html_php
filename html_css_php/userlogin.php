<?php

header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

session_start();
$_SESSION['userid']='';
$_SESSION['usertype']='';

$userid = $_POST['userid'];
$password = $_POST['password'];

$con = mysql_connect("localhost","root","sql");
mysql_select_db("qing_zhou", $con);
mysql_query("set names gb2312 ");

$sql1 = "select userid,usertype from php_admin where userid='".$userid."' and password='".$password."'";
//echo $sql1; die();
$RS0 = mysql_query($sql1, $con);
if($RS0){
//echo mysql_num_rows($RS0);die();
}
else
{
//die("pppp");
}

if (mysql_num_rows($RS0)>0)
{
	$RS = mysql_fetch_array($RS0);
	$a = 0;
	$_SESSION['userid'] = $RS['userid'];
	$_SESSION['usertype'] = $RS['usertype'];
	if($RS['usertype'] == 1){
	    $a = 1;}
	mysql_close($con);
	$RS=NULL;
	$con =NULL;
	if($a == 0 ) {
	header("location: main.php");
	}
    else{
    header("location: http://127.0.0.1/seller.html");
    }
}  
else
{
	mysql_close($con);
	$RS=NULL;
	$con =NULL;
	header("location: userlogin.htm");
}

?>


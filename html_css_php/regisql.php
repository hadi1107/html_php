<?php

header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

session_start();
$_SESSION['userid']='';
$_SESSION['password']='';
$userid = $_POST['userid'];
$password = $_POST['password'];






if(empty($userid))
{
    die("empty userid!");
}
else
{
    if(empty($password))
    {
        die("empty password!");
    }
    else
    {
        $con = mysql_connect("localhost","root","sql");
        mysql_select_db("qing_zhou", $con);
        mysql_query("set names gb2312 ");

        $sql1="select userid from php_admin where userid='".$userid."'";
        $RS0 = mysql_query($sql1, $con);
        if(mysql_num_rows($RS0)>0)
        {
           echo "DOUBLE";
        }
        else
        {

        $sql1="insert into php_admin(userid,usertype,password ) value('$userid',0,'$password')";
        $RS0 = mysql_query($sql1, $con);
        if($RS0)
        {
            die("success");
        }
        else
        {
            die("fail");
        }

        mysql_close($con);
        }
    }
}
 ?>
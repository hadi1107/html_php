<?php

header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gb2312");

$userid = $_GET['userid'];

if(empty($userid))
{
    die("请输入");
}
else
{
    {
        $con = mysql_connect("localhost","root","sql");
        mysql_select_db("qing_zhou", $con);
        mysql_query("set names gb2312 ");

        $sql1="select userid from php_admin where userid='".$userid."'";
        $RS0 = mysql_query($sql1, $con);
        if(mysql_num_rows($RS0)>0)
        {
           echo "重复捏";
        }
        else
        {
            echo "可以注册";
        }

        mysql_close($con);
    }
}
 ?>
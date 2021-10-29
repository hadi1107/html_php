<?php

header("Cache-Control: no-cache, post-check=0, pre-check=0");
header("Content-type:text/html;charset=gbk");

$productcode=$_POST['productcode'];
$productname = $_POST['productname'];
$sellercode = $_POST['sellercode'];
$price = $_POST['price'];
$stocknumber = $_POST['stocknumber'];

if(empty($productcode))
{
    die("empty productcode");
}
else
{
    if(empty($sellercode))
    {
        die("empty sellercode !");
    }
    else
    {
        $con = mysql_connect("localhost","root","sql");
        mysql_select_db("qing_zhou", $con);
        mysql_query("set names gb2312 ");

        $sql1="insert into t_product(productcode,productname,sellercode,price,stocknumber ) value('$productcode','$productname','$sellercode','$price','$stocknumber')";
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
 ?>
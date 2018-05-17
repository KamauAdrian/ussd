<?php
$phone=$_POST["phoneNumber"];
$text=$_POST["text"];
$response="";
$results= explode('*', $text);

if ($text=="")//*544#
{
    $response="CON 1.Register\n2.Check Details";
}
elseif ($text=='1')//text=1
{
    $response="CON Enter your full names";
}
elseif ($results[0]=='1' and count($results)==2)//text=1*Adrian
{
    $response="CON Enter your ID";
}
elseif ($results[0]=='1' and count($results)==3)//text=1*Adrian*66655598
{
    $response="CON Enter your Location";
}
elseif ($results[0]=='1' and count($results)==4)//text=1*Adrian*66655598*Nairobi
{
    //file_put_contents('data.txt',$text, FILE_APPEND);
    $response="END Thank  You $results[1] for registering with IEBC";
}
elseif ( $text=='2')//text=2
{
    $response="CON Enter your ID";
}
elseif ($results[0]=='2' and count($results)==2)//text=2*678544677
{
    $response="END Your Details are xyz";
}


//var_dump($results);

header("Content-type:text/plain");
echo $response;
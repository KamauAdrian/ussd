<?php
//names, refugee camp, country of origin, gender, age,refugee number
$phone=$_POST["phoneNumber"];
$text=$_POST["text"];
$response="";
$results= explode('*', $text);
if ($text=="")//*544#
{
    $response="CON 1.Register\n2.Check Details";
}elseif ($text=='1')//text=1
{
    $response="CON Enter your full names";
}elseif ($results[0]=='1' and count($results)==2)//text=1*Adrian
{
    $response="CON Your Refugee Camp";
}
elseif ($results[0]=='1' and count($results)==3)//text=1*Adrian*camp
{
    $response="CON Your Country of origin";
}
elseif ($results[0]=='1' and count($results)==4)//text=1*Adrian*camp*country
{
    $response="CON GENDER\n1.Male\n2.Female";
}elseif ($results[0]=='1' and count($results)==5)//text=1*Adrian*camp*country*gender
{
    $response="CON Your age";
}
elseif ($results[0]=='1' and count($results)==6)//text=1*Adrian*camp*country*gender*age
{
    $response="CON Your Refugee number";
}elseif ($results[0]=='1' and count($results)==7)//text=1*Adrian*camp*country*gender*age*refugee number
{
    $conn=mysqli_connect("localhost","root","","refugees");

    $gender="Male";
    if ($results[4]=="2")
        $gender="Female";
    $sql="INSERT INTO `members`( `names`, `camp`, `country`, `gender`,`age`,`refnumber`)
                       VALUES ('$results[1]','$results[2]','$results[3]','$gender','$results[5]','$results[6]')";
    $result =mysqli_query($conn,$sql);
    if ($result)
    {
        $response="END Thank You $results[1] have been Registered successfully";
        sendSms($phone,"Thank You $results[1]  for Registering with us");
    }else {
        $response="A user by ref number $results[6] already exists";
    }

}
elseif ($text=='2')//text=2
{
    $response="CON Enter your Refugee Number";
}
elseif ($results[0]=='2' and count($results)==2)//text=2*235
{

    $connection = mysqli_connect("localhost", "root", "", "refugees");
    $query = "SELECT * FROM  `members` WHERE refnumber='$results[1]'";
    $result=mysqli_query($connection,$query);
    if (mysqli_num_rows($result)>0){

        $row = mysqli_fetch_assoc($result);
        extract($row);
        $response="Names: $names\nGender: $gender\nCountry: $country\nAge: $age";
    }else{
        $response="No results found matching refNo $results[1]";
    }
}
header("Content-type:text/plain");
echo $response;

//Register, Borrow Loan , Repay Loan, Check Loan Balance
//Cannot borrow a loan if balance >0
//3721132f020da7e3f9011d8a5dc40a78bce59e1db770c9f18f0f2a358c1eac39

function sendSms($phone, $message){
    require_once('AfricasTalkingGateway.php');
    $username   = "Adrian6202";
    $apikey     = "3721132f020da7e3f9011d8a5dc40a78bce59e1db770c9f18f0f2a358c1eac39";
    $recipients = "$phone";
    $message    = "$message";
    $gateway    = new AfricasTalkingGateway($username, $apikey);
    try
    {
        // Thats it, hit send and we'll take care of the rest.
        $results = $gateway->sendMessage($recipients, $message);
    }
    catch ( AfricasTalkingGatewayException $e )
    {
    }
}
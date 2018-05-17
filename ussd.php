<?php
$phone=$_POST["phoneNumber"];
$text=$_POST["text"];



$response="";
if ($text=="")//*544#
{
  $response="CON Select\n1.Okoa\n2.Redeem points\n3.Check points";
}
elseif ($text=="1"){
    $response="CON Select\n1.Okoa 20\n2.Okoa 50\n3.Okoa 100";
}
elseif ($text=="1*1"){
    $response="END You 20 Okoa jahazi request successfully granted";
}
elseif ($text=="1*2"){
    $response="END You 50 Okoa jahazi request successfully granted";
}
elseif ($text=="1*3"){
    $response="END You 100 Okoa jahazi request successfully granted";
}
elseif ($text=="2"){
    $response="CON Select\n1.Free Airtime\n2.Free sms\n3.Free Bundles";
}

elseif ($text=="2*1"){
    $response="CON Select\n1.Redeem 10 points for 2bob\n2.Redeem 100 points for 20bob\n3.Redeem 200 points for 50bob";
}
elseif ($text=="2*1*1"){
    $response="END You have successfully redeemed 10 points for 2bob";
}
elseif ($text=="2*1*2"){
    $response="END You have successfully redeemed 100 points for 20bob";
}
elseif ($text=="2*1*3"){
    $response="END You have successfully redeemed 200 points for 50bob";
}
elseif ($text=="2*2"){
    $response="CON Select\n1.Redeem 50 points for 35sms\n2.Redeem 100 points for 75sms\n3.Redeem 200 points for 100sms";
}
elseif ($text=="2*2*1"){
    $response="END You have successfully redeemed 50 points for 35sms";
}
elseif ($text=="2*2*2"){
    $response="END You have successfully redeemed 100 points for 75sms";
}
elseif ($text=="2*2*3"){
    $response="END You have successfully redeemed 200 points for 100sms";
}

elseif ($text=="2*3"){
    $response="CON Select\n1.Redeem 50 points for 10mb\n2.Redeem 100 points for 35mb\n3.Redeem 200 points for 50mb";
}
elseif ($text=="2*3*1"){
    $response="END You have successfully redeemed 50 points for 10mb";
}
elseif ($text=="2*3*2"){
    $response="END You have successfully redeemed 100 points for 35mb";
}
elseif ($text=="2*3*3"){
    $response="END You have successfully redeemed 200 points for 50mb";
}
elseif ($text=="3"){
    $response="END your bonga points balance is 2000 Thank you for using safcom";
}

//*384*6202#








header("Content-type:text/plain");
echo $response;
<?php
$phone=$_POST["phoneNumber"];
$text=$_POST["text"];



$response="";
if ($text=="")//*544#
{
    $response="CON Choose your Country\n1.Kenya\n2.Uganda\n3.Rwanda\n4.Tanzania\n5.Burundi";
}
elseif ($text=="1"){
    $response="CON Select\n1.Population Density\n2.Capital city";
}
elseif ($text=="1*1"){
    $response="END The population of kenya is 45 million";
}
elseif ($text=="1*2"){
    $response="END The Capital city of Kenya is Nairobi";
}

elseif ($text=="2"){
    $response="CON Select\n1.Population Density\n2.Capital city";
}
elseif ($text=="2*1"){
    $response="END The population of Uganda is 12 million";
}
elseif ($text=="2*2"){
    $response="END The Capital city of Uganda is Kampala";
}
elseif ($text=="3"){
    $response="CON Select\n1.Population Density\n2.Capital city";
}
elseif ($text=="3*1"){
    $response="END The population of Rwanda is 1 million";
}
elseif ($text=="3*2"){
    $response="END The Capital city of Rwanda is Kigali";
}
elseif ($text=="4"){
    $response="CON Select\n1.Population Density\n2.Capital city";
}
elseif ($text=="4*1"){
    $response="END The population of Tanzania is 2 million";
}
elseif ($text=="4*2"){
    $response="END The Capital city of Tanzania is Dodoma";
}
elseif ($text=="5"){
    $response="CON Select\n1.Population Density\n2.Capital city";
}
elseif ($text=="5*1"){
    $response="END The population of Burundi is 675000";
}
elseif ($text=="5*2"){
    $response="END The Capital city of Burundi is Bujumbura";
}














header("Content-type:text/plain");
echo $response;
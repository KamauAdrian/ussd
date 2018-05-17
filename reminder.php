<?php

$food=array('Healthy'=>
array('Maize','wheat','sorghum','beans'),
'Unhealthy'=> array('icecream','milk','peper'));



foreach ($food as $element=>$inner_array){
    echo '<strong>'.$element.'</strong><br />';
foreach ($inner_array as $item)
{
    echo $item.'<br />';
}
}
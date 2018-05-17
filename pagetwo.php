<?php
$names=array('Adrian'=>array('Kamau','Muthoni'),'Collins'=>array('Kamau','Muthoni'),'Barbra'=>array('Claire','Mark'));
foreach ($names as $item=>$inneritem){
    echo '<strong>'.$item.'</strong><br />';

    foreach ($inneritem as $innerarrayitem){
       echo $innerarrayitem.'<br />';
    }
};
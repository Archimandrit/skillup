<?php
$a = '1,3,10,22,18,44,35';
$b=explode(',', $a );
$g=[];
foreach ($b as $c) {
    $g[]=$c+10;
};
$result=implode(',', $g);

var_dump($a);
var_dump($b);
var_dump($g);
var_dump($result);

?>


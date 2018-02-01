<h1>halo</h1>
<?php

$currentDate = time();
$yesterday = $currentDate - 60*60*24;

echo $currentDate . "<br />";
echo date('d.m.Y H:i:s', $yesterday);
echo date('d.m.Y H:i:s') . "<br />:";

require_once 'template.php';
?>
<p>sample text <?php echo $currentDate ?></p>

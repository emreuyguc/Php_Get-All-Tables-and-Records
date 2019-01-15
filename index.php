<?php
define('db_admin','root');
define('db_pass','');
define('db_ip','127.0.0.1');
define('db','sakila');

require_once('class.db.php');

use Db\Engine as Vb;
// kullanımda \ yada /

$Vb = new Vb;


$tablolar = $Vb->return_query_ass('show tables;');

$i = 0;
echo '<table border=1>';

foreach($tablolar as $tablo){
	$i += 1;
	echo  '<a href="listele.php?tablo='.$tablo['Tables_in_sakila'].'">'.$tablo['Tables_in_sakila'].'</a>'.'<br>';
}
echo '</table>';

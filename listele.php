<?php
define('db_admin','root');
define('db_pass','');
define('db_ip','127.0.0.1');
define('db','sakila');

require_once('class.db.php');

use Db\Engine as Vb;
// kullanımda \ yada /

$Vb = new Vb;

if(isset($_GET['tablo']) && !empty($_GET['tablo'])){
	$tablo = $_GET['tablo'];
	$kolonlar = 'SHOW COLUMNS FROM '.$tablo.';';
	$icerik = 'select * from '.$tablo.';';
	
	$cekKolonlar = $Vb->return_query_ass($kolonlar);
	$cekIcerik = $Vb->return_query_ass($icerik);
	
	ECHO '<TABLE border=2>';
	echo '<tr>';
		foreach($cekKolonlar as $kolon){
			echo '<td>&nbsp'.$kolon['Field'].'&nbsp</td>';
		}
	echo '</tr>';

	$kolonsayi = count($cekKolonlar);
	$iceriksayi = count($cekIcerik) - $kolonsayi;

	$num = 0;
	foreach($cekIcerik as $cek){
		echo '<tr>';
			foreach($cekKolonlar as $kolon){
				$koladi = $kolon['Field'];
				echo '<td>';
					echo $cekIcerik[$kolonsayi + $num][$koladi];
				echo '</td>';
			}
				
		
		echo '</tr>';

	if($num >= $iceriksayi-1)
		break;
	else
		$num++;
	}
	
	echo '</table>';
}
else{

}


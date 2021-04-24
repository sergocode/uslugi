<?
$PDO = new PDO('mysql:host=localhost;dbname=gosuslugi', "root", "root");

if ($_POST['zapros'] == "count_kids") {
	$get_6_childs = $PDO->query("SELECT * FROM `citizens` WHERE `COUNT_CHILDS` = 6")->fetchAll(PDO::FETCH_ASSOC);
	print_r(json_encode($get_6_childs));
}
/*Можно было сделать по другому, например, если есть только запись даты подачи заявки, а срок её рассмотрения 10 дней, то запрос выглядит так:
SELECT * FROM `zayavki` WHERE `LAST_DATE` + 10 <= CURRENT_DATE()
*/ 
if ($_POST['zapros'] == "zayavki") {
	$zayavki = $PDO->query("SELECT * FROM `zayavki` WHERE `LAST_DATE` < CURRENT_DATE()")->fetchAll(PDO::FETCH_ASSOC);
	if ($zayavki) {
  		print_r(json_encode($zayavki));
	}
 	else {
		print_r(json_encode("ERROR"));
	}
}

if ($_POST['zapros'] == "del-zayavki") {
	$PDO->query("DELETE FROM `zayavki` WHERE `LAST_DATE` < CURRENT_DATE()")->fetchAll(PDO::FETCH_ASSOC);
	$zayavki = $PDO->query("SELECT * FROM `zayavki` WHERE `LAST_DATE` < CURRENT_DATE()")->fetchAll(PDO::FETCH_ASSOC);
	if (!$zayavki) {
  		print_r(json_encode("TRUE"));
	}
 	else {
		print_r(json_encode("ERROR"));
	}
}

if ($_POST['zapros'] == "zayavka") {
	if (strlen($_POST['text']) != 0 && strlen($_POST['text']) < 200 ) {
		$text = $_POST['text'];
		if ($_POST['type'] == "OLD") {
			$zayavki = $PDO->query("INSERT INTO `zayavki` (`ID`, `NAME`, `LAST_DATE`) VALUES (NULL, '$text', CURRENT_DATE() - 1)")->fetchAll(PDO::FETCH_ASSOC);
			print_r(json_encode("TRUE"));
		} 
		if ($_POST['type'] == "NEW") {
			$zayavki = $PDO->query("INSERT INTO `zayavki` (`ID`, `NAME`, `LAST_DATE`) VALUES (NULL, '$text', CURRENT_DATE() + 1)")->fetchAll(PDO::FETCH_ASSOC);
			print_r(json_encode("TRUE"));
		}
	}
	else {
		print_r(json_encode("NULL"));
	}
}
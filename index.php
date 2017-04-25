<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
	<title></title>
</head>

<body>

<?php 
try{
$pdo=new PDO("mysql:host=localhost;dbname=colyseum","root","simplon01");

echo '<h3>Hello</h3>';

} catch(PDOException $e){
	print"Erreur!:".$e->getMessage().'</br>';
	die();
}

?>


</body>

</html>


<?php 
try{
	$dbh=new PDO("mysql:host=localhost;dbname=colyseum; charset=utf8","root","simplon01");

	echo "<h3>Exo 1, afficher tous les clients</h3>";



	
	foreach ($dbh->query('SELECT*FROM clients')as $row) {             
		echo $row['lastName']." ".$row['firstName']."</br>";         }	
	}


// $dbh=null;

	catch(PDOException $e){
		print"Erreur!:".$e->getMessage().'</br>';
		die();
	}

	echo "<h3>Exo 2, Afficher tous les types de spectacles</h3>";

	foreach ($dbh->query('SELECT*FROM showTypes')as $row){
		echo $row["id"]." ".$row["type"]."</br>";

	}

	echo "<h3>Exo 3, afficher les 20 premiers clients.</h3>";

	foreach ($dbh->query("SELECT*FROM clients WHERE id <=20") as $row){
		echo $row["id"]." ".$row["lastName"]." ".$row["firstName"]."</br>";
	}

	echo "<h3>Exo 4, n'afficher que les clients possédant une carte de fidélité</h3>";


	foreach ($dbh->query("SELECT*FROM clients JOIN cards ON clients.cardNumber=cards.cardNumber WHERE cardTypesId=1 ")as $row){
		echo $row["lastName"]." ".$row["firstName"]." ".$row["id"]."</br>";

	}

	echo "<h3>Exo 5, afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre 'M'</h3>";

	foreach ($dbh->query("SELECT firstName, lastName FROM clients WHERE lastName Like 'M%';")as $row){
		echo "Prénom:". $row["firstName"]."</br>";
		echo "Nom:". $row["lastName"]."</br>";
		echo "</br>";

	}

	echo "<h3>Exo 6, afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : Spectacle, artiste, la date et heure</h3>";

	foreach ($dbh->query("SELECT title, performer, date, startTime FROM shows ORDER BY title ")as $row){
		echo $row["title"]." par ".$row["performer"]." , le ".$row["date"]." à ".$row["startTime"]."</br>";
	}

	echo "<h3>Exo 7.</br>

	Afficher tous les clients comme ceci :</br>
	Nom : Nom de famille du client </br>
	Prénom : Prénom du client </br>
	Date de naissance : Date de naissance du client</br>
	Carte de fidélité : Oui (Si le client en possède une) ou Non (s'il n'en possède pas) </br>
	Numéro de carte : Numéro de la carte fidélité du client s'il en possède une.</br>
</h3>";

foreach ($dbh->query("SELECT lastName, firstName, birthDate, card, IF (cardTypesId=1, 'Oui', 'Non')as cards, cards.cardNumber FROM clients LEFT JOIN cards ON clients.cardNumber=cards.cardNumber AND cardTypesId=1")as $row){
	echo "Nom :".$row["lastName"]."<br/>";
	echo "Prénom :".$row["firstName"]."<br/>";
	echo "Date de naissance :".$row["birthDate"]."<br/>";
	echo "Carte fidélité :" .$row ["cards"]."<br/>";
	echo "numéro de carte :".$row["cardNumber"]."<br/>";
	echo "</br>";
}

?>



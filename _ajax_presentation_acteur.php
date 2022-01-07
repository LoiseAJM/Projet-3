<?php


$user_id = htmlentities(trim($_GET['user_id']));
$acteur_id = htmlentities(trim($_GET['acteur_id']));
$vote = htmlentities(trim($_GET['vote']));

//connexion avec la base de données
$conn = new PDO("mysql:host=localhost; dbname=dev;", 'dev', 'devpass');
$sql = "SELECT `vote_id` FROM `vote` WHERE `user_id` = :user AND `acteur_id` = :acteur ;";
$statement = $conn->prepare($sql);
$statement->bindParam('acteur', $acteur_id);
$statement->bindParam('user', $user_id);
$statement->execute();
$row = $statement->fetch();

//Si l'utilisateur a déjà voté
if ($row['vote_id']  > 0) {
    $sql = "UPDATE `vote` SET `vote` =" . $vote .  " WHERE `vote`.`vote_id` =" . $row['vote_id'] . ";";
    $statement = $conn->prepare($sql);
    $statement->execute();
} else //Si l'utilisateur n'a jamais voté
{
    $sql = "INSERT INTO `vote` (`vote_id`, `user_id`, `acteur_id`, `vote`) VALUES (NULL, " . $user_id . ", " . $acteur_id . ", " . $vote . ");";
    $statement = $conn->prepare($sql);
    $statement->execute();
}

//Calcul du nombre d'occurences de votes positifs
$sql1 = "SELECT COUNT(*) AS `somme_votepositif` FROM `vote` WHERE `acteur_id` = :acteur_id AND `vote` = '1'  ";
$statement1 = $conn->prepare($sql1);
$statement1->bindParam('acteur_id', $acteur_id);
$statement1->execute();
$row3 = $statement1->fetch();
$somme_votepositif = $row3['somme_votepositif'];

//Calcul du nombre d'occurences de votes négatifs
$sql2 = "SELECT COUNT(*) AS `somme_votenegatif` FROM `vote` WHERE `acteur_id` = :acteur_id AND `vote` = '-1'  ";
$statement2 = $conn->prepare($sql2);
$statement2->bindParam('acteur_id', $acteur_id);
$statement2->execute();
$row2 = $statement2->fetch();
$somme_votenegatif = $row2['somme_votenegatif'];


//code de generation XML des infos acteurs, pour les sommes des votes positifs et negatifs
header('Content-type: text/xml');
header('Pragma: public');
header('Cache-control: private');
header('Expires: -1');
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
echo ("<XML>");
echo ("<R>");
echo ("<T1>");
echo ($row3['somme_votepositif']);
echo ("</T1>");

echo ("<T2>");
echo ($somme_votenegatif = $row2['somme_votenegatif']);
echo ("</T2>");
echo ("</R>");
echo ("</XML>");

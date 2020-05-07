<?php
require ('bdd.php');

$requeteurl = $bdd->prepare('SELECT IsSociete FROM guid WHERE GUID = :GUID');
$requeteurl->execute(array(':GUID' => $_GET['idUser']));
$url = $requeteurl->fetch();
echo json_encode($url);

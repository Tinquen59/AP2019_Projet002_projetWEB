<?php
// Connexion à la base de données (identifiant pour un serveur local)
$bd = new PDO('mysql:host=localhost:3308;dbname=formulaire', 'root', '');

// Requête de sélection des enregistrements dans la table livres
$r = $bd->query('SELECT * FROM guid');


$xmlFile = new DOMDocument('1.0', 'utf-8');
$xmlFile->appendChild($formulaire = $xmlFile->createElement('formulaire'));

while($rs = $r->fetch(PDO::FETCH_ASSOC)){
    $formulaire->appendChild($GUID = $xmlFile->createElement('GUID'));

    $GUID->appendChild($xmlFile->createElement('GUID', $rs['GUID']));
    $GUID->appendChild($xmlFile->createElement('Nom', $rs['Nom']));
    $GUID->appendChild($xmlFile->createElement('Email', $rs['Email']));
    $GUID->appendChild($xmlFile->createElement('IsSociete', $rs['IsSociete']));

    $formulaire->appendChild($clients = $xmlFile->createElement('clients'));

    $clients->appendChild($xmlFile->createElement('IdClient', $rs['IdClient']));
    $clients->appendChild($xmlFile->createElement('Civilite', $rs['Civilite']));
    $clients->appendChild($xmlFile->createElement('Prenom', $rs['Prenom']));
    $clients->appendChild($xmlFile->createElement('Nom', $rs['Nom']));
    $clients->appendChild($xmlFile->createElement('PosteOccupe', $rs['PosteOccupe']));
    $clients->appendChild($xmlFile->createElement('Adresse1', $rs['Adresse1']));
    $clients->appendChild($xmlFile->createElement('Adresse2', $rs['Adresse2']));
    $clients->appendChild($xmlFile->createElement('TelephoneFixe', $rs['TelephoneFixe']));
    $clients->appendChild($xmlFile->createElement('TelephonePortable', $rs['TelephonePortable']));
    $clients->appendChild($xmlFile->createElement('GUID', $rs['GUID']));
    $clients->appendChild($xmlFile->createElement('CodePostal', $rs['CodePostal']));
    $clients->appendChild($xmlFile->createElement('NomVille', $rs['NomVille']));
    $clients->appendChild($xmlFile->createElement('NomSociete', $rs['NomSociete']));
    $clients->appendChild($xmlFile->createElement('TelephoneFixe', $rs['TelephoneFixe']));
    $clients->appendChild($xmlFile->createElement('TelephoneSociete', $rs['TelephoneSociete']));
}


$xmlFile->formatOutput = true;

$xmlFile->save('formualire.xml');

?>
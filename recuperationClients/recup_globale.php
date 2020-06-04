


<!--<!DOCTYPE format_xml SYSTEM "format_xml.dtd">-->

<?php
// Connexion à la base de données (identifiant pour un serveur local)
$bd = new PDO('mysql:host=localhost;dbname=formulaire', 'root', '');

// Requête de sélection des enregistrements dans la table
$r = $bd->query('SELECT * FROM clients ');


$xmlFile = new DOMDocument('1.0', 'utf-8');
$xmlFile->appendChild($formulaire = $xmlFile->createElement('formulaire'));

while($rs = $r->fetch(PDO::FETCH_ASSOC)){

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
    $clients->appendChild($xmlFile->createElement('TelephoneDirect', $rs['TelephoneDirect']));
    $clients->appendChild($xmlFile->createElement('TelephoneSociete', $rs['TelephoneSociete']));
    $clients->appendChild($xmlFile->createElement('Email', $rs['Email']));
}


$xmlFile->formatOutput = true;

$xmlFile->save('formualireGlobale.xml');

?>

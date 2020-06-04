<?php
require ('bdd.php');


// si dans l'url la clé compared existe alors on récupère le GUID dans la table clients
if (array_key_exists('compared', $_GET)) {
    $requeteCompared = $bdd->prepare('SELECT GUID FROM clients WHERE GUID = :GUID');
    $requeteCompared->execute(array(':GUID' => $_GET['q']));
    $compared = $requeteCompared->fetch();
    echo json_encode($compared);
} else if (array_key_exists('q', $_GET)) {  // si dans l'url la clé q existe alors on récupère IsSociete dans la table guid
    $requeteurl = $bdd->prepare('SELECT * FROM guid WHERE GUID = :GUID');
    $requeteurl->execute(array(':GUID' => $_GET['q']));
    $url = $requeteurl->fetch();
    echo json_encode($url);
}

// si dans l'url la clé submit existe alors on envoie les données du formulaire dans la table clients
if (array_key_exists('submit', $_GET)) {
    if (isset($url['IsSociete'])) {
        $civilite = $_POST['civilite'];
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        if (isset($_POST['posteOccupe'])) {
            $posteOccupe = htmlspecialchars($_POST['posteOccupe']);
        } else {
            $posteOccupe = null;
        }
        $adresse1 = htmlspecialchars($_POST['adresse1']);
        if (isset($_POST['adresse2'])) {
            $adresse2 = htmlspecialchars($_POST['adresse2']);
        } else {
            $adresse2 = null;
        }
        if (isset($_POST['telephoneFixe'])) {
            $telephoneFixe = htmlspecialchars($_POST['telephoneFixe']);
        } else {
            $telephoneFixe = null;
        }
        if (isset($_POST['telephonePortable'])) {
            $telephonePortable = htmlspecialchars($_POST['telephonePortable']);
        } else {
            $telephonePortable = null;
        }
        $gUID = $_GET['q'];
        $codePostal = htmlspecialchars($_POST['codePostal']);
        $nomVille = htmlspecialchars($_POST['ville']);
        if (isset($_POST['nomSociete'])) {
            $nomSociete = htmlspecialchars($_POST['nomSociete']);
        } else {
            $nomSociete = null;
        }
        if (isset($_POST['telephoneDirect'])) {
            $telephoneDirect = htmlspecialchars($_POST['telephoneDirect']);
        } else {
            $telephoneDirect = null;
        }
        if (isset($_POST['telephoneSociete'])) {
            $telephoneSociete = htmlspecialchars($_POST['telephoneSociete']);
        } else {
            $telephoneSociete = null;
        }
        $email = htmlspecialchars($_POST['email']);

        $requetePostDonnee = $bdd->prepare('INSERT INTO clients (Civilite, Prenom, Nom, PosteOccupe, Adresse1, Adresse2, TelephoneFixe, TelephonePortable, GUID, CodePostal, NomVille, NomSociete, TelephoneDirect, TelephoneSociete, Email, IsOut) VALUES (:Civilite, :Prenom, :Nom, :PosteOccupe, :Adresse1, :Adresse2, :TelephoneFixe, :TelephonePortable, :GUID, :CodePostal, :NomVille, :NomSociete, :TelephoneDirect, :TelephoneSociete, :Email, 0)');
        $requetePostDonnee->execute(array(
            'Civilite' => $civilite,
            'Prenom' => $prenom,
            'Nom' => $nom,
            'PosteOccupe' => $posteOccupe,
            'Adresse1' => $adresse1,
            'Adresse2' => $adresse2,
            'TelephoneFixe' => $telephoneFixe,
            'TelephonePortable' => $telephonePortable,
            'GUID' => $gUID,
            'CodePostal' => $codePostal,
            'NomVille' => $nomVille,
            'NomSociete' => $nomSociete,
            'TelephoneDirect' => $telephoneDirect,
            'TelephoneSociete' => $telephoneSociete,
            'Email' => $email

        ));
    }
}

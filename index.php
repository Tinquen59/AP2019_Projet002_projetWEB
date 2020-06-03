<?php
require ('assets/requete/bdd.php');

$requeteGuid = $bdd->prepare('SELECT * FROM guid WHERE GUID = :GUID');
$requeteGuid->execute(array(':GUID' => $_GET['q']));
$guid = $requeteGuid->fetch();

$requeteCompared = $bdd->prepare('SELECT GUID FROM clients WHERE GUID = :GUID');
$requeteCompared->execute(array(':GUID' => $_GET['q']));
$compared = $requeteCompared->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>ProjetWeb</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
<body>

<div class="col-2"></div>

    <div class="container col-10">

        <div class="col-12">
            <div class="header">
                <img src="assets/images/logo_connectLife.png" class="logoConnectLife" alt="logo connectLife">
            </div>
            <div class="formulaire">

                <?php if (isset($guid['IsSociete']) && $guid['IsSociete'] == 0): ?>
                    <div id="messageDebut" class="mt-5">
                        <?php if (isset($compared['GUID']) == $_GET['q']) : ?>
                        <div class="alert alert-warning">
                            <h2>Cher client,</h2>
                            <p>Formulaire déjà rempli, pour toutes autres questions</p>
                            <p>veuillez vous rapprocher de notre service mass mailing pour des informations complémentaires.</p>
                        </div>
                        <?php else: ?>
                        <div class="alert alert-secondary">
                            <h2>Cher Client,</h2>
                            <p>Dans le but d'améliorer les services que nous pouvons vous offrir, et ainsi mieux comprendre vos besoins, un questionnaire est mit à votre disposition.</p>
                            <p>Soucieux de votre bien-être, nous vous offrons un bon d'achat de 20 euros à valoir sans limite de temps.</p>
                            <p>Vous trouverez ci-joint le bon d'achat ainsi que le formulaire à remplir</p>
                            <p>Nous vous prions de bien agréer Monsieur, Madame nos salutations distinguées.</p>
                            <div class="text-center">
                                <button id="goForm" class="btn btn-primary mt-3">Bon d'achat</button>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div id="mailIncorect" class="text-center alert alert-warning">
                    </div>

                    <div id="submitSuccess" class="text-center alert alert-success">
                        Nous vous remercions d'avoir rempli le formulaire
                    </div>

                    <div id="submitError" class="text-center alert alert-danger">
                        Le formulaire a déjà été envoyé
                    </div>

                    <form id="formDisplay" class="" action="">

                        <div id="civilite" class="form-group d-flex flex-column flex-sm-row">
                            <div class="form-check form-check-inline col-sm-4">
                                <span>Civilité * :</span>
                            </div>
                            <div class="col-sm-8 pl-0">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="madame" name="civilite" value="madame">
                                    <label class="form-check-label" for="madame">Madame</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="monsieur" name="civilite" value="monsieur">
                                    <label class="form-check-label" for="monsieur">Monsieur</label>
                                </div>
                                <div id="messageErrorCivilite" class="m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row divError">
                            <label class="col-sm-4" for="prenom">Prénom * :</label>
                            <div class="col-sm-8">
                                <input id="prenom" name="prenom" class="form-control" type="text">
                                <div class="messageError m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row divError">
                            <label class="col-sm-4" for="nom">Nom * :</label>
                            <div class="col-sm-8">
                                <input id="nom" name="nom" class="form-control" type="text">
                                <div class="messageError m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row divError">
                            <label class="col-sm-4" for="Adresse1">Adresse 1 * :</label>
                            <div class="col-sm-8">
                                <input id="Adresse1" name="adresse1" class="form-control" type="text">
                                <div class="messageError m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="Adresse2">Adresse 2 :</label>
                            <div class="col-sm-8">
                                <input id="Adresse2" name="adresse2" class="form-control" minlength="2" maxlength="100"  type="text">
                            </div>
                        </div>

                        <div class="form-group row divError">
                            <label class="col-sm-4" for="codePostal">codePostal * :</label>
                            <div class="col-sm-4">
                                <input id="codePostal" name="codePostal" class="form-control" maxlength="5"  type="text">
                                <div class="messageError m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="ville">Ville * :</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="ville" id="ville">
                                    <option value=""></option>
                                </select>
                                <div id="messageErrorVille" class="m-0"></div>
                            </div>
                        </div>

                        <div class="col-sm-8 pl-0">
                            <p class="mb-0">Remplissez au moins un numéro de téléphone *</p>
                            <div id="messageErrorNumTelParticulier" class="m-0"></div>
                        </div>

                        <div class="form-group row mt-3">
                            <label class="col-sm-4" for="telFixe">Téléphone fixe :</label>
                            <div class="col-sm-8">
                                <input id="telFixe" name="telephoneFixe" class="form-control" type="text">
                                <div class="messageErrorTel m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="telPortable">Téléphone portable :</label>
                            <div class="col-sm-8">
                                <input id="telPortable" name="telephonePortable" class="form-control" type="text">
                                <div class="messageErrorTel m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row divError">
                            <label class="col-sm-4" for="mail">Email * :</label>
                            <div class="col-sm-8">
                                <input id="mail" name="email" class="form-control"  minlength="2" maxlength="100" type="text">
                                <div class="messageError m-0"></div>
                            </div>
                        </div>

                        <div>
                            <p class="font-italic text-right">* : champ à saisie obligatoire</p>
                        </div>

                        <button class="btn btn-outline-light float-right" type="submit">Valider</button>
                    </form>

                <?php elseif (isset($guid['IsSociete']) && $guid['IsSociete'] == 1): ?>
                    <div id="messageDebut" class="mt-5">
                        <?php if (isset($compared['GUID']) == $_GET['q']) : ?>
                            <div class="alert alert-warning">
                                <h2>Cher client,</h2>
                                <p>Formulaire déjà rempli, pour toutes autres questions</p>
                                <p>veuillez vous rapprocher de notre service mass mailing pour des informations complémentaires.</p>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-secondary">
                                <h2>Cher Client,</h2>
                                <p>Dans le but d'améliorer les services que nous pouvons vous offrir, et ainsi mieux comprendre vos besoins, un questionnaire est mit à votre disposition.</p>
                                <p>Soucieux de votre bien-être, nous vous offrons un bon d'achat de 20 euros à valoir sans limite de temps.</p>
                                <p>Vous trouverez ci-joint le bon d'achat ainsi que le formulaire à remplir</p>
                                <p>Nous vous prions de bien agréer Monsieur, Madame nos salutations distinguées.</p>
                                <div class="text-center">
                                    <button id="goForm" class="btn btn-primary mt-3">Bon d'achat</button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div id="mailIncorect" class="text-center alert alert-warning">
                    </div>

                    <div id="submitSuccess" class="text-center alert alert-success">
                        Nous vous remercions d'avoir rempli le formulaire
                    </div>

                    <div id="submitError" class="text-center alert alert-danger">
                        Le formulaire a déjà été envoyé
                    </div>

                    <form id="formDisplay" action="">

                        <div id="civilite" class="form-group d-flex flex-column flex-sm-row">
                            <div class="form-check form-check-inline col-sm-4">
                                <span>Civilité * :</span>
                            </div>
                            <div class="col-sm-8 pl-0">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="madame" name="civilite" value="madame">
                                    <label class="form-check-label" for="madame">Madame</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="monsieur" name="civilite" value="monsieur">
                                    <label class="form-check-label" for="monsieur">Monsieur</label>
                                </div>
                                <div id="messageErrorCivilite" class="m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row divError">
                            <label class="col-sm-4" for="nom">Nom * :</label>
                            <div class="col-sm-8">
                                <input id="nom" name="nom" class="form-control" type="text">
                                <div class="messageError m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row divError">
                            <label class="col-sm-4" for="prenom">Prénom * :</label>
                            <div class="col-sm-8">
                                <input id="prenom" name="prenom" class="form-control" type="text">
                                <div class="messageError m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row divError">
                            <label class="col-sm-4" for="nomSociete">Nom de la société * :</label>
                            <div class="col-sm-8">
                                <input id="nomSociete" name="nomSociete" class="form-control"  minlength="2" maxlength="100" type="text">
                                <div class="messageError m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row divError">
                            <label class="col-sm-4" for="posteOccupe">Poste occupé * :</label>
                            <div class="col-sm-8">
                                <input id="posteOccupe" name="posteOccupe" class="form-control" minlength="2" maxlength="100"  type="text">
                                <div class="messageError m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row divError">
                            <label class="col-sm-4" for="Adresse1">Adresse 1 * :</label>
                            <div class="col-sm-8">
                                <input id="Adresse1" name="adresse1" class="form-control" type="text">
                                <div class="messageError m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="Adresse2">Adresse 2 :</label>
                            <div class="col-sm-8">
                                <input id="Adresse2" name="Adresse2" class="form-control" minlength="2" maxlength="100"  type="text">
                            </div>
                        </div>

                        <div class="form-group row divError">
                            <label class="col-sm-4" for="codePostal">codePostal * :</label>
                            <div class="col-sm-4">
                                <input id="codePostal" name="codePostal" class="form-control" maxlength="5"  type="text">
                                <div class="messageError m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4" for="ville">Ville * :</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="ville" id="ville">
                                    <option value=""></option>
                                </select>
                                <div id="messageErrorVille" class="m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row divError">
                            <label class="col-sm-4" for="telSociete">Téléphone société * :</label>
                            <div class="col-sm-8">
                                <input id="telSociete" name="telephoneSociete" class="form-control" type="text">
                                <div class="messageError m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row divError">
                            <label class="col-sm-4" for="telDirecte">Téléphone Direct * :</label>
                            <div class="col-sm-8">
                                <input id="telDirecte" name="telephoneDirect" class="form-control" type="tel">
                                <div class="messageError m-0"></div>
                            </div>
                        </div>

                        <div class="form-group row divError">
                            <label class="col-sm-4" for="mail">Email * :</label>
                            <div class="col-sm-8">
                                <input id="mail" name="email" class="form-control"  minlength="2" maxlength="100" type="text">
                                <div class="messageError m-0"></div>
                            </div>
                        </div>

                        <div>
                            <p class="font-italic text-right">* : champ à saisie obligatoire</p>
                        </div>

                        <button class="btn btn-outline-light float-right" type="submit">Valider</button>
                    </form>

                <?php elseif (!isset($guid['IsSociete'])): ?>
                    <div class="alert alert-danger mt-5 font-italic">
                        <h2>Le lien que vous venez d'utiliser est incorrect</h2>
                        <p>Suggestions :</p>
                        <p class="text-center">Contacter le service de mass mailing pour plus d'information</p>
                    </div>
                <?php endif; ?>


            </div>
        </div>

    </div>

<div class="col-2"></div>


    <script src="assets/js/formulaire.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>

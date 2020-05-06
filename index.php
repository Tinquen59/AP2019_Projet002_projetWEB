<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>ProjetWeb</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <style>
            input[type="radio"] {
                -webkit-appearance: checkbox; /* Chrome, Safari, Opera */
                -moz-appearance: checkbox;    /* Firefox */
                -ms-appearance: checkbox;     /* not currently supported */
            }
        </style>
    </head>
<body>

<div class="col-2"></div>

    <div class="container col-10">

        <div class="col-12">
            <div class="header">
                <img src="assets/images/logo_connectLife.png" class="logoConnectLife" alt="logo connectLife">
            </div>
            <div class="formulaire">

                <form action="">

                    <div id="civilite" class="form-group d-flex flex-column flex-sm-row">
                        <div class="form-check form-check-inline col-sm-4">
                            <span>Civilité * :</span>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="madame" name="radio" value="madame">
                            <label class="form-check-label" for="madame">Madame</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="monsieur" name="radio" value="monsieur">
                            <label class="form-check-label" for="monsieur">Monsieur</label>
                        </div>
                    </div>

                    <!--         POUR LE PARTICULIER INVERSER LE NOM ET LE PRENOM          -->

                    <div class="form-group row divError">
                        <label class="col-sm-4" for="nom">Nom * :</label>
                        <div class="col-sm-8">
                            <input id="nom" class="form-control" type="text">
                            <div class="messageError m-0"></div>
                        </div>
                    </div>

                    <div class="form-group row divError">
                        <label class="col-sm-4" for="prenom">Prénom * :</label>
                        <div class="col-sm-8">
                            <input id="prenom" class="form-control" type="text">
                            <div class="messageError m-0"></div>
                        </div>
                    </div>

                    <!--         POUR LE PARTICULIER           -->

                    <div class="form-group row divError">
                        <label class="col-sm-4" for="nomSociete">Nom de la société * :</label>
                        <div class="col-sm-8">
                            <input id="nomSociete" class="form-control"  minlength="2" maxlength="100" type="text">
                            <div class="messageError m-0"></div>
                        </div>
                    </div>

                    <div class="form-group row divError">
                        <label class="col-sm-4" for="posteOccupe">Poste occupé * :</label>
                        <div class="col-sm-8">
                            <input id="posteOccupe" class="form-control" minlength="2" maxlength="100"  type="text">
                            <div class="messageError m-0"></div>
                        </div>
                    </div>

                    <!--         FIN            -->

                    <div class="form-group row divError">
                        <label class="col-sm-4" for="Adresse1">Adresse 1 * :</label>
                        <div class="col-sm-8">
                            <input id="Adresse1" class="form-control" type="text">
                            <div class="messageError m-0"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4" for="Adresse2">Adresse 2 :</label>
                        <div class="col-sm-8">
                            <input id="Adresse2" class="form-control" minlength="2" maxlength="100"  type="text">
                        </div>
                    </div>

                    <div class="form-group row divError">
                        <label class="col-sm-4" for="codePostal">codePostal * :</label>
                        <div class="col-sm-4">
                            <input id="codePostal" class="form-control" maxlength="5"  type="text">
                            <div class="messageError m-0"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4" for="ville">Ville :</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="ville" id="ville">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                    <!--         POUR LE PARTICULIER           -->

                    <p>Remplissez au moins un numéro de téléphone *</p>

                    <div class="form-group row">
                        <label class="col-sm-4" for="telFixe">Téléphone fixe :</label>
                        <div class="col-sm-8">
                            <input id="telFixe" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4" for="telPortable">Téléphone portable :</label>
                        <div class="col-sm-8">
                            <input id="telPortable" class="form-control" minlength="2" maxlength="100" type="text">
                        </div>
                    </div>

                    <!--         FIN            -->

                    <!--         POUR LE PROFESSIONNEL           -->

                    <div class="form-group row divError">
                        <label class="col-sm-4" for="telSociete">Téléphone société * :</label>
                        <div class="col-sm-8">
                            <input id="telSociete" class="form-control" type="tel">
                            <div class="messageError m-0"></div>
                        </div>
                    </div>

                    <div class="form-group row divError">
                        <label class="col-sm-4" for="telDirecte">Téléphone Directe * :</label>
                        <div class="col-sm-8">
                            <input id="telDirecte" class="form-control" type="tel">
                            <div class="messageError m-0"></div>
                        </div>
                    </div>

                    <!--         FIN            -->

                    <div class="form-group row divError">
                        <label class="col-sm-4" for="mail">Email * :</label>
                        <div class="col-sm-8">
                            <input id="mail" class="form-control"  minlength="2" maxlength="100" type="text">
                            <p class="messageError"></p>
                        </div>
                    </div>

                    <div>
                        <p class="font-italic text-right">* : champ obligatoire</p>
                    </div>

                    <button class="btn btn-outline-light float-right" type="submit">Valider</button>

                </form>

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

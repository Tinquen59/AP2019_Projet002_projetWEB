// la plupart des erreurs pour le formulaire du particulier
// permet de vérifier si le champ est correct sinon on affiche le message d'erreur
let typeErrorsParticulier = [
    {
        regexVerif: /[a-z]{2}/i,
        nameError: 'un prénom valide'
    },
    {
        regexVerif: /[a-z]{2}/i,
        nameError: 'un nom valide'
    },
    {
        regexVerif: /\d+ [a-z]+/i,
        nameError: 'une adresse'
    },
    {
        regexVerif: /^\d{5}$/i,
        nameError: 'un code postal existant'
    },
    {
        regexVerif: /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/,
        nameError: 'un email valide'
    }
]

// la plupart des erreurs pour le formulaire du professionnel
// permet de vérifier si le champ est correct sinon on affiche le message d'erreur
let typeErrorsProfessionnel = [
    {
        regexVerif: /[a-z]{2}/i,
        nameError: 'un nom valide'
    },
    {
        regexVerif: /[a-z]{2}/i,
        nameError: 'un prénom valide'
    },
    {
        regexVerif: /[a-z]+/i,
        nameError: 'un nom de société valide'
    },
    {
        regexVerif: /[a-z]{3}/i,
        nameError: 'un nom de poste valide'
    },
    {
        regexVerif: /\d+ [a-z]+/i,
        nameError: 'une adresse'
    },
    {
        regexVerif: /^\d{5}$/i,
        nameError: 'un code postal existant'
    },
    {
        regexVerif: /^\d{10}$/i,
        nameError: 'un numéro de téléphone valide'
    },
    {
        regexVerif: /^\d{10}$/i,
        nameError: 'un numéro de téléphone valide'
    },
    {
        regexVerif: /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/,
        nameError: 'un email valide'
    }
]


// Permet de vérifier si la civilité est coché
function checkCivilite() {
    let checkMadame = document.getElementById('madame')
    let checkMonsieur = document.getElementById('monsieur')
    let messageErrorCivilite = document.getElementById('messageErrorCivilite')

    //gère les messages d'erreur
    if (checkMadame.checked === false && checkMonsieur.checked === false) {
        checkMadame.style.borderColor = '#dc3545'   // change la couleur de la bordure en rouge
        checkMonsieur.style.borderColor = '#dc3545'// change la couleur de la bordure en rouge
        countError.push(error)
        messageErrorCivilite.innerHTML = '<p class="text-danger m-0">Veuillez indiquer votre civilité.</p>' // affiche le message d'erreur
    } else {
        checkMadame.style.borderColor = '#fff'  // change la couleur de la bordure en blanc
        checkMonsieur.style.borderColor = '#fff'    // change la couleur de la bordure en blanc
        messageErrorCivilite.innerHTML = ''
    }
}


// Vérifie la ville
function verifVille() {
    let selectVille = document.getElementById('ville')
    let messageErrorVille = document.getElementById('messageErrorVille')

    // gère les messages d'erreur
    if (selectVille.value.length < 2) {
        selectVille.style.borderColor = '#dc3545'   // change la couleur de la bordure en rouge
        countError.push(error)  // ajoute une erreur dans le tableau countError
        messageErrorVille.innerHTML = '<p class="text-danger mb-0">Veuillez choisir de ville dans la liste.</p>'    // affiche le message d'erreur
    } else {
        messageErrorVille.innerHTML = ''
        selectVille.style.borderColor = 'green' // change la couleur de la bordure en vert
    }
}
// vérifie pour le particulier si au moins un numéro est rempli
function verifNumTelParticulier() {
    let messageErrorNumTelParticulier = document.getElementById('messageErrorNumTelParticulier')
    let inputTelFixe = document.getElementById('telFixe')
    let inputTelPortable = document.getElementById('telPortable')
    let messageErrorTel = document.getElementsByClassName('messageErrorTel')
    let regexVerifTel = /^\d{10}$/i // va permettre de vérifier le champ numéro de téléphone avec les caractères souhaités

    if (!regexVerifTel.test(inputTelFixe.value) && !regexVerifTel.test(inputTelPortable.value)) {   // vérifie si aucun les deux input ne sont pas corrects
        messageErrorNumTelParticulier.innerHTML = '<p class="text-danger">Veuillez indiquer au moins un numéro de téléphone.</p>'
        messageErrorTel[0].innerHTML = '<p class="text-danger m-0">un numéro de téléphone valide</p>'
        inputTelFixe.style.borderColor = '#dc3545'
        messageErrorTel[1].innerHTML = '<p class="text-danger m-0">un numéro de téléphone valide</p>'
        inputTelPortable.style.borderColor = '#dc3545'
        countError.push(error)
    } else if (regexVerifTel.test(inputTelFixe.value) && !regexVerifTel.test(inputTelPortable.value) || !regexVerifTel.test(inputTelFixe.value) && regexVerifTel.test(inputTelPortable.value)) { // vérifie si au moins un des deux input est correct
        messageErrorNumTelParticulier.innerHTML = ''
        messageErrorTel[0].innerHTML = ''
        inputTelFixe.style.borderColor = 'green'
        messageErrorTel[1].innerHTML = ''
        inputTelPortable.style.borderColor = 'green'
    }
}

// permet d'envoyer le formulaire dans la base de donnée
function envoiFormulaire(elementEmail) {
    let compareGUID = url.split('=')    // Permet de récupérer que le GUID dans l'url sans la variable
    window.scrollTo(0, 0)   // Permet de remonter en haut de la page sans recharger la page

    // envoie le formulaire si le te tableau countError est vide
    if (countError.length === 0) {
        const xhrCompared = new XMLHttpRequest()
        xhrCompared.open('GET', 'assets/requete/gestionnaire.php' + url + '&compared')
        xhrCompared.onload = function () {
            let responseCompared = JSON.parse(this.responseText)

            if (elementEmail !== document.getElementById('mail').value) {
                formDisplay.style.display = 'none'
                mailIncorect.style.display = 'block'
                mailIncorect.innerHTML = `
                        <h4 class="text-center">${document.getElementById('nom').value} ${document.getElementById('prenom').value}</h4>
                        <p>L'adresse mail que vous avez saisie ne correspond pas à celle enregistrée dans notre base de données</p>
                        <p>Vous pouvez contacter notre service de mass-mailing pour avoir plus d'informations</p>
                        <button id="goBackToForm" class="btn btn-primary">Retour au formulaire</button>
                    `
                mailIncorect.addEventListener('click', () => {
                    formDisplay.style.display = 'block'
                    mailIncorect.style.display = 'none'
                    submitError.style.display = 'none'
                    document.getElementById('mail').value = ''
                })
            } else
                if (compareGUID[1] === responseCompared.GUID) {
                    formDisplay.style.display = 'none'
                    submitError.style.display = 'block'     // affiche une erreur si le formulaire a déjà été envoyer dans la base de donnée
                    submitSuccess.style.display = 'none'
                    mailIncorect.style.display = 'none'
                } else {
                    let formData = new FormData(document.querySelector("form"))     //si le formulaire n'a pas encore été envoyé dans la base de donnée

                    let xhrPost = new XMLHttpRequest()
                    xhrPost.open('POST', 'assets/requete/gestionnaire.php' + url + '&submit')   // permet d'envoyer les données à la base de donnée
                    xhrPost.send(formData)
                    formDisplay.style.display = 'none'
                    submitSuccess.style.display = 'block'
                    submitError.style.display = 'none'
                    mailIncorect.style.display = 'none'
                    window.scrollTo(0, 0)   // Permet de remonter tout en haut de la page
                }
        }
        xhrCompared.send()
    }
}


let url = window.location.search // permet de recuperer dans l'url "q=(le GUID)"

const inputCodepostal = document.getElementById('codePostal')
const selectVille = document.getElementById('ville')

let countError = [] // Si le tableau est vide lors de l'envoi du formulaire alors on ajoute les informations à la base de donnée
let error = 'Une erreur' // si il y a une erreur on ajoute error dans le tableau countError


document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault()

    const xhr = new XMLHttpRequest()

    xhr.open('GET', 'assets/requete/gestionnaire.php' + url)    // permet de récupérer IsSociete de la base de donnée

    xhr.onload = function () {
        let resultatIsSociete = JSON.parse(this.responseText)   // transforme le JSON reçu en javascript

        // permet de gérer les erreurs ou d'envoyer le formualire à la base de donnée selon le formulaire
        if (resultatIsSociete.IsSociete == 0) {
            const divFormGroup = document.querySelectorAll('div .divError')

            countError = [] // à chaque envoie du formulaire on réinitialise le tableau countError

            // on répète l'opération tant qu'il y a une class html divError dans une div
            for (let i = 0; i < divFormGroup.length; i++) {
                if (!typeErrorsParticulier[i].regexVerif.test(divFormGroup[i].querySelector('input').value)) {
                    divFormGroup[i].querySelector('input').style.borderColor = '#dc3545'    // change la couleur de la bordure en rouge
                    divFormGroup[i].querySelector('.messageError').innerHTML = `<p class="text-danger m-0">Veuillez indiquer ${typeErrorsParticulier[i].nameError}</p>` // affiche un message d'erreur en fonction de l'input incorect
                    countError.push(error)
                } else {
                    divFormGroup[i].querySelector('input').style.borderColor = 'green'
                    divFormGroup[i].querySelector('.messageError').innerHTML = ''
                }
            }
            checkCivilite()
            verifVille()
            verifNumTelParticulier()

            envoiFormulaire(resultatIsSociete.Email)

        } else if (resultatIsSociete.IsSociete == 1) {  // même chose que précédemment mais pour le formulaire du professionelle
            const divFormGroup = document.querySelectorAll('div .divError')

            countError = []

            for (let i = 0; i < divFormGroup.length; i++) {
                if (!typeErrorsProfessionnel[i].regexVerif.test(divFormGroup[i].querySelector('input').value)) {
                    divFormGroup[i].querySelector('input').style.borderColor = '#dc3545'
                    divFormGroup[i].querySelector('.messageError').innerHTML = `<p class="text-danger m-0">Veuillez indiquer ${typeErrorsProfessionnel[i].nameError}</p>`
                    countError.push(error)
                } else {
                    divFormGroup[i].querySelector('input').style.borderColor = 'green'
                    divFormGroup[i].querySelector('.messageError').innerHTML = ''
                }
            }
            checkCivilite()
            verifVille()

            envoiFormulaire(resultatIsSociete.Email)

        }
    }

    xhr.send()
})


// permet d'afficher les villes
inputCodepostal.addEventListener('input', () => {
    const xhr = new XMLHttpRequest()

    xhr.open('GET', 'https://unpkg.com/codes-postaux@3.3.0/codes-postaux.json') // recupère les codes postaux, villes... via une API

    xhr.onload = function () {
        let resultatCodePostaux = JSON.parse(this.responseText) // transforme le JSON en javascript

        resultatCodePostaux.forEach(function (resultatCodePostal) {
            if (inputCodepostal.value === resultatCodePostal.codePostal && inputCodepostal.value.length === 5) {
                selectVille.innerHTML += `<option>${resultatCodePostal.nomCommune}</option>`    // affiche la ville que si le code postal est valide
            } else if (inputCodepostal.value.length !== 5) {
                selectVille.innerHTML = '<option></option>' // si le code postal est incorect alors on n'affiche rien
            }
        })
    }

    xhr.send()
})

let submitError = document.getElementById('submitError')
submitError.style.display = 'none'

let submitSuccess = document.getElementById('submitSuccess')
submitSuccess.style.display = 'none'


let formDisplay = document.getElementById('formDisplay')
let goForm = document.getElementById('goForm')
let messageDebut = document.getElementById('messageDebut')
let mailIncorect = document.getElementById('mailIncorect')

mailIncorect.style.display = 'none'
formDisplay.style.display = 'none'

goForm.addEventListener('click', () => {
    messageDebut.style.display = 'none'
    formDisplay.style.display = 'block'
})

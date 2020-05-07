// les erreurs pour le formulaire du particulier
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

// les erreurs pour le formulaire du professionnel
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


function checkCivilite() {
    let checkMadame = document.getElementById('madame')
    let checkMonsieur = document.getElementById('monsieur')
    let messageErrorCivilite = document.getElementById('messageErrorCivilite')

    if (checkMadame.checked === false && checkMonsieur.checked === false) {
        checkMadame.style.borderColor = '#dc3545'
        checkMonsieur.style.borderColor = '#dc3545'
        messageErrorCivilite.innerHTML = '<p class="text-danger m-0">Veuillez indiquer votre civilité.</p>'
    } else {
        checkMadame.style.borderColor = '#fff'
        checkMonsieur.style.borderColor = '#fff'
        messageErrorCivilite.innerHTML = ''
    }
}

function verifVille() {
    let selectVille = document.getElementById('ville')
    let messageErrorVille = document.getElementById('messageErrorVille')

    if (selectVille.value.length < 2) {
        selectVille.style.borderColor = '#dc3545'
        messageErrorVille.innerHTML = '<p class="text-danger">Veuillez choisir de ville dans la liste.</p>'
    } else {
        messageErrorVille.innerHTML = ''
        selectVille.style.borderColor = 'green'
    }
}

function verifNumTelParticulier() {
    let messageErrorNumTelParticulier = document.getElementById('messageErrorNumTelParticulier')

    if (document.getElementById('telFixe').value.length < 10 || document.getElementById('telPortable').value.length < 10) {
        messageErrorNumTelParticulier.innerHTML = '<p class="text-danger">Veuillez indiquer au moins un numéro de téléphone.</p>'
    } else {
        messageErrorNumTelParticulier.innerHTML = ''
    }
}


let url = window.location.search // permet de recuperer dans l'url "idUser"

const inputCodepostal = document.getElementById('codePostal')
const selectVille = document.getElementById('ville')


document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault()

    const xhr = new XMLHttpRequest()

    xhr.open('GET', 'assets/requete/gestionnaire.php' + url)

    xhr.onload = function () {
        let resultatIsSociete = JSON.parse(this.responseText)

        if (resultatIsSociete.IsSociete == 0) {
            const divFormGroup = document.querySelectorAll('div .divError')

            for (let i = 0; i < divFormGroup.length; i++) {
                if (!typeErrorsParticulier[i].regexVerif.test(divFormGroup[i].querySelector('input').value)) {
                    divFormGroup[i].querySelector('input').style.borderColor = '#dc3545'
                    divFormGroup[i].querySelector('.messageError').innerHTML = `<p class="text-danger m-0">Veuillez indiquer ${typeErrorsParticulier[i].nameError}</p>`
                } else {
                    divFormGroup[i].querySelector('input').style.borderColor = 'green'
                    divFormGroup[i].querySelector('.messageError').innerHTML = ''
                }
            }
            checkCivilite()
            verifVille()
            verifNumTelParticulier()
        } else if (resultatIsSociete.IsSociete == 1) {
            const divFormGroup = document.querySelectorAll('div .divError')

            for (let i = 0; i < divFormGroup.length; i++) {
                if (!typeErrorsProfessionnel[i].regexVerif.test(divFormGroup[i].querySelector('input').value)) {
                    divFormGroup[i].querySelector('input').style.borderColor = '#dc3545'
                    divFormGroup[i].querySelector('.messageError').innerHTML = `<p class="text-danger m-0">Veuillez indiquer ${typeErrorsProfessionnel[i].nameError}</p>`
                } else {
                    divFormGroup[i].querySelector('input').style.borderColor = 'green'
                    divFormGroup[i].querySelector('.messageError').innerHTML = ''
                }
            }
            checkCivilite()
            verifVille()
        }
    }

    xhr.send()
})


inputCodepostal.addEventListener('input', () => {
    const xhr = new XMLHttpRequest()

    xhr.open('GET', 'https://unpkg.com/codes-postaux@3.3.0/codes-postaux.json') // recupère les codes postaux via une API

    xhr.onload = function () {
        let resultatCodePostaux = JSON.parse(this.responseText)

        resultatCodePostaux.forEach(function (resultatCodePostal) {
            if (inputCodepostal.value === resultatCodePostal.codePostal && inputCodepostal.value.length === 5) {
                selectVille.innerHTML += `<option>${resultatCodePostal.nomCommune}</option>`
            } else if (inputCodepostal.value.length !== 5) {
                selectVille.innerHTML = '<option></option>'
            }
        })
    }

    xhr.send()
})

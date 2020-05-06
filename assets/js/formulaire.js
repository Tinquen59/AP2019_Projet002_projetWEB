let typeErrors = [
    {
        regexVerif: /[a-z]{2}/i,
        nameError: 'un nom valide'
    },
    {
        regexVerif: /[a-z]{2}/i,
        nameError: 'un prenom valide'
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

const inputCodepostal = document.getElementById('codePostal')
const selectVille = document.getElementById('ville')

document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault()

    const divFormGroup = document.querySelectorAll('div .divError')

    for (let i = 0; i < divFormGroup.length; i++) {
        if (!typeErrors[i].regexVerif.test(divFormGroup[i].querySelector('input').value)) {
            divFormGroup[i].querySelector('input').style.borderColor = 'red'
            divFormGroup[i].querySelector('.messageError').innerHTML = `<p class="text-danger m-0">Veuillez indiquer ${typeErrors[i].nameError}</p>`
        } else {
            divFormGroup[i].querySelector('input').style.borderColor = 'green'
            divFormGroup[i].querySelector('.messageError').innerHTML = ''
        }
    }

})


inputCodepostal.addEventListener('input', () => {
    const xhr = new XMLHttpRequest()

    xhr.open('GET', 'https://unpkg.com/codes-postaux@3.3.0/codes-postaux.json')

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


/*const checkCivilite = document.getElementById('civilite')

const checkMadame = document.getElementById('madame')
const checkMonsieur = document.getElementById('monsieur')

// console.log(checkMadame.checked)
// console.log(checkMonsieur.checked)

checkCivilite.addEventListener('input', () => {
    if (checkMadame.checked === true && checkMonsieur.checked === false) {
        console.warn('madame')
        if (checkMonsieur.checked === true) {
            console.error('madame false')
            checkMadame.checked = false
        }
    } else if (checkMonsieur.checked === true && checkMadame.checked === false) {
        console.warn('monsieur')
        if (checkMadame.checked === true) {
            checkMonsieur.checked = false
        }
    }

    console.log('madame ' + checkMadame.checked)
    console.log('monsieur ' + checkMonsieur.checked)
})*/

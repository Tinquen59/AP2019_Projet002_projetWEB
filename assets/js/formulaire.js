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


document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault()

    let divFormGroup = document.querySelectorAll('div .divError')

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


let xhr = new XMLHttpRequest()

xhr.open('GET', 'https://unpkg.com/codes-postaux@3.3.0/codes-postaux.json')

xhr.onload = function () {
    let resultatCodePostaux = JSON.parse(this.responseText)
    resultatCodePostaux.forEach(function (resultatCodePostal) {
        if (document.getElementById('codePostal').value === resultatCodePostal.codePostal) {
            document.getElementById('ville').innerHTML += `<option>${resultatCodePostal.nomCommune}</option>`
        }
    })
}

xhr.send()
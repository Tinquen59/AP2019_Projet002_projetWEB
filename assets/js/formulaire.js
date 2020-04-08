/*
let casErreurs = [
    {
        idElt: "nom",
        reponseErreur: "un nom"
    }
]

let divFormGroup = document.querySelectorAll('div[class="col-sm-8"]')
let testRequired = document.querySelectorAll('input')
let formulaire = document.querySelector('form')

console.log(casErreurs[0].reponseErreur)

console.log(testRequired[1])
console.log(divFormGroup[0])

formulaire.addEventListener('submit', function (e) {
    e.preventDefault()

    console.log(testRequired[1].value)

    if (testRequired[1].value.length == 0) {
        testRequired[1].focus()
        testRequired[1].style.borderColor = "red"
        divFormGroup[0].innerHTML += `<p class="text-danger text-lowercase">Veuillez indiquer un nom valide</p>`
    }
})*/


let inputFormulaire = document.querySelectorAll('input')
let formulaire = document.querySelector('form')

formulaire.addEventListener('submit', function (e) {
    e.preventDefault()

    let inputRequireds = inputFormulaire.required


    if (inputRequireds == true) {
        console.log(inputRequireds)
    }
})
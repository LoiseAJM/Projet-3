let f_nom = document.getElementById("f_nom");
let f_prenom = document.getElementById("f_prenom");
let f_username = document.getElementById("f_username");
let f_password = document.getElementById("f_password");
let f_passwordconfirm = document.getElementById("f_passwordconfirm");
let f_questionsecrete = document.getElementById("f_questionsecrete");
let f_reponse = document.getElementById("f_reponse");
let validation = document.getElementById("submit");
let variableRecuperee = document.getElementById("variableAPasser");
let nom_erreur = document.getElementById("nom_erreur");
let prenom_erreur = document.getElementById('prenom_erreur');
let username_erreur = document.getElementById('username_erreur');
let password_erreur = document.getElementById('password_erreur');
let passwordconfirm_erreur = document.getElementById('passwordconfirm_erreur');
let questionsecrete_erreur = document.getElementById('questionsecrete_erreur');

let name_validation = /^[a-zA-ZÉÈÎÂÀÄËÏÖÜéèîâàäëïöü][a-zéèîâàäëïöü]+([-'\s][a-zA-ZÉÈÎÂÀÄËÏÖÜéèîâàäëïöü]+)?/;

validation.addEventListener('click', f_valid);
function f_valid(e){
    /* Vérification que le champ nom est rempli */
    if (f_nom.validity.valueMissing)
    { 
        e.preventDefault();
        nom_erreur.textContent = 'Veuillez renseigner votre nom';
        nom_erreur.style.color= 'red';
    } 
    
    /* Vérification que le nom ne contient pas de caractères inappropriés */
    else  if (name_validation.test(f_nom.value) == false)
    {
        e.preventDefault();
        nom_erreur.textContent ='Format incorrect';
        nom_erreur.style.color= 'red';
    }

    if (f_prenom.validity.valueMissing)
    { 
        e.preventDefault();
        prenom_erreur.textContent = 'Veuillez renseigner votre prénom';
        prenom_erreur.style.color= 'red';
    } 
    else if (name_validation.test(f_prenom.value) == false)
    {
        e.preventDefault();
        prenom_erreur.textContent = prenom_erreur.textContent + ' '+ 'Format incorrect';
        prenom_erreur.style.color= 'red';
    }
    if (f_username.validity.valueMissing)
    { 
        e.preventDefault();
        username_erreur.textContent = "Veuillez renseigner votre nom d'utilisateur";
        username_erreur.style.color= 'red';
    } 
    else if (name_validation.test(f_username.value) == false)
    {
        e.preventDefault();
        username_erreur.textContent = username_erreur.textContent + ' ' + 'Format incorrect';
        username_erreur.style.color= 'red';
    }
    if (f_password.validity.valueMissing)
    { 
        e.preventDefault();
        password_erreur.textContent = 'Veuillez renseigner un mot de passe';
        password_erreur.style.color= 'red';
    } 
    if (f_passwordconfirm.value != f_password.value)
    { 
        e.preventDefault();
        passwordconfirm_erreur.textContent = f_passwordconfirm;
        passwordconfirm_erreur.style.color= 'red';
    } 
} 
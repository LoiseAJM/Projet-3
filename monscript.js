let f_nom = document.getElementById("f_nom");
let f_prenom = document.getElementById("f_prenom");
let f_username = document.getElementById("f_username");
let f_password = document.getElementById("f_password");
let f_passwordconfirm = document.getElementById("f_passwordconfirm");
let f_questionsecrete = document.getElementById("f_questionsecrete");
let f_reponse = document.getElementById("f_reponse");

let variableRecuperee = document.getElementById("variableAPasser");
let nom_erreur = document.getElementById("nom_erreur");
let prenom_erreur = document.getElementById('prenom_erreur');
let username_erreur = document.getElementById('username_erreur');
let password_erreur = document.getElementById('password_erreur');
let passwordconfirm_erreur = document.getElementById('passwordconfirm_erreur');
let questionsecrete_erreur = document.getElementById('questionsecrete_erreur');
let validation = document.getElementById("submit");

let name_validation = /^[a-zA-ZÉÈÎÂÀÄËÏÖÜéèîâàäëïöü][a-zéèîâàäëïöü]+([-'\s][a-zA-ZÉÈÎÂÀÄËÏÖÜéèîâàäëïöü]+)?/;
let password_validation = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
validation.addEventListener('click', f_valid);
function f_valid(e)
    {            e.preventDefault();

        /* Si le champ Nom n'est pas renseigné */
        if (f_nom.validity.valueMissing)
        { 
            e.preventDefault();
            nom_erreur.textContent = 'Veuillez renseigner votre nom';
            nom_erreur.style.color= 'red';
        } 
        
        /* Si le champ Nom est renseigné mais que le format est incorrect */
        if ((f_nom.validity.valueMissing)==false && (name_validation.test(f_nom.value) == false))
        {
            e.preventDefault();
            nom_erreur.textContent ='Format incorrect';
            nom_erreur.style.color= 'red';
        }
        /*  Si le champ Nom est renseigné et le format est correct */
        else if ((name_validation.test(f_nom.value) == true) && (f_nom.validity.valueMissing == false))
        {
            nom_erreur.textContent ='';
        }
        /* Si le champ Prénom n'est pas renseigné */
        if (f_prenom.validity.valueMissing)
        { 
            e.preventDefault();
            prenom_erreur.textContent = 'Veuillez renseigner votre prénom';
            prenom_erreur.style.color= 'red';
        } 
        /* Si le champ Prénom est renseigné mais que le format est incorrect */
        if ((name_validation.test(f_prenom.value) == false) && (f_prenom.validity.valueMissing == false))
        {
            e.preventDefault();
            prenom_erreur.textContent = 'Format incorrect';
            prenom_erreur.style.color= 'red';
        }
        /*  Si le champ Prénom est renseigné et le format est correct */
        if ((name_validation.test(f_prenom.value) == true) && (f_prenom.validity.valueMissing == false))
        {
            nom_erreur.textContent ='';
        }
        /* Si le nom d'utilisateur n'est pas renseigné */
        if (f_username.validity.valueMissing)
        { 
            e.preventDefault();
            username_erreur.textContent = "Veuillez renseigner votre nom d'utilisateur";
            username_erreur.style.color= 'red';
        }
         /* Si le nom d'utilisateur est renseigné mais que le format est incorrect*/
         if ((name_validation.test(f_username.value) == false) && (f_username.validity.valueMissing == false))
         {
             e.preventDefault();
             username_erreur.textContent ='Format incorrect';
             username_erreur.style.color= 'red';
         }
        /* Si le nom d'utilisateur est renseigné et le format est correct */
        if ((name_validation.test(f_username.value) == true) && (f_username.validity.valueMissing == false) )
        { 
            e.preventDefault();
            username_erreur.textContent = '';
        }

       /* Si le mot de passe n'est pas renseigné */
        if (f_password.validity.valueMissing)
        { 
            e.preventDefault();
            password_erreur.textContent = 'Veuillez renseigner un mot de passe';
            password_erreur.style.color= 'red';
        } 
        /* Si le mot de passe est renseigné mais que le format est incorrect*/
        if ((name_validation.test(f_password.value) == false) && (f_password.validity.valueMissing == false))
        {
            e.preventDefault();
            password_erreur.textContent ='Mot de passe non sécurisé';
            password_erreur.style.color= 'red';
        }

        /* Si le mot de passe est renseigné et que le format est correct*/
        if ((name_validation.test(f_password.value) == true) && (f_password.validity.valueMissing == false))
        {
            e.preventDefault();
            password_erreur.textContent ='';
        }
        if (f_passwordconfirm.value != f_password.value)
        { 
            e.preventDefault();
            passwordconfirm_erreur.textContent = f_passwordconfirm;
            passwordconfirm_erreur.style.color= 'red';
        } 
}
let f_nom = document.getElementById("f_nom");
let f_prenom = document.getElementById("f_prenom");
let f_username = document.getElementById("f_username");
let f_password = document.getElementById("f_password");
let f_passwordconfirm = document.getElementById("f_passwordconfirm");
let f_questionsecrete = document.getElementById("f_questionsecrete");
let f_reponse = document.getElementById("f_reponse");
let name_validation = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
let password_validation =/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d\w\W]{8,}$/ ;
let nom_erreur = document.getElementById("nom_erreur");
let prenom_erreur = document.getElementById('prenom_erreur');
let username_erreur = document.getElementById('username_erreur');
let password_erreur = document.getElementById('password_erreur');
let passwordconfirm_erreur = document.getElementById('passwordconfirm_erreur');
let questionsecrete_erreur = document.getElementById('questionsecrete_erreur');
let reponse_erreur = document.getElementById('reponse_erreur');
let validation = document.getElementById("submit");
let formulaire_inscription = document.getElementById("formulaire_inscription");



formulaire_inscription.addEventListener('submit', verification_formulaire_inscription);

function verification_formulaire_inscription(e)
    {         
        if (f_nom.validity.valueMissing) /* Si le champ Nom n'est pas renseigné */
        { 
            e.preventDefault();
            nom_erreur.textContent = 'Veuillez renseigner votre nom';
            nom_erreur.style.color= 'red';
            
        } 
        else 
        {   if (name_validation.test(f_nom.value) == false) /* Si le champ Nom est renseigné mais que le format est incorrect */
            {
                e.preventDefault();
                nom_erreur.textContent ='Format incorrect';
                nom_erreur.style.color= 'red';
            }
            else /*  Si le champ Nom est renseigné et le format est correct */
            {
                nom_erreur.textContent ='';
            }

        }
          
        if (f_prenom.validity.valueMissing) /* Si le champ Prénom n'est pas renseigné */
        { 
            e.preventDefault();
            prenom_erreur.textContent = 'Veuillez renseigner votre prénom';
            prenom_erreur.style.color= 'red';
            
        } 
        else 
        {   if (name_validation.test(f_prenom.value) == false) /* Si le champ Prénom est renseigné mais que le format est incorrect */
            {
                e.preventDefault();
                prenom_erreur.textContent ='Format incorrect';
                prenom_erreur.style.color= 'red';
            }
            else /*  Si le champ Prénom est renseigné et le format est correct */
            {
                prenom_erreur.textContent ='';
            }
        }

        if (f_username.validity.valueMissing)  /* Si le nom d'utilisateur n'est pas renseigné */
        { 
            e.preventDefault();
            username_erreur.textContent = "Veuillez renseigner votre nom d'utilisateur";
            username_erreur.style.color= 'red';
        }
        else   
        {   if (name_validation.test(f_username.value) == false) /* Si le nom d'utilisateur est renseigné mais que le format est incorrect*/
            {
                e.preventDefault();
                username_erreur.textContent ='Format incorrect';
                username_erreur.style.color= 'red';
            }
            else  /* Si le nom d'utilisateur est renseigné et le format est correct */ 
            { 
                username_erreur.textContent = '';
            }
        }

        
        if (f_password.validity.valueMissing) /* Si le mot de passe n'est pas renseigné */
        { 
            e.preventDefault();
            password_erreur.textContent = 'Veuillez renseigner un mot de passe';
            password_erreur.style.color= 'red';
        } 
        else /* Si le mot de passe est renseigné */
        {   if (password_validation.test(f_password.value)) /*si le mot de passe est sécurisé*/
            {    
                if (f_password.value == f_passwordconfirm.value) /*si le mot de passe est identique à la confirmation */ 
                {  
                    password_erreur.textContent = '';
                }
                else /*si la confirmation n'est pas identique au mot de passe */
                {
                e.preventDefault();
                password_erreur.textContent = 'Les mots de passe ne correspondent pas';
                password_erreur.style.color= 'red';
                }
            }
            else /*si le mot de passe n'est pas sécurisé*/
            {
            e.preventDefault();
            password_erreur.textContent = "Le mot de passe n'est pas assez sécurisé";
            password_erreur.style.color= 'red';
            }
        }

        
        if (f_questionsecrete.validity.valueMissing) /* Si la question secrète est vide */
        {   e.preventDefault();
            questionsecrete_erreur.textContent ='Veuillez renseigner une question secrète';
            questionsecrete_erreur.style.color='red';
        }
        else /*Si la question secrète est renseignée*/
        {  
            questionsecrete_erreur.textContent ='';
        }
        
        if (f_reponse.validity.valueMissing) /* Si la réponse est vide */
        {   e.preventDefault();
            reponse_erreur.textContent ='Veuillez renseigner une réponse';
            reponse_erreur.style.color ='red';
        }
        else /*Si la réponse est renseignée*/
        { 
            reponse_erreur.textContent ='';
        }
    }

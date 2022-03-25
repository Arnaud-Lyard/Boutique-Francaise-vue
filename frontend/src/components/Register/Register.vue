<template>
    <div className="signUpLoginBox">
        <div className="slContainer">
            <div className="formBoxLeft">
            </div>
                <div className="formBoxRight">
                    <div className="formContent">

                    <h1>Inscription</h1>

                    <form id="contactForm">
                        <div class="input-control">
                            <div class="inputBox">
                                <input v-model="lastname" type="text" id="lastname" autoComplete="off" required />
                                <label for="lastname">Votre nom :</label>
                                 <div class="error"></div>
                            </div>
                        </div>

                        <div class="input-control">
                            <div class="inputBox">
                                <input v-model="firstname" type="text" id="firstname" autoComplete="off" required />
                                <label for="forname">Votre prénom :</label>
                                 <div class="error"></div>
                            </div>
                        </div>

                        <div class="input-control">
                            <div class="inputBox">
                                <input v-model="email" type="email" id="email" autoComplete="off" required />
                                <label for="email">Adresse E-mail :</label>
                                 <div class="error"></div>
                            </div>
                        </div>

                        <div class="input-control">
                            <div class="inputBox">
                                <input  v-model="password" type="password" id="password" autoComplete="off" required />
                                <label for="password">Mot de passe :</label>
                                 <div class="error"></div>
                            </div>
                        </div>
                        
                        <div class="input-control">
                            <div class="inputBox">
                                <input  v-model="passwordConfirm" type="password" id="passwordConfirm" autoComplete="off" required />
                                <label for="passwordConfirm">Confirmer mot de passe :</label>
                                 <div class="error"></div>
                            </div>
                        </div>

                        <div class="formSubmit"><a class="submit" href="#" v-on:click="handleRegister">Inscription</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import axios from "axios";

export default {
  name: "Register",
  data() {
    return{
      lastname: "",
      firstname: "",
      email: "",
      message: ""
    }
  },
  computed: {
    loggedIn() {
      return this.$store.state.auth.status.loggedIn;
    },
  },
  mounted() {
    if (this.loggedIn) {
      this.$router.push("/");
    }
  },
  methods: {
     handleRegister() {

      

/*----------------------------- Check if form is valid -----------------------------*/

        const lastname = document.getElementById('lastname');
        const firstname = document.getElementById('firstname');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const passwordConfirm = document.getElementById('passwordConfirm');

        const lastnameValue = lastname.value.trim();
        const firstnameValue = firstname.value.trim();
        const emailValue = email.value.trim();
        const passwordValue = password.value.trim();
        const passwordConfirmValue = passwordConfirm.value.trim();


        const setError = (element, message) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');

        errorDisplay.innerText = message;
        inputControl.classList.add('error');
        inputControl.classList.remove('success')
    }

        const setSuccess = element => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');

        errorDisplay.innerText = '';
        inputControl.classList.add('success');
        inputControl.classList.remove('error');
    };

/*----------------------------- Check if email is valid -----------------------------*/

        const isValidEmail = email => {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

        const validateInputs = () => {

        if(lastnameValue === '') {
            setError(lastname, 'Veuillez saisir votre nom');
        } else {
            setSuccess(lastname);
        }
         if(firstnameValue === '') {
            setError(firstname, 'Veuillez saisir votre prénom');
        } else {
            setSuccess(firstname);
        }
         if(passwordValue === '') {
            setError(password, 'Veuillez saisir votre mot de passe');
        } else if (passwordValue !== passwordConfirmValue){
            setError(password, 'Les mots de passes doivent être identiques');
        }        
        else {
            setSuccess(password);
        }
        if(emailValue === '') {
                setError(email, 'Veuillez saisir une adresse E-mail');
            } else if (!isValidEmail(emailValue)) {
                setError(email, 'Veuillez saisir une adresse E-mail valide');
            } else {
                setSuccess(email);
            }

    };
        validateInputs();

/*----------------------------- Send Form -----------------------------*/

        if (lastnameValue === '' || firstnameValue === '' || passwordValue === '' || emailValue === '' || passwordConfirmValue === ''){
            return("Inputs must have a value");
                }else if (passwordValue !== passwordConfirmValue) {
                    return("Password and Confirm password must be the same");
                }
                else{
               this.$store.dispatch("auth/register").then(
                  () => {
                  this.$router.push("/connexion");
                  },
                  (error) => {
                      error.toString();
                  }
                );
            }
/*----------------------------- Reset Form -----------------------------*/
            this.lastname = "";
            this.firstname = "";
            this.email = "";
            this.password = "";
            this.passwordConfirm = "";

    },
  },
};
</script>

<style scoped src="./Register.css">



</style>
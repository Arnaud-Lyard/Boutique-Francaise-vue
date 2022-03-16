<template>
    <div className="signUpLoginBox">
        <div className="slContainer">
            <div className="formBoxLeft">
            </div>
                <div className="formBoxRight">
                    <div className="formContent">

                    <h2>Connexion</h2>

                    <form id="contactForm">
                        <div class="input-control">
                            <div class="inputBox">
                                <input v-model="email" type="text" id="email" autoComplete="off" required />
                                <label for="email">Votre email :</label>
                                 <div class="error"></div>
                            </div>
                        </div>

                        <div class="input-control">
                            <div class="inputBox">
                                <input v-model="password" type="password" id="password" autoComplete="off" required />
                                <label for="password">Votre mot de passe :</label>
                                 <div class="error"></div>
                            </div>
                        </div>

                        <div class="formSubmit"><a class="submit" href="#" v-on:click="handleLogin">Envoyer</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import axios from "axios";

export default {
  name: "Login",
  data() {
    return{
      email: "",
      password: ""
    }
  },
   computed: {
    loggedIn() {
      return this.$store.state.auth.status.loggedIn;
    },
  },
  created() {
    if (this.loggedIn) {
      this.$router.push("/home");
    }
  },
  methods: {
     handleLogin() {


         /*----------------------------- Check if form is valid -----------------------------*/

        const email = document.getElementById('email');
        const password = document.getElementById('password');

        const emailValue = email.value.trim();
        const passwordValue = password.value.trim();


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

        if(emailValue === '') {
                setError(email, 'Veuillez saisir une adresse E-mail');
            } else if (!isValidEmail(emailValue)) {
                setError(email, 'Veuillez saisir une adresse E-mail valide');
            } else {
                setSuccess(email);
            }
        if(passwordValue === '') {
        setError(password, 'Veuillez saisir votre mot de passe');
        } else {
            setSuccess(password);
        }

    };
        validateInputs();




// /*----------------------------- Send Form & Reset-----------------------------*/

        if (emailValue === '' || passwordValue === ''){
            return("Inputs must have a value");
                }
                else{
                this.$store.dispatch("auth/login").then(
                    () => {
                    this.$router.push("/home");
                    },
                    (error) => {
                        error.toString();
                    }
                );
            }
            this.email = "";
            this.password = "";
    },
  },
};
</script>

<style scoped src="./Login.css">



</style>
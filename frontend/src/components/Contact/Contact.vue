<template>
    <div className="signUpLoginBox">
        <div className="slContainer">
            <div className="formBoxLeft">
            </div>
                <div className="formBoxRight">
                    <div className="formContent">

                    <h2>Contact</h2>

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
                                <input  v-model="message" type="text" id="message" autoComplete="off" required />
                                <label for="message">Votre message :</label>
                                 <div class="error"></div>
                            </div>
                        </div>
                        <div class="formSubmit"><a class="submit" href="#" v-on:click="sendMail">Envoyer</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
  name: "contact",
  data() {
    return{
      lastname: "",
      firstname: "",
      email: "",
      message: ""
    }
  },
  methods: {
     sendMail() {

/*----------------------------- Check if form is valid -----------------------------*/

        const lastname = document.getElementById('lastname');
        const firstname = document.getElementById('firstname');
        const email = document.getElementById('email');
        const message = document.getElementById('message');
        const lastnameValue = lastname.value.trim();
        const firstnameValue = firstname.value.trim();
        const emailValue = email.value.trim();
        const messageValue = message.value.trim();


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
         if(messageValue === '') {
            setError(message, 'Veuillez saisir votre message');
        } else {
            setSuccess(message);
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

        if (lastnameValue === '' || firstnameValue === '' || messageValue === '' || emailValue === ''){
            return('input form error');
            }else{
            axios.post("http://localhost:8000/api/nous-contacter",{
            lastname: this.lastname,
            firstname: this.firstname,
            email: this.email,
            message: this.message,
            });

/*----------------------------- Reset Form -----------------------------*/

            this.lastname = "";
            this.firstname = "";
            this.email = "";
            this.message = "";

        }

    },
  },
};
</script>

<style scoped src="./Contact.css">



</style>
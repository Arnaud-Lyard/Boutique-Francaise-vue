<template>
    <div className="signUpLoginBox">
        <div className="slContainer">
            <div className="formBoxLeft">
            </div>
                <div className="formBoxRight">
                    <div className="formContent">

                    <h2>Contact</h2>
                    <form @onSubmit="sendMail">
                        <div class="inputBox">
                            <input v-model="lastname" type="text" id="lastname" autoComplete="off" required />
                            <label for="lastname">Votre nom :</label>
                        </div>

                        <div class="inputBox">
                            <input v-model="forname" type="text" id="forname" autoComplete="off" required />
                            <label for="forname">Votre prénom :</label>
                        </div>

                        <div class="inputBox">
                            <input v-model="email" type="email" id="email" autoComplete="off" required />
                            <label for="email">Votre adresse E-mail :</label>
                        </div>

                        <div class="inputBox">
                            <input  v-model="message" col="5" row="5" type="textarea" id="message" autoComplete="off" required />
                            <label for="message">Votre message :</label>
                        </div>
                        <button class="btn">Envoyer votre demande</button>
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
  methods: {
    sendMail() {
      axios.post("http://localhost:3000/services",{
        name: this.name,
        lastname: this.lastname,
        email: this.email,
        objet: this.objet,
        demande: this.demande,
      });

      location.reload();
    },
  },
};
</script>

<style scoped>


.signUpLoginBox {
  background-image: url("../assets/bg-texture.png");
  background-repeat: repeat;
  -webkit-box-shadow: inset 0px 143px 108px -18px rgba(0, 0, 0, 0.39);
  -moz-box-shadow: inset 0px 143px 108px -18px rgba(0, 0, 0, 0.39);
  box-shadow: inset 0px 143px 108px -18px rgba(0, 0, 0, 0.39);
  display: flex;
  justify-content: center;
  height: 100vh;
}

.slContainer {
  flex: 0 1 80%;
  display: flex;
}

.formBoxLeft {
  min-height: 500px;
  background-image: url("../assets/contact-enveloppe.png");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: contain;
  flex: 0 1 50%;
}

.formBoxRight {
    display: flex;
    align-items: center;
    flex: 0 1 50%;
}

.formBoxRight span {
  display: block;
  color: var(--red-color);
  text-align: center;
  border: 1px solid red;
  padding: 10px;
  margin: 15px 0;
}

.formContent {
  width: 100%;
  padding: 20px;
  box-sizing: border-box;
}

.formContent h2 {
  margin: 0 0 40px 0;
  padding: 0;
  color: #fff;
  text-transform: uppercase;
}

.formContent .inputBox {
  position: relative;
  height: 80px;
}

.formContent .inputBox input {
  width: 100%;
  padding: 10px 0;
  font-size: 17px;
  color: #2f44a5;
  text-transform: uppercase;
  font-weight: bold;
  margin-bottom: 30px;
  border: none;
  background: transparent;
  border-bottom: 1px solid white;
  outline: none;
}

.formContent .inputBox label {
  color: #fff;
  position: absolute;
  top: 0;
  left: 0;
  padding: 10px 0;
  font-size: 17px;
  pointer-events: none;
  -webkit-transition: 0.2s ease-in;
  -moz-transition: 0.2s ease-in;
  -o-transition: 0.2s ease-in;
  transition: 0.2s ease-in;
}

.formContent .inputBox input:focus~label,
.formContent .inputBox input:valid~label {
  top: -30px;
  left: 0;
  color: #fff;
  font-size: 16px;
  font-style: italic;
}

/* Form buttons */
.formContent button {
  margin-left: 0;
  display: block;
  margin: 0 auto 20px;
  min-width: 150px;
  background-color: #2f44a5;
  color: #fff;
  padding: 7px;
  font-size: 15px;
  border-radius: 5px;
}

.formContent button:hover {
  background-color: #fff;
  color: #2f44a5;
  cursor: pointer;
}

/* MEDIA QUERIES */

@media screen and (max-width: 1110px) {
   /* make container full width */
   .container {
    flex: 0 1 100%;
  }

  /* hide all images on forms */
  .formBoxLeft {
      display: none;
    }

  .formBoxRight {
    flex: 0 1 100%;
  }

}
</style>
import axios from 'axios';

const API_URL = 'http://localhost:8000/api/';

class AuthService {
  login() {
    return axios
      .post(API_URL + 'connexion', {
        email: email.value,
        password: password.value
      })
      .then(response => {
        if (response.data.accessToken) {
          localStorage.setItem('user', JSON.stringify(response.data));
        }
        return response.data;
      });
    }

  logout() {
    localStorage.removeItem('user');
  }

  register() {
    return axios.post(API_URL + 'inscription', {
      lastname: lastname.value,
      firstname: firstname.value,
      email: email.value,
      password: password.value
    });
  }
}

export default new AuthService();
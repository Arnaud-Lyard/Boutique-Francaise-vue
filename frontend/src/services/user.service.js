import axios from 'axios';

// Sécuriser une route de l'API avec le token
// import authHeader from './auth-header';

const API_URL = 'http://127.0.0.1:8000/';

class UserService {
  getAllArticles() {
    return axios.get(API_URL + 'api/actualites');
  }

  getAllProducts() {
    return axios.get(API_URL + 'api/produits');
  }
}

export default new UserService();
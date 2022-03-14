import axios from 'axios';
// import authHeader from './auth-header';
const API_URL = 'http://127.0.0.1:8000/';

class UserService {
  getAllArticles() {
    return axios.get(API_URL + 'api/actualites');
  }

  getAllProducts() {
    return axios.get(API_URL + 'api/produits');
  }

  getProductBySlug(slug) {
    return axios.get(API_URL + 'api/produit/' + slug);
  }
                                         
//   async getUserOneProduct(id) {  
//      return await axios.get(API_URL + 'getOneProduct/'+id, { headers: authHeader()});
//   }
 
//   async getUserProducts() {
//     return await axios.get(API_URL + 'getProductsByUserId', { headers: authHeader()} );
//   }

//   getUserBoard() {
//     return axios.get(API_URL + 'user', { headers: authHeader() });
//   }

//   getModeratorBoard() {
//     return axios.get(API_URL + 'mod', { headers: authHeader() });
//   }

//   getAdminBoard() {
//     return axios.get(API_URL + 'admin', { headers: authHeader() });
//   }
}

export default new UserService();
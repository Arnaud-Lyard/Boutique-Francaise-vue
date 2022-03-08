import axios from 'axios';
// import authHeader from './auth-header';
const API_URL = 'http://boutique-vue.arnaudlyard.com/';

class UserService {
  getAllArticles() {
    return axios.get(API_URL + 'api/actualites');
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
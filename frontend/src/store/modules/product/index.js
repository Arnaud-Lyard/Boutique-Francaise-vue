import axios from 'axios';

const state = {
  productItems: [] 
}

const mutations = {
    UPDATE_PRODUCT_ITEMS (state, payload) {
      state.productItems = payload;
    }
  }

  const API_URL = 'http://127.0.0.1:8000/';


  const actions = {
    getProductItems ({ commit }) {
      axios.get(API_URL + 'api/products').then((response) => {
        commit('UPDATE_PRODUCT_ITEMS', response.data)
      });
    }
  }

  const getters = {
    productItems: state => state.productItems,
    productItemById: (state) => (id) => {
      return state.productItems.find(productItem => productItem.id === id)
    }
  }

  const productModule = {
    state,
    mutations,
    actions,
    getters
  }
  
  export default productModule;
import axios from 'axios';

const state = {
  cartItems: []
}

const mutations = {
    UPDATE_CART_ITEMS (state, payload) {
      state.cartItems = payload;
    }
  }
  const API_URL = 'http://127.0.0.1:8000/';

  const actions = {
    getCartItems ({ commit }) {
      axios.get(API_URL + 'api/cart').then((response) => {
        commit('UPDATE_CART_ITEMS', response.data)
      });
    },
    addCartItem ({ commit }, cartItem) {
      axios.post(API_URL + 'api/cart', cartItem).then((response) => {
        commit('UPDATE_CART_ITEMS', response.data)
      });
    },
    removeAllCartItems ({ commit }) {
      axios.delete(API_URL + 'api/cart/delete/all').then((response) => {
        commit('UPDATE_CART_ITEMS', response.data)
      });
    }
  }

  const getters = {
    cartItems: state => state.cartItems,
    
    cartTotal: state => {
      return state.cartItems.reduce((acc, cartItem) => {
        return (cartItem.quantity * cartItem.price) + acc;
      }, 0).toFixed(2);
    },
    cartQuantity: state => {
      return state.cartItems.reduce((acc, cartItem) => {
        return cartItem.quantity + acc;
      }, 0);
    }
  }

  const cartModule = {
    state,
    mutations,
    actions,
    getters
  }
  export default cartModule;
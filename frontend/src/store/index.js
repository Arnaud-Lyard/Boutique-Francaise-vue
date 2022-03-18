import { createStore } from "vuex";
import { auth } from "./auth.module";
import product from'./modules/product';
import cart from './modules/cart';

const store = createStore({
  modules: {
    auth,
    product,
    cart
  },
});

export default store;
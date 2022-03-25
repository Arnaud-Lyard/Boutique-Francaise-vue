<template>
  <div id="cart">
    <div class="cart-title">
    <h1>Votre panier</h1>
    </div>
    <p v-if="!cartItems.length" class="cart-empty">
      Ajouter des produits au panier !
    </p>
    <ul>
      <li class="cart-item" v-for="cartItem in cartItems" :key="cartItem.id">
          <CartDetail :cartItem="cartItem"/>
      </li>
      <div v-if="cartItems.length" class="cart-total">
          Quantité totale :
          <span class="cart-total-quantity">{{ cartQuantity }}</span>
      </div>
    </ul>
    <div class="buttons">
    <button :disabled="!cartItems.length" class="button-valid">
      Valider (<span class="cart-text-valid">{{ cartTotal / 100 }} €</span>)
    </button>
     
 <button class="button-delete" @click="removeAllCartItems">
    <span>Supprimer le panier</span>
  </button>
       </div>
  </div>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
import CartDetail from "../CartDetail/CartDetail";
export default {
  name: "Cart",
  components: {
    CartDetail
  },
  computed: {
    ...mapGetters(["cartItems", "cartTotal", "cartQuantity"]),
  },
  created() {
    this.$store.dispatch("getCartItems");
  },
  methods: {
    ...mapActions(["removeAllCartItems"]),
  }
};
</script>

<style scoped src="./Cart.css">

</style>
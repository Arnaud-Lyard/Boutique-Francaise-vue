<template>
    <div class="product-box">
          <h1>Boutique</h1>
        <div class="product-container">
            <article class="product-card" v-for="product in products" :key="product.id">
                <router-link :to="{ name: 'ProductDetail', params: { id: product.slug }}">
                  <img class="product-image" :src="product.illustration" :alt="product.name"/>
                </router-link>
              <div class="product-title">{{ product.name }}</div>
              <div class="product-subtitle">{{ product.subtitle }}</div>
              <div class="product-price">{{product.price / 100}} €</div>
            </article>
            <div>
              
            </div>
        </div>
    </div>
</template>

<script>
import UserService from "../../services/user.service";

export default {
  name: "Product",
  data() {
    return {
      products: [],
    };
  },
  mounted() {
    UserService.getAllProducts().then(
      (response) => {
        this.products = response.data;
      },
      (error) => {
        this.products =
          (error.response &&
            error.response.data &&
            error.response.data.message) ||
          error.message ||
          error.toString();
      }
    );
  },
};
</script>


<style scoped src="./Product.css">



</style>

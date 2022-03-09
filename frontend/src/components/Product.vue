<template>

      <h1>Boutique</h1>
    <div class="product-container">
        <article class="product-box" v-for="product in products" :key="product.id">
            <div>
                <img class="product-image" v-bind:src="product.image" /> 
            </div>
           <div class="product-title">{{ product.name }}</div>
        </article>
    </div>
</template>

<script>
import UserService from "../services/user.service";

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


<style scoped>



.product-container {
  grid-area: main;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-auto-rows: minmax(100px, auto);
  grid-gap: 20px;
}

</style>

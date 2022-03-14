<template>
    <div class="product-box">
        <div class="product-container">
          <h1>{{product.name}}</h1>
            <article class="product-card">
                  <img class="product-image" :src="product.illustration" :alt="product.name"/>
              <div class="product-subtitle">{{ product.subtitle }}</div>
              <div class="product-price">{{product.price / 100}} €</div>
              <div class="product-description">{{product.description}}</div>
            </article>
            <div>
            </div>
        </div>
    </div>
</template>

<script>

import UserService from "../../services/user.service";
export default {

    name:"ProductDetail",
    props: ["id"],
    data() {

    return {
      designation: "",
      price: "",
      description: "",
      product: [],

}
    
    
  },
  mounted() {
    const id = this.id;
    UserService.getProductBySlug(id).then(
      (response) => {
        this.product = response.data;
    },
      (error) => {
        this.product =
          (error.response &&
            error.response.data &&
            error.response.data.message) ||
          error.message ||
          error.toString();
      }
    );
  },
 

}
</script>

<style scoped src="./ProductDetail.css">


</style>
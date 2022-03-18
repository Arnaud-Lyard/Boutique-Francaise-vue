<template>
    <div class="product-box">
        <div class="product-container">
          <h1>{{productItem.name}}</h1>
            <article class="product-card">
                  <img class="product-image" :src="productItem.illustration" :alt="productItem.name"/>
              <div class="product-subtitle">{{ productItem.subtitle }}</div>
              <div class="product-price">{{productItem.price / 100}} €</div>
              <div class="product-description">{{productItem.description}}</div>
              <a class="add-cart" @click="addCartItem(productItem)">Ajouter au panier</a>
            </article>
            <div>
            </div>
        </div>
    </div>
</template>

<script>

// import UserService from "../../services/user.service";
import {mapActions} from 'vuex'


export default {
  name: "ProductDetail",
  props: ["productItem"],
  methods: {
    ...mapActions(["addCartItem"]),
  },
};

// export default {

//     name:"ProductDetail",
//     props: ["id"],
//     data() {

//     return {
//       designation: "",
//       price: "",
//       description: "",
//       product: [],

// }
    
    
//   },
  // mounted() {
  //   const id = this.id;
  //   UserService.getProductBySlug(id).then(
  //     (response) => {
  //       this.product = response.data;
  //   },
  //     (error) => {
  //       this.product =
  //         (error.response &&
  //           error.response.data &&
  //           error.response.data.message) ||
  //         error.message ||
  //         error.toString();
  //     }
  //   );
  // },
 

// }
</script>

<style scoped src="./ProductDetail.css">


</style>
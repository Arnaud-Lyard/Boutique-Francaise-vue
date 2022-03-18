<template>
    <div class="product-box">
          <h1>Boutique</h1>
        <div class="product-container">
            <article class="product-card" v-for="productItem in productItems" :key="productItem.id">
              <ProductDetail :productItem="productItem"/>
            </article>
            <div>
              
            </div>
        </div>
    </div>
</template>

<script>
// import UserService from "../../services/user.service";
import { mapGetters } from 'vuex';
import ProductDetail from '../ProductDetail/ProductDetail'

export default {
  name: "Product",
  components: {
    ProductDetail:ProductDetail
  },
  computed: {
    ...mapGetters([
      'productItems'
    ])
  },
  created() {
    this.$store.dispatch('getProductItems');
  }
};


// export default {
//   name: "Product",
//   data() {
//     return {
//       products: [],
//     };
//   },
//   computed: {
//     ...mapGetters([
//       'productItems'
//     ])
//   },
//   created() {
//     this.$store.dispatch('getProductItems');
//   },
  // mounted() {
  //   UserService.getAllProducts().then(
  //     (response) => {
  //       this.products = response.data;
  //     },
  //     (error) => {
  //       this.products =
  //         (error.response &&
  //           error.response.data &&
  //           error.response.data.message) ||
  //         error.message ||
  //         error.toString();
  //     }
  //   );
  // },
// };
</script>


<style scoped src="./Product.css">



</style>

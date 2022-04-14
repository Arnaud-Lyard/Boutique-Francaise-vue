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


</script>


<style scoped src="./Product.css">



</style>

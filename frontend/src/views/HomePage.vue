<template>
  <div class="home">
    <Product />
  </div>
</template>

<script>
// @ is an alias to /src
import Product from '@/components/Product/Product.vue'
export default {
  name: 'HomePage',
  components: {
    Product
  }
}
</script>
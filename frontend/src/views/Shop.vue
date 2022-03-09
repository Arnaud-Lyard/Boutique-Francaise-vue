<template>
  <div>
    <Product />
  </div>
</template>

<script>
// @ is an alias to /src
import Product from '@/components/Product.vue'
export default {
  name: 'Shop',
  components: {
    Product
  }
}
</script>
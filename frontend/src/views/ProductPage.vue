<template>
  <div>
    <ProductDetail />
  </div>
</template>

<script>
// @ is an alias to /src
import ProductDetail from '@/components/ProductDetail/ProductDetail.vue'
export default {
  name: 'ProductPage',
  components: {
    ProductDetail
  }
}
</script>
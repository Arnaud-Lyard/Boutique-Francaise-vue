<template>
  <div>
    <Article />
  </div>
</template>

<script>
// @ is an alias to /src
import Article from '@/components/Article/Article.vue'
export default {
  name: 'BlogPage',
  components: {
    Article
  }
}
</script>
<template>
    <div class="container">
        <article  v-for="article in articles" :key="article.id" class="box">
            <div class="title">{{ article.title }}</div>
            <div class="content" v-html="article.content"></div>
        </article>
    </div>
</template>

<script>
import UserService from "../services/user.service";

export default {
  name: "Article",
  data() {
    return {
      articles: [],
    };
  },
  mounted() {
    UserService.getAllArticles().then(
      (response) => {
        this.articles = response.data;
      },
      (error) => {
        this.articles =
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
.container {
  grid-area: main;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-auto-rows: minmax(100px, auto);
  grid-gap: 20px;
}

</style>

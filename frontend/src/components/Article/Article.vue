<template>
    <div class="BlogBox">
          <div class="form-container">
          <h1>Actualités</h1>
            <article class="box" v-for="article in articles" :key="article.id">
                <div>
                    <img class="image" v-bind:src="article.image" /> 
                </div>
                <div class="title">{{ article.title }}</div>
            </article>
        </div>
    </div>
</template>

<script>
import UserService from "../../services/user.service";

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

<style scoped src="./Article.css">


</style>

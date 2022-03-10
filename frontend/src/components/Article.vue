<template>
    <div class="BlogBox">
        <div class="BlogLeft">
        </div>
            <div class="BlogRight">
                <div class="formContent">
                <h1>Actualités</h1>
                  <article class="box" v-for="article in articles" :key="article.id">
                      <div>
                          <img class="image" v-bind:src="article.image" /> 
                      </div>
                      <div class="title">{{ article.title }}</div>
                  </article>
            </div>
        </div>
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
.BlogBox {
  background-image: url("../assets/bg-texture.png");
  background-repeat: repeat;
  -webkit-box-shadow: inset 0px 143px 108px -18px rgba(0, 0, 0, 0.39);
  -moz-box-shadow: inset 0px 143px 108px -18px rgba(0, 0, 0, 0.39);
  box-shadow: inset 0px 143px 108px -18px rgba(0, 0, 0, 0.39);
  display: flex;
  justify-content: center;
  height: 100vh;
}

.BlogLeft {
  background-image: url("../assets/blog.jpg");
  min-height: 500px;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: contain;
  flex: 0 1 40%;
  display: flex;
}

.BlogRight {
    display: flex;
    align-items: center;
    flex: 0 1 60%;
}
.formContent {
  width: 100%;
  box-sizing: border-box;
}

.formContent h1 {
  margin: 0 0 40px 0;
  padding: 0;
  color: #fff;
  text-transform: uppercase;
}
.box{
  display: flex;
  align-items: center;
  padding: 25px;
}
.image{
  width: 300px;
  height:200px;
  object-fit: cover;
  border-radius: 15px;
}
.title{
  color: white;
  text-transform: uppercase;
  font-size: 2rem;
}
.article-image{
  width: 300px;
}
/* MEDIA QUERIES */

@media screen and (max-width: 1110px) {

  /* hide left image */
  .BlogLeft {
      display: none;
    }

  .BlogRight {
    flex: 0 1 100%;
  }
  .box {
    display: block;
  }
  .title {
    font-size: 1.5rem;
  }
  .image{
  width: 100%;
  height: auto;
  max-width: 300px;
  border-radius: 15px;
}

}
</style>

<template>
    <div class="container">
      <article class="box">
        Article 1
      </article>
      <article class="box">
        Article 2
      </article>
      <article class="box">
        Article 3
      </article>
      <article class="box">
        Article 4
      </article>
  </div>
</template>

<script>
// import UserService from "../services/user.service";

export default {
  name: "Product",
  // data() {
  //   return {
  //     products: [],
  //   };
  // },
  // mounted() {
  //   UserService.getPublicProducts().then(
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

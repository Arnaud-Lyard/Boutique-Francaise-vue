<template>
    <header>

      <div class="container">
          <div class="container-item"></div>
          <div class="container-item"></div>
          <div class="container-item"></div>
          <div class="container-item"></div>

          <div class="container-item"></div>
          <div class="container-item"></div>
          <div class="container-item"></div>
          <div class="container-item"></div>

          <div class="container-item"></div>
          <div class="container-item"></div>
          <div class="container-item"></div>
          <div class="container-item"></div>
      </div>



    </header>
</template>

<script>
// import UserService from "../services/user.service";

export default {
  name: "Products",
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
    max-width: 1300px;
    width: 80%;
    height: auto;
    margin: 30px auto;
    border: 1px solid #333;
    display: grid;
    grid-template-columns: repeat(auto-fill, 300px);
    justify-content: center;
    grid-gap: 10px;
}
.container-item {
    width: 300px;
    height: 200px;
    background: #333;
}
</style>

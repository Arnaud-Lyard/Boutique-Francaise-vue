<template>
  <div class="box">
    <div class="cart-item__details">
      <p class="is-inline">{{cartItem.product}}</p>
      <div>
        <span class="cart-item--price has-text-info has-text-weight-bold">
          {{cartItem.price / 100}} € X {{cartItem.quantity}}
        </span>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'CartDetail',
  props: ['cartItem']
}
</script>

<style scoped src="./CartDetail.css">

</style>
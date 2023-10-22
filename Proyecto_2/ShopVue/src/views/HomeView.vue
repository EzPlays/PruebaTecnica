<template>
  <div>
    <h1>Productos</h1>
    <div class="flex-card">
      <div class="product-card" v-for="item in products" :key="item.id">
        <img :src="`src/assets/${item.img}`" :alt="item.name" width="150">
        <h2>{{ item.name }}</h2>
        <p class="price">${{ item.price }}</p>
        <button class="buy-button" @click="store.uploadProduct(item)">Comprar</button>
      </div>
    </div>

  </div>
</template>

<script>
import { store } from '../store'
import Products from "../Products.json";

export default {
  name: 'HomeView',
  data() {
    return {
      store: store,
      products: Products
    }
  },

  mounted() {
  },

  methods: {

  },
}
</script>

<style scoped>
.buy-button {
  background-color: var(--pomegranate-300);
  border: none;
  color: #fff;
  padding: 10px 20px;
  font-size: 16px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

</style>

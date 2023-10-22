<template>
    <div>
        <h1>Carrito de Compras</h1>
        <div class="flex-card">
            <div class="product-card" v-for="(item, index) in cartItems" :key="index">
                <img :src="`src/assets/${item.img}`" :alt="item.name" width="150">
                <h2>{{ item.name }}</h2>
                <p>{{ item.desc }}</p>
                <p class="price">${{ item.price }}</p>
                <button class="remove-button" @click="store.removeProduct(index)">Eliminar</button>
            </div>
        </div>
    </div>
</template>
  
<script>
import { store } from '../store'
export default {
    data() {
        return {
            store: store,
            cartItems: store.cartQuantity,
        };
    },
    methods: {
    },
    mounted() {
    },
};
</script>

<style scoped>
.remove-button {
  background-color: var(--pomegranate-700);
  border: none;
  color: #fff;
  padding: 10px 20px;
  font-size: 16px;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

</style>
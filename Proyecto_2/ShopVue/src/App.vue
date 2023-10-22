<script setup>
import { store } from './store'

</script>

<template>
  <div id="app">
    <nav class="navbar">
      <a class="brand" href="/">SHOPVUE</a>
      <a class="cart" href="/shoppingCart">
        <svg class="icon-shop" xmlns="http://www.w3.org/2000/svg" height="1em"
          viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
          <path
            d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
        </svg> Carrito <span class="cart-count">{{ store.count }}</span>
      </a>
    </nav>
    <router-view />
  </div>
</template>

<style>
:root {
  --pomegranate-50: #fdf4ef;
  --pomegranate-100: #fbe5d9;
  --pomegranate-200: #f6c8b2;
  --pomegranate-300: #f1a380;
  --pomegranate-400: #ea744d;
  --pomegranate-500: #e44d26;
  --pomegranate-600: #d63920;
  --pomegranate-700: #b2291c;
  --pomegranate-800: #8e231e;
  --pomegranate-900: #72201c;
  --pomegranate-950: #3e0d0c;
}

body {
  background-color: var(--pomegranate-50);
}

/* Estilos para el encabezado h1 */
h1 {
  font-size: 36px;
  color: var(--pomegranate-950);
  text-align: center;
  margin-top: 20px;
  text-transform: uppercase;
}

/* Estilos para el contenedor principal */
.flex-card {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

/* Estilos para las tarjetas de producto (product-card) */
.product-card {
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 2px 4px var(--pomegranate-900);
  max-width: 300px;
  margin: 10px;
  padding: 20px;
  text-align: center;
}

.buy-button:hover {
  background-color: var(--pomegranate-500);
  ;
}

/* Estilos para el enlace del carrito */
.cart-link {
  text-align: right;
  margin: 10px;
  font-size: 16px;
}

.cart-link a {
  text-decoration: none;
  color: #333;
}

.navbar {
  display: flex;
  justify-content: space-around;
  align-items: center;
  background-color: var(--pomegranate-950);
  color: var(--pomegranate-50);
  padding: 10px 20px;
}

.brand {
  text-decoration: none;
  /* Quita la subrayado por defecto de los enlaces */
  color: var(--pomegranate-50);
  font-size: 24px;
  margin: 0;
}

.cart {
  text-decoration: none;
  /* Quita la subrayado por defecto de los enlaces */
  display: flex;
  align-items: center;
  color: var(--pomegranate-50);
  font-size: 16px;
}

.cart i {
  margin-right: 5px;
}

.cart-count {
  background-color: var(--pomegranate-50);
  color: var(--pomegranate-950);
  border-radius: 50%;
  padding: 5px 10px;
  font-size: 14px;
  margin-left: 5px;
}

.icon-shop {
  fill: var(--pomegranate-50);
}
</style>

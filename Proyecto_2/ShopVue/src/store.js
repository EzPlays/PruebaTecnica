import { reactive } from 'vue'

const savedCount = sessionStorage.getItem('contador');
const savedCart = JSON.parse(sessionStorage.getItem('carrito') || '[]');

export const store = reactive({
  count: savedCount ? parseInt(savedCount) : 0,
  cartQuantity: savedCart,
  uploadProduct(product) {
    this.cartQuantity.push(product);
    this.count = this.cartQuantity.length;

    sessionStorage.setItem('contador', this.count);
    sessionStorage.setItem('carrito', JSON.stringify(this.cartQuantity));
  },
  removeProduct(index) {
    if (index >= 0 && index < this.cartQuantity.length) {
      this.cartQuantity.splice(index, 1);
      this.count = this.cartQuantity.length;

      sessionStorage.setItem('contador', this.count);
      sessionStorage.setItem('carrito', JSON.stringify(this.cartQuantity));
    }
  }
});

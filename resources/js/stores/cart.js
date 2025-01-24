import { defineStore } from "pinia";
import axios from "axios";
import { toast } from "vue3-toastify";
axios.defaults.baseURL = "http://127.0.0.1:8000/api";
axios.defaults.withCredentials = true;
export const useCartStore = defineStore("cart", {
    state: () => ({
        cartItems: [], // Data cart
    }),
    actions: {
        async fetchCartItems() {
            try {
                const response = await axios.get("/cart/items");
                this.cartItems = response.data;
            } catch (error) {}
        },
        async addToCart(productId) {
            try {
                const response = await axios.post("/cart/add", {
                    product_id: productId,
                    quantity: 1,
                });
                this.fetchCartItems(); // Update data cart
                toast.success(`${response.data.message}`, {
                    position: toast.POSITION.TOP_RIGHT,
                });
            } catch (error) {
                toast.error(
                    `gagal menambahkan ke keranjang: anda perlu login`,
                    {
                        position: toast.POSITION.TOP_RIGHT,
                    }
                );
            }
        },
    },
});

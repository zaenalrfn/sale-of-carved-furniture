import "./bootstrap";
import Alpine from "alpinejs";
import "flowbite";
window.Alpine = Alpine;
import { createApp } from "vue";

Alpine.start();

// Import komponen Vue
import Navbar from "./components/Navbar.vue";
import HeroSection from "./components/HeroSection.vue";
import MyAccount from "./components/MyAccount.vue";
import Orders from "./components/Orders.vue";
import Products from "./components/Products.vue";
import Footer from "./components/Footer.vue";

// Buat aplikasi Vue
const app = createApp({});
// Register komponen
app.component("nav-bar", Navbar);
app.component("hero-section", HeroSection);
app.component("my-account", MyAccount);
app.component("orders", Orders);
app.component("products", Products);
app.component("footer-landing", Footer);

// Mount aplikasi
app.mount("#app");

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

// Buat aplikasi Vue
const app = createApp({});
// Register komponen
app.component("nav-bar", Navbar);
app.component("hero-section", HeroSection);
app.component("my-account", MyAccount);

// Mount aplikasi
app.mount("#app");

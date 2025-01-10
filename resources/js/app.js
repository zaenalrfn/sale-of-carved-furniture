import "./bootstrap";
import Alpine from "alpinejs";
import "flowbite";
window.Alpine = Alpine;
import { createApp } from "vue";

Alpine.start();

// Import komponen Vue
import Navbar from "./components/Navbar.vue";
import HeroSection from "./components/HeroSection.vue";

// Buat aplikasi Vue
const app = createApp({});
// Register komponen
app.component("nav-bar", Navbar);
app.component("hero-section", HeroSection);

// Mount aplikasi
app.mount("#app");

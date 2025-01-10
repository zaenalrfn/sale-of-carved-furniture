import "./bootstrap";
import { createApp } from "vue";

import Alpine from "alpinejs";
import "flowbite";
window.Alpine = Alpine;

Alpine.start();

// Import komponen Vue Anda
import LandingPage from "./components/LandingPage.vue";

// Buat aplikasi Vue
const app = createApp({});

// Register komponen
app.component("landing-page", LandingPage);

// Mount aplikasi
app.mount("#app");

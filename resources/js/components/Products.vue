<script setup>
import { useCartStore } from "../stores/cart";
import { ref } from "vue";

// Define props with type Array
const props = defineProps({
  dataProduct: {
    type: Array,
    required: true,
  },
});

// Reactive state for storing products
const visibleProducts = ref(8); // Initial number of products displayed
const products = ref(props.dataProduct); // Assign props directly

// Cart section
const cartStore = useCartStore();
const handleAddToCart = (productId) => {
  cartStore.addToCart(productId); // Add product to cart
};

// Function to increase the number of displayed products
const showMoreProducts = () => {
  visibleProducts.value += 8; // Increase the number of products to display
};
</script>

<template>
  <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <!-- Heading & Filters -->
      <div
        class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8"
      >
        <div>
          <h2
            class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl"
          >
            Products
          </h2>
        </div>
      </div>
      <div
        class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4"
      >
        <transition-group
          v-for="(product, index) in products.slice(0, visibleProducts)"
          :key="product.id"
          name="fade"
          tag="div"
        >
          <div
            class="h-full rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800"
          >
            <div class="h-56 w-full">
              <a :href="'/detail_products/' + product.id">
                <img
                  class="h-full w-full object-cover dark:hidden"
                  :src="'storage/' + product.thumb_image"
                  alt=""
                />
                <img
                  class="h-full w-full object-cover hidden dark:block"
                  :src="'storage/' + product.thumb_image"
                  alt=""
                />
              </a>
            </div>
            <div class="pt-6">
              <div class="mb-4 flex items-center justify-between gap-4">
                <span
                  class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300"
                >
                  Up to 35% off
                </span>
              </div>
              <a
                :href="'/detail_products/' + product.id"
                class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white"
                >{{ product.name }}</a
              >
              <div class="mt-2 flex items-center gap-2">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                  (4,775)
                </p>
              </div>
              <ul class="mt-2 flex items-center gap-4">
                <li class="flex items-center gap-2">
                  <p
                    class="text-sm font-medium text-gray-500 dark:text-gray-400"
                  >
                    Best Price
                  </p>
                </li>
              </ul>
              <div class="mt-4 flex items-center justify-between gap-4">
                <p
                  class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white"
                >
                  ${{ product.price }}
                </p>
                <button
                  @click="handleAddToCart(product.id)"
                  type="button"
                  class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                >
                  Add to cart
                </button>
              </div>
            </div>
          </div>
        </transition-group>
      </div>
      <div v-if="visibleProducts < products.length" class="w-full text-center">
        <button
          @click="showMoreProducts"
          class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700"
        >
          Show more
        </button>
      </div>
    </div>
  </section>
</template>

<style scoped>
/* Enhanced Fade In Animation */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s ease, transform 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
  transform: translateY(20px);
}

.fade-enter-to,
.fade-leave-from {
  opacity: 1;
  transform: translateY(0);
}
</style>
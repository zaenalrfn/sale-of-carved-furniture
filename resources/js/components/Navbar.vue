<script setup>
import { useCartStore } from "../stores/cart";
import { ref, onMounted, computed } from "vue";
const isAuthenticated = ref(false);

// bagian cart
const cartStore = useCartStore();
const cartItems = computed(() => cartStore.cartItems);

// bagian hapus cart
const handleRemoveCartItem = (productId) => {
  cartStore.destoryCartItem(productId);
};

// bagian logout
// Ambil CSRF token dari meta tag di layout utama Laravel
const csrfToken = document
  .querySelector('meta[name="csrf-token"]')
  .getAttribute("content");
const logoutForm = ref(null);
const logout = () => {
  logoutForm.value.submit();
};

onMounted(() => {
  // Ambil data autentikasi dari elemen #app
  const appElement = document.getElementById("navbar-landing-page");
  if (appElement) {
    isAuthenticated.value = appElement.dataset.authenticated === "true";
  }
  cartStore.fetchCartItems();
});
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("myCartDropdownButton1").click();
});
</script>

<template>
  <nav class="bg-white dark:bg-gray-800 antialiased">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0 py-4">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-8">
          <div class="shrink-0">
            <a href="/" title="" class="text-2xl font-extrabold"> Coba shop </a>
          </div>

          <ul
            class="hidden lg:flex items-center justify-start gap-6 md:gap-8 py-3 sm:justify-center"
          >
            <li>
              <a
                href="/"
                title=""
                class="flex text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500"
              >
                Home
              </a>
            </li>
          </ul>
        </div>

        <div class="flex items-center lg:space-x-2">
          <button
            id="myCartDropdownButton1"
            data-dropdown-toggle="myCartDropdown1"
            type="button"
            class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white"
          >
            <span class="sr-only"> Cart </span>
            <svg
              class="w-5 h-5 lg:me-1"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              fill="none"
              viewBox="0 0 24 24"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"
              />
            </svg>
            <span class="hidden sm:flex">My Cart</span>
            <svg
              class="hidden sm:flex w-4 h-4 text-gray-900 dark:text-white ms-1"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              fill="none"
              viewBox="0 0 24 24"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m19 9-7 7-7-7"
              />
            </svg>
          </button>

          <div
            id="myCartDropdown1"
            class="hidden z-10 mx-auto max-w-sm space-y-4 overflow-hidden rounded-lg bg-white p-4 antialiased shadow-lg dark:bg-gray-800"
          >
            <span v-if="cartItems.length === 0">Belum ada produk</span>
            <div
              v-else
              class="grid grid-cols-2"
              v-for="itemCart in cartItems"
              :key="itemCart.id"
            >
              <div>
                <a
                  href="#"
                  class="truncate text-sm font-semibold leading-none text-gray-900 dark:text-white hover:underline"
                  >{{ itemCart.product.name }}</a
                >
                <p
                  class="mt-0.5 truncate text-sm font-normal text-gray-500 dark:text-gray-400"
                >
                  ${{ itemCart.product.price }}
                </p>
              </div>

              <div class="flex items-center justify-end gap-6">
                <p
                  class="text-sm font-normal leading-none text-gray-500 dark:text-gray-400"
                >
                  Qty: {{ itemCart.quantity }}
                </p>

                <button
                  @click="handleRemoveCartItem(itemCart.id)"
                  data-tooltip-target="tooltipRemoveItem1a"
                  type="button"
                  class="text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600"
                >
                  <span class="sr-only"> Remove </span>
                  <svg
                    class="h-4 w-4"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm7.7-3.7a1 1 0 0 0-1.4 1.4l2.3 2.3-2.3 2.3a1 1 0 1 0 1.4 1.4l2.3-2.3 2.3 2.3a1 1 0 0 0 1.4-1.4L13.4 12l2.3-2.3a1 1 0 0 0-1.4-1.4L12 10.6 9.7 8.3Z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </button>
                <div
                  id="tooltipRemoveItem1a"
                  role="tooltip"
                  class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                >
                  Remove item
                  <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
              </div>
            </div>
            <a
              href="/checkout"
              title=""
              class="mb-2 me-2 inline-flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
              role="button"
            >
              Proceed to Checkout
            </a>
          </div>

          <!-- bagian autentikasi -->

          <div v-if="!isAuthenticated" class="flex items-center gap-3 ml-2">
            <div>
              <a
                href="/login"
                class="bg-primary-700 hover:bg-primary-800 text-white py-2 px-3 rounded-md"
                >Login</a
              >
            </div>
            <div>
              <a
                href="/register"
                class="bg-primary-700 hover:bg-primary-800 text-white py-2 px-3 rounded-md"
                >Register</a
              >
            </div>
          </div>
          <div v-else>
            <button
              id="userDropdownButton1"
              data-dropdown-toggle="userDropdown1"
              type="button"
              class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white"
            >
              <svg
                class="w-5 h-5 me-1"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-width="2"
                  d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                />
              </svg>
              Account
              <svg
                class="w-4 h-4 text-gray-900 dark:text-white ms-1"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m19 9-7 7-7-7"
                />
              </svg>
            </button>

            <div
              id="userDropdown1"
              class="hidden z-10 w-56 divide-y divide-gray-100 overflow-hidden overflow-y-auto rounded-lg bg-white antialiased shadow dark:divide-gray-600 dark:bg-gray-700"
            >
              <ul
                class="p-2 text-start text-sm font-medium text-gray-900 dark:text-white"
              >
                <li>
                  <a
                    href="/myaccount"
                    title=""
                    class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"
                  >
                    My Account
                  </a>
                </li>
              </ul>

              <div
                class="p-2 text-sm font-medium text-gray-900 dark:text-white"
              >
                <form action="/logout" method="POST" ref="logoutForm">
                  <input type="hidden" name="_token" :value="csrfToken" />
                  <a
                    href="#"
                    title=""
                    type="submit"
                    @click.prevent="logout"
                    class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"
                  >
                    Sign Out
                  </a>
                </form>
              </div>
            </div>
          </div>

          <button
            type="button"
            data-collapse-toggle="ecommerce-navbar-menu-1"
            aria-controls="ecommerce-navbar-menu-1"
            aria-expanded="false"
            class="inline-flex lg:hidden items-center justify-center hover:bg-gray-100 rounded-md dark:hover:bg-gray-700 p-2 text-gray-900 dark:text-white"
          >
            <span class="sr-only"> Open Menu </span>
            <svg
              class="w-5 h-5"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              fill="none"
              viewBox="0 0 24 24"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-width="2"
                d="M5 7h14M5 12h14M5 17h14"
              />
            </svg>
          </button>
        </div>
      </div>

      <div
        id="ecommerce-navbar-menu-1"
        class="bg-gray-50 dark:bg-gray-700 dark:border-gray-600 border border-gray-200 rounded-lg py-3 hidden px-4 mt-4"
      >
        <ul
          class="text-gray-900 dark:text-white text-sm font-medium dark:text-white space-y-3"
        >
          <li>
            <a
              href="#"
              class="hover:text-primary-700 dark:hover:text-primary-500"
              >Home</a
            >
          </li>
          <li>
            <a
              href="#"
              class="hover:text-primary-700 dark:hover:text-primary-500"
              >Best Sellers</a
            >
          </li>
          <li>
            <a
              href="#"
              class="hover:text-primary-700 dark:hover:text-primary-500"
              >Gift Ideas</a
            >
          </li>
          <li>
            <a
              href="#"
              class="hover:text-primary-700 dark:hover:text-primary-500"
              >Games</a
            >
          </li>
          <li>
            <a
              href="#"
              class="hover:text-primary-700 dark:hover:text-primary-500"
              >Electronics</a
            >
          </li>
          <li>
            <a
              href="#"
              class="hover:text-primary-700 dark:hover:text-primary-500"
              >Home & Garden</a
            >
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
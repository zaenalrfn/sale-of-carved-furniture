<script setup>
import { ref, reactive, computed } from "vue";
// State untuk item cart dan data produk
const itemCarts = ref([]);
const dataProduct = reactive({
  name: "",
  email: "",
});

// Props untuk menerima data dari parent
const props = defineProps({
  dataCart: {
    type: Array,
    required: true,
  },
});

// Salin data ke itemCarts
itemCarts.value = [...props.dataCart];
console.log(itemCarts.value[0]);

// Asumsikan data user (name dan email) diambil dari item pertama (jika ada)
if (itemCarts.value.length > 0) {
  const firstItem = itemCarts.value[0];
  dataProduct.name = firstItem.user.name || "Default Name";
  dataProduct.email = firstItem.user.email || "Default Email";
}

// Hitung subtotal dan total
const calculateSubtotal = (item) => {
  return item.quantity * (item.product.price || 0); // product_price harus ada di data
};

const subtotal = computed(() => {
  return itemCarts.value.reduce(
    (sum, item) => sum + calculateSubtotal(item),
    0
  );
});

const total = computed(() => subtotal.value); // Jika ada tambahan biaya, tambahkan di sini
</script>
<template>
  <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
    <form action="#" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <ol
        class="items-center flex w-full max-w-2xl text-center text-sm font-medium text-gray-500 dark:text-gray-400 sm:text-base"
      >
        <li
          class="after:border-1 flex items-center text-primary-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 dark:text-primary-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10"
        >
          <span
            class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden"
          >
            <svg
              class="me-2 h-4 w-4 sm:h-5 sm:w-5"
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
                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
              />
            </svg>
            Cart
          </span>
        </li>

        <li
          class="after:border-1 flex items-center text-primary-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 dark:text-primary-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10"
        >
          <span
            class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden"
          >
            <svg
              class="me-2 h-4 w-4 sm:h-5 sm:w-5"
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
                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
              />
            </svg>
            Checkout
          </span>
        </li>

        <li class="flex shrink-0 items-center">
          <svg
            class="me-2 h-4 w-4 sm:h-5 sm:w-5"
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
              d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
            />
          </svg>
          Order summary
        </li>
      </ol>

      <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
        <div class="min-w-0 flex-1 space-y-8">
          <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
              Delivery Details
            </h2>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <div>
                <label
                  for="your_name"
                  class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                >
                  name*
                </label>
                <input
                  type="text"
                  id="your_name"
                  v-model="dataProduct.name"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                  placeholder="Bonnie Green"
                  required
                />
              </div>

              <div>
                <label
                  for="your_email"
                  class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                >
                  email*
                </label>
                <input
                  type="email"
                  id="your_email"
                  v-model="dataProduct.email"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                  placeholder="name@flowbite.com"
                  required
                />
              </div>

              <div>
                <div class="mb-2 flex items-center gap-2">
                  <label
                    for="select-country-input-3"
                    class="block text-sm font-medium text-gray-900 dark:text-white"
                  >
                    Negara
                  </label>
                </div>
                <input
                  type="text"
                  id="negara"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                  placeholder="negara"
                  required
                />
              </div>

              <div>
                <div class="mb-2 flex items-center gap-2">
                  <label
                    for="select-city-input-3"
                    class="block text-sm font-medium text-gray-900 dark:text-white"
                  >
                    Kota*
                  </label>
                </div>
                <input
                  type="text"
                  id="kota"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                  placeholder="kota"
                  required
                />
              </div>

              <div>
                <label
                  for="phone-input-3"
                  class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                >
                  No-wa
                </label>
                <input
                  type="text"
                  id="phone-input"
                  class="z-20 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:border-s-gray-700 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500"
                  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                  placeholder="123-456-7890"
                  required
                />
              </div>
              <div>
                <label
                  for="phone-input-3"
                  class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                >
                  Alamat lengkap
                </label>
                <textarea
                  id="addreass"
                  rows="4"
                  name="addreass"
                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="Alamat lengkap"
                ></textarea>
              </div>
            </div>
          </div>
        </div>

        <div
          class="mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md"
        >
          <div class="flow-root">
            <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
              <dl class="flex items-center justify-between gap-4 py-3">
                <dt
                  class="text-base font-normal text-gray-500 dark:text-gray-400"
                >
                  Subtotal
                </dt>
                <dd class="text-base font-medium text-gray-900 dark:text-white">
                  {{ subtotal }}
                </dd>
              </dl>
              <dl class="flex items-center justify-between gap-4 py-3">
                <dt class="text-base font-bold text-gray-900 dark:text-white">
                  Total
                </dt>
                <dd class="text-base font-bold text-gray-900 dark:text-white">
                  {{ total }}
                </dd>
              </dl>
            </div>
          </div>
          <button
            type="submit"
            class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800"
          >
            Proceed to Payment
          </button>
        </div>
      </div>
    </form>
  </section>
</template>
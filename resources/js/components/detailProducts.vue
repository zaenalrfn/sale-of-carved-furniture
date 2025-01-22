<script setup>
import { ref } from "vue";
const props = defineProps({
  product: {
    type: Object,
    required: true,
  },
});

const detail_product = ref(props.product);
console.log(detail_product.value);
</script>

<template>
  <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
      <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
        <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
          <img
            class="w-full dark:hidden"
            :src="'/storage/' + detail_product.thumb_image"
            alt=""
          />
          <img
            class="w-full hidden dark:block"
            :src="'/storage/' + detail_product.thumb_image"
            alt=""
          />
        </div>

        <div class="mt-6 sm:mt-8 lg:mt-0">
          <h1
            class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"
          >
            {{ detail_product.name }}
          </h1>
          <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
            <p
              class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white"
            >
              ${{ detail_product.price }}
            </p>
          </div>

          <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
            <a
              href="#"
              title=""
              class="text-white mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
              role="button"
            >
              <svg
                class="w-5 h-5 -ms-2 me-2"
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
                  d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"
                />
              </svg>

              Add to cart
            </a>
          </div>

          <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

          <p class="mb-6 text-gray-500 dark:text-gray-400">
            {{ detail_product.short_description }}
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- product information -->
  <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div class="mx-auto max-w-5xl">
        <h2
          class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl"
        >
          Product description
        </h2>
        <div
          class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 my-8 xl:mb-16 xl:mt-12"
        >
          <div
            class="w-full"
            v-for="image in detail_product.images"
            :key="image.id"
          >
            <img
              class="w-full dark:hidden object-cover rounded-lg"
              :src="'/storage/' + image.image_path"
              alt="Gambar Produk"
            />
          </div>
        </div>

        <div class="mx-auto max-w-2xl space-y-6">
          <p class="text-base font-normal text-gray-500 dark:text-gray-400">
            {{ detail_product.description }}
          </p>
        </div>
      </div>
    </div>
  </section>
</template>
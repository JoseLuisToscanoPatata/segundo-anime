<template>
  <inertia-link :href="href" :class="classes" class="font-bold">
    <slot></slot>
  </inertia-link>
</template>

<script>
export default {
  props: ["href", "active"],

  computed: {
    classes() {
      return this.active
        ? "inline-flex items-center px-1 pt-1 border-b-2 text-lg font-extrabold leading-5 focus:outline-none focus:border-red-700 transition duration-150 ease-in-out"
        : "inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-lg leading-5 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out";
    },
  },
};
</script>

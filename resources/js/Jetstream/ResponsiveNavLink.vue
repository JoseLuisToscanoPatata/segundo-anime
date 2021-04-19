<template>
  <div :class="classes">
    <button class="w-full text-left" v-if="as == 'button'">
      <slot></slot>
    </button>

    <inertia-link :href="href" v-else>
      <slot></slot>
    </inertia-link>
  </div>
</template>

<script>
export default {
  props: ["active", "href", "as"],

  computed: {
    classes() {
      return this.active
        ? "block pl-3 pr-4 py-2 border-l-4 text-base font-extrabold focus:outline-none transition duration-150 ease-in-out"
        : "block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-extrabold hover:border-white focus:outline-none transition duration-150 ease-in-out";
    },
  },
};
</script>

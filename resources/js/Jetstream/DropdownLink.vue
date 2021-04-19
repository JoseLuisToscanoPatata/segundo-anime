<template>
  <div>
    <button
      type="submit"
      class="block w-full px-4 py-2 text-sm leading-5 text-left focus:outline-none transition duration-150 ease-in-out"
      :class="[color, activo]"
      v-if="as == 'button'"
    >
      <slot></slot>
    </button>

    <inertia-link
      :href="href"
      :class="[activo, color]"
      class="block px-4 py-2 text-sm leading-5 focus:outline-none transition duration-150 ease-in-out hover:border-white"
      v-else
    >
      <slot></slot>
    </inertia-link>
  </div>
</template>

<script>
export default {
  props: {
    href: {},
    as: {},
    active: { default: false },
    color: {
      default: () => [
        "text-white",
        "hover:text-black",
        "hover:bg-gray-100",
        "focus:bg-gray-100",
      ],
    },
  },

  computed: {
    activo() {
      return this.active
        ? "focus:outline-none border-l-4 border-r-4 transition duration-150 ease-in-out"
        : "border-l-0 border-r-0 hover:border-white focus:outline-none transition duration-150 ease-in-out";
    },
  },
};
</script>

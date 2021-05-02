<template>
  <div :class="'bg-' + color + '-100'" class="p-6 rounded-lg">
    <span class="text-2xl font-semibold" :class="'text-' + color + '-400'"
      >Loading...</span
    >
  </div>
</template>

<script>
export default {
  data() {
    return {
      paginas: 10,
    };
  },

  methods: {},

  props: {
    color: "",
  },
};
</script>

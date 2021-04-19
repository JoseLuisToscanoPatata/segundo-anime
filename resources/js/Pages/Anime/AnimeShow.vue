<template>
  <app-layout color="#EF4444">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ titulo }}</h2>
    </template>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },

  props: ["clave"],

  data() {
    return {
      titulo: "PARTICULAR",
    };
  },
};
</script>

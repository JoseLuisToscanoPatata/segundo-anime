<template>
  <app-layout color="#FBBF24">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">MANGA LIST</h2>
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
};
</script>

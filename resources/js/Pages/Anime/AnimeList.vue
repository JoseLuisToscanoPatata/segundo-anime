<template>
  <app-layout color="#EF4444">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">ANIME</h2>
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

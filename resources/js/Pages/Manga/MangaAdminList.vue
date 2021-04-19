<template>
  <app-layout color="#60A5FA">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">ADMIN MANGA LIST</h2>
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

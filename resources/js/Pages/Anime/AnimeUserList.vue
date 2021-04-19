<template>
  <app-layout color="#A78BFA">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">ANIME LIST</h2>
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

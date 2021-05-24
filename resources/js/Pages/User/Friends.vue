<template>
  <app-layout color="#E5E7EB">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">MY FRIENDS</h2>
    </template>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },

  props: ["clave", "usuLista"],
};
</script>

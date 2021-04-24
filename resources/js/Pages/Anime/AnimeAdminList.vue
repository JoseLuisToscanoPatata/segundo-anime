<template>
  <app-layout color="#34D399">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">ADMIN ANIME LIST</h2>
    </template>

    <button @click="enviar">PATATA</button>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },

  props: ["clave"],
  methods: {
    enviar() {
      this.$inertia.post(
        "api/mangas",
        {
          title: "Patata",
          synopsis: "Ostia pilotes",
          chapters: 15,
          ageRating: "PG",
          status: "current",
        },
        {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        }
      );
    },
  },
};
</script>

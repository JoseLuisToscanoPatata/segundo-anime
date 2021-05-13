<template>
  <app-layout color="#EF4444">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ actual.title }}
      </h2>
    </template>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },

  props: ["clave", "anime"],

  data() {
    return {
      actual: {},
    };
  },

  created() {
    this.obtenerDatos();
  },

  methods: {
    obtenerDatos() {
      axios
        .get(route("animes.show", this.anime), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.actual = res.data.data;
          this.cargando = false;
        });
    },
  },
};
</script>

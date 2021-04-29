<template>
  <app-layout color="#F472B6">
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

  props: ["clave", "manga"],

  data() {
    return {
      titulo: "PARTICULAR",
    };
  },

  created() {
    this.obtenerDatos();
  },

  methods: {
    obtenerDatos() {
      axios
        .get(route("mangas.show", this.manga), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.titulo = res.data.data.title;
          this.cargando = false;
        });
    },
  },
};
</script>

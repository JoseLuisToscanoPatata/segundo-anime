<template>
  <app-layout color="#EF4444">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">ANIME</h2>
    </template>
    <div class="max-w-7xl mx-3 sm:mx-auto sm:px-6 lg:px-8 py-12">
      <!-- MODAL DE MENSAJES-->
      <data-grid-area
        v-if="!cargando"
        :datos="datos"
        :cantidadPaginas="paginacion"
        :filtros="filtros"
        :key="datos"
        :color="colores"
        tipo="anime"
      >
      </data-grid-area>

      <loading v-else color="yellow"></loading>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import DataGridArea from "@/Pages/Componentes/DataGridArea";
import Loading from "@/Pages/Componentes/Loading";

export default {
  components: {
    AppLayout,
    DataGridArea,
    Loading,
  },

  props: ["clave", "usuario"],

  data() {
    return {
      paginacion: [
        { texto: "12", numero: 12 },
        { texto: "24", numero: 24 },
        { texto: "48", numero: 48 },
        { texto: "72", numero: 72 },
        { texto: "120", numero: 120 },
      ],

      datos: [],

      colores: {
        color: "red",
        hexa: "border:  #fc8181;",
      },

      filtros: [
        {
          nombre: "subtype",
          titulo: "Subtype",
          opciones: ["ONA", "OVA", "TV", "movie", "music", "special"],
          titulos: ["ONA", "OVA", "TV", "Movie", "Music", "Special"],
          actual: "",
          ancho: "col-span-2",
        },

        {
          nombre: "yourStatus",
          titulo: "Your Status",
          opciones: ["PlanToWatch", "Watching", "OnHold", "Completed", "Dropped"],
          titulos: ["Plan to Watch", "Watching", "On Hold", "Completed", "Dropped"],
          actual: "",
          ancho: "col-span-2",
        },
      ],

      cargando: true,
    };
  },

  created() {
    this.obtenerDatos();
  },

  methods: {
    //OBTENER LOS DATOS DE MANGAS
    obtenerDatos() {
      axios
        .get(route("reads.index", this.userList), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          for (let actual = 0; actual < res.data.data.length; actual++) {
            this.datos.push({
              id: res.data.data[actual].id,
              title: res.data.data[actual].title,
              cover: res.data.data[actual].cover,
              rating: res.data.data[actual].rating,
              chapters: res.data.data[actual].chapters,
              readStatus: res.data.data[actual].pivot.readStatus,
              status: res.data.data[actual].status,
              favourite: res.data.data[actual].pivot.favourite,
              score: res.data.data[actual].pivot.score,
            });
          }
        });

      this.cargando = false;
    },
  },
};
</script>

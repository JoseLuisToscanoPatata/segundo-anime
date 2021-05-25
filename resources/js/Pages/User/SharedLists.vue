<template>
  <app-layout color="#A3E635">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ perfilUsu.name }} Shared Lists
      </h2>
    </template>

    <div class="max-w-7xl w-full sm:mx-auto px-3 xs3:px-6 lg:px-8 py-12">
      <banner-propio
        v-if="datosInfo['mostrar']"
        @close="datosInfo['mostrar'] = false"
        :color="datosInfo['color']"
        :style="datosInfo['style']"
        :message="datosInfo['mensaje']"
      />

      <div
        class="flex flex-col xs3:flex-row p-6 bg-lime-100 rounded-lg justify-start items-start"
        v-if="mostrar == 'si'"
      ></div>

      <loading v-show="mostrar == 'no'" color="lime" />
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import Loading from "../Componentes/Loading.vue";
import BannerPropio from "@/Pages/Componentes/BannerPropio";

export default {
  components: {
    AppLayout,
    JetInput,
    JetButton,
    Loading,
    BannerPropio,
  },

  props: ["clave", "usu1", "usu2", "ambos", "tipo", "usuario"],

  data() {
    return {
      mostrar: "no",
      procesosTerminados: 0,

      usuario1: "",
      usuario2: "",
      lista: "nada",
      existencia: "nada",

      usuCorrectos: false,

      datosInfo: {
        mostrar: false,
        style: "",
        mensaje: "",
        color: "",
      },
    };
  },

  created() {
    this.usuario1 = this.usu1;
    this.usuario2 = this.usu2;
    this.lista = this.tipo;

    if (this.ambos) {
      this.existencia = "ambos";
    }

    if (this.usuario1.trim() != "" && this.usuario2.trim() != "") {
      this.comprobarUsuarios();
    }
  },

  methods: {
    comprobarUsuarios() {},
  },
};
</script>

<style scoped>
::-webkit-scrollbar {
  width: 20px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px rgb(94, 93, 93);
  border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #555455;
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #242424;
}

::-webkit-scrollbar-track-piece {
  background: white;
  border-radius: 10px;
}
</style>

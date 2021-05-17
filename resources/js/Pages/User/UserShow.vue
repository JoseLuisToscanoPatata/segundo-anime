<template>
  <app-layout color="#E5E7EB">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ perfilUsu.name }} Profile
      </h2>
    </template>

    <div class="max-w-7xl w-full mx-3 sm:mx-auto sm:px-6 lg:px-8 py-12"></div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";

export default {
  components: {
    AppLayout,
    JetDialogModal,
    JetInput,
    JetInputError,
    JetButton,
    JetDangerButton,
  },

  props: ["clave", "perfil", "usuario"],

  data() {
    return {
      perfilUsu: {
        name: "",
        profilePhoto: "",
        animes: {
          total: 0,
          watching: 0,
          completed: 0,
          planToWatch: 0,
          dropped: 0,
          onHold: 0,
          watching100: 0,
          completed100: 0,
          planToWatch100: 0,
          dropped100: 0,
          onHold100: 0,
        },

        mangas: {
          total: 0,
          reading: 0,
          completed: 0,
          planToRead: 0,
          dropped: 0,
          onHold: 0,
          reading100: 0,
          completed100: 0,
          planToRead100: 0,
          dropped100: 0,
          onHold100: 0,
        },

        chapters: 0,
        episodes: 0,

        favourites: 0,
        animeMeanScore: 0,
        mangaMeanScore: 0,
      },

      amigos: [],

      afinidad: 0,
      afinidad100: 0,

      userAnimes: [],
      userMangas: [],

      myAnimes: [],
      myMangas: [],

      creandoMensaje: false,
      borrandoAmigo: false,

      cargando: true,
      mensajeVacio: false,

      datosInfo: {
        mostrar: false,
        titulo: "",
        mensaje: "",
        color: "black",
      },
    };
  },

  created() {
    this.obtenerUsuario();
    this.obtenerAnimes();
    this.obtenerMangas();
    this.obtenerAmigos();
  },

  methods: {
    obtenerUsuario() {},
    obtenerAnimes() {},
    obtenerMangas() {},
    obtenerAmigos() {},
    calcularPorcentajes() {},
    cambiarAmigo() {},
    enviarMensaje() {},
    pulsadoMensaje() {},
    sortear() {},
  },
};
</script>

<template>
  <app-layout color="#E5E7EB">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ perfilUsu.name }} Profile
      </h2>
    </template>

    <div class="max-w-7xl w-full mx-3 sm:mx-auto sm:px-6 lg:px-8 py-12">
      <banner-propio
        v-if="datosInfo['mostrar']"
        @close="datosInfo['mostrar'] = false"
        :color="datosInfo['color']"
        :style="datosInfo['style']"
        :message="datosInfo['mensaje']"
      />

      <template v-if="!cargando"> </template>

      <loading v-else color="gray" />
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import Loading from "../Componentes/Loading.vue";
import BannerPropio from "@/Pages/Componentes/BannerPropio";

export default {
  components: {
    AppLayout,
    JetDialogModal,
    JetInput,
    JetInputError,
    JetButton,
    JetDangerButton,
    Loading,
    BannerPropio,
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
      obtenido: false,

      datosInfo: {
        mostrar: false,
        style: "",
        mensaje: "",
        color: "",
      },
    };
  },

  created() {
    this.obtenerUsuario();
  },

  methods: {
    obtenerUsuario() {
      axios
        .get(route("users.show", { user: this.perfil }), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.perfilUsu.name = res.data.data.name;
          this.perfilUsu.profilePhoto = res.data.data.profile_photo_url;
          this.obtenido = true;

          this.obtenerAnimes();
          this.obtenerMangas();
          this.obtenerAmigos();
        })
        .catch((err) => {
          this.datosInfo["color"] = "red";
          this.datosInfo["style"] = "danger";
          this.datosInfo["mensaje"] = err.response.data.message;
          this.datosInfo["mostrar"] = true;
        });
    },
    obtenerAnimes() {
      axios
        .get(route("watches.index", this.perfil), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          for (let actual = 0; actual < res.data.data.length; actual++) {
            this.userAnimes.push({
              id: res.data.data[actual].id,
              title: res.data.data[actual].title,
              cover: res.data.data[actual].cover,
              watchStatus: res.data.data[actual].pivot.watchStatus,
              favourite: res.data.data[actual].pivot.favourite,
              score: res.data.data[actual].pivot.score,
            });
          }
        });

      axios
        .get(route("watches.index", this.usuario.id), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          for (let actual = 0; actual < res.data.data.length; actual++) {
            this.myAnimes.push(res.data.data[actual].id);
          }
        });
    },
    obtenerMangas() {
      axios
        .get(route("reads.index", this.perfil), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          for (let actual = 0; actual < res.data.data.length; actual++) {
            this.userMangas.push({
              id: res.data.data[actual].id,
              title: res.data.data[actual].title,
              cover: res.data.data[actual].cover,
              readStatus: res.data.data[actual].pivot.readStatus,
              favourite: res.data.data[actual].pivot.favourite,
              score: res.data.data[actual].pivot.score,
            });
          }
        });

      axios
        .get(route("reads.index", this.usuario.id), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          for (let actual = 0; actual < res.data.data.length; actual++) {
            this.myMangas.push(res.data.data[actual].id);
          }
        });
    },

    obtenerAmigos() {
      axios
        .get(route("friends.index", this.perfil), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.amigos = res.data.data;
          console.log(this.amigos);
        });
    },
    calcularPorcentajes() {},
    cambiarAmigo() {},
    enviarMensaje() {},
    pulsadoMensaje() {},
    sortear() {},
  },
};
</script>

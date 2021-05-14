<template>
  <app-layout color="#EF4444">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ actual.title }}
      </h2>
    </template>

    <div class="max-w-7xl mx-3 sm:mx-auto sm:px-6 lg:px-8 py-12">
      <!-- MODAL DE MENSAJES-->

      <div
        v-if="!cargando"
        class="bg-red-200 p-6 flex grid grid-cols-12 justify-start items-start rounded-lg"
      >
        <a
          :href="actual.cover"
          v-if="actual.cover != null"
          target="blank"
          class="col-span-5"
        >
          <img :src="actual.cover" alt="Cover" class="h-72 rounded-lg"
        /></a>

        <img
          src="/img/no_foto.jpg"
          alt="No foto"
          class="col-span-5 h-72 rounded-lg"
          v-else
        />
      </div>

      <loading v-else color="red"></loading>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },

  props: ["clave", "anime", "usuario"],

  data() {
    return {
      actual: {
        title: "",
        userCount: null,
        synopsis: null,
        score: null,
        startDate: null,
        endDate: null,
        episodes: null,
        cover: null,
        episodeLength: null,
        ageRating: null,
        subType: null,
        trailer: null,
        status: null,
        startDatePretty: null,
        topUsers: null,
        topRating: null,
      },

      estado: {
        favourite: null,
        score: null,
        watchStatus: null,
        watchId: null,
      },
    };
  },

  created() {
    this.obtenerDatos();
    this.obtenerPosiciones();
    this.obtenerVistos();
    this.cargando = false;
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
          this.actual.title = res.data.data.title;
          this.actual.userCount = res.data.data.userCount;
          this.actual.synopsis = res.data.data.synopsis;
          this.actual.score = res.data.data.rating;

          if (res.data.data.startDate != null) {
            this.actual.startDate = res.data.data.startDate;
            var fechaActual = res.data.data.startDate;

            var season = "";

            if (parseInt(fechaActual.split("-")[1]) < 4) {
              season = "winter";
            } else if (parseInt(fechaActual.split("-")[1]) < 7) {
              season = "spring";
            } else if (parseInt(fechaActual.split("-")[1]) < 10) {
              season = "summer";
            } else {
              season = "fall";
            }

            var año = fechaActual.split("-")[0];

            this.actual.startDatePretty = season + " " + año;
          } else {
            this.actual.startDate = "?";
            this.actual.startDatePretty = "undefined";
          }

          if (res.data.data.endDate != null) {
            this.actual.endDate = res.data.data.endDate;
          } else {
            this.actual.endDate = "?";
          }

          this.actual.cover = res.data.data.cover;

          if (res.data.data.episodes == null) {
            this.actual.episodes = "?";
          } else {
            this.actual.episodes = res.data.data.episodes;
          }

          if (res.data.data.episodeLength == 0) {
            this.actual.episodeLength = "?";
          } else {
            this.actual.episodeLength = res.data.data.episodeLength;
          }

          if ((res.data.data.ageRating = "PG")) {
            this.actual.ageRating = "PG - Teens 13 or older";
          } else if ((res.data.data.ageRating = "G")) {
            this.actual.ageRating = "G - All audiences";
          } else if ((res.data.data.ageRating = "R")) {
            this.actual.ageRating = "R - People 17 or older";
          }

          this.actual.subType = res.data.data.subType;

          if (res.data.data.trailer == null) {
            this.actual.trailer = "undefined";
          } else {
            this.actual.trailer = res.data.data.trailer;
          }

          this.actual.status = res.data.data.status;

          console.log(this.actual);
        });
    },

    obtenerPosiciones() {
      axios
        .get(route("animes.index"), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          var datos = this.sortear(res.data.data, "rating");

          for (let actual = 0; actual < datos.length; actual++) {
            if (datos[actual].id == this.anime) {
              this.actual.topRating = actual + 1;
            }
          }

          datos = this.sortear(datos, "userCount");

          for (let actual = 0; actual < datos.length; actual++) {
            if (datos[actual].id == this.anime) {
              this.actual.topUsers = actual + 1;
            }
          }
        });
    },

    obtenerVistos() {
      axios
        .get(route("watches.index", this.usuario.id), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          var datos = this.sortear(res.data.data, "anime_id");

          for (let actual = 0; actual < datos.length; actual++) {
            if (datos[actual].anime_id == this.anime) {
              this.estado.favourite = datos[actual].favourite;
              this.estado.watchStatus = datos[actual].watchStatus;
              this.estado.score = datos[actual].score;
              this.estado.watchId = datos[actual].id;
            }
          }
        });
    },

    ver() {
      var datos = new FormData();

      datos.append("anime_id", this.actual.id);
      datos.append("user_id", this.usuario.id);
      if (this.estado.watchStatus == null) {
        this.estado.watchStatus = "planToWatch";
      }
      datos.append("watchStatus", this.estado.watchStatus);
      datos.append("favourite", this.estado.favourite);

      if (this.estado.score != null) {
        datos.append("score", this.estado.score);
      }

      if (this.estado.watchId == null) {
        axios
          .post(route("watches.store"), datos, {
            headers: {
              Authorization: "Bearer " + this.clave,
            },
          })
          .then((res) => {
            this.estado.watchId = res.data.data.id;
            alert("nuevo");
          });
      } else {
        datos.append("_method", "PUT");

        axios
          .post(route("watches.update"), datos, {
            headers: {
              Authorization: "Bearer " + this.clave,
            },
          })
          .then((res) => {
            alert("actualizado");
          });
      }
    },

    eliminar() {
      axios
        .delete(route("watches.destroy", this.estado.watchId), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          alert("eliminado");
          this.estado.watchStatus = null;
          this.estado.score = null;
          this.estado.watchId = null;
          this.estado.favourite = 0;
        });
    },

    sortear(datos, campo) {
      datos = datos.sort(function (a, b) {
        var x = a[campo];
        var y = b[campo];

        return x < y ? -1 : x > y ? 1 : 0;
      });

      return datos;
    },
  },
};
</script>

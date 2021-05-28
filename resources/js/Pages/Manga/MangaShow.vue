<template>
  <app-layout color="#EAB308">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ actual.title }}
      </h2>
    </template>
    <div class="max-w-7xl xs2:mx-3 sm:mx-auto sm:px-6 lg:px-8 py-12">
      <banner-propio
        v-if="datosInfo['mostrar']"
        @close="datosInfo['mostrar'] = false"
        :color="datosInfo['color']"
        :style="datosInfo['style']"
        :message="datosInfo['mensaje']"
      />

      <div
        class="flex flex-col p-6 bg-yellow-200 rounded-lg justify-start items-start"
        v-if="mostrar == 'si'"
      >
        <div class="flex flex-col xs2:flex-row w-full">
          <div class="flex flex-col items-center mb-4 xs2:mb-0 min-w-full xs2:min-w-min">
            <a :href="actual.cover" v-if="actual.cover != null" target="blank">
              <img
                :src="actual.cover"
                alt="Cover"
                class="h-60 w-48 rounded-lg md:h-80 md:w-56 mb-5"
            /></a>

            <img
              src="/img/no_foto.jpg"
              alt="No foto"
              class="h-60 w-48 rounded-lg md:h-80 md:w-56 mb-5"
              v-else
            />

            <div
              class="flex flex-col items-center justify-start min-w-full rounded-md m-2"
            >
              <div class="flex flex-row items-center justify-evenly mb-3">
                <select
                  v-model="estado.readStatus"
                  class="mt-1 block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-40 mr-3"
                  @change="ver"
                >
                  <option value="" disabled>Read</option>
                  <option value="PlanToRead">Plan To Read</option>
                  <option value="Reading" v-if="actual.status != 'tba'">Reading</option>

                  <option value="Completed" v-if="actual.status == 'finished'">
                    Completed
                  </option>
                  <option value="Dropped" v-if="actual.status != 'tba'">Dropped</option>
                  <option value="OnHold" v-if="actual.status != 'tba'">On Hold</option>
                </select>

                <div v-show="visto">
                  <abbr
                    title="Add to favourite"
                    v-show="estado.favourite == 0"
                    class="xs2:hidden"
                  >
                    <img
                      src="/img/nofavlist.svg"
                      alt="fav icon"
                      class="h-5 w-auto cursor-pointer transform hover:scale-110 active:scale-120"
                      @click="cambiarFav"
                    />
                  </abbr>

                  <abbr
                    title="Delete from favourites"
                    v-show="estado.favourite == 1"
                    class="xs2:hidden"
                  >
                    <img
                      src="/img/favlist.svg"
                      alt="delete fav icon"
                      class="h-5 w-auto cursor-pointer transform hover:scale-110 active:scale-120"
                      @click="cambiarFav"
                    />
                  </abbr>
                </div>
              </div>

              <div class="flex flex-row justify-evenly items-center">
                <select
                  v-model.number="estado.score"
                  class="mt-1 block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-40 mr-3"
                  @change="ver"
                >
                  <option value="0" disabled>Your score</option>
                  <option value="1">(1) Apalling</option>
                  <option value="2">(2) Horrible</option>
                  <option value="3">(3) Very Bad</option>
                  <option value="4">(4) Bad</option>
                  <option value="5">(5) Average</option>
                  <option value="6">(6) Fine</option>
                  <option value="7">(7) Good</option>
                  <option value="8">(8) Very Good</option>
                  <option value="9">(9) Great</option>
                  <option value="10">(10) Potato</option>
                </select>

                <abbr title="Delete from my list" v-show="visto" class="xs2:hidden">
                  <img
                    src="/img/deleteOther.svg"
                    alt="delete icon"
                    class="h-5 w-auto cursor-pointer transform hover:scale-110 active:scale-120"
                    @click="eliminar"
                  />
                </abbr>
              </div>

              <div
                class="xs2:flex flex-row justify-evenly items-center hidden w-full mt-5"
                v-show="visto"
              >
                <abbr title="Add to favourite" v-show="estado.favourite == 0">
                  <img
                    src="/img/nofavlist.svg"
                    alt="fav icon"
                    class="h-5 w-auto cursor-pointer transform hover:scale-110 active:scale-120"
                    @click="cambiarFav"
                  />
                </abbr>

                <abbr title="Delete from favourites" v-show="estado.favourite == 1">
                  <img
                    src="/img/favlist.svg"
                    alt="delete fav icon"
                    class="h-5 w-auto cursor-pointer transform hover:scale-110 active:scale-120"
                    @click="cambiarFav"
                  />
                </abbr>

                <abbr title="Delete from my list">
                  <img
                    src="/img/deleteOther.svg"
                    alt="delete icon"
                    class="h-5 w-auto cursor-pointer transform hover:scale-110 active:scale-120"
                    @click="eliminar"
                  />
                </abbr>
              </div>
            </div>
          </div>

          <div
            class="flex flex-col justfy-start items-center xs2:items-start w-full xs2:w-4/5 xs2:ml-2"
          >
            <div
              class="items-center justify-evenly min-w-full rounded-md bg-gray-50 p-2 pt-4 mb-2 grid grid-cols-6 md:grid-cols-12 text-gray-500"
            >
              <div
                class="flex flex-col justfy-evenly items-center col-span-3 md:col-span-2 mb-3 md:mb-0"
              >
                <div class="bg-yellow-400 text-white font-semibold rounded-sm px-2">
                  SCORE
                </div>
                <span class="text-lg font-bold text-black">{{ actual.score }}</span>
                <span class="text-xs text-black">{{ actual.ratingCount }} users</span>
              </div>

              <div
                class="flex flex-col xl:flex-row items-center text-lg md:col-start-4 col-span-3 mb-3 md:mb-0"
              >
                <span class="">Ranked:</span>
                <span class="font-bold ml-1">#{{ actual.topRating }}</span>
              </div>

              <div class="flex flex-col xl:flex-row items-center text-lg col-span-3">
                <span class="">Popularity</span>
                <span class="font-bold ml-1">#{{ actual.topUsers }}</span>
              </div>

              <div class="flex flex-col xl:flex-row items-center text-lg col-span-3">
                <span class="">Members:</span>
                <span class="font-bold ml-1">{{ actual.userCount }}</span>
              </div>
            </div>

            <div
              class="flex flex-col items-start justify-evenly w-full rounded-md bg-gray-50 p-2 pt-4"
            >
              <span class="font-bold text-lg mb-2 w-full text-center text-yellow-500"
                >INFORMATION</span
              >

              <div class="flex flex-col md:flex-row w-full text-gray-400">
                <div class="flex flex-col items-start justify-evenly w-full md:w-1/2">
                  <span class="text-sm"
                    ><b class="text-base text-yellow-400">Type:</b>
                    {{ actual.subType }}</span
                  >

                  <span class="text-sm"
                    ><b class="text-base text-yellow-400">Start Date:</b>
                    {{ actual.startDate }}</span
                  >

                  <span class="text-sm"
                    ><b class="text-base text-yellow-400">End Date:</b>
                    {{ actual.endDate }}</span
                  >
                </div>

                <div class="flex flex-col items-start justify-evenly w-full md:w-1/2">
                  <span class="text-sm"
                    ><b class="text-base text-yellow-400">Status:</b>
                    {{ actual.status }}</span
                  >

                  <span class="text-sm"
                    ><b class="text-base text-yellow-400">Chapters:</b>
                    {{ actual.subType }}</span
                  >

                  <span class="text-sm"
                    ><b class="text-base text-yellow-400">Rating:</b>
                    {{ actual.ageRating }}</span
                  >
                </div>
              </div>
            </div>

            <div class="hidden md:flex flex-col w-full rounded-lg bg-gray-50 mt-2 p-2">
              <span class="text-xl font-bold text-yellow-500 mb-5 w-full text-center"
                >SYNOPSIS</span
              >
              <div class="text-gray-400 max-h-40 overflow-y-auto text-justify p-1">
                {{ actual.synopsis }}
              </div>
            </div>
          </div>
        </div>

        <div class="p-3 mt-3 md:hidden flex flex-col w-full rounded-lg bg-gray-50">
          <span class="text-xl font-bold text-yellow-500 mb-5 w-full text-center"
            >SYNOPSIS</span
          >
          <div class="text-gray-400 max-h-40 overflow-y-auto text-justify p-1">
            {{ actual.synopsis }}
          </div>
        </div>
      </div>

      <loading v-show="mostrar == 'no'" color="yellow"></loading>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetModal from "@/Jetstream/Modal";
import JetInput from "@/Jetstream/Input";
import BannerPropio from "@/Pages/Componentes/BannerPropio";
import Loading from "@/Pages/Componentes/Loading";

export default {
  components: {
    AppLayout,
    JetButton,
    JetModal,
    JetInput,
    BannerPropio,
    Loading,
  },

  props: ["clave", "manga", "usuario"],

  data() {
    return {
      actual: {
        title: "",
        synopsis: null,
        cover: null,
        score: null,
        userCount: null,
        ratingCount: null,
        startDate: null,
        endDate: null,
        chapters: null,
        ageRating: null,
        subType: null,
        status: null,
        topUsers: null,
        topRating: null,
      },

      visto: false,

      mostrar: "no",
      preparados: 0,
      mostrarTrailer: false,

      estado: {
        favourite: 0,
        score: 0,
        readStatus: "",
      },

      datosInfo: {
        mostrar: false,
        style: "",
        mensaje: "",
        color: "",
      },
    };
  },

  created() {
    this.obtenerDatos();
    this.obtenerPosiciones();
    this.obtenerVistos();
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

          if (res.data.data.chapters == null) {
            this.actual.chapters = "?";
          } else {
            this.actual.chapters = res.data.data.chapters;
          }

          if ((res.data.data.ageRating = "PG")) {
            this.actual.ageRating = "PG - Teens 13 or older";
          } else if ((res.data.data.ageRating = "G")) {
            this.actual.ageRating = "G - All audiences";
          } else if ((res.data.data.ageRating = "R")) {
            this.actual.ageRating = "R - People 17 or older";
          }

          this.actual.subType = res.data.data.subType;

          this.actual.ratingCount = res.data.data.ratingCount;
          this.actual.status = res.data.data.status;

          this.preparados++;
          if (this.preparados == 3) {
            this.mostrar = "si";
          }
        })
        .catch((err) => {
          this.datosInfo["color"] = "red";
          this.datosInfo["style"] = "danger";
          this.datosInfo["mensaje"] = err.response.data.message;
          this.datosInfo["mostrar"] = true;
          this.mostrar = "error";
        });
    },

    obtenerPosiciones() {
      axios
        .get(route("mangas.index"), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          var datos = this.sortear(res.data.data, "rating");

          for (let actual = 0; actual < datos.length; actual++) {
            if (datos[actual].id == this.manga) {
              this.actual.topRating = actual + 1;
            }
          }

          datos = this.sortear(datos, "userCount");

          for (let actual = 0; actual < datos.length; actual++) {
            if (datos[actual].id == this.manga) {
              this.actual.topUsers = actual + 1;
            }
          }
          this.preparados++;
          if (this.preparados == 3) {
            this.mostrar = "si";
          }
        })
        .catch((err) => {
          this.datosInfo["color"] = "red";
          this.datosInfo["style"] = "danger";
          this.datosInfo["mensaje"] = err.response.data.message;
          this.datosInfo["mostrar"] = true;
          this.mostrar = "error";
        });
    },

    obtenerVistos() {
      axios
        .get(route("reads.index", this.usuario.id), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          for (let actual = 0; actual < res.data.data.length; actual++) {
            if (res.data.data[actual].id == this.manga) {
              this.estado.favourite = res.data.data[actual].pivot.favourite;
              this.estado.readStatus = res.data.data[actual].pivot.readStatus;
              if (res.data.data[actual].pivot.score == null) {
                this.estado.score = 0;
              } else {
                this.estado.score = res.data.data[actual].pivot.score;
              }

              this.visto = true;
            }
          }

          this.preparados++;
          if (this.preparados == 3) {
            this.mostrar = "si";
          }
        })
        .catch((err) => {
          this.datosInfo["color"] = "red";
          this.datosInfo["style"] = "danger";
          this.datosInfo["mensaje"] = err.response.data.message;
          this.datosInfo["mostrar"] = true;
          this.mostrar = "error";
        });
    },

    ver() {
      var datos = new FormData();

      datos.append("manga_id", this.manga);
      datos.append("user_id", this.usuario.id);
      if (this.estado.readStatus == "") {
        this.estado.readStatus = "PlanToRead";
      }
      datos.append("readStatus", this.estado.readStatus);
      datos.append("favourite", this.estado.favourite);

      if (this.estado.score != 0) {
        datos.append("score", this.estado.score);
      }

      if (this.visto == false) {
        axios
          .post(route("reads.store"), datos, {
            headers: {
              Authorization: "Bearer " + this.clave,
            },
          })
          .then((res) => {
            this.visto = true;
            this.datosInfo["color"] = "yellow";
            this.datosInfo["style"] = "success";
            this.datosInfo["mensaje"] = res.data.message;
            this.datosInfo["mostrar"] = true;
          })
          .catch((err) => {
            this.datosInfo["color"] = "red";
            this.datosInfo["style"] = "danger";
            this.datosInfo["mensaje"] = err.response.data.message;
            this.datosInfo["mostrar"] = true;
          });
      } else {
        datos.append("_method", "PUT");

        axios.post(
          route("reads.update", { manga: this.manga, user: this.usuario.id }),
          datos,
          {
            headers: {
              Authorization: "Bearer " + this.clave,
            },
          }
        );
      }
    },

    eliminar() {
      axios
        .delete(route("reads.destroy", { manga: this.manga, user: this.usuario.id }), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.estado.readStatus = "";
          this.estado.score = 0;
          this.visto = false;
          this.estado.favourite = 0;
          this.datosInfo["color"] = "yellow";
          this.datosInfo["style"] = "success";
          this.datosInfo["mensaje"] = res.data.message;
          this.datosInfo["mostrar"] = true;
        });
    },

    cambiarFav() {
      if (this.estado.favourite == 0) {
        this.estado.favourite = 1;
      } else {
        this.estado.favourite = 0;
      }

      this.ver();
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

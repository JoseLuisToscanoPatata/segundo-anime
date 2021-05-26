<template>
  <app-layout color="#A78BFA">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">ANIME</h2>
    </template>
    <div class="max-w-7xl mx-3 sm:mx-auto sm:px-6 lg:px-8 py-12">
      <!-- MODAL DE MENSAJES-->

      <banner-propio
        v-if="datosInfo['mostrar']"
        @close="datosInfo['mostrar'] = false"
        :color="datosInfo['color']"
        :style="datosInfo['style']"
        :message="datosInfo['mensaje']"
      />

      <jet-dialog-modal :show="añadiendo" @close="añadiendo = false">
        <template #title>
          <span class="text-purple-500 font-bold">ANIME ADD FORM </span>
        </template>

        <template #content>
          <form @submit.prevent="crear">
            <div class="flex flex-col sm:flex-row m-5 justify-evenly">
              <div class="text-center sm:max-w-sm">
                <span class="font-semibold text-lg text-purple-400 text-center">{{
                  nuevo["title"]
                }}</span>

                <img
                  :src="nuevo['cover']"
                  :alt="nuevo['title']"
                  class="rounded-full h-36 w-36 object-cover text-center m-auto mt-5"
                />
              </div>
              <div class="flex flex-col">
                <div class="m-auto mt-3">
                  <jet-label for="watchStatus" value="Watch Status" />
                  <select
                    id="watchStatus"
                    v-model="nuevo['watchStatus']"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                  >
                    <option value="PlanToWatch">Plan To Watch</option>
                    <option value="Watching" v-if="nuevo['status'] != 'tba'">
                      Watching
                    </option>

                    <option value="Completed" v-if="nuevo['status'] == 'finished'">
                      Completed
                    </option>
                    <option value="Dropped" v-if="nuevo['status'] != 'tba'">
                      Dropped
                    </option>
                    <option value="OnHold" v-if="nuevo['status'] != 'tba'">
                      On Hold
                    </option>
                  </select>
                  <jet-input-error :message="errores['watchStatus']" class="mt-2" />
                </div>

                <div class="m-auto mt-3">
                  <jet-label for="score" value="Your Score" />
                  <jet-input
                    id="score"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="nuevo['score']"
                    min="1"
                    max="10"
                    onkeydown="return false"
                  />
                  <jet-input-error :message="errores['score']" class="mt-2" />
                </div>

                <div class="m-auto mt-7">
                  <div class="flex items-start">
                    <input
                      type="checkbox"
                      v-model="nuevo['favourite']"
                      true-value="1"
                      false-value="0"
                      class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    />
                    <span class="ml-2 text-sm text-gray-600">Favourite</span>
                  </div>

                  <jet-input-error :message="errores['favourite']" class="mt-2" />
                </div>
              </div>
            </div>
          </form>
        </template>

        <template #footer>
          <jet-secondary-button
            type="button"
            @click.prevent="añadiendo = false"
            class="mr-2"
          >
            Cancel
          </jet-secondary-button>

          <jet-secondary-button
            class="mt-2 ml-2 text-white bg-purple-400 hover:bg-purple-600"
            type="button"
            @click.prevent="crear"
          >
            Add
          </jet-secondary-button>
        </template>
      </jet-dialog-modal>

      <data-grid-area
        v-if="mostrar == 'si'"
        :datos="datos"
        :cantidadPaginas="paginacion"
        :filtros="filtros"
        :key="datos"
        :color="colores"
        tipo="anime"
        @nuevo="pulsadoNuevo"
        :seasonActual="season"
        :yearActual="year"
      >
      </data-grid-area>

      <loading v-show="mostrar == 'no'" color="purple"></loading>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import DataGridArea from "@/Pages/Componentes/DataGridArea";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetButton from "@/Jetstream/Button";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetInput from "@/Jetstream/Input";
import Loading from "@/Pages/Componentes/Loading";
import BannerPropio from "@/Pages/Componentes/BannerPropio";

export default {
  components: {
    AppLayout,
    DataGridArea,
    Loading,
    JetDialogModal,
    JetCheckbox,
    JetSecondaryButton,
    JetButton,
    JetLabel,
    JetInput,
    JetInputError,
    BannerPropio,
  },

  props: ["clave", "usuario"],

  data() {
    return {
      paginacion: [
        { texto: "12", numero: 12 },
        { texto: "24", numero: 24 },
        { texto: "48", numero: 48 },
        { texto: "72", numero: 72 },
        { texto: "96", numero: 96 },
      ],

      datos: [],
      vistos: [],
      season: "",
      year: "",

      colores: {
        color: "purple",
        hexa: "#DDD6FE;",
      },

      filtros: [
        {
          nombre: "subType",
          titulo: "Subtype",
          opciones: ["ONA", "OVA", "TV", "movie", "music", "special", null],
          titulos: ["ONA", "OVA", "TV", "Movie", "Music", "Special", "N/A"],
          actual: "",
          ancho: "col-span-2",
        },

        {
          nombre: "yourStatus",
          titulo: "Your Status",
          opciones: ["Plan", "Current", "Hold", "Completed", "Dropped"],
          titulos: ["Plan to Watch", "Watching", "On Hold", "Completed", "Dropped"],
          actual: "",
          ancho: "col-span-2",
        },
      ],

      mostrar: "no",
      preparados: 0,
      añadiendo: false,
      idActual: 1,

      datosInfo: {
        mostrar: false,
        style: "",
        mensaje: "",
        color: "",
      },

      nuevo: {
        watchStatus: "",
        score: "",
        favourite: 0,
        title: "",
        cover: "",
        status: "",
      },

      errores: {
        watchStatus: null,
        score: null,
        favourite: null,
      },
    };
  },

  created() {
    this.obtenerFecha();
    this.obtenerVistos();
    this.obtenerDatos();
  },

  methods: {
    //OBTENER LOS DATOS DE MANGAS

    obtenerVistos() {
      axios
        .get(route("watches.index", this.usuario.id), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.vistos = res.data.data;

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

    obtenerDatos() {
      axios
        .get(route("animes.index"), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          var fallidos = 0;

          for (let actual = 0; actual < res.data.data.length; actual++) {
            var season = "";
            var año = "";
            var viendo = null;
            //var encontrado = false;

            if (res.data.data[actual].startDate != null) {
              var fechaActual = res.data.data[actual].startDate;

              if (parseInt(fechaActual.split("-")[1]) < 4) {
                season = "winter";
              } else if (parseInt(fechaActual.split("-")[1]) < 7) {
                season = "spring";
              } else if (parseInt(fechaActual.split("-")[1]) < 10) {
                season = "summer";
              } else {
                season = "fall";
              }

              año = fechaActual.split("-")[0];
            } else {
              season = "undefined";
              año = "undefined";
            }

            if (
              actual - fallidos < this.vistos.length &&
              this.vistos[actual - fallidos].id == res.data.data[actual].id
            ) {
              if (this.vistos[actual - fallidos].pivot.watchStatus == "Dropped") {
                viendo = "Dropped";
              } else if (
                this.vistos[actual - fallidos].pivot.watchStatus == "Completed"
              ) {
                viendo = "Completed";
              } else if (this.vistos[actual - fallidos].pivot.watchStatus == "OnHold") {
                viendo = "Hold";
              } else if (this.vistos[actual - fallidos].pivot.watchStatus == "Watching") {
                viendo = "Current";
              } else if (
                this.vistos[actual - fallidos].pivot.watchStatus == "PlanToWatch"
              ) {
                viendo = "Plan";
              }
            } else {
              fallidos++;
            }

            this.datos.push({
              id: res.data.data[actual].id,
              title: res.data.data[actual].title,
              synopsis: res.data.data[actual].synopsis,
              cover: res.data.data[actual].cover,
              score: res.data.data[actual].rating,
              episodes: res.data.data[actual].episodes,
              startDate: res.data.data[actual].startDate,
              subType: res.data.data[actual].subType,
              users: res.data.data[actual].userCount,
              status: res.data.data[actual].status,
              yourStatus: viendo,
              year: año,
              season: season,
            });
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

    obtenerFecha() {
      var fecha = new Date();
      var mes = fecha.getMonth();

      if (mes < 4) {
        this.season = "winter";
      } else if (mes < 7) {
        this.season = "spring";
      } else if (mes < 10) {
        this.season = "summer";
      } else {
        this.season = "fall";
      }

      this.year = fecha.getFullYear().toString();

      this.preparados++;
      if (this.preparados == 3) {
        this.mostrar = "si";
      }
    },

    pulsadoNuevo(id) {
      this.idActual = id;

      for (const key in this.nuevo) {
        if (Object.hasOwnProperty.call(this.nuevo, key)) {
          this.nuevo[key] = null;
        }
      }

      this.nuevo.favourite = 0;

      for (let actual = 0; actual < this.datos.length; actual++) {
        if (this.datos[actual].id == this.idActual) {
          this.nuevo.title = this.datos[actual].title;
          this.nuevo.cover = this.datos[actual].cover;
          this.nuevo.status = this.datos[actual].status;
        }
      }

      for (const error in this.errores) {
        if (Object.hasOwnProperty.call(this.errores, error)) {
          this.errores[error] = null;
        }
      }

      this.añadiendo = true;
    },

    crear() {
      var datos = new FormData();

      datos.append("anime_id", this.idActual);
      datos.append("user_id", this.usuario.id);
      datos.append("watchStatus", this.nuevo["watchStatus"]);
      datos.append("favourite", this.nuevo["favourite"]);
      if (this.nuevo["score"] != null) {
        datos.append("score", this.nuevo["score"]);
      }

      axios
        .post(route("watches.store"), datos, {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          //EXITO
          var encontrado = false;

          for (let actual = 0; actual < this.datos.length && !encontrado; actual++) {
            if (this.datos[actual].id == this.idActual) {
              encontrado = true;

              if (this.nuevo["watchStatus"] == "Dropped") {
                this.datos[actual].yourStatus = "Dropped";
              } else if (this.nuevo["watchStatus"] == "Completed") {
                this.datos[actual].yourStatus = "Completed";
              } else if (this.nuevo["watchStatus"] == "OnHold") {
                this.datos[actual].yourStatus = "Hold";
              } else if (this.nuevo["watchStatus"] == "Watching") {
                this.datos[actual].yourStatus = "Current";
              } else if (this.nuevo["watchStatus"] == "PlanToWatch") {
                this.datos[actual].yourStatus = "Plan";
              }
            }
          }

          this.añadiendo = false;
          this.datosInfo["color"] = this.colores.color;
          this.datosInfo["style"] = "success";
          this.datosInfo["mensaje"] = res.data.message;
          this.datosInfo["mostrar"] = true;
        })
        .catch((err) => {
          //FALLOS
          if (err.response.data.message) {
            //FALLO EXTERNO
            this.añadiendo = false;
            this.datosInfo["color"] = "red";
            this.datosInfo["titulo"] = "danger";
            this.datosInfo["mensaje"] = err.response.data.message;
            this.datosInfo["mostrar"] = true;
          } else if (err.response.data.validation_errors) {
            //FALLO DE VALIDACIÓN
            this.errores["score"] = err.response.data.validation_errors["score"];
            this.errores["watchStatus"] =
              err.response.data.validation_errors["watchStatus"];
            this.errores["favourite"] = err.response.data.validation_errors["favourite"];
          }
        });
    },
  },
};
</script>

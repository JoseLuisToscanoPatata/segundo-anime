<template>
  <app-layout color="#EAB308">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">MANGA</h2>
    </template>
    <div class="max-w-7xl mx-3 sm:mx-auto sm:px-6 lg:px-8 py-12">
      <banner-propio
        v-if="datosInfo['mostrar']"
        @close="datosInfo['mostrar'] = false"
        :color="datosInfo['color']"
        :style="datosInfo['style']"
        :message="datosInfo['mensaje']"
      />

      <jet-dialog-modal :show="añadiendo" @close="añadiendo = false">
        <template #title>
          <span class="text-yellow-500 font-bold">MANGA ADD FORM </span>
        </template>

        <template #content>
          <form @submit.prevent="crear">
            <div class="flex flex-col sm:flex-row m-5 justify-evenly">
              <div class="text-center sm:max-w-sm">
                <span class="font-semibold text-lg text-yellow-400 text-center">{{
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
                  <jet-label for="readStatus" value="Read Status" />
                  <select
                    id="readStatus"
                    v-model="nuevo['readStatus']"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                  >
                    <option value="PlanToRead">Plan To Read</option>
                    <option value="Reading" v-if="nuevo['status'] != 'tba'">
                      Reading
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
                  <jet-input-error :message="errores['readStatus']" class="mt-2" />
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
                      class="rounded border-gray-300 text-yellow-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
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
            class="mt-2 ml-2 text-white bg-yellow-400 hover:bg-yellow-600"
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
        tipo="manga"
        @nuevo="pulsadoNuevo"
        yearActual="undefined"
      >
      </data-grid-area>

      <loading v-show="mostrar == 'no'" color="yellow"></loading>
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

      colores: {
        color: "yellow",
        hexa: "#FDE68A;",
      },

      filtros: [
        {
          nombre: "subType",
          titulo: "Subtype",
          opciones: [
            "doujin",
            "manga",
            "manhwa",
            "manhua",
            "novel",
            "oel",
            "oneshot",
            null,
          ],
          titulos: [
            "Doujin",
            "Manga",
            "Manhwa",
            "Manhua",
            "Novel",
            "Oel",
            "OneShot",
            "N/A",
          ],
          actual: "",
          ancho: "col-span-2",
        },

        {
          nombre: "yourStatus",
          titulo: "Your Status",
          opciones: ["Plan", "Current", "Hold", "Completed", "Dropped"],
          titulos: ["Plan to Read", "Reading", "On Hold", "Completed", "Dropped"],
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
        readStatus: "",
        score: "",
        favourite: 0,
        title: "",
        cover: "",
        status: "",
      },

      errores: {
        readStatus: null,
        score: null,
        favourite: null,
      },
    };
  },

  created() {
    this.obtenerVistos();
    this.obtenerDatos();
  },

  methods: {
    //OBTENER LOS DATOS DE MANGAS

    obtenerVistos() {
      axios
        .get(route("reads.index", this.usuario.id), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.vistos = res.data.data;

          this.preparados++;
          if (this.preparados == 2) {
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
        .get(route("mangas.index"), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          var fallidos = 0;

          for (let actual = 0; actual < res.data.data.length; actual++) {
            var año = "";
            var viendo = null;

            if (res.data.data[actual].startDate != null) {
              var fechaActual = res.data.data[actual].startDate;

              año = fechaActual.split("-")[0];
            } else {
              año = "undefined";
            }

            if (
              actual - fallidos < this.vistos.length &&
              this.vistos[actual - fallidos].id == res.data.data[actual].id
            ) {
              if (this.vistos[actual - fallidos].pivot.readStatus == "Dropped") {
                viendo = "Dropped";
              } else if (this.vistos[actual - fallidos].pivot.readStatus == "Completed") {
                viendo = "Completed";
              } else if (this.vistos[actual - fallidos].pivot.readStatus == "OnHold") {
                viendo = "Hold";
              } else if (this.vistos[actual - fallidos].pivot.readStatus == "Reading") {
                viendo = "Current";
              } else if (
                this.vistos[actual - fallidos].pivot.readStatus == "PlanToRead"
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
              chapters: res.data.data[actual].chapters,
              startDate: res.data.data[actual].startDate,
              subType: res.data.data[actual].subType,
              users: res.data.data[actual].userCount,
              status: res.data.data[actual].status,
              yourStatus: viendo,
              year: año,
            });
          }

          this.preparados++;
          if (this.preparados == 2) {
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

      datos.append("manga_id", this.idActual);
      datos.append("user_id", this.usuario.id);
      datos.append("readStatus", this.nuevo["readStatus"]);
      datos.append("favourite", this.nuevo["favourite"]);
      if (this.nuevo["score"] != null) {
        datos.append("score", this.nuevo["score"]);
      }

      axios
        .post(route("reads.store"), datos, {
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

              if (this.nuevo["readStatus"] == "Dropped") {
                this.datos[actual].yourStatus = "Dropped";
              } else if (this.nuevo["readStatus"] == "Completed") {
                this.datos[actual].yourStatus = "Completed";
              } else if (this.nuevo["readStatus"] == "OnHold") {
                this.datos[actual].yourStatus = "Hold";
              } else if (this.nuevo["readStatus"] == "Reading") {
                this.datos[actual].yourStatus = "Current";
              } else if (this.nuevo["readStatus"] == "PlanToRead") {
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
            this.errores["readStatus"] =
              err.response.data.validation_errors["readStatus"];
            this.errores["favourite"] = err.response.data.validation_errors["favourite"];
          }
        });
    },
  },
};
</script>

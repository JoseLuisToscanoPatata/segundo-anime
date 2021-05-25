<template>
  <app-layout color="#A78BFA">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">ANIME LIST</h2>
    </template>
    <div class="max-w-7xl mx-3 sm:mx-auto sm:px-6 lg:px-8 py-12">
      <banner-propio
        v-if="datosInfo['mostrar']"
        @close="datosInfo['mostrar'] = false"
        :color="datosInfo['color']"
        :style="datosInfo['style']"
        :message="datosInfo['mensaje']"
      />

      <template v-if="mostrar == 'si'">
        <!-- MODAL DE MENSAJES-->

        <jet-dialog-modal :show="operacion == 'borrar'" @close="operacion = ''">
          <template #title> Delete From your list </template>

          <template #content>
            Are you sure you want to delete the specified anime from your list?

            <div class="block mt-4">
              <label class="flex items-start">
                <jet-checkbox v-model="saltarModal" class="text-purple-400" />
                <span class="ml-2 text-sm text-gray-600">Dont ask me again lol</span>
              </label>
            </div>
          </template>

          <template #footer>
            <jet-secondary-button @click="operacion = ''" class="ml-2">
              Cancel
            </jet-secondary-button>

            <jet-danger-button class="ml-2" @click="borrarWatch(idActual)">
              Delete
            </jet-danger-button>
          </template>
        </jet-dialog-modal>

        <!-- MODAL DE ACTUALIZACIÓN-->

        <jet-dialog-modal :show="operacion == 'editar'" @close="operacion = ''">
          <template #title>
            <span class="text-purple-500 font-bold">MANGA LIST FORM </span>
          </template>

          <template #content>
            <form @submit.prevent="editar">
              <div class="flex flex-col sm:flex-row m-5 justify-evenly">
                <div class="text-center sm:max-w-sm">
                  <span class="font-semibold text-lg text-purple-400 text-center">{{
                    datosActual["title"]
                  }}</span>

                  <img
                    :src="datosActual['cover']"
                    :alt="datosActual['title']"
                    class="rounded-full h-36 w-36 object-cover text-center m-auto mt-5"
                  />
                </div>
                <div class="flex flex-col">
                  <div class="m-auto mt-3">
                    <jet-label for="watchStatus" value="Watch Status" />
                    <select
                      id="watchStatus"
                      v-model="datosActual['watchStatus']"
                      class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    >
                      <option value="PlanToWatch">Plan To Watch</option>
                      <option value="Watching" v-if="datosActual['status'] != 'tba'">
                        Watching
                      </option>

                      <option
                        value="Completed"
                        v-if="datosActual['status'] == 'finished'"
                      >
                        Completed
                      </option>
                      <option value="Dropped" v-if="datosActual['status'] != 'tba'">
                        Dropped
                      </option>
                      <option value="OnHold" v-if="datosActual['status'] != 'tba'">
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
                      v-model="datosActual['score']"
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
                        v-model="datosActual['favourite']"
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
              @click.prevent="operacion = ''"
              class="mr-2"
            >
              Cancel
            </jet-secondary-button>

            <jet-secondary-button
              class="mt-2 ml-2 text-white bg-purple-400 hover:bg-purple-600"
              type="button"
              @click.prevent="editar"
            >
              Upload
            </jet-secondary-button>
          </template>
        </jet-dialog-modal>

        <data-table-area
          :datos="datos"
          :columnas="campos"
          :cantidadPaginas="paginacion"
          :botones="botones"
          :filtros="filtros"
          :emisiones="emisiones"
          :imagenes="imagenes"
          @borrar-watch="pulsadoBorrar"
          @editar-watch="pulsadoEditar"
          @cambiar-fav="cambiarFav"
          @ver-anime="pulsadoVer"
          :key="datos"
          :color="colores"
          :listaPropia="comprobarUsuario"
          nombreValorIcono="favourite"
          columnaIcono="title"
          :iconos="iconos"
        >
        </data-table-area>
      </template>

      <loading v-show="mostrar == 'no'" color="purple"></loading>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import DataTableArea from "@/Pages/Componentes/DataTableArea";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetDangerButton from "@/Jetstream/DangerButton";
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
    DataTableArea,
    JetDialogModal,
    JetDangerButton,
    JetCheckbox,
    JetSecondaryButton,
    JetButton,
    JetLabel,
    JetInput,
    JetInputError,
    Loading,
    BannerPropio,
  },

  props: ["clave", "usuario", "userList"],

  data() {
    return {
      paginacion: [
        { texto: "10", numero: 10 },
        { texto: "20", numero: 20 },
        { texto: "40", numero: 40 },
        { texto: "70", numero: 70 },
        { texto: "100", numero: 100 },
      ],

      datos: [],

      emisiones: ["borrar-watch", "editar-watch", "ver-anime", "cambiar-fav"],
      imagenes: "h-14 w-14 rounded-full m-1 object-cover",

      colores: {
        color: "purple",
        hexa: "border:  #e9d8fd;",
      },

      operacion: "",

      filtros: [
        {
          nombre: "watchStatus",
          titulo: "Watch Status",
          opciones: ["PlanToWatch", "Watching", "OnHold", "Completed", "Dropped"],
          titulos: ["Plan to Watch", "Watching", "On Hold", "Completed", "Dropped"],
          actual: "",
          ancho: "col-span-2",
        },
        {
          nombre: "status",
          titulo: "Status",
          opciones: ["current", "finished", "tba"],
          titulos: ["Current", "Finished", "TBA"],
          actual: "",
          ancho: "col-span-2",
        },
      ],

      botones: [
        {
          abbr: "Edit on my list",
          icono: "/img/notes.svg",
          emit: "editar-watch",
          alt: "Watch status edition button",
          ocultar: true,
        },
        {
          abbr: "Delete from my list",
          icono: "/img/deleteOther.svg",
          emit: "borrar-watch",
          alt: "Watch deletion button",
          ocultar: true,
        },

        {
          abbr: "See Anime",
          icono: "/img/eye.svg",
          emit: "ver-anime",
          alt: "See Anime button",
          ocultar: false,
        },
      ],

      iconos: [
        {
          icono: "/img/favlist.svg",
          abbr: "Make this anime not favourite",
          alt: "Fav logo",
          valor: true,
          emit: "cambiar-fav",
        },
        {
          icono: "/img/nofavlist.svg",
          abbr: "Make this anime your favourite",
          alt: "no Fav logo",
          valor: false,
          emit: "cambiar-fav",
        },
      ],

      campos: [
        {
          nombre: "cover",
          titulo: "Cover",
          tipo: "imagen",
          sorteable: false,
          filtrable: false,
          width: "min-width: 80px",
          alineacion: "justificado",
        },
        {
          nombre: "title",
          titulo: "Title",
          tipo: "texto",
          sorteable: true,
          filtrable: true,
          width: "min-width: 250px; max-width: 250px;",
          alineacion: "izquierda",
        },
        {
          nombre: "rating",
          titulo: "Avg Score",
          tipo: "numero",
          sorteable: true,
          filtrable: false,
          width: "min-width: 115px",
          alineacion: "centrado",
        },

        {
          nombre: "score",
          titulo: "Your Score",
          tipo: "numero",
          sorteable: true,
          filtrable: false,
          width: "min-width: 115px",
          alineacion: "centrado",
        },

        {
          nombre: "episodes",
          titulo: "Episodes",
          tipo: "numero",
          sorteable: true,
          filtrable: false,
          width: "min-width: 115px",
          alineacion: "centrado",
        },

        {
          nombre: "status",
          titulo: "Status",
          tipo: "texto",
          sorteable: false,
          filtrable: false,
          width: "min-width: 100px; max-width: 100px",
          alineacion: "izquierda",
        },

        {
          nombre: "watchStatus",
          titulo: "User Status",
          tipo: "texto",
          sorteable: false,
          filtrable: false,
          width: "min-width: 150px",
          alineacion: "izquierda",
        },

        {
          nombre: "buttons",
          titulo: "Options",
          tipo: "botones",
          sorteable: false,
          filtrable: false,
          width: "min-width: 125px",
          alineacion: "centrado",
        },
      ],
      mostrar: "no",
      datosInfo: {
        mostrar: false,
        style: "",
        mensaje: "",
        color: "",
      },
      idActual: 1,
      saltarModal: false,
      datosActual: {
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
    this.obtenerDatos();
  },

  computed: {
    comprobarUsuario() {
      if (this.userList == this.usuario.id) {
        return "propia";
      } else {
        return "otra";
      }
    },
  },

  methods: {
    //OBTENER LOS DATOS DE MANGAS
    obtenerDatos() {
      axios
        .get(route("watches.index", this.userList), {
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
              episodes: res.data.data[actual].episodes,
              watchStatus: res.data.data[actual].pivot.watchStatus,
              status: res.data.data[actual].status,
              favourite: res.data.data[actual].pivot.favourite,
              score: res.data.data[actual].pivot.score,
            });
          }

          this.mostrar = "si";
        })
        .catch((err) => {
          this.datosInfo["color"] = "red";
          this.datosInfo["style"] = "danger";
          this.datosInfo["mensaje"] = err.response.data.message;
          this.datosInfo["mostrar"] = true;
          this.mostrar = "error";
        });
    },

    pulsadoVer($id) {
      window.location.href = route("AnimeProfile", $id);
    },

    pulsadoEditar(id) {
      this.idActual = id;

      this.errores.watchStatus = null;
      this.errores.score = null;
      this.errores.favourite = null;

      for (let actual = 0; actual < this.datos.length; actual++) {
        if (this.datos[actual].id == this.idActual) {
          this.datosActual["watchStatus"] = this.datos[actual].watchStatus;
          this.datosActual["favourite"] = this.datos[actual].favourite;
          this.datosActual["score"] = this.datos[actual].score;
          this.datosActual["cover"] = this.datos[actual].cover;
          this.datosActual["title"] = this.datos[actual].title;
          this.datosActual["status"] = this.datos[actual].status;
        }
      }

      this.operacion = "editar";
    },
    pulsadoBorrar(id) {
      this.idActual = id;

      if (this.saltarModal) {
        this.borrarWatch(this.idActual);
      } else {
        this.operacion = "borrar";
      }
    },

    cambiarFav(id) {
      this.idActual = id;

      for (let actual = 0; actual < this.datos.length; actual++) {
        if (this.datos[actual].id == id) {
          if (this.datos[actual].favourite == 0) {
            this.datosActual.favourite = 1;
          } else {
            this.datosActual.favourite = 0;
          }
          if (this.datos[actual].score != null) {
            this.datosActual.score = this.datos[actual].score;
          }

          this.datosActual.watchStatus = this.datos[actual].watchStatus;
        }
      }

      var datos = new FormData();

      datos.append("watchStatus", this.datosActual["watchStatus"]);
      datos.append("favourite", this.datosActual["favourite"]);

      if (this.datosActual.score != null) {
        datos.append("score", this.datosActual["score"]);
      }

      datos.append("_method", "PUT");

      axios
        .post(
          route("watches.update", { anime: this.idActual, user: this.userList }),
          datos,
          {
            headers: {
              Authorization: "Bearer " + this.clave,
            },
          }
        )
        .then((res) => {
          //EXITO
          for (let actual = 0; actual < this.datos.length; actual++) {
            if (this.datos[actual].id == this.idActual) {
              this.datos[actual].favourite = this.datosActual["favourite"];
            }
          }
        })
        .catch((err) => {
          //FALLOS
          if (err.response.data.message) {
            //FALLO EXTERNO
            this.operacion = "";
            this.datosInfo["color"] = "red";
            this.datosInfo["style"] = "danger";
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

    //METODO DE CREACIÓN O EDICIÓN DE MANGA
    editar() {
      var datos = new FormData();

      datos.append("watchStatus", this.datosActual["watchStatus"]);
      datos.append("favourite", this.datosActual["favourite"]);
      if (this.datosActual["score"] != null) {
        datos.append("score", this.datosActual["score"]);
      }

      datos.append("_method", "PUT");

      axios
        .post(
          route("watches.update", { anime: this.idActual, user: this.userList }),
          datos,
          {
            headers: {
              Authorization: "Bearer " + this.clave,
            },
          }
        )
        .then((res) => {
          //EXITO
          for (let actual = 0; actual < this.datos.length; actual++) {
            if (this.datos[actual].id == this.idActual) {
              this.datos[actual].score = this.datosActual["score"];
              this.datos[actual].favourite = this.datosActual["favourite"];
              this.datos[actual].watchStatus = this.datosActual["watchStatus"];
            }
          }

          this.operacion = "";
          this.datosInfo["color"] = this.colores.color;
          this.datosInfo["style"] = "success";
          this.datosInfo["mensaje"] = res.data.message;
          this.datosInfo["mostrar"] = true;
        })
        .catch((err) => {
          //FALLOS
          if (err.response.data.message) {
            //FALLO EXTERNO
            this.operacion = "";
            this.datosInfo["color"] = "red";
            this.datosInfo["style"] = "danger";
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

    //BORRAR MANGA EXISTENTE DE LA LISTA DE LEIDOS
    borrarWatch() {
      this.operacion = "";

      axios
        .delete(route("watches.destroy", { anime: this.idActual, user: this.userList }), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          for (let actual = 0; actual < this.datos.length; actual++) {
            if (this.datos[actual].id == this.idActual) {
              this.datos.splice(actual, 1);
            }
          }

          this.datosInfo["color"] = this.colores.color;
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
    },
  },
};
</script>

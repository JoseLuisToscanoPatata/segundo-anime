<template>
  <app-layout color="#FBBF24">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">ADMIN MANGA LIST</h2>
    </template>
    <div class="max-w-7xl xs2:mx-3 sm:mx-auto sm:px-6 lg:px-8 py-12">
      <banner-propio
        v-if="datosInfo['mostrar']"
        @close="datosInfo['mostrar'] = false"
        :color="datosInfo['color']"
        :style="datosInfo['style']"
        :message="datosInfo['mensaje']"
      />

      <template v-if="mostrar == 'si'">
        <jet-dialog-modal :show="operacion == 'borrar'" @close="operacion = ''">
          <template #title> Delete Manga </template>

          <template #content>
            Are you sure you want to delete the specified manga? It will be removed from
            every user list who had included it.

            <div class="block mt-4">
              <label class="flex items-start">
                <jet-checkbox v-model="saltarModal" />
                <span class="ml-2 text-sm text-gray-600">Dont ask me again lol</span>
              </label>
            </div>
          </template>

          <template #footer>
            <jet-secondary-button @click="operacion = ''" class="ml-2">
              Cancel
            </jet-secondary-button>

            <jet-danger-button class="ml-2" @click="borrarManga(idActual)">
              Delete
            </jet-danger-button>
          </template>
        </jet-dialog-modal>

        <!-- MODAL DE CREACIÓN Y ACTUALIZACIÓN-->

        <jet-dialog-modal :show="operacion == 'crearEditar'" @close="operacion = ''">
          <template #title>
            <span class="text-yellow-500 font-bold">MANGA FORM </span>
          </template>

          <template #content>
            <form @submit.prevent="crearOEditar">
              <div class="grid grid-cols-6 sm:grid-cols-12 m-5 gap-x-10 gap-y-5">
                <div class="col-span-6">
                  <!-- Profile Photo File Input -->
                  <input
                    type="file"
                    ref="photo"
                    class="hidden"
                    @change="updatePhotoPreview"
                  />

                  <jet-label for="photo" value="Photo" />

                  <div class="mt-2" v-show="mostrarImagen == 'original'">
                    <img
                      :src="datosActual['cover']"
                      :alt="datosActual['title']"
                      class="rounded-full h-20 w-20 object-cover"
                    />
                  </div>

                  <div class="mt-2" v-show="mostrarImagen == 'preview'">
                    <span
                      class="block rounded-full w-20 h-20"
                      :style="
                        'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
                        photoPreview +
                        '\');'
                      "
                    >
                    </span>
                  </div>

                  <jet-secondary-button
                    class="mt-2 mr-2 text-white bg-yellow-400 hover:bg-yellow-600"
                    type="button"
                    @click.prevent="selectNewPhoto"
                  >
                    Select A New Cover
                  </jet-secondary-button>

                  <jet-input-error :message="errores['cover']" class="mt-2" />
                </div>

                <div class="col-span-6">
                  <jet-label for="synopsis" value="Synopsis (*)" />
                  <textarea
                    id="synopsis"
                    type="text"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    style="resize: none"
                    v-model="datosActual['synopsis']"
                    rows="4"
                    placeholder="If unkown: type 'No synopsis yet'"
                  />
                  <jet-input-error :message="errores['synopsis']" class="mt-2" />
                </div>

                <div class="col-span-6">
                  <jet-label for="title" value="Title (*)" />
                  <jet-input
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="datosActual['title']"
                  />
                  <jet-input-error :message="errores['title']" class="mt-2" />
                </div>

                <div class="col-span-6">
                  <jet-label for="chapters" value="Chapters (*)" />
                  <jet-input
                    id="chapters"
                    type="number"
                    min="0"
                    class="mt-1 block w-full"
                    v-model="datosActual['chapters']"
                    placeholder="if unkown: 0"
                  />
                  <jet-input-error :message="errores['chapters']" class="mt-2" />
                </div>

                <div class="col-span-6">
                  <jet-label for="ageRating" value="Age Rating" />
                  <select
                    id="ageRating"
                    v-model="datosActual['ageRating']"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                  >
                    <option value="">Not needed</option>
                    <option>G</option>
                    <option>PG</option>
                    <option>R</option>
                    <option>R18</option>
                  </select>
                  <jet-input-error :message="errores['ageRating']" class="mt-2" />
                </div>

                <div class="col-span-6">
                  <jet-label for="status" value="Status" />
                  <select
                    id="status"
                    v-model="datosActual['status']"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                  >
                    <option value="" disabled>Please select one</option>
                    <option>current</option>
                    <option>finished</option>
                    <option>tba</option>
                  </select>
                  <jet-input-error :message="errores['status']" class="mt-2" />
                </div>

                <div class="col-span-6">
                  <jet-label for="subType" value="Subtype" />
                  <select
                    id="subType"
                    v-model="datosActual['subType']"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                  >
                    <option value="">Not needed</option>
                    <option>manga</option>
                    <option>manhua</option>
                    <option>manhwa</option>
                    <option>novel</option>
                    <option>oel</option>
                    <option>doujin</option>
                    <option>oneshot</option>
                  </select>
                  <jet-input-error :message="errores['subType']" class="mt-2" />
                </div>

                <div class="col-span-6">
                  <jet-label for="startDate" value="start Date" />
                  <input
                    id="startDate"
                    type="date"
                    v-model="datosActual['startDate']"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                  />
                  <jet-input-error :message="errores['startDate']" class="mt-2" />
                </div>
                <div class="col-span-6">
                  <jet-label for="endDate" value="end Date" />
                  <input
                    id="endDate"
                    type="date"
                    v-model="datosActual['endDate']"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                  />
                  <jet-input-error :message="errores['endDate']" class="mt-2" />
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
              class="mt-2 ml-2 text-white bg-yellow-400 hover:bg-yellow-600"
              type="button"
              @click.prevent="crearOEditar"
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
          @borrar-manga="pulsadoBorrar"
          @editar-manga="pulsadoEditar"
          @crear-manga="pulsadoCrear"
          @ver-manga="pulsadoVer"
          :botonesExtras="botonesExtras"
          :key="datos"
          :color="colores"
          listaPropia="propia"
          :camposSmall="camposSmall"
          :coloresSmall="coloresSmall"
          :ordenacionesSmall="ordenacionesSmall"
        >
        </data-table-area>
      </template>

      <loading v-show="mostrar == 'no'" color="yellow"></loading>
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

  props: ["clave", "usuario"],

  data() {
    return {
      paginacion: [
        { texto: "10", numero: 10 },
        { texto: "30", numero: 30 },
        { texto: "50", numero: 50 },
        { texto: "100", numero: 100 },
        { texto: "200", numero: 200 },
      ],
      datos: {},
      emisiones: ["borrar-manga", "editar-manga", "crear-manga", "ver-manga"],
      imagenes: "h-14 w-14 rounded-full m-1 object-cover",

      colores: {
        color: "yellow",
        hexa: "border:  #bee3f8;",
      },

      filtros: [
        {
          nombre: "ageRating",
          titulo: "age Rating",
          opciones: ["G", "PG", "R", "R18", null],
          titulos: ["G", "PG", "R", "R-18", "N/A"],
          actual: "",
          ancho: "col-span-2",
        },
        {
          nombre: "status",
          titulo: "Status",
          opciones: ["current", "finished", "tba"],
          titulos: ["Current", "Finished", "To be Aired"],
          actual: "",
          ancho: "col-span-2",
        },
      ],

      botonesExtras: [
        {
          texto: "New Manga",
          emit: "crear-manga",
          clases: "text-white bg-yellow-400 hover:bg-yellow-600",
        },
      ],

      botones: [
        {
          abbr: "Edit Manga",
          icono: "img/updateOther.svg",
          emit: "editar-manga",
          alt: "Manga edition button",
          ocultar: false,
          small: true,
        },
        {
          abbr: "Delete manga",
          icono: "img/deleteOther.svg",
          emit: "borrar-manga",
          alt: "Manga deletion button",
          ocultar: false,
          small: true,
        },

        {
          abbr: "Manga Page",
          icono: "img/eye.svg",
          emit: "ver-manga",
          alt: "Manga Page button",
          ocultar: false,
          small: false,
        },
      ],

      camposSmall: {
        color: "status",
        imagen: "cover",
        arriba: "title",
        abajoNum: ["rating"],
        abajoOtros: [
          { name: "userCount", letras: "users" },
          { name: "ageRating", letras: null },
        ],
      },

      coloresSmall: {
        tba: "background-color: #F9D457;",
        finished: " background-color: #26448F;",
        current: " background-color: #2DB039;",
      },

      ordenacionesSmall: [
        { nombre: "Title (a-z)", valor: "title +" },
        { nombre: "Title (z-a)", valor: "title -" },
        { nombre: "Rating +", valor: "rating +" },
        { nombre: "Rating -", valor: "rating -" },
        { nombre: "Most members", valor: "userCount -" },
      ],

      campos: [
        {
          nombre: "id",
          titulo: "ID",
          tipo: "numero",
          sorteable: true,
          filtrable: false,
          width: "min-width: 60px",
          alineacion: "izquierda",
        },

        {
          nombre: "cover",
          titulo: "Cover",
          tipo: "imagen",
          sorteable: false,
          filtrable: false,
          width: "min-width: 80px",
          alineacion: "izquierda",
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
          titulo: "User Score",
          tipo: "numero",
          sorteable: true,
          filtrable: false,
          width: "min-width: 115px",
          alineacion: "centrado",
        },
        {
          nombre: "userCount",
          titulo: "user Count",
          tipo: "numero",
          sorteable: true,
          filtrable: false,
          width: "min-width: 115px",
          alineacion: "centrado",
        },

        {
          nombre: "ageRating",
          titulo: "age Rating",
          tipo: "texto",
          sorteable: false,
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
          width: "min-width: 125px",
          alineacion: "izquierda",
        },

        {
          nombre: "buttons",
          titulo: "Options",
          tipo: "botones",
          sorteable: false,
          filtrable: false,
          width: "min-width: 125px",
        },
      ],
      mostrar: "no",
      datosInfo: {
        mostrar: false,
        style: "",
        mensaje: "",
        color: "",
      },
      idActual: 10,
      operacion: "",
      saltarModal: false,
      modoManga: "",
      photoPreview: null,
      datosActual: {
        title: "",
        synopsis: "",
        chapters: "",
        ageRating: "",
        subType: "",
        status: "",
        cover: "",
        startDate: "",
        endDate: "",
      },

      errores: {
        title: null,
        synopsis: null,
        chapters: null,
        ageRating: null,
        subType: null,
        status: null,
        cover: null,
        startDate: null,
        endDate: null,
      },
    };
  },

  created() {
    this.obtenerDatos();
  },

  computed: {
    //METODO PARA MOSTRAR / NO MOSTRAR IMÁGENES EN EL MODAL DEL FORMULARIO
    mostrarImagen() {
      if (this.photoPreview) {
        return "preview";
      } else {
        if (this.datosActual.cover == null) {
          return "nada";
        } else {
          return "original";
        }
      }
    },
  },

  methods: {
    selectNewPhoto() {
      this.$refs.photo.click();
    },

    //CARGAR LA PREVIEW DE LA IMAGEN NUEVA
    updatePhotoPreview() {
      const reader = new FileReader();

      reader.onload = (e) => {
        this.photoPreview = e.target.result;
      };

      reader.readAsDataURL(this.$refs.photo.files[0]);
    },

    //OBTENER LOS DATOS DE MANGAS
    obtenerDatos() {
      axios
        .get(route("mangas.index"), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.datos = res.data.data;
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

    //METODOS DE BOTONES PULSADOS
    pulsadoCrear() {
      for (const key in this.datosActual) {
        if (Object.hasOwnProperty.call(this.datosActual, key)) {
          this.datosActual[key] = null;
        }
      }

      for (const error in this.errores) {
        if (Object.hasOwnProperty.call(this.errores, error)) {
          this.errores[error] = null;
        }
      }

      this.photoPreview = null;

      this.modoManga = "nuevo";
      this.operacion = "crearEditar";
      this.photoPreview = null;
    },

    pulsadoVer(id) {
      window.location.href = route("MangaProfile", id);
    },

    pulsadoEditar(id) {
      for (const error in this.errores) {
        if (Object.hasOwnProperty.call(this.errores, error)) {
          this.errores[error] = null;
        }
      }
      this.modoManga = "editar";
      this.operacion = "crearEditar";
      this.idActual = id;
      this.photoPreview = null;

      for (let actual = 0; actual < this.datos.length; actual++) {
        if (this.datos[actual].id == this.idActual) {
          for (const key in this.datosActual) {
            if (Object.hasOwnProperty.call(this.datosActual, key)) {
              this.datosActual[key] = this.datos[actual][key];
            }
          }
        }
      }

      if (this.datosActual["ageRating"] == null) {
        this.datosActual["ageRating"] = "";
      }

      if (this.datosActual["subType"] == null) {
        this.datosActual["subType"] = "";
      }
    },
    pulsadoBorrar(id) {
      this.idActual = id;

      if (this.saltarModal) {
        this.borrarManga(this.idActual);
      } else {
        this.operacion = "borrar";
      }
    },

    //METODO DE CREACIÓN O EDICIÓN DE MANGA
    crearOEditar() {
      var datos = new FormData();

      datos.append("title", this.datosActual["title"]);
      datos.append("synopsis", this.datosActual["synopsis"]);

      datos.append("chapters", this.datosActual["chapters"]);

      if (this.datosActual["subType"] != "") {
        datos.append("subType", this.datosActual["subType"]);
      }

      if (this.datosActual["ageRating"] != "") {
        datos.append("ageRating", this.datosActual["ageRating"]);
      }

      if (this.datosActual["startDate"] == "") {
        this.datosActual["startDate"] = null;
      }

      if (this.datosActual["startDate"] != null) {
        datos.append("startDate", this.datosActual["startDate"]);
      }

      if (this.datosActual["endDate"] == "") {
        this.datosActual["endDate"] = null;
      }

      if (this.datosActual["endDate"] != null) {
        datos.append("endDate", this.datosActual["endDate"]);
      }
      if (this.photoPreview) {
        this.datosActual["cover"] = this.$refs.photo.files[0];
        datos.append("cover", this.$refs.photo.files[0]);
      }
      datos.append("status", this.datosActual["status"]);

      //CREACIÓN DE NUEVO MANGA

      if (this.modoManga == "nuevo") {
        axios
          .post(route("mangas.store"), datos, {
            headers: {
              Authorization: "Bearer " + this.clave,
            },
          })
          .then((res) => {
            //EXITO
            this.operacion = "";
            this.datosInfo["color"] = this.colores.color;
            this.datosInfo["style"] = "success";
            this.datosInfo["mensaje"] = res.data.message;
            this.datosInfo["mostrar"] = true;

            this.obtenerDatos();
          })
          .catch((err) => {
            //FALLO
            if (err.response.data.message != null) {
              //FALLO EXTERNO
              this.operacion = "";
              this.datosInfo["color"] = "red";
              this.datosInfo["style"] = "danger";
              this.datosInfo["mensaje"] = err.response.data.message;
              this.datosInfo["mostrar"] = true;
              this.photoPreview = null;
            } else if (err.response.data.validation_errors != null) {
              //FALLO DE VALIDACIÓN
              this.errores["title"] = err.response.data.validation_errors["title"];
              this.errores["synopsis"] = err.response.data.validation_errors["synopsis"];
              this.errores["chapters"] = err.response.data.validation_errors["chapters"];
              this.errores["ageRating"] =
                err.response.data.validation_errors["ageRating"];
              this.errores["subType"] = err.response.data.validation_errors["subType"];
              this.errores["status"] = err.response.data.validation_errors["status"];
              this.errores["cover"] = err.response.data.validation_errors["cover"];
              this.errores["startDate"] =
                err.response.data.validation_errors["startDate"];
              this.errores["endDate"] = err.response.data.validation_errors["endDate"];
            }
          });

        //EDICIÓN DE MANGA
      } else if (this.modoManga == "editar") {
        datos.append("_method", "PUT");

        axios
          .post(route("mangas.update", this.idActual), datos, {
            headers: {
              Authorization: "Bearer " + this.clave,
            },
          })
          .then((res) => {
            //EXITO
            for (let actual = 0; actual < this.datos.length; actual++) {
              if (this.datos[actual].id == this.idActual) {
                this.datos[actual].title = this.datosActual["title"];
                this.datos[actual].synopsis = this.datosActual["synopsis"];
                this.datos[actual].chapters = this.datosActual["chapters"];
                this.datos[actual].status = this.datosActual["status"];
                this.datos[actual].ageRating = this.datosActual["ageRating"];
                this.datos[actual].subType = this.datosActual["subType"];
                this.datos[actual].startDate = this.datosActual["startDate"];
                this.datos[actual].endDate = this.datosActual["endDate"];
                this.datos[actual].cover = res.data.data.cover;
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
              this.datosInfo["style"] = "success";
              this.datosInfo["mensaje"] = err.response.data.message;
              this.datosInfo["mostrar"] = true;
              this.photoPreview = null;
            } else if (err.response.data.validation_errors) {
              //FALLO DE VALIDACIÓN
              this.errores["title"] = err.response.data.validation_errors["title"];
              this.errores["synopsis"] = err.response.data.validation_errors["synopsis"];
              this.errores["chapters"] = err.response.data.validation_errors["chapters"];
              this.errores["ageRating"] =
                err.response.data.validation_errors["ageRating"];
              this.errores["subType"] = err.response.data.validation_errors["subType"];
              this.errores["status"] = err.response.data.validation_errors["status"];
              this.errores["cover"] = err.response.data.validation_errors["cover"];
              this.errores["startDate"] =
                err.response.data.validation_errors["startDate"];
              this.errores["endDate"] = err.response.data.validation_errors["endDate"];
            }
          });
      }
    },

    //BORRAR MANGA EXISTENTE
    borrarManga() {
      this.operacion = "";

      axios
        .delete(route("mangas.destroy", this.idActual), {
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

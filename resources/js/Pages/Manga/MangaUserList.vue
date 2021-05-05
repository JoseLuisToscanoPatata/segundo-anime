<template>
  <app-layout color="#FBBF24">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">MANGA LIST</h2>
    </template>
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

      datosTabla: {},
      mangas: {},
      reads: {},

      emisiones: ["borrar-manga", "editar-manga", "ver-manga", "cambiar-fav"],
      imagenes: "h-14 w-14 rounded-full m-1 object-cover",

      filtros: [
        {
          nombre: "readStatus",
          titulo: "Read Status",
          opciones: ["PlanToRead", "Reading", "OnHold", "Completed", "Dropped"],
          titulos: ["Plan to Read", "Reading", "On Hold", "Completed", "Dropped"],
          actual: "",
          ancho: "col-span-3",
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
          icono: "img/notes.svg",
          emit: "editar-read",
          alt: "Read status edition button",
          ocultar: true,
        },
        {
          abbr: "Delete from my list",
          icono: "img/deleteOther.svg",
          emit: "borrar-read",
          alt: "Read deletion button",
          ocultar: true,
        },

        {
          abbr: "See Manga",
          icono: "img/eye.svg",
          emit: "ver-manga",
          alt: "See Manga button",
          ocultar: false,
        },
      ],

      iconos: [
        {
          icono: "img/favlist.svg",
          abbr: "Make this manga not favourite",
          alt: "Fav logo",
          valor: "favourite",
          emit: "cambiar-fav",
        },
        {
          icono: "img/nofavlist.svg",
          abbr: "Make this manga your favourite",
          alt: "no Fav logo",
          valor: "normal",
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
          color: "text-green-500",
          width: "min-width: 80px",
          alineacion: "izquierda",
        },
        {
          nombre: "title",
          titulo: "Title",
          tipo: "texto",
          sorteable: true,
          filtrable: true,
          color: "text-pink-500",
          width: "min-width: 250px; max-width: 250px;",
          alineacion: "izquierda",
        },
        {
          nombre: "rating",
          titulo: "Avg Score",
          tipo: "numero",
          sorteable: true,
          filtrable: false,
          color: "text-yellow-500",
          width: "min-width: 115px",
          alineacion: "centrado",
        },

        {
          nombre: "score",
          titulo: "Your Score",
          tipo: "numero",
          sorteable: true,
          filtrable: false,
          color: "text-red-500",
          width: "min-width: 115px",
          alineacion: "centrado",
        },

        {
          nombre: "ageRating",
          titulo: "age Rating",
          tipo: "texto",
          sorteable: false,
          filtrable: false,
          color: "text-blue-500",
          width: "min-width: 115px",
          alineacion: "centrado",
        },

        {
          nombre: "status",
          titulo: "Status",
          tipo: "texto",
          sorteable: false,
          filtrable: false,
          color: "text-indigo-500",
          width: "min-width: 125px",
          alineacion: "izquierda",
        },

        {
          nombre: "readStatus",
          titulo: "Your Status",
          tipo: "texto",
          sorteable: false,
          filtrable: false,
          color: "text-purple-500",
          width: "min-width: 150px",
          alineacion: "centrado",
        },

        {
          nombre: "buttons",
          titulo: "Options",
          tipo: "botones",
          sorteable: false,
          filtrable: false,
          color: "text-gray-500",
          width: "min-width: 125px",
          alineacion: "centrado",
        },
      ],
      cargando: true,
      datosInfo: {
        mostrar: false,
        titulo: "",
        mensaje: "",
        color: "black",
      },
      idActual: 1,
      saltarModal: false,
      datosActual: {
        watchStatus: "",
        score: "",
        favourite: 0,
        title: "",
        cover: "",
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

  methods: {
    //OBTENER LOS DATOS DE MANGAS
    obtenerDatos() {
      axios
        .get(route("mangas.index"), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.mangas = res.data.data;
        });

      axios
        .get(route("reads.index", this.usuario.id), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.mangas = res.data.data;
        });
    },

    pulsadoVer($id) {
      window.location.href = route("MangaProfile", $id);
    },

    pulsadoEditar(id) {
      this.idActual = id;

      for (let actual = 0; actual < this.datos.length; actual++) {
        if (this.datos[actual].id == this.idActual) {
          for (const key in this.datosActual) {
            if (Object.hasOwnProperty.call(this.datosActual, key)) {
              this.datosActual[key] = this.datos[actual][key];
            }
          }
        }
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
      datos.append("ageRating", this.datosActual["ageRating"]);
      datos.append("subType", this.datosActual["subType"]);
      datos.append("startDate", this.datosActual["startDate"]);
      datos.append("endDate", this.datosActual["endDate"]);
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
            this.datosInfo["color"] = "green";
            this.datosInfo["titulo"] = "Operation success";
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
              this.datosInfo["titulo"] = "There was an error :(";
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
            this.datosInfo["color"] = "green";
            this.datosInfo["titulo"] = "Operation success";
            this.datosInfo["mensaje"] = res.data.message;
            this.datosInfo["mostrar"] = true;
          })
          .catch((err) => {
            //FALLOS
            if (err.response.data.message) {
              //FALLO EXTERNO
              this.operacion = "";
              this.datosInfo["color"] = "red";
              this.datosInfo["titulo"] = "There was an error :(";
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

          this.datosInfo["color"] = "green";
          this.datosInfo["titulo"] = "Operation success :(";
          this.datosInfo["mensaje"] = res.data.message;
        })
        .catch((err) => {
          this.datosInfo["color"] = "red";
          this.datosInfo["titulo"] = "There was an error :(";
          this.datosInfo["mensaje"] = err.data.message;
        });

      this.datosInfo["mostrar"] = true;
    },
  },
};
</script>

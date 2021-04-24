<template>
  <app-layout color="#60A5FA">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">ADMIN MANGA LIST</h2>
    </template>
    <div
      class="max-w-7xl mx-3 sm:mx-auto sm:px-6 lg:px-8 py-12 overflow-hidden shadow-xl"
    >
      <template v-if="!cargando">
        <jet-dialog-modal :show="hayError" @close="hayError = false">
          <template #title> Error ocurred </template>

          <template #content>
            An error / errors ocurred: <br />

            {{ errores }}
          </template>

          <template #footer>
            <jet-danger-button class="ml-2" @click="hayError = false">
              Close
            </jet-danger-button>
          </template>
        </jet-dialog-modal>

        <jet-dialog-modal :show="borrandoManga" @close="borrandoManga = false">
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
            <jet-secondary-button @click="borrandoManga = false" class="ml-2">
              Cancel
            </jet-secondary-button>

            <jet-danger-button class="ml-2" @click="borrarManga(idActual)">
              Delete
            </jet-danger-button>
          </template>
        </jet-dialog-modal>

        <data-table-area
          :datos="datos"
          :columnas="campos"
          :cantidadPaginas="paginacion"
          :botones="botones"
          :emisiones="emisiones"
          :imagenes="imagenes"
          @borrar-manga="pulsadoBorrar"
          @editar-manga="pulsadoEditar"
          @crear-manga="pulsadoCrear"
        >
        </data-table-area>
      </template>

      <template v-else>
        <span>Cargando...</span>
      </template>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import DataTableArea from "@/Pages/Componentes/DataTableArea";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetCheckbox from "@/Jetstream/Checkbox";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";

export default {
  components: {
    AppLayout,
    DataTableArea,
    JetDialogModal,
    JetDangerButton,
    JetCheckbox,
    JetSecondaryButton,
  },

  props: ["clave", "usuario"],

  data() {
    return {
      paginacion: [
        { texto: "10", numero: 10 },
        { texto: "20", numero: 20 },
        { texto: "30", numero: 30 },
        { texto: "40", numero: 40 },
        { texto: "50", numero: 50 },
      ],
      datos: {},
      emisiones: ["borrar-manga", "editar-manga", "crear-manga"],
      imagenes: "h-20 w-12 rounded-full m-1",
      botonCrear: {
        texto: "New Manga",
        emit: "crear-manga",
      },
      botones: [
        {
          abbr: "Editar manga",
          icono: "img/updateOther.svg",
          emit: "editar-manga",
          alt: "Botón de edición de manga",
        },
        {
          abbr: "Borrar manga",
          icono: "img/deleteOther.svg",
          emit: "borrar-manga",
          alt: "Botón de borrar manga",
        },
      ],
      campos: [
        {
          nombre: "id",
          titulo: "ID",
          tipo: "numero",
          sorteable: true,
          filtrable: false,
          color: "text-green-500",
          width: "min-width: 60px",
          alineacion: "izquierda",
        },

        {
          nombre: "cover",
          titulo: "Cover",
          tipo: "imagen",
          sorteable: false,
          filtrable: false,
          color: "text-yellow-500",
          width: "min-width: 80px",
          alineacion: "izquierda",
        },
        {
          nombre: "title",
          titulo: "Title",
          tipo: "texto",
          sorteable: true,
          filtrable: true,
          color: "text-purple-500",
          width: "min-width: 250px; max-width: 250px;",
          alineacion: "izquierda",
        },
        {
          nombre: "rating",
          titulo: "User Score",
          tipo: "numero",
          sorteable: true,
          filtrable: false,
          color: "text-pink-500",
          width: "min-width: 115px",
          alineacion: "centrado",
        },
        {
          nombre: "userCount",
          titulo: "user Count",
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
          sorteable: true,
          filtrable: true,
          color: "text-blue-500",
          width: "min-width: 115px",
          alineacion: "centrado",
        },

        {
          nombre: "status",
          titulo: "Status",
          tipo: "texto",
          sorteable: true,
          filtrable: true,
          color: "text-indigo-500",
          width: "min-width: 125px",
          alineacion: "izquierda",
        },

        {
          nombre: "buttons",
          titulo: "Options",
          tipo: "botones",
          sorteable: false,
          filtrable: false,
          color: "text-gray-500",
          width: "min-width: 125px",
        },
      ],
      cargando: true,
      hayError: false,
      idActual: 10,
      borrandoManga: false,
      creandoManga: false,
      modificandoManga: false,
      saltarModal: false,
      modoManga: "nuevo",
    };
  },

  created() {
    this.obtenerDatos();
  },

  methods: {
    obtenerDatos() {
      axios
        .get(route("mangas.index"), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.datos = res.data.data;
          this.cargando = false;
        });
    },

    pulsadoCrear() {
      this.modoManga = "nuevo";
      this.modalManga = true;
    },

    pulsadoEditar(id) {
      this.modoManga = "editar";
      this.modalManga = true;
    },
    pulsadoBorrar(id) {
      if (this.saltarModal) {
        this.idActual = id;
        this.borrarManga(this.idActual);
      } else {
        this.idActual = id;
        this.borrandoManga = true;
      }
    },

    crearOEditar() {
      if (this.modoManga == "nuevo") {
      } else if (this.modoManga == "editar") {
      }
    },

    borrarManga(id) {
      this.borrandoManga = false;

      axios
        .delete(route("mangas.destroy", id), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          for (let actual = 0; actual < this.datos.length; actual++) {
            if (this.datos[actual].id == id) {
              this.datos.splice(actual, 1);
            }
          }
        })
        .catch((err) => {
          alert("An error ocurred: " + err);
        });
    },
  },
};
</script>

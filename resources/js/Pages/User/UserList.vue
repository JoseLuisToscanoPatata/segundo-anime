<template>
  <app-layout color="#FB923C">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">ADMIN USERS LIST</h2>
    </template>

    <div class="max-w-7xl mx-3 sm:mx-auto sm:px-6 lg:px-8 py-12">
      <template v-if="!cargando">
        <banner-propio
          v-if="datosInfo['mostrar']"
          @close="datosInfo['mostrar'] = false"
          :color="datosInfo['color']"
          :style="datosInfo['style']"
          :message="datosInfo['mensaje']"
        />

        <jet-dialog-modal :show="borrandoUsu" @close="borrandoUsu = false">
          <template #title> Delete User </template>

          <template #content>
            Are you sure you want to delete the specified user? He will probably create
            another account so this will be useless lol.

            <div class="block mt-4">
              <label class="flex items-start">
                <jet-checkbox v-model="saltarModal" />
                <span class="ml-2 text-sm text-gray-600">Dont ask me again lol</span>
              </label>
            </div>
          </template>

          <template #footer>
            <jet-secondary-button @click="borrandoUsu = false" class="ml-2">
              Cancel
            </jet-secondary-button>

            <jet-danger-button class="ml-2" @click="borrarUsuario(idActual)">
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
          @borrar-usu="pulsadoBorrar"
          @cambiar-rol="cambiarRolUsu"
          @ver-usu="pulsadoVer"
          :color="colores"
          :iconos="iconos"
          columnaIcono="name"
          nombreValorIcono="role"
          listaPropia="propia"
        >
        </data-table-area>
      </template>

      <template v-else>
        <loading color="orange"></loading>
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
    Loading,
    BannerPropio,
  },

  props: ["clave", "usuario"],

  data() {
    return {
      paginacion: [
        { texto: "5", numero: 5 },
        { texto: "10", numero: 10 },
        { texto: "25", numero: 25 },
        { texto: "50", numero: 50 },
        { texto: "100", numero: 100 },
      ],
      datos: [],
      emisiones: ["cambiar-rol", "borrar-usu", "ver-usu"],
      imagenes: "h-10 w-10 rounded-full m-1",

      colores: {
        color: "orange",
        hexa: "border:  #FED7AA;",
      },

      botones: [
        {
          abbr: "Delete user",
          icono: "img/deleteUser.svg",
          emit: "borrar-usu",
          alt: "Delete user button",
          ocultar: false,
        },
        {
          abbr: "Check user",
          icono: "img/eye.svg",
          emit: "ver-usu",
          alt: "Check user button",
          ocultar: false,
        },
      ],

      iconos: [
        {
          icono: "img/adminLogo.svg",
          abbr: "This user is admin, click no remove admin",
          alt: "Admin logo",
          valor: "admin",
          emit: "cambiar-rol",
        },
        {
          icono: "img/sapato.svg",
          abbr: "This user is not an admin, click to make him admin",
          alt: "Normal user logo",
          valor: "user",
          emit: "cambiar-rol",
        },
      ],

      campos: [
        {
          nombre: "id",
          titulo: "ID",
          tipo: "numero",
          sorteable: true,
          filtrable: false,
          color: "text-orange-500",
          width: "min-width: 60px",
          alineacion: "izquierda",
        },

        {
          nombre: "profile_photo_url",
          titulo: "Image",
          tipo: "imagen",
          sorteable: false,
          filtrable: false,
          color: "text-orange-700",
          width: "min-width: 65px",
          alineacion: "izquierda",
        },
        {
          nombre: "name",
          titulo: "Name",
          tipo: "texto",
          sorteable: true,
          filtrable: true,
          color: "text-orange-400",
          width: "min-width: 215px",
          alineacion: "izquierda",
        },
        {
          nombre: "email",
          titulo: "Email",
          tipo: "texto",
          sorteable: true,
          filtrable: true,
          color: "text-orange-800",
          width: "min-width: 325px",
          alineacion: "izquierda",
        },
        {
          nombre: "created_at",
          titulo: "Register Date",
          tipo: "date",
          sorteable: true,
          filtrable: false,
          color: "text-orange-600",
          width: "min-width: 315px",
          alineacion: "izquierda",
        },

        {
          nombre: "buttons",
          titulo: "Options",
          tipo: "botones",
          sorteable: false,
          filtrable: false,
          color: "text-orange-300",
          width: "min-width: 125px",
          alineacion: "centrado",
        },
      ],
      cargando: true,
      datosInfo: {
        mostrar: false,
        style: "",
        mensaje: "",
        color: "",
      },
      idActual: 10,
      borrandoUsu: false,
      saltarModal: false,
    };
  },

  created() {
    this.obtenerDatos();
  },

  methods: {
    obtenerDatos() {
      axios
        .get(route("users.index"), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.datos = res.data.data;
          this.cargando = false;
        });
    },

    cambiarRolUsu(id) {
      if (id == this.usuario.id) {
        this.hayError = true;
      } else {
        axios
          .put(route("users.update", id), id, {
            headers: {
              Authorization: "Bearer " + this.clave,
            },
          })
          .then((res) => {
            for (let actual = 0; actual < this.datos.length; actual++) {
              if (this.datos[actual].id == id) {
                if (this.datos[actual].role == "admin") {
                  this.datos[actual].role = "user";
                } else if (this.datos[actual].role == "user") {
                  this.datos[actual].role = "admin";
                }
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
      }
    },

    pulsadoVer($id) {
      window.location.href = route("UserShow", $id);
    },

    pulsadoBorrar(id) {
      if (id == this.usuario.id) {
        this.hayError = true;
      } else {
        if (this.saltarModal) {
          this.idActual = id;
          this.borrarUsuario(this.idActual);
        } else {
          this.idActual = id;
          this.borrandoUsu = true;
        }
      }
    },

    borrarUsuario(id) {
      this.borrandoUsu = false;

      axios
        .delete(route("users.destroy", id), {
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

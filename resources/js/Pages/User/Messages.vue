<template>
  <app-layout color="#E5E7EB">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">MESSAGES</h2>
    </template>

    <div class="max-w-7xl w-full sm:mx-auto xs2:px-3 xs3:px-6 lg:px-8 py-12">
      <banner-propio
        v-if="datosInfo['mostrar']"
        @close="datosInfo['mostrar'] = false"
        :color="datosInfo['color']"
        :style="datosInfo['style']"
        :message="datosInfo['mensaje']"
      />

      <div
        class="flex flex-col p-4 sm:p-6 bg-gray-50 rounded-lg justify-start items-center overflow-hidden"
        style="max-height: 75vh"
        v-show="mostrar == 'si'"
      >
        <jet-dialog-modal :show="modalMensaje" @close="modalMensaje = false">
          <template #title>
            <span v-if="tipoModal == 'new'" class="text-gray-600 font-bold"
              >New message
            </span>
            <span v-else class="text-gray-600 font-bold"
              >{{ actual.otroNombre }} message
            </span>
          </template>

          <template #content>
            <form @submit.prevent="crearMensaje">
              <div class="flex flex-col items-start">
                <div class="w-full">
                  <jet-input
                    id="usuario"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="actual.otroNombre"
                    placeholder="User"
                    :disabled="tipoModal == 'old'"
                    @blur="comprobarUsuario"
                  />
                  <jet-input-error :message="errores['usuario']" class="mt-2" />
                  <span v-show="validezUsuario != null" class="mt-2 text-green-300">
                    {{ validezUsuario }}
                  </span>
                </div>
                <div class="w-full mt-4">
                  <textarea
                    id="mensaje"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    style="resize: none"
                    rows="5"
                    v-model="actual.mensaje"
                    placeholder="Message"
                    :disabled="tipoModal == 'old'"
                  />
                  <jet-input-error :message="errores['message']" class="mt-2" />
                </div>
              </div>
            </form>
          </template>

          <template #footer>
            <div v-if="tipoModal == 'new'">
              <jet-secondary-button
                type="button"
                @click.prevent="modalMensaje = false"
                class="mr-2"
              >
                Cancel
              </jet-secondary-button>

              <jet-button
                class="mt-2 ml-2 text-white bg-gray-500 hover:bg-gray-600 disabled:opacity-40"
                type="button"
                @click.prevent="crearMensaje"
                :disabled="validezUsuario == null"
              >
                Send
              </jet-button>
            </div>

            <jet-button
              v-else
              class="mt-2 ml-2 text-white bg-gray-500 hover:bg-gray-600"
              type="button"
              @click.prevent="modalMensaje = false"
            >
              Close
            </jet-button>
          </template>
        </jet-dialog-modal>

        <div
          class="pt-3 flex flex-col xs3:flex-row-reverse xs3:justify-between xs3:items-end sticky z-10 top-0 items-start bg-gray-50 w-full"
        >
          <div
            class="flex flex-row w-full xs3:w-min justify-evenly items-center mb-4 xs3:ml-0"
          >
            <jet-button
              @click="ordenar"
              class="text-white bg-lime-400 hover:bg-lime-500 focus:bg-lime-600"
            >
              {{ ordenacionActual }}
            </jet-button>

            <jet-button
              @click="pulsadoCrear"
              class="text-white bg-yellow-300 hover:bg-yellow-400 focus:bg-yellow-500 ml-3"
            >
              NEW
            </jet-button>

            <jet-button
              v-show="modo == 'enviados'"
              @click="borrarMensaje"
              class="text-white bg-red-300 hover:bg-red-400 focus:bg-red-500 ml-3 disabled:opacity-40"
              :disabled="seleccionados.length == 0"
            >
              DELETE
            </jet-button>
          </div>

          <div class="flex flex-row justify-start items-end">
            <div
              @click="(modo = 'recibidos'), ordenar(true)"
              class="mr-0 py-2 px-3 rounded-tl-md cursor-pointer font-semibold border-2 border-pink-500 hover:border-pink-600"
              :class="modoRecibidos"
            >
              INBOX
            </div>

            <div
              @click="(modo = 'enviados'), ordenar(true)"
              class="ml-0 py-2 px-3 rounded-tr-md cursor-pointer font-semibold border-2 border-purple-500 hover:border-purple-600"
              :class="modoEnviados"
            >
              SENT
            </div>
          </div>
        </div>

        <div
          v-show="datosActuales.length > 0"
          class="w-full flex flex-col overflow-y-auto"
        >
          <div
            v-for="(mensaje, indice) in datosActuales.slice(primero - 1, ultimo)"
            :key="indice"
            class="flex flex-row justify-start items-center py-2 border-b-2 border-gray-500 bg-gray-50 hover:bg-gray-200 p-2 pr-4 w-full"
          >
            <input
              v-if="modo == 'enviados'"
              type="checkbox"
              v-model="seleccionados"
              :value="mensaje.id"
              class="text-gray-800 mx-3 rounded-sm mr-2"
            />

            <div
              class="flex flex-col xs3:flex-row items-start xs3:items-center overflow-hidden w-full"
            >
              <div class="flex flex-row justify-between w-full xs3:w-max flex-shrink-0">
                <span
                  @click="mostrarUsuario(mensaje.otroId)"
                  class="mr-2 flex-shrink-0 hover:underline cursor-pointer"
                >
                  {{ mensaje.otroNombre }}</span
                >
                <span class="xs3:hidden flex-shrink-0">{{
                  moment(mensaje.created_at).fromNow()
                }}</span>
              </div>

              <span
                class="truncate w-full text-gray-500 flex-shrink hover:underline pr-4 cursor-pointer"
                @click="mostrarMensaje(mensaje.id)"
                >{{ mensaje.mensaje }}</span
              >

              <span class="text-gray-400 hidden xs3:ml-4 xs3:block flex-shrink-0">{{
                moment(mensaje.created_at).fromNow()
              }}</span>
            </div>
          </div>
        </div>

        <div v-show="datosActuales.length == 0" class="self-center mt-5 my-8">
          <span
            class="font-extrabold text-2xl"
            :class="'text-gray-700'"
            v-if="modo == 'recibidos'"
            >You havent recieved any messages :(</span
          >

          <span
            class="font-extrabold text-2xl"
            :class="'text-gray-700'"
            v-if="modo == 'enviados'"
            >You havent sent any messages :(</span
          >
        </div>

        <div
          class="flex flex-col xs3:flex-row w-full justify-between items-center py-2 px-2"
          v-show="mostrarPagination && datosActuales.length > 0"
        >
          <div class="grid grid-cols-8 w-full justify-start items-center max-w-xl">
            <span class="col-span-8 sm2:col-span-4 mt-1 text-gray-500"
              >Showing results {{ primero }} to {{ ultimo }} of
              {{ datosActuales.length }}
            </span>

            <div class="col-span-4 sm2:col-span-2 mt-1 sm:mt-0">
              <jet-button
                class="disabled:opacity-60 bg-purple-400 hover:bg-purple-500 active:bg-purple-700 text-white"
                @click="paginacion = paginacion - 1"
                :disabled="paginacion == 0"
              >
                Previous
              </jet-button>
            </div>

            <div class="col-span-4 sm2:col-span-2 mt-1 sm:mt-0">
              <jet-button
                class="disabled:opacity-60 bg-pink-400 hover:bg-pink-500 active:bg-pink-700 text-white"
                @click="paginacion = paginacion + 1"
                :disabled="ultimo >= datosActuales.length"
              >
                Next
              </jet-button>
            </div>
          </div>

          <div
            class="xs3:mr-1 mt-2 xs3:mt-0 grid grid-cols-8 w-full xs3:w-min xs3:flex xs3:flex-row items-center justify-start"
          >
            <select
              v-model="paginas"
              class="rounded-md col-span-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm"
              @change="paginacion = 0"
              style="max-width: 110px"
            >
              <option
                v-for="opcion in paginaciones"
                :value="opcion.numero"
                :key="opcion.numero"
                class="shadow-sm"
              >
                {{ opcion.texto }}
              </option>
            </select>

            <jet-button
              class="col-span-4 text-white bg-yellow-400 hover:bg-yellow-500 xs3:ml-1"
              @click="mostrarPagination = false"
              style="max-width: 45px; heigth: 45px"
            >
              X
            </jet-button>
          </div>
        </div>
        <div
          v-show="!mostrarPagination"
          class="w-full py-2 px-2 flex flex-row justify-evenly items-center"
        >
          <jet-button
            @click="mostrarPagination = true"
            class="text-white bg-lime-400 hover:bg-lime-500 focus:bg-lime-600 ml-2"
          >
            SHOW PAGS
          </jet-button>
        </div>
      </div>

      <loading v-show="mostrar == 'no'" color="gray"></loading>
    </div>
  </app-layout>
</template>

<script>
var moment = require("moment");

import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetInput from "@/Jetstream/Input";
import BannerPropio from "@/Pages/Componentes/BannerPropio";
import JetDialogModal from "@/Jetstream/DialogModal";
import Loading from "@/Pages/Componentes/Loading";
import JetInputError from "@/Jetstream/InputError";

export default {
  components: {
    AppLayout,
    JetDialogModal,
    JetButton,
    JetSecondaryButton,
    Loading,
    BannerPropio,
    JetInput,
    JetInputError,
  },

  data() {
    return {
      moment: moment,
      paginas: 10,
      paginacion: 0,
      datosActuales: [],
      mostrarPagination: true,
      recibidos: [],
      enviados: [],
      modo: "recibidos",
      ordenacionActual: "Date (Last)",
      modalMensaje: false,
      seleccionados: [],
      tipoModal: "new",
      validezUsuario: null,

      paginaciones: [
        { texto: "10", numero: 10 },
        { texto: "25", numero: 25 },
        { texto: "50", numero: 50 },
        { texto: "75", numero: 75 },
        { texto: "100", numero: 100 },
      ],

      datosInfo: {
        mostrar: false,
        style: "",
        mensaje: "",
        color: "",
      },

      actual: {
        otroNombre: "",
        mensaje: "",
        id: "",
        userId: null,
      },

      errores: {
        mensaje: null,
        usuario: null,
      },

      mostrar: "no",
    };
  },

  watch: {
    modo(nuevo) {
      if (nuevo == "recibidos") {
        this.datosActuales = this.recibidos;
      } else {
        this.datosActuales = this.enviados;
      }
    },
  },

  computed: {
    modoRecibidos() {
      return this.modo == "recibidos"
        ? "bg-pink-500 text-white hover:bg-pink-600 active:bg-pink-700"
        : "bg-white hover:bg-gray-50 focus:bg-gray-100 text-pink-500 hover:text-pink-600 active:text-pink-700";
    },

    modoEnviados() {
      return this.modo == "enviados"
        ? "bg-purple-500 text-white hover:bg-purple-600 active:bg-purple-700"
        : "bg-white hover:bg-gray-50 focus:bg-gray-100 text-purple-500 hover:text-purple-600 active:text-purple-700";
    },

    primero() {
      if (this.datosActuales.length == 0) {
        return 0;
      } else {
        return 1 + this.paginacion * this.paginas;
      }
    },

    ultimo() {
      if (this.paginas + this.paginacion * this.paginas > this.datosActuales.length) {
        return this.datosActuales.length;
      } else {
        return this.paginas + this.paginacion * this.paginas;
      }
    },
  },

  props: ["clave", "usuario", "listaUsuarios"],

  created() {
    this.buscarMensajes();
  },

  methods: {
    buscarMensajes() {
      this.mostrar = "no";
      this.enviados = [];
      this.recibidos = [];

      axios
        .get(route("messages.index"), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          res.data.data[0].forEach((mensaje) => {
            this.recibidos.push({
              id: mensaje.pivot.id,
              otroNombre: mensaje.name,
              mensaje: mensaje.pivot.message,
              created_at: mensaje.pivot.created_at,
            });
          });

          res.data.data[1].forEach((mensaje) => {
            this.enviados.push({
              id: mensaje.pivot.id,
              otroNombre: mensaje.name,
              mensaje: mensaje.pivot.message,
              created_at: mensaje.pivot.created_at,
            });
          });

          this.mostrar = "si";
          this.modo = "recibidos";
          this.datosActuales = this.recibidos;
        })
        .catch((err) => {
          this.datosInfo["color"] = "red";
          this.datosInfo["style"] = "danger";
          this.datosInfo["mensaje"] = err.response.data.message;
          this.datosInfo["mostrar"] = true;
          this.mostrar = "error";
        });
    },
    pulsadoCrear() {
      this.tipoModal = "new";

      this.actual.otroNombre = "";
      this.actual.id = "";
      this.actual.userId = null;
      this.actual.mensaje = "";

      this.validezUsuario = null;
      this.errores.usuario = null;
      this.errores.mensaje = null;
      this.modalMensaje = true;
    },
    crearMensaje() {
      var datos = new FormData();

      datos.append("message", this.actual.mensaje);
      datos.append("recipient", this.actual.userId);

      axios
        .post(route("messages.store"), datos, {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.datosInfo["color"] = "gray";
          this.datosInfo["style"] = "success";
          this.datosInfo["mensaje"] = res.data.message;
          this.datosInfo["mostrar"] = true;

          this.modalMensaje = false;

          this.buscarMensajes();
        })
        .catch((err) => {
          if (err.response.data.message != null) {
            this.datosInfo["color"] = "red";
            this.datosInfo["style"] = "danger";
            this.datosInfo["mensaje"] = err.response.data.message;
            this.datosInfo["mostrar"] = true;
            this.modalMensaje = false;
          } else if (err.response.data.validation_errors != null) {
            this.errores.mensaje = err.response.data.validation_errors["message"];
          }
        });
    },
    borrarMensaje() {
      var errores = 0;

      this.seleccionados.forEach((id) => {
        axios
          .delete(route("messages.destroy", id), {
            headers: {
              Authorization: "Bearer " + this.clave,
            },
          })
          .then((res) => {
            for (let actual = 0; actual < this.enviados.length; actual++) {
              if (this.enviados[actual].id == id) {
                this.enviados.splice(actual, 1);
              }
            }
          })
          .catch((err) => {
            errores++;
          });
      });

      if (errores > 0) {
        this.datosInfo["color"] = "red";
        this.datosInfo["style"] = "danger";
        this.datosInfo["mensaje"] =
          "There was an error trying to delete " + errores + " of your messages :(";
        this.datosInfo["mostrar"] = true;
      } else {
        this.datosInfo["color"] = "gray";
        this.datosInfo["style"] = "success";
        this.datosInfo["mensaje"] = "All messages where deleted successfully :)";
        this.datosInfo["mostrar"] = true;
      }
    },
    mostrarMensaje(id) {
      this.actual.id = id;
      var encontrado = false;
      this.validezUsuario = null;
      this.errores.usuario = null;
      this.errores.mensaje = null;

      this.enviados.forEach((mensaje) => {
        if (mensaje.id == this.actual.id) {
          this.actual.mensaje = mensaje.mensaje;
          this.actual.otroNombre = mensaje.otroNombre;
        }
      });

      if (!encontrado) {
        this.recibidos.forEach((mensaje) => {
          if (mensaje.id == this.actual.id) {
            this.actual.mensaje = mensaje.mensaje;
            this.actual.otroNombre = mensaje.otroNombre;
          }
        });
      }

      this.tipoModal = "old";
      this.modalMensaje = true;
    },
    ordenar(nuevo) {
      this.ordenacionActual = nuevo
        ? this.ordenacionActual == "Date (Last)"
          ? "Date (First)"
          : "Date (Last)"
        : "Date (Last)";

      var ordenActual = this.ordenacionActual;

      this.datosActuales = this.datosActuales.sort(function (a, b) {
        var x = a["created_at"];
        var y = b["created_at"];

        if (ordenActual == "Date (Last)") {
          return x < y ? -1 : x > y ? 1 : 0;
        } else {
          return x > y ? -1 : x < y ? 1 : 0;
        }
      });
    },

    mostrarUsuario(id) {
      window.location.href = route("UserShow", id);
    },
    comprobarUsuario() {
      this.validezUsuario = null;
      var encontrado = false;
      this.errores.usuario = null;

      this.listaUsuarios.forEach((usuario) => {
        if (usuario.name == this.actual.otroNombre) {
          encontrado = true;

          if (usuario.name == this.usuario.name) {
            this.errores.usuario = "You cant send a message to yourself";
          } else {
            this.validezUsuario = "User found :)";
            this.actual.userId = usuario.id;
          }
        }
      });
      if (!encontrado) {
        this.errores.usuario = "User not found :(";
      }
    },
  },
};
</script>

<template>
  <app-layout color="#E5E7EB">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ nombreLista }} FRIEND LIST
      </h2>
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
        <jet-dialog-modal :show="modalNuevo" @close="modalNuevo = false">
          <template #title>
            <span class="text-gray-600 font-bold" v-if="modoModal == 'amigo'"
              >Add Friend
            </span>

            <span class="text-gray-600 font-bold" v-if="modoModal == 'mensaje'"
              >Send Message to {{ actual.name }}
            </span>
          </template>

          <template #content>
            <form @submit.prevent="aceptarModal">
              <div class="flex flex-col items-start" v-if="modoModal == 'amigo'">
                <jet-input
                  id="usuario"
                  type="text"
                  class="mt-1 block w-full"
                  v-model="actual.name"
                  placeholder="User"
                  @blur="comprobarUsuario"
                />

                <span
                  v-show="validezUsuario.tipo != null"
                  class="mt-2"
                  :class="colorValidez"
                >
                  {{ validezUsuario.mensaje }}
                </span>
              </div>
              <div class="flex flex-col items-start" v-if="modoModal == 'mensaje'">
                <textarea
                  id="mensaje"
                  class="mt-1 block w-full border-indigo-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                  style="resize: none"
                  rows="5"
                  v-model="actual.mensaje"
                />
                <jet-input-error :message="errorMensaje" class="mt-2" />
              </div>
            </form>
          </template>

          <template #footer>
            <jet-secondary-button
              type="button"
              @click.prevent="modalNuevo = false"
              class="mr-2"
            >
              Cancel
            </jet-secondary-button>

            <jet-button
              class="mt-2 ml-2 text-white bg-gray-500 hover:bg-gray-600 disabled:opacity-40"
              type="button"
              @click.prevent="aceptarModal"
              :disabled="
                (validezUsuario.tipo == null || validezUsuario.tipo == 'error') &&
                modoModal == 'amigo'
              "
            >
              Send
            </jet-button>
          </template>
        </jet-dialog-modal>

        <div
          class="pt-3 flex flex-col xs3:flex-row-reverse xs3:justify-between xs3:items-end sticky z-10 top-0 items-start bg-gray-50 w-full"
        >
          <div
            class="flex flex-row w-full xs3:w-min justify-evenly items-center mb-4 xs3:ml-0"
          >
            <select
              v-model="ordenacion"
              @change="ordenar"
              class="col-span-2 rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mr-6"
            >
              <option value="name +">Name (a-z)</option>
              <option value="name -">Name (z-a)</option>
              <option value="date +">Date (Asc)</option>
              <option value="date -">Date (Desc)</option>
            </select>

            <jet-button
              @click="pulsadoNuevo('amigo')"
              v-if="usuLista == usuario.id"
              class="text-white bg-yellow-300 hover:bg-yellow-400 focus:bg-yellow-500 ml-3"
            >
              NEW
            </jet-button>
          </div>

          <div
            class="flex flex-row justify-start items-end"
            v-if="usuLista == usuario.id"
          >
            <div
              @click="(modo = 'amigos'), ordenar"
              class="mr-0 py-2 px-3 rounded-tl-md cursor-pointer font-semibold border-2 border-pink-500 hover:border-pink-600"
              :class="modoAmigos"
            >
              FRIENDS
            </div>

            <div
              @click="(modo = 'enviados'), ordenar"
              class="ml-0 py-2 px-3 cursor-pointer font-semibold border-2 border-purple-500 hover:border-purple-600"
              :class="modoEnviados"
            >
              SENT
            </div>

            <div
              @click="(modo = 'recibidos'), ordenar"
              class="ml-0 py-2 px-3 rounded-tr-md cursor-pointer font-semibold border-2 border-yellow-500 hover:border-yellow-600"
              :class="modoRecibidos"
            >
              RECIEVED
            </div>
          </div>
        </div>

        <div
          v-show="datosActuales.length > 0"
          class="w-full flex flex-col overflow-y-auto"
        >
          <div
            v-for="(amigo, indice) in datosActuales.slice(primero - 1, ultimo)"
            :key="indice"
            class="flex flex-row justify-start items-center py-2 border-b-2 border-gray-500 bg-gray-50 hover:bg-gray-200 p-2 pr-4 w-full"
          >
            <div class="mr-2">
              <a :href="amigo.imagen" target="_blank" v-if="amigo.imagen != null">
                <img :src="amigo.imagen" alt="image" class="h-14 w-14 rounded-full m-1" />
              </a>
              <img
                v-else
                src="/img/no_foto.jpg"
                alt="image"
                class="h-14 w-14 rounded-full m-1"
              />
            </div>

            <div class="flex flex-row xs3:items-center w-full justify-between">
              <div class="flex-col flex justify-between">
                <span
                  @click="mostrarUsuario(amigo.id)"
                  class="mr-2 flex-shrink-0 hover:underline cursor-pointer h-7"
                >
                  {{ amigo.name }}</span
                >

                <div class="flex flex-row">
                  <span class="hidden xs3:block mr-2">Online: </span>

                  <span>{{ amigo.last_online }}</span>
                </div>
              </div>

              <div
                class="flex flex-row justify-evenly items-center mt-4 xs3:mt-0"
                v-show="usuLista == usuario.id"
              >
                <img
                  src="/img/addFriend.svg"
                  alt="Send message"
                  class="h-7 w-auto transform active:scale-120 hover:scale-110 cursor-pointer mr-1"
                  v-if="modo == 'recibidos'"
                  @click="aceptarAmigo(amigo.id)"
                />

                <img
                  src="/img/remove-friend.svg"
                  alt="Send message"
                  class="h-8 w-auto transform active:scale-120 hover:scale-110 cursor-pointer mr-1"
                  @click="borrarAmigo(amigo.id)"
                />

                <img
                  src="/img/sendMessage.svg"
                  v-if="modo == 'amigos'"
                  alt="Send message"
                  class="h-8 w-auto transform active:scale-120 hover:scale-110 cursor-pointer"
                  @click="
                    (actual.id = amigo.id),
                      (actual.name = amigo.name),
                      pulsadoNuevo('mensaje')
                  "
                />
              </div>
            </div>
          </div>
        </div>

        <div v-show="datosActuales.length == 0" class="self-center mt-5 my-8">
          <span
            class="font-extrabold text-2xl"
            :class="'text-gray-700'"
            v-if="modo == 'recibidos'"
            >You havent recieved any friend invitation :(</span
          >

          <span
            class="font-extrabold text-2xl"
            :class="'text-gray-700'"
            v-if="modo == 'enviados'"
            >You havent sent any friend invitation :(</span
          >

          <span
            class="font-extrabold text-2xl"
            :class="'text-gray-700'"
            v-if="modo == 'amigos'"
            >This user doesn't have any friend (In the app) :(</span
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
      nombreLista: "",
      paginas: 10,
      paginacion: 0,
      datosActuales: [],
      mostrarPagination: true,
      recibidos: [],
      enviados: [],
      amigos: [],
      modo: "amigos",
      ordenacion: "name +",
      modalNuevo: false,
      modoModal: "amigo",
      validezUsuario: { tipo: null, mensaje: null },

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
        name: "",
        id: "",
        mensaje: "",
        imagen: "",
      },

      errorMensaje: null,

      mostrar: "no",
    };
  },

  watch: {
    modo(nuevo) {
      if (nuevo == "recibidos") {
        this.datosActuales = this.recibidos;
      }
      if (nuevo == "enviados") {
        this.datosActuales = this.enviados;
      }
      if (nuevo == "amigos") {
        this.datosActuales = this.amigos;
      }
    },
  },

  computed: {
    modoRecibidos() {
      return this.modo == "recibidos"
        ? "bg-yellow-500 text-white hover:bg-yellow-600 active:bg-yellow-700"
        : "bg-white hover:bg-gray-50 focus:bg-gray-100 text-yellow-500 hover:text-yellow-600 active:text-yellow-700";
    },

    modoEnviados() {
      return this.modo == "enviados"
        ? "bg-purple-500 text-white hover:bg-purple-600 active:bg-purple-700"
        : "bg-white hover:bg-gray-50 focus:bg-gray-100 text-purple-500 hover:text-purple-600 active:text-purple-700";
    },

    modoAmigos() {
      return this.modo == "amigos"
        ? "bg-pink-500 text-white hover:bg-pink-600 active:bg-pink-700"
        : "bg-white hover:bg-gray-50 focus:bg-gray-100 text-pink-500 hover:text-pink-600 active:text-pink-700";
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

    colorValidez() {
      if (this.validezUsuario == "valido") {
        return "text-green-500";
      } else {
        return "text-red-500";
      }
    },
  },

  props: ["clave", "usuario", "usuLista", "listaUsuarios"],

  created() {
    this.buscarAmigos();
    this.buscarNombreLista();
  },

  methods: {
    buscarNombreLista() {
      this.listaUsuarios.forEach((usuario) => {
        if (usuario.id == this.usuLista) {
          this.nombreLista = usuario.name;
        }
      });
    },

    buscarAmigos() {
      this.mostrar = "no";
      this.enviados = [];
      this.amigos = [];
      this.recibidos = [];

      axios
        .get(route("friends.index", this.usuLista), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          res.data.data[0].forEach((amigo) => {
            if (amigo.profile_photo_url.includes("https")) {
              amigo.profile_photo_url = amigo.profile_photo_path;
            }

            var ultimo;

            if (amigo.last_online == null) {
              ultimo = "never";
            } else if (amigo.last_online == "now") {
              ultimo = amigo.last_online;
            } else {
              ultimo = this.moment(amigo.last_online).fromNow();
            }

            this.amigos.push({
              id: amigo.id,
              name: amigo.name,
              imagen: amigo.profile_photo_url,
              date: amigo.pivot.confirmation_date,
              last_online: ultimo,
            });
          });

          res.data.data[2].forEach((amigo) => {
            if (amigo.profile_photo_url.includes("https://picsum.photos/500/500")) {
              amigo.profile_photo_url = amigo.profile_photo_path;
            }

            var ultimo;

            if (amigo.last_online == null) {
              ultimo = "never";
            } else if (amigo.last_online == "now") {
              ultimo = amigo.last_online;
            } else {
              ultimo = this.moment(amigo.last_online).fromNow();
            }

            this.recibidos.push({
              id: amigo.id,
              name: amigo.name,
              imagen: amigo.profile_photo_url,
              date: amigo.pivot.created_at,
              last_online: ultimo,
            });
          });

          res.data.data[1].forEach((amigo) => {
            if (amigo.profile_photo_url.includes("https://picsum.photos/500/500")) {
              amigo.profile_photo_url = amigo.profile_photo_path;
            }

            var ultimo;

            if (amigo.last_online == null) {
              ultimo = "never";
            } else if (amigo.last_online == "now") {
              ultimo = amigo.last_online;
            } else {
              ultimo = this.moment(amigo.last_online).fromNow();
            }

            this.enviados.push({
              id: amigo.id,
              name: amigo.name,
              imagen: amigo.profile_photo_url,
              date: amigo.pivot.created_at,
              last_online: ultimo,
            });
          });

          this.mostrar = "si";
          this.modo = "amigos";
          this.datosActuales = this.amigos;
          this.ordenar();
        })
        .catch((err) => {
          this.datosInfo["color"] = "red";
          this.datosInfo["style"] = "danger";
          this.datosInfo["mensaje"] = err.response.data.message;
          this.datosInfo["mostrar"] = true;
          this.mostrar = "error";
        });
    },

    pulsadoNuevo(tipo) {
      this.modoModal = tipo;

      if (tipo == "amigo") {
        this.actual.name = "";
        this.actual.id = "";
      }

      this.actual.mensaje = "";

      this.validezUsuario.tipo = null;
      this.validezUsuario.mensaje = null;
      this.errorMensaje = null;
      this.modalNuevo = true;
    },

    aceptarModal() {
      var datos = new FormData();

      if (this.modoModal == "amigo") {
        datos.append("id", this.actual.id);

        axios
          .post(route("friends.store"), datos, {
            headers: {
              Authorization: "Bearer " + this.clave,
            },
          })
          .then((res) => {
            this.datosInfo["color"] = "gray";
            this.datosInfo["style"] = "success";
            this.datosInfo["mensaje"] = res.data.message;
            this.datosInfo["mostrar"] = true;

            this.buscarAmigos();

            this.modalNuevo = false;
          })
          .catch((err) => {
            if (err.response.data.message != null) {
              this.datosInfo["color"] = "red";
              this.datosInfo["style"] = "danger";
              this.datosInfo["mensaje"] = err.response.data.message;
              this.datosInfo["mostrar"] = true;
              this.modalNuevo = false;
            } else if (err.response.data.validation_errors != null) {
              this.errores.mensaje = err.response.data.validation_errors["id"];
            }
          });
      } else {
        datos.append("message", this.actual.mensaje);
        datos.append("recipient", this.actual.id);

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

            this.modalNuevo = false;
          })
          .catch((err) => {
            if (err.response.data.message != null) {
              this.datosInfo["color"] = "red";
              this.datosInfo["style"] = "danger";
              this.datosInfo["mensaje"] = err.response.data.message;
              this.datosInfo["mostrar"] = true;
              this.modalNuevo = false;
            } else if (err.response.data.validation_errors != null) {
              this.errores.mensaje = err.response.data.validation_errors["message"];
            }
          });
      }
    },

    aceptarAmigo(id) {
      var datos = new FormData();
      datos.append("_method", "PUT");

      axios
        .post(route("friends.update", id), datos, {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.datosInfo["color"] = "gray";
          this.datosInfo["style"] = "success";
          this.datosInfo["mensaje"] = res.data.message;
          this.datosInfo["mostrar"] = true;

          var cambiado;

          for (let actual = 0; actual < this.recibidos.length; actual++) {
            if (this.recibidos[actual].id == id) {
              cambiado = this.recibidos[actual];
              this.recibidos.splice(actual, 1);
            }
          }

          this.amigos.push(cambiado);
        })
        .catch((err) => {
          this.datosInfo["color"] = "red";
          this.datosInfo["style"] = "danger";
          this.datosInfo["mensaje"] = err.response.data.message;
          this.datosInfo["mostrar"] = true;
        });
    },

    borrarAmigo(id) {
      axios
        .delete(route("friends.destroy", id), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.datosInfo["color"] = "gray";
          this.datosInfo["style"] = "success";
          this.datosInfo["mensaje"] = res.data.message;
          this.datosInfo["mostrar"] = true;

          if (this.datosActuales == this.enviados) {
            for (let actual = 0; actual < this.enviados.length; actual++) {
              if (this.enviados[actual].id == id) {
                this.enviados.splice(actual, 1);
              }
            }
          }

          if (this.datosActuales == this.amigos) {
            for (let actual = 0; actual < this.amigos.length; actual++) {
              if (this.amigos[actual].id == id) {
                this.amigos.splice(actual, 1);
              }
            }
          }

          if (this.datosActuales == this.recibidos) {
            for (let actual = 0; actual < this.recibidos.length; actual++) {
              if (this.recibidos[actual].id == id) {
                this.recibidos.splice(actual, 1);
              }
            }
          }
        })
        .catch((err) => {
          this.datosInfo["color"] = "red";
          this.datosInfo["style"] = "danger";
          this.datosInfo["mensaje"] = err.response.data.message;
          this.datosInfo["mostrar"] = true;
        });
    },

    ordenar() {
      var campo = this.ordenacion.split(" ")[0];
      var orden = this.ordenacion.split(" ")[1];

      this.datosActuales = this.datosActuales.sort(function (a, b) {
        var x = a[campo];
        var y = b[campo];

        if (campo == "name") {
          x = x.toLowerCase();
          y = y.toLowerCase();
        }

        if (orden == "+") {
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
      this.validezUsuario.tipo = null;
      var encontrado = false;

      this.listaUsuarios.forEach((usuario) => {
        if (usuario.name == this.actual.name) {
          encontrado = true;

          if (usuario.name == this.usuario.name) {
            this.validezUsuario.tipo = "error";
            this.validezUsuario.mensaje =
              "You cant send a friend invitation to yourself :(";
          } else {
            this.validezUsuario.tipo = "valido";
            this.validezUsuario.mensaje = "User found :)";
            this.actual.id = usuario.id;
          }
        }
      });
      if (!encontrado) {
        this.validezUsuario.tipo = "error";
        this.validezUsuario.mensaje = "User not found :(";
      }
    },
  },
};
</script>

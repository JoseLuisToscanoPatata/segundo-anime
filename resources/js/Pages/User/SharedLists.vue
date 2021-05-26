<template>
  <app-layout color="#A3E635">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Shared Lists</h2>
    </template>

    <div class="max-w-7xl w-full sm:mx-auto px-3 xs3:px-6 lg:px-8 py-12">
      <banner-propio
        v-if="datosInfo['mostrar']"
        @close="datosInfo['mostrar'] = false"
        :color="datosInfo['color']"
        :style="datosInfo['style']"
        :message="datosInfo['mensaje']"
      />

      <div
        class="flex flex-col p-2 sm:p-6 bg-lime-200 rounded-lg justify-start items-center overflow-hidden"
        style="max-height: 75vh"
      >
        <div
          class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-9 lg:grid-cols-11 gap-x-2 pb-6 gap-y-4 sticky z-10 top-3 bg-lime-200 m-3"
          v-show="mostrarInputs"
        >
          <jet-button
            class="text-white bg-lime-400 hover:bg-lime-600 col-span-2"
            style="max-width: 100px"
            @click="comprobarUsuario"
          >
            SEARCH
          </jet-button>

          <jet-input
            type="text"
            class="max-w-xs mr-6 col-span-2"
            placeholder="usuario.."
            v-model="comparado"
          />

          <select
            v-model="lista"
            class="rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mr-6 col-span-2"
            @change="existencia = 'nada'"
            :disabled="inputs.lista"
          >
            <option value="nada">List</option>
            <option class="shadow-sm" value="anime" :disabled="inputs.anime">
              Anime
            </option>

            <option class="shadow-sm" value="manga" :disabled="inputs.manga">
              Manga
            </option>
          </select>

          <select
            v-model="existencia"
            class="rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mr-6 col-span-2"
            @change="cambiarLista"
            :disabled="lista == 'nada'"
          >
            <option value="nada">User</option>
            <option
              class="shadow-sm"
              value="ambos"
              :disabled="lista == 'anime' ? inputs.animeAmbos : inputs.mangaAmbos"
            >
              Both lists
            </option>

            <option
              class="shadow-sm"
              value="soloYo"
              :disabled="lista == 'anime' ? inputs.animeSoloYo : inputs.mangaSoloYo"
            >
              Only you
            </option>

            <option
              class="shadow-sm"
              value="soloEl"
              :disabled="lista == 'anime' ? inputs.animeSoloEl : inputs.mangaSoloEl"
            >
              Only him/her
            </option>
          </select>

          <jet-button
            class="text-white bg-lime-400 hover:bg-lime-600 col-span-1"
            @click="mostrarInputs = false"
            style="max-width: 45px; heigth: 45px"
          >
            X
          </jet-button>
        </div>

        <div
          v-show="!mostrarInputs"
          class="pb-6 sticky z-10 top-0 flex flex-row justify-start w-full bg-lime-200 m-3"
        >
          <jet-button
            class="text-white bg-lime-400 hover:bg-lime-600"
            @click="mostrarInputs = true"
          >
            SHOW INPUTS
          </jet-button>
        </div>

        <div v-show="mostrar == 'cargando'" class="w-full bg-lime-200">
          <p class="font-bold text-lg w-full text-center my-5 px-5 text-lime-700">
            LOADING...
          </p>
        </div>

        <div v-show="mostrar == 'sinUser'" class="w-full bg-lime-200">
          <p class="font-bold text-lg w-full text-center my-5 px-5 text-lime-700">
            SELECT AN USER TO COMPARE WITH
          </p>
        </div>
        <div v-show="mostrar == 'elegirLista'" class="w-full bg-lime-200">
          <p class="font-bold text-lg w-full text-center my-5 px-5 text-lime-700">
            SELECT A LIST TO SHOW
          </p>
        </div>
        <div
          v-show="mostrar == 'mostrarLista' && tipoLista == 'unica'"
          class="w-full bg-lime-200 px-2 sm:px-6 w-full overflow-auto"
        >
          <table class="min-w-full divide-y divide-gray-200 my-3 rounded-lg table-fixed">
            <thead>
              <tr>
                <th
                  class="z-10 top-0 sticky border-b border-lime-300 border-solid bg-lime-200 w-72 md:w-min"
                >
                  <span class="text-lime-600 font-semibold text-lg">Title</span>
                </th>
                <th
                  class="z-10 top-0 sticky border-b border-lime-300 border-solid bg-lime-200"
                  style="min-width: 100px"
                >
                  <span class="text-lime-600 font-semibold text-lg"
                    >{{ userActual }} Score</span
                  >
                </th>
                <th
                  class="z-10 top-0 sticky border-b border-lime-300 border-solid bg-lime-200"
                  style="min-width: 150px"
                >
                  <span class="text-lime-600 font-semibold text-lg"
                    >{{ userActual }} Status</span
                  >
                </th>
              </tr>
            </thead>

            <tbody class="overflow-y-auto">
              <tr
                v-for="(dato, indice) in listaActual"
                :key="indice"
                class="hover:bg-lime-400 mb-3"
              >
                <td
                  class="text-left text-gray-600 hover:text-gray-800 w-72 md:w-min"
                  v-if="lista == 'anime'"
                >
                  <a :href="route('AnimeProfile', dato.id)"> {{ dato.title }}</a>
                </td>
                <td
                  class="text-left text-gray-600 hover:text-gray-800 w-72 md:w-min"
                  v-else
                >
                  <a :href="route('MangaProfile', dato.id)"> {{ dato.title }}</a>
                </td>
                <td
                  class="text-center"
                  style="min-width: 100px"
                  v-if="dato.score != null"
                >
                  {{ dato.score }}
                </td>
                <td class="text-center" style="min-width: 100px" v-else>-</td>
                <td class="text-center" style="min-width: 150px">{{ dato.status }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";
import BannerPropio from "@/Pages/Componentes/BannerPropio";

export default {
  components: {
    AppLayout,
    JetInput,
    JetButton,
    BannerPropio,
  },

  props: ["clave", "usu2", "ambos", "tipo", "usuario", "listaUsers"],

  data() {
    return {
      mostrar: "cargando",
      procesosTerminados: 0,

      comparado: "",
      lista: "nada",
      existencia: "nada",

      usuarios: [],

      datosComparado: {},

      misAnimes: [],
      misMangas: [],
      animesComparado: [],
      mangasComparado: [],

      listasObtenidas: 0,

      listaActual: [],
      tipoLista: "",
      userActual: "",

      animesIguales: [],
      animesSoloYo: [],
      animesSoloEl: [],

      mangasIguales: [],
      mangasSoloYo: [],
      mangasSoloEl: [],

      mostrarInputs: false,

      datosInfo: {
        mostrar: false,
        style: "",
        mensaje: "",
        color: "",
      },

      inputs: {
        lista: true,
        existencia: true,
        anime: false,
        manga: false,
        animeSoloYo: false,
        animeSoloEl: false,
        animeAmbos: false,
        mangaSoloYo: false,
        mangaSoloEl: false,
        mangaAmbos: false,
      },
    };
  },

  created() {
    this.lista = this.tipo;
    this.usuarios = this.listaUsers;

    if (this.ambos) {
      this.existencia = "ambos";
    }

    this.operacionesIniciales();
  },

  methods: {
    desactivarOpciones() {
      console.log("todos tus animes");
      console.log(this.misAnimes);
      console.log("todos sus animes");
      console.log(this.animesComparado);
      console.log("animes solo yo");
      console.log(this.animesSoloYo);
      console.log("animes iguales");
      console.log(this.animesIguales);
      console.log("animes solo el");
      console.log(this.animesSoloEl);

      if (
        this.animesSoloYo.length == 0 &&
        this.animesSoloEl.length == 0 &&
        this.animesIguales.length == 0
      ) {
        this.inputs.anime = true;
      }
      if (this.animesSoloYo.length == 0) {
        this.inputs.animeSoloYo = true;
      }

      if (this.animesSoloEl.length == 0) {
        this.inputs.animeSoloEl = true;
      }

      if (this.animesIguales.length == 0) {
        this.inputs.animeAmbos = true;
      }

      if (
        this.mangasSoloYo.length == 0 &&
        this.mangasSoloEl.length == 0 &&
        this.mangasIguales.length == 0
      ) {
        this.inputs.manga = true;
      }
      if (this.mangasSoloYo.length == 0) {
        this.inputs.mangaSoloYo = true;
      }

      if (this.mangasSoloEl.length == 0) {
        this.inputs.mangaSoloEl = true;
      }

      if (this.mangasIguales.length == 0) {
        this.inputs.mangaAmbos = true;
      }

      if (this.inputs.anime && this.inputs.manga) {
        this.inputs.lista = true;
      } else {
        this.inputs.lista = false;
      }
    },

    operacionesIniciales() {
      axios
        .get(route("watches.index", this.usuario.id), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          res.data.data.forEach((anime) => {
            this.misAnimes.push({
              id: anime.id,
              title: anime.title,
              status: anime.pivot.watchStatus,
              score: anime.pivot.score,
            });
          });

          this.listasObtenidas++;
          if (this.listasObtenidas == 4) {
            this.compararListas();
          }
        });

      axios
        .get(route("reads.index", this.usuario.id), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          res.data.data.forEach((manga) => {
            this.misMangas.push({
              id: manga.id,
              title: manga.title,
              status: manga.pivot.readStatus,
              score: manga.pivot.score,
            });
          });

          this.listasObtenidas++;
          if (this.listasObtenidas == 4) {
            this.compararListas();
          }
        });

      if (this.usu2 != null) {
        var busqueda = this.usuarios.find((usuario) => usuario.id == this.usu2);

        if (busqueda != undefined) {
          this.datosComparado = busqueda;
          this.comparado = busqueda.name;
          this.obtenerListas();
        } else {
          this.datosInfo["color"] = "red";
          this.datosInfo["style"] = "danger";
          this.datosInfo["mensaje"] = "User not found :(";
          this.datosInfo["mostrar"] = true;
          this.mostrar = "sinUser";
        }
      } else {
        this.mostrar = "sinUser";
      }

      this.usuarios = this.sortear(this.usuarios, "name");
    },

    comprobarUsuario() {
      this.datosComparado = [];
      this.mostrar = "cargando";
      this.lista = "nada";
      this.existencia = "nada";
      this.animesIguales = [];
      this.animesSoloYo = [];
      this.animesSoloEl = [];
      this.mangasIguales = [];
      this.mangasSoloYo = [];
      this.mangasSoloEl = [];
      this.listaActual = [];

      if (this.comparado.trim().length > 0) {
        var busqueda = this.usuarios.find((usuario) => usuario.name == this.comparado);

        if (busqueda != undefined) {
          this.datosComparado = busqueda;

          if (busqueda.id == this.usuario.id) {
            this.datosInfo["color"] = "red";
            this.datosInfo["style"] = "danger";
            this.datosInfo["mensaje"] = "You cant look for yourself in the list :(";
            this.datosInfo["mostrar"] = true;
            this.comparado = "";
            this.mostrar = "sinUser";

            this.desactivarOpciones();
          } else {
            this.obtenerListas();
          }
        } else {
          this.datosInfo["color"] = "red";
          this.datosInfo["style"] = "danger";
          this.datosInfo["mensaje"] = "There is no user with that name :(";
          this.datosInfo["mostrar"] = true;
          this.comparado = "";
          this.mostrar = "sinUser";

          this.desactivarOpciones();
        }
      } else {
        this.datosInfo["color"] = "red";
        this.datosInfo["style"] = "danger";
        this.datosInfo["mensaje"] = "You need to specify an user :(";
        this.datosInfo["mostrar"] = true;
        this.comparado = "";
        this.mostrar = "sinUser";

        this.desactivarOpciones();
      }
    },

    obtenerListas() {
      if (this.listasObtenidas > 2) {
        this.listasObtenidas = 2;
      }

      this.animesComparado = [];
      this.mangasComparado = [];

      axios
        .get(route("watches.index", this.datosComparado.id), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          res.data.data.forEach((anime) => {
            this.animesComparado.push({
              id: anime.id,
              title: anime.title,
              status: anime.pivot.watchStatus,
              score: anime.pivot.score,
            });
          });

          this.listasObtenidas++;
          if (this.listasObtenidas == 4) {
            this.compararListas();
          }
        });

      axios
        .get(route("reads.index", this.datosComparado.id), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          res.data.data.forEach((manga) => {
            this.mangasComparado.push({
              id: manga.id,
              title: manga.title,
              status: manga.pivot.readStatus,
              score: manga.pivot.score,
            });
          });

          this.listasObtenidas++;
          if (this.listasObtenidas == 4) {
            this.compararListas();
          }
        });
    },

    compararListas() {
      if (this.misAnimes.length >= this.animesComparado.length) {
        var grande = this.misAnimes;
        var pequeña = this.animesComparado;
      } else {
        var pequeña = this.misAnimes;
        var grande = this.animesComparado;
      }

      var pararGrande = 0;
      var pararPequeño = 0;

      if (pequeña.length != 0) {
        for (let anime = 0; anime - pararGrande < grande.length; anime++) {
          if (anime - pararPequeño < pequeña.length) {
            if (grande[anime - pararGrande].id == pequeña[anime - pararPequeño].id) {
              if (
                grande[anime - pararGrande].score != null &&
                pequeña[anime - pararPequeño].score != null
              ) {
                if (
                  grande[anime - pararGrande].score > pequeña[anime - pararPequeño].score
                ) {
                  var diferencia =
                    grande[anime - pararGrande].score -
                    pequeña[anime - pararPequeño].score;
                } else {
                  var diferencia =
                    pequeña[anime - pararPequeño].score -
                    grande[anime - pararGrande].score;
                }
              } else {
                var diferencia = "-";
              }

              if (grande == this.misAnimes) {
                this.animesIguales.push({
                  id: grande[anime - pararGrande].id,
                  title: grande[anime - pararGrande].title,
                  myScore: grande[anime - pararGrande].score,
                  compScore: pequeña[anime - pararPequeño].score,
                  myStatus: grande[anime - pararGrande].status,
                  compStatus: pequeña[anime - pararPequeño].status,
                  scoreDif: diferencia,
                });
              } else {
                this.animesIguales.push({
                  id: grande[anime - pararGrande].id,
                  title: grande[anime - pararGrande].title,
                  myScore: pequeña[anime - pararPequeño].score,
                  compScore: grande[anime - pararGrande].score,
                  myStatus: pequeña[anime - pararPequeño].status,
                  compStatus: grande[anime - pararGrande].status,
                  scoreDif: diferencia,
                });
              }
            } else if (
              grande[anime - pararGrande].id > pequeña[anime - pararPequeño].id
            ) {
              if (pequeña == this.misAnimes) {
                this.animesSoloYo.push({
                  id: pequeña[anime - pararPequeño].id,
                  title: pequeña[anime - pararPequeño].title,
                  score: pequeña[anime - pararPequeño].score,
                  status: pequeña[anime - pararPequeño].status,
                });
              } else {
                this.animesSoloEl.push({
                  id: pequeña[anime - pararPequeño].id,
                  title: pequeña[anime - pararPequeño].title,
                  score: pequeña[anime - pararPequeño].score,
                  status: pequeña[anime - pararPequeño].status,
                });
              }

              pararGrande++;
            } else if (
              grande[anime - pararGrande].id < pequeña[anime - pararPequeño].id
            ) {
              if (grande == this.misAnimes) {
                this.animesSoloYo.push({
                  id: grande[anime - pararGrande].id,
                  title: grande[anime - pararGrande].title,
                  score: grande[anime - pararGrande].score,
                  status: grande[anime - pararGrande].status,
                });
              } else {
                this.animesSoloEl.push({
                  id: grande[anime - pararGrande].id,
                  title: grande[anime - pararGrande].title,
                  score: grande[anime - pararGrande].score,
                  status: grande[anime - pararGrande].status,
                });
              }

              if (anime - pararGrande == grande.length - 1) {
                if (pequeña == this.misAnimes) {
                  this.animesSoloYo.push({
                    id: pequeña[anime - pararPequeño].id,
                    title: pequeña[anime - pararPequeño].title,
                    score: pequeña[anime - pararPequeño].score,
                    status: pequeña[anime - pararPequeño].status,
                  });
                } else {
                  this.animesSoloEl.push({
                    id: pequeña[anime - pararPequeño].id,
                    title: pequeña[anime - pararPequeño].title,
                    score: pequeña[anime - pararPequeño].score,
                    status: pequeña[anime - pararPequeño].status,
                  });
                }
              }

              pararPequeño++;
            }
          } else {
            if (grande[anime - pararGrande].score == null) {
              grande[anime - pararGrande].score = "-";
            }

            var nuevo = {
              id: grande[anime - pararGrande].id,
              title: grande[anime - pararGrande].title,
              score: grande[anime - pararGrande].score,
              status: grande[anime - pararGrande].status,
            };

            grande == this.misAnimes
              ? this.animesSoloYo.push(nuevo)
              : this.animesSoloEl.push(nuevo);
          }
        }
      }

      if (this.misMangas.length >= this.mangasComparado.length) {
        grande = this.misMangas;
        pequeña = this.mangasComparado;
      } else {
        pequeña = this.misMangas;
        grande = this.mangasComparado;
      }

      pararGrande = 0;
      pararPequeño = 0;

      if (pequeña.length != 0) {
        for (let manga = 0; manga - pararGrande < grande.length; manga++) {
          if (manga - pararPequeño < pequeña.length) {
            if (grande[manga - pararGrande].id == pequeña[manga - pararPequeño].id) {
              if (
                grande[manga - pararGrande].score != null &&
                pequeña[manga - pararPequeño].score != null
              ) {
                if (
                  grande[manga - pararGrande].score > pequeña[manga - pararPequeño].score
                ) {
                  var diferencia =
                    grande[manga - pararGrande].score -
                    pequeña[manga - pararPequeño].score;
                } else {
                  var diferencia =
                    pequeña[manga - pararPequeño].score -
                    grande[manga - pararGrande].score;
                }
              } else {
                var diferencia = "-";
              }

              if (grande == this.misAnimes) {
                this.mangasIguales.push({
                  id: grande[manga - pararGrande].id,
                  title: grande[manga - pararGrande].title,
                  myScore: grande[manga - pararGrande].score,
                  compScore: pequeña[manga - pararPequeño].score,
                  myStatus: grande[manga - pararGrande].status,
                  compStatus: pequeña[manga - pararPequeño].status,
                  scoreDif: diferencia,
                });
              } else {
                this.mangasIguales.push({
                  id: grande[manga - pararGrande].id,
                  title: grande[manga - pararGrande].title,
                  myScore: pequeña[manga - pararPequeño].score,
                  compScore: grande[manga - pararGrande].score,
                  myStatus: pequeña[manga - pararPequeño].status,
                  compStatus: grande[manga - pararGrande].status,
                  scoreDif: diferencia,
                });
              }
            } else if (
              grande[manga - pararGrande].id > pequeña[manga - pararPequeño].id
            ) {
              if (pequeña == this.misAnimes) {
                this.mangasSoloYo.push({
                  id: pequeña[manga - pararPequeño].id,
                  title: pequeña[manga - pararPequeño].title,
                  score: pequeña[manga - pararPequeño].score,
                  status: pequeña[manga - pararPequeño].status,
                });
              } else {
                this.mangasSoloEl.push({
                  id: pequeña[manga - pararPequeño].id,
                  title: pequeña[manga - pararPequeño].title,
                  score: pequeña[manga - pararPequeño].score,
                  status: pequeña[manga - pararPequeño].status,
                });
              }

              pararGrande++;
            } else {
              if (grande == this.misAnimes) {
                this.mangasSoloYo.push({
                  id: grande[manga - pararGrande].id,
                  title: grande[manga - pararGrande].title,
                  score: grande[manga - pararGrande].score,
                  status: grande[manga - pararGrande].status,
                });
              } else {
                this.mangasSoloEl.push({
                  id: grande[manga - pararGrande].id,
                  title: grande[manga - pararGrande].title,
                  score: grande[manga - pararGrande].score,
                  status: grande[manga - pararGrande].status,
                });
              }

              if (manga - pararGrande == grande.length - 1) {
                if (pequeña == this.misMangas) {
                  this.mangasSoloYo.push({
                    id: pequeña[manga - pararPequeño].id,
                    title: pequeña[manga - pararPequeño].title,
                    score: pequeña[manga - pararPequeño].score,
                    status: pequeña[manga - pararPequeño].status,
                  });
                } else {
                  this.mangasSoloEl.push({
                    id: pequeña[manga - pararPequeño].id,
                    title: pequeña[manga - pararPequeño].title,
                    score: pequeña[manga - pararPequeño].score,
                    status: pequeña[manga - pararPequeño].status,
                  });
                }
              }

              pararPequeño++;
            }
          } else {
            if (grande[manga - pararGrande].score == null) {
              grande[manga - pararGrande].score = "-";
            }

            var nuevo = {
              id: grande[manga - pararGrande].id,
              title: grande[manga - pararGrande].title,
              score: grande[manga - pararGrande].score,
              status: grande[manga - pararGrande].status,
            };

            grande == this.misMangas
              ? this.mangasSoloYo.push(nuevo)
              : this.mangasSoloEl.push(nuevo);
          }
        }
      }

      this.mostrar = "elegirLista";
      this.desactivarOpciones();
    },

    sortear(datos, campo) {
      datos = datos.sort(function (a, b) {
        var x = a[campo];
        var y = b[campo];

        return x < y ? -1 : x > y ? 1 : 0;
      });

      return datos;
    },

    cambiarLista() {
      if (this.lista == "nada" || this.existencia == "nada") {
        this.mostrar = "elegirLista";
        this.listaActual = [];
      } else {
        this.mostrar = "mostrarLista";

        if (this.lista == "anime") {
          if (this.existencia == "soloYo") {
            this.listaActual = this.animesSoloYo;
            this.tipoLista = "unica";
            this.userActual = this.usuario.name;
          } else if (this.existencia == "soloEl") {
            this.listaActual = this.animesSoloEl;
            this.tipoLista = "unica";
            this.userActual = this.datosComparado.name;
          } else {
            this.listaActual = this.animesIguales;
            this.tipoLista = "ambos";
          }
        } else {
          if (this.existencia == "soloYo") {
            this.listaActual = this.mangasSoloYo;
            this.tipoLista = "unica";
            this.userActual = this.usuario.name;
          } else if (this.existencia == "soloEl") {
            this.listaActual = this.mangasSoloEl;
            this.tipoLista = "unica";
            this.userActual = this.datosComparado.name;
          } else {
            this.listaActual = this.mangasIguales;
            this.tipoLista = "ambos";
          }
        }
      }
    },
  },
};
</script>

<style scoped>
::-webkit-scrollbar {
  width: 20px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px rgb(94, 93, 93);
  border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #555455;
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #242424;
}

::-webkit-scrollbar-track-piece {
  background: white;
  border-radius: 10px;
}
</style>

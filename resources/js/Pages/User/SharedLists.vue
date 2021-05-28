<template>
  <app-layout color="#A3E635">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Shared Lists</h2>
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
          v-show="mostrar == 'mostrarLista'"
          class="w-full bg-lime-200 px-2 sm:px-6 w-full overflow-auto"
        >
          <table
            class="min-w-full divide-y divide-gray-200 my-3 rounded-lg table-fixed"
            v-if="tipoLista == 'unica'"
          >
            <thead>
              <tr>
                <th
                  class="z-10 top-0 sticky border-b border-lime-300 border-solid bg-lime-200 w-72"
                >
                  <span class="text-lime-600 font-semibold text-lg">Title</span>
                  <button
                    @click="sortear(listaActual, 'title')"
                    class="focus:outline-none outline-none"
                  >
                    <img
                      src="/img/sort.svg"
                      alt="sortear por columna"
                      class="h-3 ml-2 w-auto"
                    />
                  </button>
                </th>
                <th
                  class="z-10 top-0 sticky border-b border-lime-300 border-solid bg-lime-200"
                  style="width: 100px"
                >
                  <span class="text-lime-600 font-semibold text-lg"
                    >{{ userActual }} Score
                  </span>
                  <button
                    @click="sortear(listaActual, 'score')"
                    class="focus:outline-none outline-none"
                  >
                    <img
                      src="/img/sort.svg"
                      alt="sortear por columna"
                      class="h-3 ml-2 w-auto"
                    />
                  </button>
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
                  class="text-left text-gray-600 hover:text-gray-800 w-72"
                  v-if="lista == 'anime'"
                >
                  <a :href="route('AnimeProfile', dato.id)"> {{ dato.title }}</a>
                </td>
                <td class="text-left text-gray-600 hover:text-gray-800 w-72" v-else>
                  <a :href="route('MangaProfile', dato.id)"> {{ dato.title }}</a>
                </td>
                <td class="text-center" style="width: 100px" v-if="dato.score != null">
                  {{ dato.score }}
                </td>
                <td class="text-center" style="width: 100px" v-else>-</td>
              </tr>
            </tbody>
          </table>

          <table
            class="min-w-full divide-y divide-gray-200 my-3 rounded-lg table-fixed"
            v-if="tipoLista == 'ambos'"
          >
            <thead>
              <tr>
                <th
                  class="z-10 top-0 sticky border-b border-lime-300 border-solid bg-lime-200 w-52"
                >
                  <span class="text-lime-600 font-semibold text-lg w-72">Title</span>
                  <button
                    @click="sortear(listaActual, 'title')"
                    class="focus:outline-none outline-none"
                  >
                    <img
                      src="/img/sort.svg"
                      alt="sortear por columna"
                      class="h-3 ml-2 w-auto"
                    />
                  </button>
                </th>
                <th
                  class="z-10 top-0 sticky border-b border-lime-300 border-solid bg-lime-200"
                  style="width: 100px"
                >
                  <span class="text-lime-600 font-semibold text-lg"
                    >{{ usuario.name }} Score
                  </span>
                  <button
                    @click="sortear(listaActual, 'myScore')"
                    class="focus:outline-none outline-none"
                  >
                    <img
                      src="/img/sort.svg"
                      alt="sortear por columna"
                      class="h-3 ml-2 w-auto"
                    />
                  </button>
                </th>

                <th
                  class="z-10 top-0 sticky border-b border-lime-300 border-solid bg-lime-200"
                  style="width: 100px"
                >
                  <span class="text-lime-600 font-semibold text-lg"
                    >{{ datosComparado.name }} Score
                  </span>
                  <button
                    @click="sortear(listaActual, 'compScore')"
                    class="focus:outline-none outline-none"
                  >
                    <img
                      src="/img/sort.svg"
                      alt="sortear por columna"
                      class="h-3 ml-2 w-auto"
                    />
                  </button>
                </th>

                <th
                  class="z-10 top-0 sticky border-b border-lime-300 border-solid bg-lime-200"
                  style="width: 100px"
                >
                  <span class="text-lime-600 font-semibold text-lg">Score Diff </span>
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
                  class="text-left text-gray-600 hover:text-gray-800 w-72"
                  v-if="lista == 'anime'"
                >
                  <a :href="route('AnimeProfile', dato.id)"> {{ dato.title }}</a>
                </td>

                <td class="text-left text-gray-600 hover:text-gray-800 w-72" v-else>
                  <a :href="route('MangaProfile', dato.id)"> {{ dato.title }}</a>
                </td>

                <td class="text-center" style="width: 100px" v-if="dato.myScore != null">
                  {{ dato.myScore }}
                </td>

                <td class="text-center" style="width: 100px" v-else>-</td>

                <td
                  class="text-center"
                  style="width: 100px"
                  v-if="dato.compScore != null"
                >
                  {{ dato.compScore }}
                </td>

                <td class="text-center" style="width: 100px" v-else>-</td>

                <td class="text-center" style="width: 100px">
                  {{ dato.scoreDif }}
                </td>
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
      orden: "desc",
      sorteado: "id",

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
      this.inputs.anime =
        this.animesSoloYo.length == 0 &&
        this.animesSoloEl.length == 0 &&
        this.animesIguales.length == 0;

      this.inputs.animeSoloYo = this.animesSoloYo.length == 0;

      this.inputs.animeSoloEl = this.animesSoloEl.length == 0;

      this.inputs.animeAmbos = this.animesIguales.length == 0;

      this.inputs.manga =
        this.mangasSoloYo.length == 0 &&
        this.mangasSoloEl.length == 0 &&
        this.mangasIguales.length == 0;

      this.inputs.mangaSoloYo = this.mangasSoloYo.length == 0;

      this.inputs.mangaSoloEl = this.mangasSoloEl.length == 0;

      this.inputs.mangaAmbos = this.mangasIguales.length == 0;

      this.inputs.lista = this.inputs.anime && this.inputs.manga;
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
      this.datosComparado = {};
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
          if (busqueda.id == this.usuario.id) {
            this.datosInfo["color"] = "red";
            this.datosInfo["style"] = "danger";
            this.datosInfo["mensaje"] = "You cant look for yourself in the list :(";
            this.datosInfo["mostrar"] = true;
            this.comparado = "";
            this.mostrar = "sinUser";

            this.desactivarOpciones();
          } else {
            this.datosComparado = busqueda;
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
      var actual1 = 0;
      var actual2 = 0;
      var diferencia = 0;
      var miScore = 0;
      var suScore = 0;

      for (let anime = 0; anime - pararGrande < grande.length; anime++) {
        actual1 = anime - pararGrande;
        actual2 = anime - pararPequeño;

        if (actual2 < pequeña.length) {
          if (grande[actual1].id == pequeña[actual2].id) {
            diferencia =
              grande[actual1].score != null && pequeña[actual2].score != null
                ? grande[actual1].score > pequeña[actual2].score
                  ? grande[actual1].score - pequeña[actual2].score
                  : pequeña[actual2].score - grande[actual1].score
                : "-";

            if (grande == this.misAnimes) {
              miScore = grande[actual1].score;
              suScore = pequeña[actual2].score;
            } else {
              suScore = grande[actual1].score;
              miScore = pequeña[actual2].score;
            }

            this.animesIguales.push({
              id: grande[actual1].id,
              title: grande[actual1].title,
              myScore: miScore,
              compScore: suScore,
              scoreDif: diferencia,
            });
          } else if (grande[actual1].id > pequeña[actual2].id) {
            var nuevo = {
              id: pequeña[actual2].id,
              title: pequeña[actual2].title,
              score: pequeña[actual2].score,
            };

            pequeña == this.misAnimes
              ? this.animesSoloYo.push(nuevo)
              : this.animesSoloEl.push(nuevo);

            pararGrande++;
          } else if (grande[actual1].id < pequeña[actual2].id) {
            var nuevo = {
              id: grande[actual1].id,
              title: grande[actual1].title,
              score: grande[actual1].score,
            };

            grande == this.misAnimes
              ? this.animesSoloYo.push(nuevo)
              : this.animesSoloEl.push(nuevo);

            if (actual1 == grande.length - 1) {
              var nuevo = {
                id: pequeña[actual2].id,
                title: pequeña[actual2].title,
                score: pequeña[actual2].score,
              };

              pequeña == this.misAnimes
                ? this.animesSoloYo.push(nuevo)
                : this.animesSoloEl.push(nuevo);
            }

            pararPequeño++;
          }
        } else {
          var nuevo = {
            id: grande[actual1].id,
            title: grande[actual1].title,
            score: grande[actual1].score,
          };

          grande == this.misAnimes
            ? this.animesSoloYo.push(nuevo)
            : this.animesSoloEl.push(nuevo);
        }
      }

      if (this.misAnimes.length >= this.animesComparado.length) {
        var grande = this.misAnimes;
        var pequeña = this.animesComparado;
      } else {
        var pequeña = this.misAnimes;
        var grande = this.animesComparado;
      }

      pararGrande = 0;
      pararPequeño = 0;
      actual1 = 0;
      actual2 = 0;
      diferencia = 0;
      miScore = 0;
      suScore = 0;

      for (let manga = 0; manga - pararGrande < grande.length; manga++) {
        actual1 = manga - pararGrande;
        actual2 = manga - pararPequeño;

        if (actual2 < pequeña.length) {
          if (grande[actual1].id == pequeña[actual2].id) {
            diferencia =
              grande[actual1].score != null && pequeña[actual2].score != null
                ? grande[actual1].score > pequeña[actual2].score
                  ? grande[actual1].score - pequeña[actual2].score
                  : pequeña[actual2].score - grande[actual1].score
                : "-";

            if (grande == this.misAnimes) {
              miScore = grande[actual1].score;
              suScore = pequeña[actual2].score;
            } else {
              suScore = grande[actual1].score;
              miScore = pequeña[actual2].score;
            }

            this.mangasIguales.push({
              id: grande[actual1].id,
              title: grande[actual1].title,
              myScore: miScore,
              compScore: suScore,
              scoreDif: diferencia,
            });
          } else if (grande[actual1].id > pequeña[actual2].id) {
            var nuevo = {
              id: pequeña[actual2].id,
              title: pequeña[actual2].title,
              score: pequeña[actual2].score,
            };

            pequeña == this.misMangas
              ? this.mangasSoloYo.push(nuevo)
              : this.mangasSoloEl.push(nuevo);

            pararGrande++;
          } else if (grande[actual1].id < pequeña[actual2].id) {
            var nuevo = {
              id: grande[actual1].id,
              title: grande[actual1].title,
              score: grande[actual1].score,
            };

            grande == this.misMangas
              ? this.mangasSoloYo.push(nuevo)
              : this.mangasSoloEl.push(nuevo);

            if (actual1 == grande.length - 1) {
              var nuevo = {
                id: pequeña[actual2].id,
                title: pequeña[actual2].title,
                score: pequeña[actual2].score,
              };

              pequeña == this.misMangas
                ? this.mangasSoloYo.push(nuevo)
                : this.mangasSoloEl.push(nuevo);
            }

            pararPequeño++;
          }
        } else {
          var nuevo = {
            id: grande[actual1].id,
            title: grande[actual1].title,
            score: grande[actual1].score,
          };

          grande == this.misMangas
            ? this.mangasSoloYo.push(nuevo)
            : this.mangasSoloEl.push(nuevo);
        }
      }

      this.mostrar = "elegirLista";
      this.animesIguales = this.sortear(this.animesIguales, "title", 0);
      this.animesSoloYo = this.sortear(this.animesSoloYo, "title", 0);
      this.animesSoloEl = this.sortear(this.animesSoloEl, "title", 0);
      this.mangasIguales = this.sortear(this.mangasIguales, "title", 0);
      this.mangasSoloYo = this.sortear(this.mangasSoloYo, "title", 0);
      this.mangasSoloEl = this.sortear(this.mangasSoloEl, "title", 0);
      this.desactivarOpciones();
    },

    sortear(datos, campo, nuevo = 1) {
      if (this.sorteado == campo && nuevo == 1) {
        this.orden = this.orden == "desc" ? "asc" : "desc";
      } else {
        this.orden = "asc";

        if (this.sorteado != campo) {
          this.sorteado = campo;
        }
      }

      var orden = this.orden;

      datos = datos.sort(function (a, b) {
        var x = a[campo];
        var y = b[campo];

        if (campo == "title" || campo == "name") {
          x = x.toLowerCase();
          y = y.toLowerCase();
        }

        if (orden == "asc") {
          return x < y ? -1 : x > y ? 1 : 0;
        } else {
          return x > y ? -1 : x < y ? 1 : 0;
        }
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

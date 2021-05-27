<template>
  <div
    class="p-6 flex flex-col justify-start items-start rounded-lg"
    :class="'bg-' + color.color + '-200'"
  >
    <div
      class="grid grid-cols-2 xs:grid-cols-4 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-10 xl:grid-cols-11 2xl:grid-cols-12 pb-6 gap-y-5 sticky z-10 top-0 mt-2 py-2"
      :class="'bg-' + color.color + '-200'"
      :style="'box-shadow: 0px 10px 5px 3px ' + color.hexa + ';'"
      v-show="mostrarInputs"
    >
      <jet-input
        type="text"
        class="max-w-xs mr-6 col-span-2"
        placeholder="Title"
        v-model="filtrado"
        @keyup="filtrar"
      />

      <template v-for="filtro in filtros" :key="filtro">
        <select
          v-model="filtro['actual']"
          class="rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mr-6"
          :class="filtro['ancho']"
          @change="filtrar"
        >
          <option value="">{{ filtro["titulo"] }}</option>
          <option
            v-for="opcion in filtro['opciones'].length"
            :value="filtro['opciones'][opcion - 1]"
            :key="filtro['opciones'][opcion - 1]"
            class="shadow-sm"
          >
            {{ filtro["titulos"][opcion - 1] }}
          </option>
        </select>
      </template>

      <select
        v-model="ordenacion"
        @change="ordenar"
        class="col-span-2 rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mr-6"
      >
        <option value="title +">Title (a-z)</option>
        <option value="title -">Title (z-a)</option>
        <option value="score +">Score (Asc)</option>
        <option value="score -">Score (Desc)</option>
        <option value="startDate +">Start Date (First)</option>
        <option value="startDate -">Start Date (Last)</option>

        <option value="users -">Most members</option>
      </select>

      <select
        class="col-span-2 rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mr-6"
        v-model="season"
        @change="filtrar"
        v-if="tipo == 'anime'"
      >
        <option value="any">any Season</option>
        <option value="winter">Winter</option>
        <option value="spring">Spring</option>
        <option value="summer">Summer</option>
        <option value="fall">Fall</option>
        <option value="undefined">Not known</option>
      </select>

      <jet-input
        type="number"
        min="1926"
        class="mt-1 block w-full col-span-1"
        v-model="year"
        placeholder="Year"
        @change="filtrar"
      />

      <jet-button
        :class="'text-white bg-' + color.color + '-400 hover:bg-' + color.color + '-600'"
        class="col-span-1 ml-2"
        @click="mostrarInputs = false"
        style="max-width: 45px; heigth: 45px"
      >
        X
      </jet-button>
    </div>

    <div
      v-show="!mostrarInputs"
      class="py-6 px-2 sm:px-6 sticky z-10 top-0 w-full"
      :style="'box-shadow: 0px 10px 5px 3px ' + color.hexa + ';'"
      :class="'bg-' + color.color + '-200'"
    >
      <jet-button
        :class="'text-white bg-' + color.color + '-400 hover:bg-' + color.color + '-600'"
        @click="mostrarInputs = true"
      >
        INPUTS
      </jet-button>

      <jet-button
        :class="
          'text-white bg-' + color.color + '-400 hover:bg-' + color.color + '-600 ml-1'
        "
        @click="mostrarPagination = true"
        v-show="!mostrarPagination"
      >
        PAGS
      </jet-button>

      <jet-button
        :class="
          'text-white bg-' + color.color + '-400 hover:bg-' + color.color + '-600 ml-1'
        "
        @click="toTop"
        v-show="mostrarBoton"
      >
        TOP
      </jet-button>
    </div>

    <div
      class="w-full overflow-x-auto overflow-y-auto grid grid-cols-4 doble:grid-cols-8 triple:grid-cols-12 my-3 justify-items-center"
      v-show="datosOrdenados.length > 0"
    >
      <template
        v-for="(dato, indice) in datosOrdenados.slice(primero - 1, ultimo)"
        :key="indice"
      >
        <div
          class="rounded-lg mx-4 my-5 flex col-span-4 max-w-full w-80 flex-col items-center bg-white"
        >
          <div
            class="h-16 p-2 font-bold text-center"
            :class="'text-' + color.color + '-300 hover:text-' + color.color + '-500'"
          >
            <abbr :title="dato['title']">
              <a :href="route('AnimeProfile', dato['id'])" v-if="tipo == 'anime'">
                <span class="titulos">
                  {{ dato["title"] }}
                </span>
              </a>

              <a :href="route('MangaProfile', dato['id'])" v-if="tipo == 'manga'">
                <span class="titulos"> {{ dato["title"] }}</span>
              </a>
            </abbr>
          </div>
          <div class="h-5 p-2 w-full text-xs flex flex-row items-center justify-evenly">
            <span v-if="dato['subType'] != null" class="">{{ dato["subType"] }}</span>
            <span v-else class="">?</span>
            <div v-if="tipo == 'anime'">
              <div v-if="dato['episodes'] > 0">
                <span>{{ dato["episodes"] }} eps</span>
              </div>
              <div v-else>
                <span>? eps</span>
              </div>
            </div>

            <div v-if="tipo == 'manga'">
              <div v-if="dato['chapters'] > 0">
                <span>{{ dato["chapters"] }} chaps</span>
              </div>
              <div v-else>
                <span>? chaps</span>
              </div>
            </div>
            <div class="justify-self-end">
              <div v-if="dato['yourStatus'] == null">
                <abbr title="Add to your list">
                  <img
                    src="/img/eye.svg"
                    class="w-6 h-auto cursor-pointer"
                    alt="añadir"
                    @click="$emit('nuevo', dato.id)"
                  />
                </abbr>
              </div>
              <div
                v-else-if="dato['yourStatus'] == 'Completed'"
                class="bg-green-300 px-1 rounded-md text-white"
              >
                CMP
              </div>
              <div
                v-else-if="dato['yourStatus'] == 'Dropped'"
                class="bg-red-500 px-1 rounded-md text-white"
              >
                DRP
              </div>
              <div
                v-else-if="dato['yourStatus'] == 'Current'"
                class="bg-blue-300 px-1 rounded-md text-white"
              >
                CUR
              </div>
              <div
                v-else-if="dato['yourStatus'] == 'Plan'"
                class="bg-gray-700 px-1 rounded-md text-white"
              >
                PLN
              </div>
              <div
                v-else-if="dato['yourStatus'] == 'Hold'"
                class="bg-yellow-300 px-1 rounded-md text-white"
              >
                HLD
              </div>
            </div>
            <!---->
          </div>

          <div
            class="h-5 w-full my-2 p-2 text-xs flex flex-row items-center justify-evenly"
          >
            <div>
              <div v-if="dato['startDate'] != null">
                <span>{{ dato["startDate"] }}</span>
              </div>
              <div v-else>
                <span>???</span>
              </div>
            </div>

            <div class="flex flex-row">
              <div v-if="dato['score'] > 0">
                <span>{{ dato["score"] }} </span>
              </div>
              <div v-else>
                <span> N/A</span>
              </div>
              <img src="/img/star.svg" alt="Star" class="h-5 ml-2 w-auto" />
            </div>

            <div class="flex flex-row">
              <img src="/img/userIcon.svg" alt="Star" class="h-5 mr-2 w-auto" />
              <span>{{ dato["users"] }} </span>
            </div>
          </div>

          <div class="flex flex-row h-60 w-full">
            <div class="flex-shrink-0 h-full w-1/2">
              <a :href="dato['cover']" target="_blank" v-if="dato['cover'] != null">
                <img :src="dato['cover']" alt="image" class="rounded-lg h-full w-full" />
              </a>

              <img v-else src="/img/no_foto.jpg" alt="image" class="rounded-lg" />
            </div>
            <div class="overflow-y-auto h-full px-2 w-1/2 text-sm">
              {{ dato["synopsis"] }}
            </div>
          </div>
        </div>
      </template>
    </div>

    <div
      class="flex flex-col xs3:flex-row w-full justify-between items-center py-2 px-2 my-4 sticky z-10 bottom-0"
      v-show="mostrarPagination && datosOrdenados.length > 0"
      :class="'bg-' + color.color + '-200'"
      :style="'box-shadow: 0px -10px 5px 3px ' + color.hexa + ';'"
    >
      <div class="grid grid-cols-8 justify-start items-center max-w-xl">
        <span class="col-span-8 sm:col-span-4 mt-1 text-gray-500" style="min-width: 270px"
          >Showing results {{ primero }} to {{ ultimo }} of
          {{ datosOrdenados.length }}
        </span>

        <div class="col-span-4 sm:col-span-2 mt-1 sm:mt-0">
          <jet-button
            style="min-width: 110px"
            class="ml-2 disabled:opacity-60"
            :class="
              'bg-' +
              color.color +
              '-400 hover:bg-' +
              color.color +
              '-500 active:bg-' +
              color.color +
              '-700'
            "
            @click="paginacion = paginacion - 1"
            :disabled="paginacion == 0"
          >
            Previous
          </jet-button>
        </div>

        <div class="col-span-4 sm:col-span-2 ml-3 sm:ml-0 mt-1 sm:mt-0">
          <jet-button
            style="min-width: 70px"
            class="ml-2 disabled:opacity-60"
            :class="
              'bg-' +
              color.color +
              '-400 hover:bg-' +
              color.color +
              '-500 active:bg-' +
              color.color +
              '-700'
            "
            @click="paginacion = paginacion + 1"
            :disabled="ultimo >= datosOrdenados.length"
          >
            Next
          </jet-button>
        </div>
      </div>

      <div class="mr-1 flex flex-row items-center justify-evenly">
        <select
          v-model="paginas"
          class="rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm ml-2 mt-1 sm:mt-0"
          @change="paginacion = 0"
          style="max-width: 110px"
        >
          <option
            v-for="opcion in cantidadPaginas"
            :value="opcion.numero"
            :key="opcion.numero"
            class="shadow-sm"
          >
            {{ opcion.texto }}
          </option>
        </select>

        <jet-button
          :class="
            'text-white bg-' + color.color + '-400 hover:bg-' + color.color + '-600 ml-1'
          "
          @click="mostrarPagination = false"
          style="max-width: 45px; heigth: 45px"
        >
          X
        </jet-button>
      </div>
    </div>

    <div v-show="datosOrdenados.length == 0 && cargado" class="self-center mt-5 my-8">
      <span class="font-extrabold text-2xl" :class="'text-' + color.color + '-400'"
        >There is no data to show :(</span
      >
    </div>
  </div>
</template>

<script>
import JetButton from "@/Jetstream/Button";
import JetInput from "@/Jetstream/Input";

export default {
  components: {
    JetButton,
    JetInput,
  },

  data() {
    return {
      paginas: 24,
      ordenacion: "title +",
      filtrado: "",
      paginacion: 0,
      datosOrdenados: [],
      year: null,
      cargado: false,
      season: "any",
      mostrarInputs: false,
      mostrarPagination: true,
      mostrarBoton: false,
    };
  },

  props: {
    datos: {},
    cantidadPaginas: [],
    columnas: [],
    filtros: [],
    color: {},
    tipo: "",
    yearActual: "",
    seasonActual: "",
  },

  emits: ["nuevo"],

  created() {
    window.addEventListener("scroll", this.handleScroll);

    this.mostrarBoton = window.scrollY > 300;

    this.datosOrdenados = this.datos;
    this.year = this.yearActual;
    if (this.tipo == "anime") {
      this.season = this.seasonActual;
    }
    this.filtrar();
    this.cargado = true;
  },

  unmounted() {
    window.removeEventListener("scroll", this.handleScroll);
  },

  computed: {
    primero() {
      return 1 + this.paginacion * this.paginas;
    },

    ultimo() {
      if (this.paginas + this.paginacion * this.paginas > this.datosOrdenados.length) {
        return this.datosOrdenados.length;
      } else {
        return this.paginas + this.paginacion * this.paginas;
      }
    },

    scrollAltura() {
      if (window.scrollY < 300) {
        return true;
      } else {
        return false;
      }
    },
  },

  methods: {
    filtrar() {
      this.paginacion = 0;
      var valor = this.filtrado;
      var misFiltros = this.filtros;
      var tipo = this.tipo;

      var yearElegido;

      if (parseInt(this.year) < 1900 || parseInt(this.year) > 2050) {
        this.year = null;
      }

      if (this.year == null || this.year == "") {
        yearElegido = "undefined";
      } else {
        yearElegido = this.year;
      }

      if (tipo == "anime") {
        var seasonElegida = this.season;
        if (seasonElegida == "undefined") {
          yearElegido = "undefined";
          this.year = null;
        }
      }

      this.datosOrdenados = this.datos.filter(function (dato) {
        if (dato.year != yearElegido) {
          if (yearElegido != "undefined") {
            return false;
          }
        }

        if (tipo == "anime") {
          if (dato.season != seasonElegida && seasonElegida != "any") {
            return false;
          }
        }

        if (misFiltros.length > 0) {
          for (var posicion = 0; posicion < misFiltros.length; posicion++) {
            if (misFiltros[posicion]["actual"] != "") {
              for (const nombreCampo in dato) {
                if (nombreCampo == misFiltros[posicion]["nombre"]) {
                  if (dato[nombreCampo] != misFiltros[posicion]["actual"]) {
                    return false;
                  }
                }
              }
            }
          }
        }

        if (dato["title"].includes(valor)) {
          return true;
        }
      });

      this.ordenar();
    },

    ordenar() {
      var campo = this.ordenacion.split(" ")[0];
      var orden = this.ordenacion.split(" ")[1];

      this.datosOrdenados = this.datosOrdenados.sort(function (a, b) {
        var x = a[campo];
        var y = b[campo];

        if (campo == "title") {
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

    handleScroll() {
      window.scrollY > 300 ? (this.mostrarBoton = true) : (this.mostrarBoton = false);
    },

    toTop() {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    },
  },
};
</script>

<style scoped>
.titulos {
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2; /* number of lines to show */
  -webkit-box-orient: vertical;
}

abbr[title] {
  border-bottom: none !important;
  cursor: inherit !important;
  text-decoration: none !important;
}

::-webkit-scrollbar {
  width: 20px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
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

<template>
  <div
    class="p-6 flex flex-col justify-start items-start rounded-lg"
    :class="'bg-' + color.color + '-100'"
  >
    <div
      class="grid grid-cols-2 xs:grid-cols-4 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-10 xl:grid-cols-11 2xl:grid-cols-12 pb-6 gap-y-5 sticky z-10 top-0"
    >
      <jet-input
        type="text"
        class="max-w-xs mr-6 col-span-2"
        placeholder="Buscar.."
        v-model="filtrado"
        @keyup="filtrar"
      />
      <select
        v-model="paginas"
        class="rounded-md col-span-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mr-6"
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
        <option value="score -">Score (Asc)</option>
        <option value="score -">Score (Desc)</option>
        <option value="startDate +">Start Date (Asc)</option>
        <option value="startDate +">Start Date (Desc)</option>
        <option value="startDate -">Start Date</option>
        <option value="title +">Title (a-z)</option>
        <option value="title -">Title (z-a)</option>
        <option value="users +">Most members</option>
      </select>

      <template v-if="tipo == 'anime'">
        <select
          v-model="season"
          class="col-span-2 rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mr-6"
        >
          <option value="">Select Season</option>
          <option value="winter">Winter</option>
          <option value="spring">Spring (Desc)</option>
          <option value="summer">Summer</option>
          <option value="fall">Fall</option>
        </select>

        <jet-input type="number" min="1926" class="mt-1 block w-full" v-model="year" />
      </template>
    </div>

    <div
      class="w-full overflow-x-auto overflow-y-auto grid grid-cols-4 doble:grid-cols-8 triple:grid-cols-12 my-3 justify-items-center"
      v-show="datosOrdenados.length > 0"
    >
      <template
        v-for="(dato, indice) in datosOrdenados.slice(primero - 1, ultimo)"
        :key="indice"
      >
        <div class="rounded-lg mx-4 my-5 flex grid-span-4 flex-col items-center">
          <div class="h-10 p-2 text-sm font-semibold text-center">
            <a :href="route('AnimeProfile', dato['id'])" v-if="tipo == 'anime'">
              {{ dato["title"] }}</a
            >
            <a :href="route('MangaProfile', dato['id'])" v-if="tipo == 'manga'">
              {{ dato["title"] }}</a
            >
          </div>
          <div class="h-5 p-2 text-xs flex flex-row items-center justify-items-center">
            <span>{{ dato["subType"] }}</span>
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

            <div>
              <div v-if="dato['yourStatus'] == null">
                <img src="/img/eye.svg" class="w-6 h-auto" alt="añadir" />
              </div>
              <div
                v-else-if="dato['yourStatus'] == 'Completed'"
                class="bg-green-300 w-6 h-auto"
              >
                CMP
              </div>
              <div
                v-else-if="dato['yourStatus'] == 'Dropped'"
                class="bg-red-300 w-6 h-auto"
              >
                DRP
              </div>
              <div
                v-else-if="dato['yourStatus'] == 'Current'"
                class="bg-blue-300 w-6 h-auto"
              >
                CUR
              </div>
              <div
                v-else-if="dato['yourStatus'] == 'Plan'"
                class="bg-gray-300 w-6 h-auto"
              >
                PLN
              </div>
              <div
                v-else-if="dato['yourStatus'] == 'Hold'"
                class="bg-yellow-300 w-6 h-auto"
              >
                HLD
              </div>
            </div>
          </div>

          <div class="h-5 p-2 text-xs flex flex-row items-center justify-items-center">
            <div>
              <div v-if="dato['startDate'] != null">
                <span>{{ dato["startDate"] }}</span>
              </div>
              <div v-else>
                <span>???</span>
              </div>
            </div>

            <div>
              <div v-if="dato['score'] > 0">
                <span>{{ dato["score"] }} </span>
              </div>
              <div v-else>
                <span> N/A</span>
              </div>
              <img src="/img/star.svg" alt="Star" class="h-5 w-auto" />
            </div>

            <div>
              <img src="/img/userIcon.svg" alt="Star" class="h-5 w-auto" />
              <span>{{ dato["users"] }} </span>
            </div>
          </div>

          <div class="flex flex-row">
            <div>
              <a :href="dato['cover']" target="_blank" v-if="dato['cover'] != null">
                <img :src="valorProp" alt="image" class="rounded-lg" />
              </a>

              <img v-else src="/img/no_foto.jpg" alt="image" class="rounded-lg" />
            </div>
            <div class="overflow-y-auto">{{ dato["synopsis"] }}</div>
          </div>
        </div>
      </template>
    </div>

    <div
      class="grid grid-cols-6 mt-6 justify-start sticky bottom-0"
      v-show="datosOrdenados.length > 0"
    >
      <span class="col-span-6 sm:col-span-3 mt-1 text-gray-500" style="min-width: 270px"
        >Showing results {{ primero }} to {{ ultimo }} of
        {{ datosOrdenados.length }}
      </span>

      <div class="col-span-4 sm:col-span-2 mt-1 sm:mt-0">
        <jet-button
          style="min-width: 110px"
          class="ml-2 disabled:opacity-40"
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

      <div class="col-span-2 sm:col-span-1 mt-1 sm:mt-0">
        <jet-button
          style="min-width: 70px"
          class="ml-2 disabled:opacity-40"
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

    <div v-show="datosOrdenados.length == 0" class="self-center mt-5 my-8">
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
      ordenacion: "id",
      filtrado: "",
      paginacion: 0,
      datosOrdenados: [],
      año: 0,
      season: "",
    };
  },

  props: {
    datos: {},
    cantidadPaginas: [],
    columnas: [],
    filtros: [],
    color: {},
    tipo: "",
    año: 0,
    season: "",
  },

  emits: {},

  created() {
    this.datosOrdenados = this.datos;
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
  },

  methods: {
    filtrar() {
      this.paginacion = 0;
      var valor = this.filtrado;
      var misFiltros = this.filtros;

      this.datosOrdenados = this.datos.filter(function (dato) {
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

      this.ordenar(this.sorteado, 0);
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
  },
};
</script>

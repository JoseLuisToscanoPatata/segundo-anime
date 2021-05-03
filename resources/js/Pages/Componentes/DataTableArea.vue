<template>
  <div
    class="p-6 flex flex-col justify-start items-start rounded-lg"
    :class="'bg-' + color + '-100'"
  >
    <div
      class="grid grid-cols-2 xs:grid-cols-4 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-10 xl:grid-cols-11 2xl:grid-cols-12 pb-6 gap-y-5"
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
            v-for="opcion in filtro['opciones']"
            :value="opcion"
            :key="opcion"
            class="shadow-sm"
          >
            {{ opcion }}
          </option>
        </select>
      </template>

      <template v-for="extra in botonesExtras" :key="extra">
        <jet-button
          style="width: 140px"
          @click="$emit(extra.emit)"
          :class="extra.clases"
          class="col-span-2"
        >
          {{ extra.texto }}
        </jet-button>
      </template>
    </div>

    <div class="w-full overflow-x-auto overflow-y-auto">
      <table
        class="border-separate min-w-full divide-y divide-gray-200 my-3 rounded-lg table-fixed"
      >
        <thead>
          <tr>
            <th v-for="(campo, indice) in columnas" :key="indice" :style="campo.width">
              <div class="flex flex-row">
                <span :class="campo.color">{{ campo.titulo }}</span>

                <button
                  @click="(paginacion = 0), ordenar(campo.nombre)"
                  v-if="campo.sorteable"
                  class="focus:outline-none outline-none"
                >
                  <img
                    src="img/sort.svg"
                    alt="sortear por columna"
                    class="h-3 ml-2 w-auto"
                    :class="campo.color"
                  />
                </button>
              </div>
            </th>
          </tr>
        </thead>

        <tbody>
          <tr
            v-for="(dato, indice) in datosOrdenados.slice(primero - 1, ultimo)"
            :key="indice"
            class="mb-10"
            :class="'hover:bg-' + color + '-200'"
          >
            <template v-for="(columna, idColumna) in columnas" :key="idColumna">
              <template v-for="(valorProp, nomProp) in dato" :key="nomProp">
                <td
                  v-if="nomProp == columna.nombre"
                  :class="alinear(columna.alineacion)"
                  :style="columna.width"
                >
                  <template v-if="columna.tipo == 'imagen'">
                    <a :href="valorProp" target="_blank" v-if="valorProp != null">
                      <img :src="valorProp" alt="image" :class="imagenes" />
                    </a>

                    <img v-else src="/img/no_foto.jpg" alt="image" :class="imagenes" />
                  </template>

                  <template v-else>
                    <template v-if="nomProp == 'name'">
                      <div class="flex justify start">
                        <span class="text-gray-500">{{ valorProp }}</span>
                        <template v-if="compararRol(valorProp)">
                          <img
                            src="img/adminLogo.svg"
                            alt="icono admin"
                            class="h-5 ml-2 w-auto"
                          />
                        </template>
                        <template v-else>
                          <img
                            src="img/sapato.svg"
                            alt="icono usuario"
                            class="h-5 ml-2 w-auto"
                          />
                        </template>
                      </div>
                    </template>

                    <span v-else class="text-gray-500 break-all">{{ valorProp }}</span>
                  </template>
                </td>

                <template v-if="nomProp == 'id'">
                  <td v-if="columna.tipo == 'botones'">
                    <div class="flex justify-start">
                      <button
                        v-for="boton in botones"
                        :key="boton"
                        :alt="boton.alt"
                        @click="$emit(boton.emit, valorProp)"
                        class="mr-4 focus:outline-none outline-none"
                      >
                        <img :src="boton.icono" class="h-6 w-auto" />
                      </button>
                    </div>
                  </td>
                </template>
              </template>
            </template>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="grid grid-cols-6 mt-6 justify-start">
      <span class="col-span-6 sm:col-span-3 mt-1 text-gray-500" style="min-width: 225px"
        >Showing results {{ primero }} to {{ ultimo }} of
        {{ datosOrdenados.length }}
      </span>

      <div class="col-span-4 sm:col-span-2 mt-1 sm:mt-0">
        <jet-button
          style="min-width: 110px"
          class="ml-2 disabled:opacity-40"
          :class="
            'bg-' + color + '-400 hover:bg-' + color + '-500 active:bg-' + color + '-700'
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
            'bg-' + color + '-400 hover:bg-' + color + '-500 active:bg-' + color + '-700'
          "
          @click="paginacion = paginacion + 1"
          :disabled="ultimo >= datosOrdenados.length"
        >
          Next
        </jet-button>
      </div>
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
      paginas: 10,
      orden: "desc",
      sorteado: "id",
      filtrado: "",
      paginacion: 0,
      datosOrdenados: {},
    };
  },

  props: {
    datos: {},
    columnas: {},
    cantidadPaginas: {},
    botones: {},
    emisiones: {},
    imagenes: "",
    botonesExtras: {},
    filtros: {},
    color: "",
  },

  emits: {},

  created() {
    this.datosOrdenados = this.datos;
    this.$page.emits = this.$page.props.emisiones;
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
      var columnas = this.columnas;
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

        for (const nombreCampo in dato) {
          for (var i = 0; i < columnas.length; i++) {
            if (columnas[i].filtrable && columnas[i].nombre == nombreCampo) {
              if (dato[nombreCampo].includes(valor)) {
                return true;
              }
            }
          }
        }
      });

      this.ordenar(this.sorteado, 0);
    },

    ordenar(key, nuevo = 1) {
      if (this.sorteado == key && nuevo == 1) {
        if (this.orden == "desc") {
          this.orden = "asc";
        } else {
          this.orden = "desc";
        }
      } else if (key == this.sorteado && nuevo == 0) {
        this.orden = "asc";
      } else if (key != this.sorteado) {
        this.orden = "asc";
        this.sorteado = key;
      }

      var orden = this.orden;
      var tipoColumnas = this.columnas;

      this.datosOrdenados = this.datosOrdenados.sort(function (a, b) {
        var x = a[key];
        var y = b[key];

        tipoColumnas.forEach((columna) => {
          if (key == columna.nombre) {
            if (columna.tipo == "texto") {
              x = x.toLowerCase();
              y = y.toLowerCase();
            }
          }
        });

        if (orden == "asc") {
          return x < y ? -1 : x > y ? 1 : 0;
        } else {
          return x > y ? -1 : x < y ? 1 : 0;
        }
      });
    },

    compararRol(nombre) {
      for (let elemento = 0; elemento < this.datosOrdenados.length; elemento++) {
        if (this.datosOrdenados[elemento].name == nombre) {
          if (this.datosOrdenados[elemento].role == "admin") {
            return true;
          }
        }
      }
    },

    alinear(valor) {
      if (valor == "centrado") {
        return "text-center";
      } else if (valor == "izquierda") {
        return "text-left";
      } else if (valor == "derecha") {
        return "text-right";
      } else if (valor == "justificado") {
        return "text-justiciado";
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

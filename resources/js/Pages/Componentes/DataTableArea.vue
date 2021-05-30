<template>
  <div
    class="flex flex-col justify-start items-start rounded-lg overflow-hidden"
    :class="'bg-' + color.color + '-100'"
    style="max-height: 75vh"
  >
    <div
      class="p-6 grid grid-cols-2 xs:grid-cols-4 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-10 xl:grid-cols-11 2xl:grid-cols-12 pb-6 gap-y-5 sticky z-10 top-0 items-center"
      :class="'bg-' + color.color + '-100'"
      v-show="mostrarInputs"
    >
      <jet-input
        type="text"
        class="max-w-xs mr-6 col-span-2"
        placeholder="Buscar.."
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

      <jet-button
        :class="'text-white bg-' + color.color + '-400 hover:bg-' + color.color + '-600'"
        class="col-span-1"
        @click="mostrarInputs = false"
        style="max-width: 45px; heigth: 45px"
      >
        X
      </jet-button>

      <select
        class="col-span-2 md:hidden rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mr-6"
        @change="ordenarSmall"
        v-model="ordenacionSmall"
      >
        <option value="id" disabled>Sort</option>
        <template v-for="(columna, indice) in ordenacionesSmall" :key="indice">
          <option :value="columna.valor">{{ columna.nombre }}</option>
        </template>
      </select>
    </div>

    <div v-show="!mostrarInputs" class="p-6 pb-6 sticky z-10 top-0">
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
    </div>

    <div
      class="px-6 w-full overflow-auto hidden md:block"
      v-show="datosOrdenados.length > 0"
    >
      <table class="min-w-full divide-y divide-gray-200 my-3 rounded-lg table-fixed">
        <thead>
          <tr>
            <th
              v-for="(campo, indice) in columnas"
              :key="indice"
              :style="campo.width"
              :class="[
                'border-b border-' +
                  color.color +
                  '-200 border-solid bg-' +
                  color.color +
                  '-100',
                alinear(campo.alineacion),
              ]"
              class="z-10 top-0 sticky"
            >
              <span :class="'text-' + color.color + '-600'">{{ campo.titulo }}</span>

              <button
                @click="(paginacion = 0), ordenar(campo.nombre)"
                v-if="campo.sorteable"
                class="focus:outline-none outline-none"
              >
                <img
                  src="/img/sort.svg"
                  alt="sortear por columna"
                  class="h-3 ml-2 w-auto"
                  :class="campo.color"
                />
              </button>
            </th>
          </tr>
        </thead>

        <tbody class="overflow-y-auto">
          <tr
            v-for="(dato, indice) in datosOrdenados.slice(primero - 1, ultimo)"
            :key="indice"
            class="mb-10"
            :class="'hover:bg-' + color.color + '-200'"
          >
            <template v-for="(columna, idColumna) in columnas" :key="idColumna">
              <template v-for="(valorProp, nomProp) in dato" :key="nomProp">
                <td
                  v-if="nomProp == columna.nombre"
                  :class="alinear(columna.alineacion)"
                  :style="[columna.width, color.color]"
                >
                  <template v-if="columna.tipo == 'imagen'">
                    <a :href="valorProp" target="_blank" v-if="valorProp != null">
                      <img :src="valorProp" alt="image" :class="imagenes" />
                    </a>

                    <img v-else src="/img/no_foto.jpg" alt="image" :class="imagenes" />
                  </template>

                  <template v-else>
                    <template v-if="nomProp == columnaIcono">
                      <div class="flex justify-start">
                        <span class="text-gray-500 break-all" style="width: 80%">{{
                          valorProp
                        }}</span>

                        <template v-if="dato[nombreValorIcono] == iconos[0]['valor']">
                          <template v-if="listaPropia == 'propia'">
                            <abbr :title="iconos[0]['abbr']">
                              <button
                                @click="$emit(iconos[0]['emit'], dato.id)"
                                class="focus:outline-none outline-none"
                              >
                                <img
                                  :src="iconos[0]['icono']"
                                  :alt="iconos[0]['alt']"
                                  class="h-5 ml-2 w-auto transform active:scale-110"
                                />
                              </button>
                            </abbr>
                          </template>

                          <template v-else>
                            <abbr :title="iconos[0]['abbr']">
                              <img
                                :src="iconos[0]['icono']"
                                :alt="iconos[0]['alt']"
                                class="h-5 ml-2 w-auto transform active:scale-110"
                              />
                            </abbr>
                          </template>
                        </template>
                        <template v-else>
                          <template v-if="listaPropia == 'propia'">
                            <abbr :title="iconos[1]['abbr']">
                              <button
                                @click="$emit(iconos[1]['emit'], dato.id)"
                                class="focus:outline-none outline-none"
                              >
                                <img
                                  :src="iconos[1]['icono']"
                                  :alt="iconos[1]['alt']"
                                  class="h-5 ml-2 w-auto transform active:scale-110"
                                />
                              </button>
                            </abbr>
                          </template>
                        </template>
                      </div>
                    </template>

                    <span v-else class="text-gray-500 break-all">{{ valorProp }}</span>
                  </template>
                </td>
              </template>
            </template>

            <td :style="color.color">
              <div class="flex justify-evenly">
                <template v-for="boton in botones" :key="boton">
                  <template v-if="!boton.ocultar || listaPropia == 'propia'">
                    <abbr :title="boton.abbr">
                      <button
                        :alt="boton.alt"
                        @click="$emit(boton.emit, dato.id)"
                        class="mr-4 focus:outline-none outline-none"
                      >
                        <img
                          :src="boton.icono"
                          class="h-6 w-auto transform active:scale-110"
                        />
                      </button>
                    </abbr>
                  </template>
                </template>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div
      class="pr-3 pl-1 py-1 w-full overflow-y-auto md:hidden flex flex-col justify-start items-center"
      v-show="datosOrdenados.length > 0"
    >
      <div
        v-for="(dato, indice) in datosOrdenados.slice(primero - 1, ultimo)"
        :key="indice"
        class="w-full flex flex-row justify-between items-center flex-shrink-0 py-2"
        :class="'border-b-2 border-' + color.color + '-400'"
      >
        <div class="flex flex-row justify-start items-center">
          <div
            v-if="camposSmall.color != null"
            class="w-3 h-20 flex-shrink-0"
            :style="coloresSmall[dato[camposSmall.color]]"
          ></div>
          <div class="h-full px-2 mx-1 py-1 flex-shrink-0">
            <a
              :href="dato[camposSmall.imagen]"
              target="_blank"
              v-if="dato[camposSmall.imagen] != null"
            >
              <img :src="dato[camposSmall.imagen]" alt="image" :class="imagenes" />
            </a>

            <img v-else src="/img/no_foto.jpg" alt="image" :class="imagenes" />
          </div>

          <div class="flex flex-col justify-start items-start flex-shrink ml-1">
            <span
              class="leading-3 mb-2 underline break-all"
              :class="'text-' + color.color + '-500'"
              @click="$emit(botones[botones.length - 1].emit, dato.id)"
            >
              {{ dato[camposSmall.arriba] }}</span
            >
            <div
              class="flex flex-col xs2:flex-row justify-start items-center text-xs text-gray-600"
            >
              <div
                v-for="(campo, indiceCampo) in camposSmall.abajoNum"
                :key="indiceCampo"
                class="flex flex-row xs2:mr-6 items-center h-6 w-full"
              >
                <template v-if="dato[campo] != null">
                  <img src="/img/star.svg" alt="Star" class="h-5 mr-2 w-auto" />
                  <span>{{ dato[campo] }}</span>
                </template>
              </div>

              <template
                v-for="(campo, indiceCampo) in camposSmall.abajoOtros"
                :key="indiceCampo"
              >
                <div
                  class="ml-6 h-6 flex flex-row items-center justify-start w-full xs2:mr-3"
                >
                  <span>{{ dato[campo.name] }}</span>
                  <span v-if="campo.letras != null" class="ml-2">{{ campo.letras }}</span>
                </div>
              </template>
            </div>
          </div>
        </div>
        <div class="flex flex-col xs2:flex-row flex-shrink-0">
          <div class="mx-4" v-if="columnaIcono != 'nada'">
            <template v-if="dato[nombreValorIcono] == iconos[0]['valor']">
              <template v-if="listaPropia == 'propia'">
                <abbr :title="iconos[0]['abbr']">
                  <button
                    @click="$emit(iconos[0]['emit'], dato.id)"
                    class="focus:outline-none outline-none"
                  >
                    <img
                      :src="iconos[0]['icono']"
                      :alt="iconos[0]['alt']"
                      class="h-5 ml-2 w-auto transform active:scale-110"
                    />
                  </button>
                </abbr>
              </template>

              <template v-else>
                <abbr :title="iconos[0]['abbr']">
                  <img
                    :src="iconos[0]['icono']"
                    :alt="iconos[0]['alt']"
                    class="h-5 ml-2 w-auto transform active:scale-110"
                  />
                </abbr>
              </template>
            </template>
            <template v-else>
              <template v-if="listaPropia == 'propia'">
                <abbr :title="iconos[1]['abbr']">
                  <button
                    @click="$emit(iconos[1]['emit'], dato.id)"
                    class="focus:outline-none outline-none"
                  >
                    <img
                      :src="iconos[1]['icono']"
                      :alt="iconos[1]['alt']"
                      class="h-5 ml-2 w-auto transform active:scale-110"
                    />
                  </button>
                </abbr>
              </template>
            </template>
          </div>

          <div class="flex justify-evenly">
            <template v-for="boton in botones" :key="boton">
              <template v-if="(!boton.ocultar || listaPropia == 'propia') && boton.small">
                <abbr :title="boton.abbr">
                  <button
                    :alt="boton.alt"
                    @click="$emit(boton.emit, dato.id)"
                    class="mr-4 focus:outline-none outline-none"
                  >
                    <img
                      :src="boton.icono"
                      class="h-6 w-auto transform active:scale-110"
                    />
                  </button>
                </abbr>
              </template>
            </template>
          </div>
        </div>
      </div>
    </div>

    <div
      class="flex flex-col xs3:flex-row w-full justify-between items-center py-2 px-2"
      v-show="mostrarPagination && datosOrdenados.length > 0"
    >
      <div class="grid grid-cols-8 w-full justify-start items-center max-w-xl">
        <span class="col-span-8 sm2:col-span-4 mt-1 text-gray-500"
          >Showing results {{ primero }} to {{ ultimo }} of
          {{ datosOrdenados.length }}
        </span>

        <div class="col-span-4 sm2:col-span-2 mt-1 sm:mt-0">
          <jet-button
            class="disabled:opacity-60"
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

        <div class="col-span-4 sm2:col-span-2 mt-1 sm:mt-0">
          <jet-button
            class="disabled:opacity-60"
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
            'text-white bg-' +
            color.color +
            '-400 hover:bg-' +
            color.color +
            '-600 xs3:ml-1'
          "
          class="col-span-4"
          @click="mostrarPagination = false"
          style="max-width: 45px; heigth: 45px"
        >
          X
        </jet-button>
      </div>
    </div>

    <div v-show="datosOrdenados.length == 0 && cargado" class="self-center mt-5 my-8">
      <span class="font-extrabold text-2xl" :class="'text-' + color.color + '-400'"
        >This list is empty :(</span
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
      paginas: 10,
      orden: "desc",
      sorteado: "id",
      filtrado: "",
      paginacion: 0,
      datosOrdenados: {},
      mostrarInputs: false,
      mostrarPagination: true,
      ordenacionSmall: "id",
    };
  },

  props: {
    datos: Array,
    columnas: Array,
    cantidadPaginas: Array,
    botones: Object,
    emisiones: Array,
    imagenes: String,
    botonesExtras: Array,
    filtros: Array,
    color: Object,
    columnaIcono: { type: String, default: "nada" },
    nombreValorIcono: String,
    iconos: Array,
    listaPropia: String,
    camposSmall: Object,
    coloresSmall: Object,
    ordenacionesSmall: Array,
  },

  emits: [],

  created() {
    this.datosOrdenados = this.datos;
    this.$page.emits = this.$page.props.emisiones;
    this.cargado = true;
  },

  computed: {
    primero() {
      if (this.datosOrdenados.length == 0) {
        return 0;
      } else {
        return 1 + this.paginacion * this.paginas;
      }
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

      var signo = this.orden == "asc" ? " +" : " -";

      this.ordenacionSmall = this.sorteado + signo;

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

    ordenarSmall() {
      var campo = this.ordenacionSmall.split(" ")[0];
      var orden = this.ordenacionSmall.split(" ")[1];

      this.sorteado = campo;

      orden == "+" ? (this.orden = "asc") : (this.orden = "desc");

      this.datosOrdenados = this.datosOrdenados.sort(function (a, b) {
        var x = a[campo];
        var y = b[campo];

        if (campo == "title" || campo == "email" || campo == "name") {
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

    alinear(valor) {
      if (valor == "centrado") {
        return "text-center";
      } else if (valor == "izquierda") {
        return "text-left";
      } else if (valor == "derecha") {
        return "text-right";
      } else if (valor == "justificado") {
        return "text-justify";
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

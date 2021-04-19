<template>
  <app-layout color="#6366F1">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">ADMIN USERS LIST</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div v-if="!cargando">
            <input type="text" v-model="filtrado" @change="filtrar()" />
            <input type="text" v-model="paginacion" />

            <table
              class="border-collapse table-fixed min-w-full divide-y divide-gray-200 my-3 rounded-lg"
            >
              <thead>
                <tr>
                  <template v-for="(campo, indice) in campos" :key="indice">
                    <th v-if="mostrar(indice)">
                      <div class="flex flex-row">
                        <span>{{ indice }}</span>
                        <button @click="ordenar(indice)">
                          <img src="img/sort.svg" alt="" class="h-4 w-auto" />
                        </button>
                      </div>
                    </th>
                  </template>
                </tr>
              </thead>
              <tbody>
                <template
                  v-for="(dato, indice) in ordenados.slice(primero - 1, ultimo - 1)"
                  :key="indice"
                >
                  <tr>
                    <template v-for="(campo, campoActual) in dato" :key="campoActual">
                      <td v-if="mostrar(campoActual)">{{ campo }}</td>
                    </template>
                  </tr>
                </template>
              </tbody>
            </table>

            <span>Showing results {{ primero }} to {{ ultimo }} </span>
          </div>

          <div v-else>
            <span>Cargando...</span>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },

  props: ["clave"],

  data() {
    return {
      datos: {},
      campos: {},
      orden: "desc",
      sorteado: "id",
      ordenados: {},
      filtrado: "",
      cargando: true,
      paginacion: 0,
    };
  },

  created() {
    this.obtenerDatos();
  },

  computed: {
    primero() {
      return 1 + this.paginacion * 10;
    },

    ultimo() {
      if (10 + paginacion * 10 > this.datos.length) {
        return this.datos.length;
      } else {
        return 10 + paginacion * 10;
      }
    },
  },

  methods: {
    mostrar(campo) {
      if (
        campo == "email_verified_at" ||
        campo == "profile_photo_path" ||
        campo == "profile_photo_url" ||
        campo == "updated_at"
      ) {
        return false;
      } else {
        return true;
      }
    },

    filtrar() {
      var valor = this.filtrado;

      this.ordenados = this.datos.filter(function (dato) {
        if (dato.name.includes(valor) || dato.email.includes(valor)) {
          return true;
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
      } else if (key != this.sorteado) {
        this.sorteado = key;
        this.orden = "asc";
      }

      var orden = this.orden;

      this.ordenados = this.ordenados.sort(function (a, b) {
        var x = a[key];
        var y = b[key];

        if (key == "name" || key == "email") {
          x = x.toLowerCase();
          y = y.toLowerCase();
        }

        if (orden == "asc") {
          return x < y ? -1 : x > y ? 1 : 0;
        } else {
          return x > y ? -1 : x < y ? 1 : 0;
        }
      });
    },

    obtenerDatos() {
      axios
        .get(route("users.index"), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.datos = res.data.data;
          this.ordenados = this.datos;
          this.campos = res.data.data[0];
          this.cargando = false;
          this.ordenar(this.sorteado);
        });
    },
  },
};
</script>

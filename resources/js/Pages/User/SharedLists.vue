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
        class="flex flex-col xs3:flex-row p-6 bg-lime-100 rounded-lg justify-start items-start"
      ></div>
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

      animesIguales: [],
      animesSoloYo: [],
      animesSoloEl: [],

      mangasIguales: [],
      mangasSoloYo: [],
      mangasSoloEl: [],

      datosInfo: {
        mostrar: false,
        style: "",
        mensaje: "",
        color: "",
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

  computed: {
    desactivarInputs() {
      if (this.datosComparado == []) {
        this.lista = "nada";
        this.existencia = "nada";
        return true;
      } else {
        return false;
      }
    },

    listaElegida() {
      if (this.mostrar != "vacio" && this.mostrar != "cargando") {
        if (this.existencia == "nada" || this.lista == "nada") {
          this.mostrar = "nada";
        } else {
          this.mostrar = "mostrarLista";
        }
      }
    },
  },

  methods: {
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
          this.mostrar = "vacio";
        }
      } else {
        this.mostrar = "vacio";
      }

      this.usuarios = this.sortear(this.usuarios, "nombre");
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

      var busqueda = this.usuarios.find((usuario) => usuario.nombre == this.comparado);

      if (busqueda != undefined) {
        this.datosComparado = busqueda;
        this.obtenerListas();
      } else {
        this.datosInfo["color"] = "red";
        this.datosInfo["style"] = "danger";
        this.datosInfo["mensaje"] = "There is no user with that name :(";
        this.datosInfo["mostrar"] = true;
        this.comparado = "";
        this.mostrar = "vacio";
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
            } else {
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

            grande == this.misAnimes
              ? this.mangasSoloYo.push(nuevo)
              : this.mangasSoloEl.push(nuevo);
          }
        }
      }

      this.mostrar = "nada";
    },

    sortear(datos, campo) {
      datos = datos.sort(function (a, b) {
        var x = a[campo];
        var y = b[campo];

        return x < y ? -1 : x > y ? 1 : 0;
      });

      return datos;
    },

    cambiarLista() {},
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

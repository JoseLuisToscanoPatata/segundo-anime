<template>
  <app-layout color="#d61dc9;">
    <template #header>
      <h2 class="text-xl text-gray-800 leading-tight">BIG CHUNGUS</h2>
    </template>

    <div class="max-w-7xl mx-3 sm:mx-auto sm:px-6 lg:px-8 py-12 overflow-hidden">
      <div
        class="p-6 bg-fuchsia-200 overflow-hidden shadow-xl rounded-lg grid grid-cols-12"
      >
        <template v-if="!cargando">
          <div
            class="col-span-12 dashboard:col-span-9 flex flex-col mr-5 overflow-hidden"
          >
            <div class="flex flex-col">
              <span class="text-gray-500 text-lg mb-3 border-b-2 border-gray-500"
                >Current season Animes</span
              >
              <div class="flex flex-row overflow-hidden overflow-x-auto Flipped">
                <div
                  class="flex flex-col mr-3 entrada pt-2"
                  v-for="actual in animesActuales"
                  :key="actual"
                >
                  <a :href="route('AnimeProfile', actual['id'])">
                    <img
                      v-if="actual['cover'] != null"
                      alt="Cover del anime"
                      :src="actual['cover']"
                      class="h-52 w-40 max-w-none rounded-t-md"
                    />
                    <img
                      v-else
                      src="img/no_foto.jpg"
                      class="h-52 w-40 max-w-none rounded-t-md"
                      alt="Sin cover"
                    />
                  </a>
                  <span class="text-gray-400 text-xs bg-white rounded-b-md p-2 h-16">{{
                    actual["title"]
                  }}</span>
                </div>
              </div>
            </div>
            <div class="flex flex-col mt-3">
              <span class="text-gray-500 text-lg mb-3 border-b-2 border-gray-500"
                >Recommended animes</span
              >
              <div class="flex flex-row overflow-hidden overflow-x-auto Flipped">
                <div
                  class="flex flex-col mr-3 entrada pt-2"
                  v-for="actual in randomAnimes"
                  :key="actual"
                >
                  <a :href="route('AnimeProfile', actual['id'])">
                    <img
                      v-if="actual['cover'] != null"
                      alt="Cover del anime"
                      :src="actual['cover']"
                      class="h-52 w-40 max-w-none rounded-t-md"
                    />
                    <img
                      v-else
                      src="img/no_foto.jpg"
                      class="h-52 w-40 max-w-none rounded-t-md"
                      alt="Sin cover"
                    />
                  </a>
                  <span class="text-gray-400 text-xs bg-white rounded-b-md p-2 h-16">{{
                    actual["title"]
                  }}</span>
                </div>
              </div>
            </div>
            <div class="flex flex-col mt-3">
              <span class="text-gray-500 text-lg mb-3 border-b-2 border-gray-500"
                >Recommended Mangas</span
              >
              <div class="flex flex-row overflow-hidden overflow-x-auto Flipped">
                <div
                  class="flex flex-col mr-3 entrada pt-2"
                  v-for="actual in randomMangas"
                  :key="actual"
                >
                  <a :href="route('MangaProfile', actual['id'])">
                    <img
                      v-if="actual['cover'] != null"
                      alt="Cover del anime"
                      :src="actual['cover']"
                      class="h-52 w-40 max-w-none rounded-t-md"
                    />
                    <img
                      v-else
                      src="img/no_foto.jpg"
                      class="h-52 w-40 max-w-none rounded-t-md"
                      alt="Sin cover"
                    />
                  </a>
                  <span class="text-gray-400 text-xs bg-white rounded-b-md p-2 h-16">{{
                    actual["title"]
                  }}</span>
                </div>
              </div>
            </div>
            <div class="flex flex-col mt-3">
              <span class="text-gray-500 text-lg mb-3 border-b-2 border-gray-500"
                >Most famous Trailers</span
              >
              <div class="flex flex-row overflow-x-auto overflow-hidden">
                <template v-for="actual in trailers" :key="actual">
                  <iframe
                    :src="actual"
                    width="320"
                    height="180"
                    title="Trailer"
                    frameborder="0"
                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                    class="m-2"
                  />
                </template>
              </div>
            </div>
          </div>
          <div class="col-span-12 dashboard:col-span-3 flex flex-col">
            <div class="flex flex-col">
              <span class="text-gray-500 text-lg mb-3 border-b-2 border-gray-500"
                >Best Animes</span
              >
              <div
                class="flex flex-row dashboard:flex-col overflow-hidden mb-2 overflow-x-auto dashboard:overflow-x-hidden"
              >
                <div
                  class="flex flex-row mr-3 pt-2 mb-1 pb-2"
                  v-for="actual in mejoresAnimes"
                  :key="actual"
                >
                  <a :href="route('AnimeProfile', actual['id'])">
                    <img
                      v-if="actual['cover'] != null"
                      alt="Cover del anime"
                      :src="actual['cover']"
                      class="h-44 w-32 max-w-none rounded-l-md"
                    />
                    <img
                      v-else
                      src="img/no_foto.jpg"
                      class="h-44 w-32 max-w-none rounded-l-md"
                      alt="Sin cover"
                    />
                  </a>
                  <div class="flex flex-col text-md bg-white rounded-r-md p-2 w-32 h-44">
                    <span class="text-gray-400 h-24">{{ actual["title"] }}</span>
                    <div class="flex flex-row">
                      <img src="img/star.svg" alt="Rating" class="h-4 w-4" />
                      <span class="text-md text-yellow-400 h-20">{{
                        actual["rating"]
                      }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex flex-col">
              <span class="text-gray-500 text-lg mb-3 border-b-2 border-gray-500"
                >Best Mangas</span
              >
              <div
                class="flex flex-row dashboard:flex-col overflow-hidden mb-2 overflow-x-auto dashboard:overflow-x-hidden"
              >
                <div
                  class="flex flex-row mr-3 pt-2 mb-1 pb-2"
                  v-for="actual in mejoresMangas"
                  :key="actual"
                >
                  <a :href="route('MangaProfile', actual['id'])">
                    <img
                      v-if="actual['cover'] != null"
                      alt="Cover del manga"
                      :src="actual['cover']"
                      class="h-44 w-32 max-w-none rounded-l-md"
                    />
                    <img
                      v-else
                      src="img/no_foto.jpg"
                      class="h-44 w-32 max-w-none rounded-l-md"
                      alt="Sin cover"
                    />
                  </a>
                  <div class="flex flex-col text-md bg-white rounded-r-md p-2 w-32 h-44">
                    <span class="text-gray-400 h-24">{{ actual["title"] }}</span>
                    <div class="flex flex-row">
                      <img src="img/star.svg" alt="Rating" class="h-4 w-4" />
                      <span class="text-md text-yellow-400 h-20">{{
                        actual["rating"]
                      }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </template>
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

  props: ["clave", "usuario"],

  data() {
    return {
      animes: [],
      mangas: [],
      randomAnimes: [],
      randomMangas: [],
      mejoresAnimes: [],
      mejoresMangas: [],
      trailers: [],
      animesActuales: [],
      cargando: true,
    };
  },
  methods: {
    prepararDatos() {
      axios
        .get(route("animes.index"), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.animes = res.data.data;

          var encontrados = 0;

          this.animes = this.animes.sort(function (a, b) {
            var x = a["userCount"];
            var y = b["userCount"];

            return x > y ? -1 : x < y ? 1 : 0;
          });

          for (let posicion = 0; encontrados < 5; posicion++) {
            if (this.animes[posicion]["trailer"] != null) {
              this.trailers.push(this.animes[posicion]["trailer"]);
              encontrados++;
            }
          }

          this.animes = this.animes.sort(function (a, b) {
            var x = a["rating"];
            var y = b["rating"];

            return x > y ? -1 : x < y ? 1 : 0;
          });

          for (let posicion = 0; posicion < 3; posicion++) {
            this.mejoresAnimes[posicion] = this.animes[posicion];
          }

          for (let posicion = 0; posicion < 20; posicion++) {
            this.randomAnimes[posicion] = this.animes[
              Math.floor(Math.random() * (this.animes.length - 1))
            ];
          }

          var fecha = new Date();
          var mes = fecha.getMonth();

          if (mes < 4) {
            mes = "01-02-03";
          } else if (mes < 7) {
            mes = "04-05-06";
          } else if (mes < 10) {
            mes = "07-08-09";
          } else {
            mes = "10-11-12";
          }

          var año = fecha.getFullYear().toString();
          var startDate = "";

          for (let posicion = 0; posicion < this.animes.length; posicion++) {
            startDate = this.animes[posicion]["startDate"];

            if (startDate != null) {
              if (
                mes.includes(startDate.split("-")[1]) &&
                año.includes(startDate.split("-")[0])
              ) {
                this.animesActuales.push(this.animes[posicion]);
              }
            }
          }

          this.animesActuales = this.animesActuales.sort(function (a, b) {
            var x = a["startDate"];
            var y = b["startDate"];

            return x < y ? -1 : x > y ? 1 : 0;
          });
        });

      axios
        .get(route("mangas.index"), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.mangas = res.data.data;

          this.mangas = this.mangas.sort(function (a, b) {
            var x = a["rating"];
            var y = b["rating"];

            return x > y ? -1 : x < y ? 1 : 0;
          });

          for (let posicion = 0; posicion < 3; posicion++) {
            this.mejoresMangas[posicion] = this.mangas[posicion];
          }

          for (let posicion = 0; posicion < 20; posicion++) {
            this.randomMangas[posicion] = this.mangas[
              Math.floor(Math.random() * (this.mangas.length - 1))
            ];
          }
        });
    },
  },

  created() {
    this.prepararDatos();
    this.cargando = false;
  },
};
</script>

<style scoped>
.Flipped,
.entrada {
  transform: rotateX(180deg);
  -ms-transform: rotateX(180deg); /* IE 9 */
  -webkit-transform: rotateX(180deg); /* Safari and Chrome */
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
  background: #d61dc9;
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #a7189d;
}

::-webkit-scrollbar-track-piece {
  background: white;
  border-radius: 10px;
}
</style>

<template>
  <app-layout color="#A3E635">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ perfilUsu.name }} Profile
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
        class="flex flex-col xs3:flex-row p-6 bg-lime-100 rounded-lg justify-start items-start"
        v-if="mostrar == 'si'"
      >
        <jet-dialog-modal :show="creandoMensaje" @close="creandoMensaje = false">
          <template #title>
            <span class="text-lime-600 font-bold"
              >Send Message to {{ perfilUsu.name }}
            </span>
          </template>

          <template #content>
            <form @submit.prevent="enviarMensaje">
              <textarea
                id="mensaje"
                class="mt-1 block w-full border-lime-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                style="resize: none"
                rows="5"
                v-model="mensaje"
              />
              <jet-input-error :message="errorMensaje" class="mt-2" />
            </form>
          </template>

          <template #footer>
            <jet-secondary-button
              type="button"
              @click.prevent="creandoMensaje = false"
              class="mr-2"
            >
              Cancel
            </jet-secondary-button>

            <jet-secondary-button
              class="mt-2 ml-2 text-white bg-lime-700 hover:bg-lime-800"
              type="button"
              @click.prevent="enviarMensaje"
            >
              Send
            </jet-secondary-button>
          </template>
        </jet-dialog-modal>

        <jet-dialog-modal :show="borrandoAmigo" @close="borrandoAmigo = false">
          <template #title> Remove Friend </template>

          <template #content>
            Are you sure you want to remove this user from your friend list? :(
          </template>

          <template #footer>
            <jet-secondary-button @click="borrandoAmigo = false" class="ml-2">
              Cancel
            </jet-secondary-button>

            <jet-danger-button class="ml-2" @click="borrarAmigo">
              Remove
            </jet-danger-button>
          </template>
        </jet-dialog-modal>

        <div class="flex flex-col items-center mb-4 xs3:mb-0 min-w-full xs3:min-w-min">
          <a
            :href="perfilUsu.profilePhoto"
            v-if="perfilUsu.profilePhoto != null"
            target="blank"
          >
            <img
              :src="perfilUsu.profilePhoto"
              alt="Cover"
              class="h-auto w-48 rounded-lg mb-5"
          /></a>

          <img
            src="/img/no_foto.jpg"
            alt="No foto"
            class="h-60 w-48 rounded-lg md:h-72 md:w-48 mb-5"
            v-else
          />

          <div
            class="flex flex row justify-evenly items-center w-full mb-2 pb-3 border-b-2 border-lime-500"
            v-if="perfil != usuario.id"
          >
            <div :class="estilosBotones" @click="pulsadoMensaje">
              <img src="/img/sendMessage.svg" class="w-auto h-7" alt="send message" />
              <span class="text-lime-600 text-sm">Message</span>
            </div>

            <div
              :class="estilosBotones"
              v-if="solicitudAmistad == 'recibidaYo'"
              @click="cambiarAmigo"
            >
              <img src="/img/addFriend.svg" class="w-auto h-7" alt="Accept friend" />
              <span class="text-lime-600 text-sm">Accept</span>
            </div>

            <div
              :class="estilosBotones"
              v-if="solicitudAmistad == 'amigos'"
              @click="cambiarAmigo"
            >
              <img src="/img/remove-friend.svg" class="w-auto h-7" alt="Remove friend" />
              <span class="text-lime-600 text-sm">Remove</span>
            </div>

            <div
              :class="estilosBotones"
              v-if="solicitudAmistad == null"
              @click="cambiarAmigo"
            >
              <img src="/img/addFriend.svg" class="w-auto h-7" alt="Invite user" />
              <span class="text-lime-600 text-sm">Invite</span>
            </div>

            <div
              :class="estiloBotonInvitado"
              v-if="solicitudAmistad == 'enviadaYo'"
              @click="cambiarAmigo"
            >
              <img src="/img/addFriend.svg" class="w-auto h-7" alt="Invited user" />
              <span class="text-lime-600 text-sm">Invited</span>
            </div>
          </div>

          <div class="flex flex-col justify-evenly w-44 xs3:w-full">
            <div class="flex flex-row justify-between items-center w-full text-gray-600">
              <span class="font-semibold">Last Online</span>
              <span
                v-if="perfilUsu.last_online == 'now'"
                class="font-semibold text-lime-500"
                >{{ perfilUsu.last_online }}</span
              >
              <span v-else>{{ perfilUsu.last_online }}</span>
            </div>

            <div class="flex flex-row justify-between items-cente w-full text-gray-600">
              <span class="font-semibold">Gender</span>
              <span>{{ perfilUsu.gender }}</span>
            </div>

            <div class="flex flex-row justify-between items-center w-full text-gray-600">
              <span class="font-semibold">Joined</span>
              <span class="">{{ perfilUsu.joined }}</span>
            </div>
          </div>

          <div
            class="flex flex row justify-evenly items-center mt-2 pt-2 border-t-2 border-lime-500 w-full"
          >
            <jet-button
              class="text-white bg-purple-500 hover:bg-purple-600 text-white mr-2"
              @click="listaAnime"
            >
              Anime List
            </jet-button>

            <jet-button
              class="text-white bg-yellow-500 hover:bg-yellow-600 text-white"
              @click="listaManga"
            >
              Manga List
            </jet-button>
          </div>

          <div
            class="flex flex-col justify-evenly items-start w-full text-sm"
            v-if="perfil != usuario.id"
          >
            <span
              class="font-bold text-lg w-full border-lime-500 text-lime-500 border-b-2 my-4"
              >Affinity to you</span
            >

            <div class="flex flex-row justify-between items-center w-full text-gray-500">
              <span>Anime: {{ afinidadAnimes100 }} % </span>
              <span
                class="text-purple-400 text-xs cursor-pointer hover:underline"
                v-if="afinidadAnimes > 0"
                ><a
                  :href="
                    route('SharedLists', {
                      usu2: perfil,
                      tipo: 'anime',
                      ambos: true,
                    })
                  "
                  >({{ afinidadAnimes }} shared)</a
                >
              </span>
              <span class="text-purple-400 text-xs" v-else
                >({{ afinidadAnimes }} shared)
              </span>
            </div>

            <div class="flex flex-row justify-between items-center w-full text-gray-500">
              <span>Manga: {{ afinidadMangas100 }} % </span>
              <span
                class="text-yellow-400 text-xs cursor-pointer hover:underline"
                v-if="afinidadMangas > 0"
                ><a
                  :href="
                    route('SharedLists', {
                      usu2: perfil,
                      tipo: 'manga',
                      ambos: true,
                    })
                  "
                  >({{ afinidadMangas }} shared)</a
                >
              </span>
              <span class="text-yellow-400 text-xs" v-else
                >({{ afinidadMangas }} shared)
              </span>
            </div>
          </div>

          <div class="flex flex-col justify-evenly items-start w-full">
            <div
              class="flex flex-row text-lime-500 justify-between border-lime-500 w-full border-b-2 my-4"
            >
              <span class="font-bold text-lg">Friends</span>
              <span
                v-if="amigos.length > 0"
                class="font-semibold cursor-pointer hover:underline"
                >See all ({{ amigos.length }})
              </span>
            </div>

            <div class="flex flex-row" v-if="amigos.length > 0">
              <div v-for="(amigo, indice) in amigos" :key="indice">
                <template v-if="indice < 5">
                  <abbr :title="amigo.name">
                    <a :href="route('UserShow', amigo.amigo_id)">
                      <img
                        v-if="amigo.image == null"
                        src="/img/no_foto.jpg"
                        alt="User with no image"
                        class="w-16 h-20 mr-1"
                      />
                      <img
                        v-else
                        :src="amigo.image"
                        alt="User image"
                        class="w-16 h-20 mr-1"
                      />
                    </a>
                  </abbr>
                </template>
              </div>
            </div>
            <span v-else class="text-gray-500">This user has no friends :(</span>
          </div>
        </div>

        <div class="flex flex-col justfy-start items-start w-full max-w-full xs3:ml-5">
          <span
            class="font-bold text-lg border-b-2 text-lime-500 border-lime-500 mb-2 w-full xs3:w-max"
            >{{ perfilUsu.name }} Bio</span
          >

          <div class="max-h-32 xs3:max-h-20 overflox-y-auto mb-3 text-gray-500">
            {{ perfilUsu.biography }}
          </div>

          <span
            class="border-b-2 border-lime-500 text-lime-500 font-bold text-lg mb-2 w-full"
          >
            Stadistics</span
          >

          <div class="w-full flex flex-col xs:flex-row" v-if="userAnimes.length > 0">
            <div
              class="flex flex-col text-purple-400 items-center xs3:items-start justify-evenly w-full xs:w-32 sm:w-40 md2:w-72 flex-shrink-0"
            >
              <span
                class="border-b-2 border-purple-400 font-semibold mb-2 w-full text-center xs3:text-left"
              >
                Anime stats</span
              >

              <div class="flex flex-col md2:flex-row items-center justify-start w-full">
                <donnut
                  :chartData="animeChart.chartData"
                  :chartOptions="animeChart.chartOptions"
                  :width="125"
                  :height="125"
                />

                <div
                  class="flex flex-col justify-evenly items-start ml-0 md2:ml-4 mt-3 md2:mt-0 text-sm w-40 xs:w-full"
                >
                  <div class="flex flex-row justify-between w-full">
                    <span>Total entries</span>
                    <span>{{ perfilUsu.totalAnimes }}</span>
                  </div>

                  <div class="flex flex-row justify-between w-full">
                    <span>Episodes</span>
                    <span>{{ perfilUsu.episodes }}</span>
                  </div>

                  <div class="flex flex-row justify-between w-full">
                    <span>Mean Score</span>
                    <span>{{ perfilUsu.animeMeanScore }}</span>
                  </div>
                </div>
              </div>
            </div>

            <div
              class="flex flex-col text-purple-400 items-center xs3:justify-start justify-evenly flex-shrink mt-3 xs:mt-0 w-full"
            >
              <span
                class="border-b-2 border-purple-400 font-semibold mb-2 w-full xs3:pl-3 text-center xs3:text-left"
              >
                Last updates</span
              >

              <div
                class="flex flex-row xs:flex-col sm2:flex-row items-center justify-evenly w-full h-full sm2:ml-3"
              >
                <template v-for="actual in 3" :key="actual">
                  <template v-if="userAnimes[userAnimes.length - actual]">
                    <div
                      class="p-1 rounded-md"
                      :style="
                        colorUltimo(userAnimes[userAnimes.length - actual].watchStatus)
                      "
                    >
                      <abbr :title="userAnimes[userAnimes.length - actual].title">
                        <a
                          :href="
                            route(
                              'AnimeProfile',
                              userAnimes[userAnimes.length - actual].id
                            )
                          "
                        >
                          <img
                            :src="userAnimes[userAnimes.length - actual].cover"
                            alt="Anime cover"
                            v-if="userAnimes[userAnimes.length - actual].cover != null"
                            class="w-16 h-24 xs:h-14 sm2:h-24 rounded-md"
                          />
                          <img
                            src="/img/no_foto.jpg"
                            alt="No cover"
                            v-else
                            class="w-16 h-24 xs:h-14 sm2:h-24 rounded-md"
                          />
                        </a>
                      </abbr>
                    </div>
                  </template>
                </template>
              </div>
            </div>
          </div>

          <div v-else class="w-full text-purple-400 flex flex-col items-start">
            <span
              class="border-b-2 border-purple-400 font-semibold mb-2 w-full mb-2 xs3:mb-5"
            >
              Anime stadistics</span
            >
            <span class="w-full font-semibold text-center mb-2 xs3:mb-5"
              >This user havent added any animes to his list yet :(</span
            >
          </div>
          <div class="w-full flex flex-col xs:flex-row" v-if="userMangas.length > 0">
            <div
              class="flex flex-col text-yellow-400 items-center xs3:items-start justify-evenly w-full xs:w-32 sm:w-40 md2:w-72 flex-shrink-0"
            >
              <span
                class="border-b-2 border-yellow-400 font-semibold mb-2 w-full text-center xs3:text-left"
              >
                Manga stats</span
              >

              <div class="flex flex-col md2:flex-row items-center justify-start w-full">
                <donnut
                  :chartData="mangaChart.chartData"
                  :chartOptions="mangaChart.chartOptions"
                  :width="125"
                  :height="125"
                />

                <div
                  class="flex flex-col justify-evenly items-start ml-0 md2:ml-4 mt-3 md2:mt-0 text-sm w-40 xs:w-full"
                >
                  <div class="flex flex-row justify-between w-full">
                    <span>Total entries</span>
                    <span>{{ perfilUsu.totalMangas }}</span>
                  </div>

                  <div class="flex flex-row justify-between w-full">
                    <span>chapters</span>
                    <span>{{ perfilUsu.chapters }}</span>
                  </div>

                  <div class="flex flex-row justify-between w-full">
                    <span>Mean Score</span>
                    <span>{{ perfilUsu.mangaMeanScore }}</span>
                  </div>
                </div>
              </div>
            </div>

            <div
              class="flex flex-col text-yellow-400 items-center xs3:justify-start justify-evenly flex-shrink mt-3 xs:mt-0 w-full"
            >
              <span
                class="border-b-2 border-yellow-400 font-semibold mb-2 w-full xs3:pl-3 text-center xs3:text-left"
              >
                Last updates</span
              >

              <div
                class="flex flex-row xs:flex-col sm2:flex-row items-center justify-evenly w-full h-full sm2:ml-3"
              >
                <template v-for="actual in 3" :key="actual">
                  <template v-if="userMangas[userMangas.length - actual]">
                    <div
                      class="p-1 rounded-md"
                      :style="
                        colorUltimo(userMangas[userMangas.length - actual].readStatus)
                      "
                    >
                      <abbr :title="userMangas[userMangas.length - actual].title">
                        <a
                          :href="
                            route(
                              'MangaProfile',
                              userMangas[userMangas.length - actual].id
                            )
                          "
                        >
                          <img
                            :src="userMangas[userMangas.length - actual].cover"
                            alt="Manga cover"
                            v-if="userMangas[userMangas.length - actual].cover != null"
                            class="w-16 h-24 xs:h-14 sm2:h-24 rounded-md"
                          />
                          <img
                            src="/img/no_foto.jpg"
                            alt="No cover"
                            v-else
                            class="w-16 h-24 xs:h-14 sm2:h-24 rounded-md"
                          />
                        </a>
                      </abbr>
                    </div>
                  </template>
                </template>
              </div>
            </div>
          </div>

          <div v-else class="w-full text-yellow-400 flex flex-col items-start">
            <span
              class="border-b-2 border-yellow-400 font-semibold mb-2 w-full mb-2 xs3:mb-5"
            >
              Manga stadistics</span
            >
            <span class="w-full font-semibold text-center mb-2 xs3:mb-5"
              >This user havent added any mangas to his list yet :(</span
            >
          </div>

          <span
            class="border-b-2 border-lime-500 text-lime-500 font-bold text-lg mt-3 xs3:mt-0 mb-2 w-full"
          >
            Favourites</span
          >

          <div class="grid grid-cols-6 xs3:grid-cols-12 w-full">
            <div
              class="flex flex-col col-span-6 items-center justify-evenly xs3:mr-2 max-w-full"
            >
              <span
                class="border-b-2 border-purple-400 text-purple-400 font-semibold mb-2 w-full"
              >
                Anime</span
              >
              <div class="overflow-x-auto max-w-full" v-if="favAnimesList.length > 0">
                <div class="flex flex-row justify-start w-max">
                  <div v-for="anime in favAnimesList" :key="anime.id">
                    <abbr :title="anime.title">
                      <a :href="route('AnimeProfile', anime.id)">
                        <img
                          :src="anime.cover"
                          alt="Anime cover"
                          v-if="anime.cover != null"
                          class="w-20 h-28 rounded-md"
                        />
                        <img
                          src="/img/no_foto.jpg"
                          alt="No cover"
                          v-else
                          class="w-20 h-28 rounded-md max-w"
                        />
                      </a>
                    </abbr>
                  </div>
                </div>
              </div>

              <span v-else class="text-purple-400"
                >This user has no favourites animes :(</span
              >
            </div>

            <div
              class="flex flex-col col-span-6 items-center justify-evenly xs3:ml-2 max-w-full"
            >
              <span
                class="border-b-2 border-yellow-400 text-yellow-400 mt-3 xs3:mt-0 font-semibold mb-2 w-full"
              >
                Manga</span
              >
              <div class="overflow-x-auto max-w-full" v-if="favMangasList.length > 0">
                <div class="flex flex-row justify-start w-max">
                  <div v-for="manga in favMangasList" :key="manga.id">
                    <abbr :title="manga.title">
                      <a :href="route('MangaProfile', manga.id)">
                        <img
                          :src="manga.cover"
                          alt="Manga cover"
                          v-if="manga.cover != null"
                          class="w-20 h-28 rounded-md"
                        />
                        <img
                          src="/img/no_foto.jpg"
                          alt="No cover"
                          v-else
                          class="w-20 h-28 rounded-md"
                        />
                      </a>
                    </abbr>
                  </div>
                </div>
              </div>

              <span v-else class="text-yellow-400"
                >This user has no favourites mangas :(</span
              >
            </div>
          </div>
        </div>
      </div>

      <loading v-show="mostrar == 'no'" color="lime" />
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import Loading from "../Componentes/Loading.vue";
import BannerPropio from "@/Pages/Componentes/BannerPropio";
import Donnut from "@/Pages/Componentes/Donnut";
var moment = require("moment");

export default {
  components: {
    AppLayout,
    JetDialogModal,
    JetInput,
    JetInputError,
    JetButton,
    JetSecondaryButton,
    JetDangerButton,
    Loading,
    BannerPropio,
    Donnut,
  },

  props: ["clave", "perfil", "usuario"],

  data() {
    return {
      moment: moment,

      perfilUsu: {
        name: "",
        profilePhoto: "",
        last_online: "",
        gender: "",
        biography: "",
        joined: "",

        totalAnimes: 0,
        totalMangas: 0,

        chapters: 0,
        episodes: 0,

        favouritesAnimes: 0,
        favouritesMangas: 0,

        animeMeanScore: 0,
        mangaMeanScore: 0,
      },

      mangaChart: {
        chartData: {
          labels: ["Completed", "Reading", "Plan to Read", "Dropped", "On Hold"],
          datasets: [
            {
              data: [0, 0, 0, 0, 0],
              backgroundColor: ["#26448F", "#2DB039", "#C3C3C3", "#A12F31", "#F9D457"],
            },
          ],
        },

        chartOptions: {
          legend: { display: false },
        },
      },
      animeChart: {
        chartData: {
          labels: ["Completed", "Watching", "Plan to Watch", "Dropped", "On Hold"],
          datasets: [
            {
              data: [0, 0, 0, 0, 0],
              backgroundColor: ["#26448F", "#2DB039", "#C3C3C3", "#A12F31", "#F9D457"],
            },
          ],
        },

        chartOptions: {
          legend: { display: false },
        },
      },

      estilosBotones:
        "border-lime-700 hover:bg-lime-400 bg-lime-300 border-2 rounded-md flex flex-col justify-evenly items-center cursor-pointer px-3 pb-1 pt-2 transition duration-300 ease-in-out",

      estiloBotonInvitado:
        "border-lime-700 bg-lime-300 border-2 rounded-md flex flex-col justify-evenly items-center px-3 pb-1 pt-2 opacity-60",

      amigos: [],

      favAnimesList: [],
      favMangasList: [],

      afinidadAnimes: 0,
      afinidadAnimes100: 0.0,

      afinidadMangas: 0,
      afinidadMangas100: 0.0,

      userAnimes: [],
      userMangas: [],

      myAnimes: [],
      myMangas: [],

      creandoMensaje: false,
      mensaje: null,
      errorMensaje: null,

      borrandoAmigo: false,
      solicitudAmistad: null,

      mostrar: "no",
      procesosTerminados: 0,

      datosInfo: {
        mostrar: false,
        style: "",
        mensaje: "",
        color: "",
      },
    };
  },

  created() {
    this.obtenerUsuario();
  },

  methods: {
    obtenerUsuario() {
      axios
        .get(route("users.show", { user: this.perfil }), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.perfilUsu.name = res.data.data.name;

          if (res.data.data.profile_photo_url.includes("https://picsum.photos/500/500")) {
            this.perfilUsu.profilePhoto = res.data.data.profile_photo_path;
          } else {
            this.perfilUsu.profilePhoto = res.data.data.profile_photo_url;
          }

          var fecha = res.data.data.created_at;

          var meses = [
            "Jan",
            "Feb",
            "Mar",
            "April",
            "May",
            "June",
            "July",
            "Aug",
            "Sept",
            "Oct",
            "Nov",
            "Dec",
          ];

          var mes = meses[parseInt(fecha.split("-")[1]) - 1];

          var dia = fecha.split("-")[2].split("T")[0];

          var año = fecha.split("-")[0];

          this.perfilUsu.joined = mes + " " + dia + ", " + año;

          if (res.data.data.gender != null) {
            this.perfilUsu.gender = res.data.data.gender;
          } else {
            this.perfilUsu.gender = "N/A";
          }

          if (res.data.data.biography != null) {
            this.perfilUsu.biography = res.data.data.biography;
          } else {
            this.perfilUsu.biography = "No biography written";
          }

          if (res.data.data.last_online == null) {
            this.perfilUsu.last_online = "never";
          } else if (res.data.data.last_online == "now") {
            this.perfilUsu.last_online = res.data.data.last_online;
          } else {
            this.perfilUsu.last_online = this.moment(res.data.data.last_online).fromNow();
          }

          this.obtenerAnimes();
          this.obtenerMangas();
          this.obtenerAmigos();
        })
        .catch((err) => {
          this.datosInfo["color"] = "red";
          this.datosInfo["style"] = "danger";
          this.datosInfo["mensaje"] = err.response.data.message;
          this.datosInfo["mostrar"] = true;
          this.mostrar = "error";
        });
    },

    obtenerAnimes() {
      axios
        .get(route("watches.index", this.perfil), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.perfilUsu.totalAnimes = res.data.data.length;

          var scoreTotal = 0;
          var animesScored = 0;

          for (let actual = 0; actual < res.data.data.length; actual++) {
            this.userAnimes.push({
              id: res.data.data[actual].id,
              title: res.data.data[actual].title,
              cover: res.data.data[actual].cover,
              watchStatus: res.data.data[actual].pivot.watchStatus,
              favourite: res.data.data[actual].pivot.favourite,
              score: res.data.data[actual].pivot.score,
            });

            if (res.data.data[actual].pivot.score != null) {
              scoreTotal += res.data.data[actual].pivot.score;
              animesScored++;
            }

            if (res.data.data[actual].pivot.favourite == 1) {
              this.favAnimesList.push({
                id: res.data.data[actual].id,
                cover: res.data.data[actual].cover,
                title: res.data.data[actual].title,
              });

              this.perfilUsu.favouritesAnimes++;
            }

            this.perfilUsu.episodes += res.data.data[actual].episodes;

            if (res.data.data[actual].pivot.watchStatus == "Watching") {
              this.animeChart.chartData.datasets[0].data[1]++;
            } else if (res.data.data[actual].pivot.watchStatus == "Completed") {
              this.animeChart.chartData.datasets[0].data[0]++;
            } else if (res.data.data[actual].pivot.watchStatus == "PlanToWatch") {
              this.animeChart.chartData.datasets[0].data[2]++;
            } else if (res.data.data[actual].pivot.watchStatus == "Dropped") {
              this.animeChart.chartData.datasets[0].data[3]++;
            } else if (res.data.data[actual].pivot.watchStatus == "OnHold") {
              this.animeChart.chartData.datasets[0].data[4]++;
            }
          }

          if (animesScored > 0) {
            this.perfilUsu.animeMeanScore = (scoreTotal / animesScored).toFixed(2);
          }

          if (this.perfil != this.usuario.id) {
            axios
              .get(route("watches.index", this.usuario.id), {
                headers: {
                  Authorization: "Bearer " + this.clave,
                },
              })
              .then((res) => {
                for (let actual = 0; actual < res.data.data.length; actual++) {
                  this.myAnimes.push(res.data.data[actual]);
                }

                if (this.myAnimes.length >= this.userAnimes.length) {
                  var grande = this.myAnimes;
                  var pequeña = this.userAnimes;
                } else {
                  var pequeña = this.myAnimes;
                  var grande = this.userAnimes;
                }

                var pararGrande = 0;
                var pararPequeño = 0;

                if (pequeña.length != 0) {
                  for (
                    let anime = 0;
                    anime - pararGrande < grande.length &&
                    anime - pararPequeño < pequeña.length;
                    anime++
                  ) {
                    if (
                      grande[anime - pararGrande].id == pequeña[anime - pararPequeño].id
                    ) {
                      this.afinidadAnimes++;
                    } else if (
                      grande[anime - pararGrande].id > pequeña[anime - pararPequeño].id
                    ) {
                      pararGrande++;
                    } else {
                      pararPequeño++;
                    }
                  }

                  this.afinidadAnimes100 = (
                    (this.afinidadAnimes * 100) /
                    this.myAnimes.length
                  ).toFixed(2);
                }
              });
          }

          this.procesosTerminados++;
          if (this.procesosTerminados == 3) {
            this.mostrar = "si";
          }
        });
    },
    obtenerMangas() {
      axios
        .get(route("reads.index", this.perfil), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.perfilUsu.totalMangas = res.data.data.length;

          var scoreTotal = 0;
          var mangasScored = 0;

          for (let actual = 0; actual < res.data.data.length; actual++) {
            this.userMangas.push({
              id: res.data.data[actual].id,
              title: res.data.data[actual].title,
              cover: res.data.data[actual].cover,
              readStatus: res.data.data[actual].pivot.readStatus,
              favourite: res.data.data[actual].pivot.favourite,
              score: res.data.data[actual].pivot.score,
            });

            if (res.data.data[actual].pivot.favourite == 1) {
              this.favMangasList.push({
                id: res.data.data[actual].id,
                cover: res.data.data[actual].cover,
                title: res.data.data[actual].title,
              });

              this.perfilUsu.favouritesMangas++;
            }

            if (res.data.data[actual].pivot.score != null) {
              scoreTotal += res.data.data[actual].pivot.score;
              mangasScored++;
            }

            this.perfilUsu.chapters += res.data.data[actual].chapters;

            if (res.data.data[actual].pivot.readStatus == "Reading") {
              this.mangaChart.chartData.datasets[0].data[1]++;
            } else if (res.data.data[actual].pivot.readStatus == "Completed") {
              this.mangaChart.chartData.datasets[0].data[0]++;
            } else if (res.data.data[actual].pivot.readStatus == "PlanToRead") {
              this.mangaChart.chartData.datasets[0].data[2]++;
            } else if (res.data.data[actual].pivot.readStatus == "Dropped") {
              this.mangaChart.chartData.datasets[0].data[3]++;
            } else if (res.data.data[actual].pivot.readStatus == "OnHold") {
              this.mangaChart.chartData.datasets[0].data[4]++;
            }
          }

          if (mangasScored > 0) {
            this.perfilUsu.mangaMeanScore = (scoreTotal / mangasScored).toFixed(2);
          }

          if (this.perfil != this.usuario.id) {
            axios
              .get(route("reads.index", this.usuario.id), {
                headers: {
                  Authorization: "Bearer " + this.clave,
                },
              })
              .then((res) => {
                for (let actual = 0; actual < res.data.data.length; actual++) {
                  this.myMangas.push(res.data.data[actual]);
                }

                if (this.myMangas.length >= this.userMangas.length) {
                  var grande = this.myMangas;
                  var pequeña = this.userMangas;
                } else {
                  var pequeña = this.myMangas;
                  var grande = this.userMangas;
                }

                var pararGrande = 0;
                var pararPequeño = 0;

                if (pequeña.length != 0) {
                  for (
                    let manga = 0;
                    manga - pararPequeño < pequeña.length &&
                    manga - pararGrande < grande.length;
                    manga++
                  ) {
                    if (
                      grande[manga - pararGrande].id == pequeña[manga - pararPequeño].id
                    ) {
                      this.afinidadMangas++;
                    } else if (
                      grande[manga - pararGrande].id > pequeña[manga - pararPequeño].id
                    ) {
                      pararGrande++;
                    } else {
                      pararPequeño++;
                    }
                  }

                  this.afinidadMangas100 = (
                    (this.afinidadMangas * 100) /
                    this.myMangas.length
                  ).toFixed(2);
                }
              });
          }

          this.procesosTerminados++;
          if (this.procesosTerminados == 3) {
            this.mostrar = "si";
          }
        });
    },

    obtenerAmigos() {
      axios
        .get(route("friends.index", this.perfil), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          res.data.data[0].forEach((amigo) => {
            if (amigo.profile_photo_url.includes("https://picsum.photos/500/500")) {
              amigo.profile_photo_url = amigo.profile_photo_path;
            }

            this.amigos.push({
              amigo_id: amigo.id,
              name: amigo.name,
              image: amigo.profile_photo_url,
            });
          });

          if (this.perfil != this.usuario.id) {
            res.data.data[0].forEach((amigo) => {
              if (
                amigo.pivot.user1_id == this.usuario.id ||
                amigo.pivot.user2_id == this.usuario.id
              ) {
                this.solicitudAmistad = "amigos";
              }
            });

            res.data.data[1].forEach((amigo) => {
              if (amigo.pivot.user2_id == this.usuario.id) {
                this.solicitudAmistad = "recibidaYo";
              }
            });

            res.data.data[2].forEach((amigo) => {
              if (amigo.pivot.user1_id == this.usuario.id) {
                this.solicitudAmistad = "enviadaYo";
              }
            });
          }

          this.procesosTerminados++;

          if (this.procesosTerminados == 3) {
            this.mostrar = "si";
          }
        });
    },

    cambiarAmigo() {
      if (this.solicitudAmistad == null) {
        var datos = new FormData();
        datos.append("id", this.perfil);

        axios
          .post(route("friends.store"), datos, {
            headers: {
              Authorization: "Bearer " + this.clave,
            },
          })
          .then((res) => {
            this.solicitudAmistad = "enviadaYo";
            this.datosInfo["color"] = "lime";
            this.datosInfo["style"] = "success";
            this.datosInfo["mensaje"] = res.data.message;
            this.datosInfo["mostrar"] = true;
          })
          .catch((err) => {
            this.datosInfo["color"] = "red";
            this.datosInfo["style"] = "danger";
            this.datosInfo["mensaje"] = err.response.data.message;
            this.datosInfo["mostrar"] = true;
          });
      } else if (this.solicitudAmistad == "amigos") {
        this.borrandoAmigo = true;
      } else if (this.solicitudAmistad == "recibidaYo") {
        var datos = new FormData();
        datos.append("_method", "PUT");

        axios
          .post(route("friends.update", this.perfil), datos, {
            headers: {
              Authorization: "Bearer " + this.clave,
            },
          })
          .then((res) => {
            this.solicitudAmistad = "amigos";
            this.datosInfo["color"] = "lime";
            this.datosInfo["style"] = "success";
            this.datosInfo["mensaje"] = res.data.message;
            this.datosInfo["mostrar"] = true;
          })
          .catch((err) => {
            this.datosInfo["color"] = "red";
            this.datosInfo["style"] = "danger";
            this.datosInfo["mensaje"] = err.response.data.message;
            this.datosInfo["mostrar"] = true;
          });
      }
    },

    borrarAmigo() {
      this.borrandoAmigo = false;

      axios
        .delete(route("friends.destroy", this.perfil), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.solicitudAmistad = null;
          this.datosInfo["color"] = "lime";
          this.datosInfo["style"] = "success";
          this.datosInfo["mensaje"] = res.data.message;
          this.datosInfo["mostrar"] = true;
        })
        .catch((err) => {
          this.datosInfo["color"] = "red";
          this.datosInfo["style"] = "danger";
          this.datosInfo["mensaje"] = err.response.data.message;
          this.datosInfo["mostrar"] = true;
        });
    },
    enviarMensaje() {
      this.creandoMensaje = false;

      var datos = new FormData();

      datos.append("message", this.mensaje);
      datos.append("recipient", this.perfil);

      axios
        .post(route("messages.store"), datos, {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.datosInfo["color"] = "lime";
          this.datosInfo["style"] = "success";
          this.datosInfo["mensaje"] = res.data.message;
          this.datosInfo["mostrar"] = true;
        })
        .catch((err) => {
          this.datosInfo["color"] = "red";
          this.datosInfo["style"] = "danger";
          this.datosInfo["mensaje"] = err.response.data.message;
          this.datosInfo["mostrar"] = true;
        });
    },
    pulsadoMensaje() {
      this.mensaje = "";
      this.creandoMensaje = true;
    },

    listaAnime() {
      window.location.href = route("AnimeUserList", this.perfil);
    },
    listaManga() {
      window.location.href = route("MangaUserList", this.perfil);
    },

    colorUltimo(color) {
      if (color == "PlanToWatch" || color == "PlanToRead") {
        return "background-color: #C3C3C3;";
      } else if (color == "Completed") {
        return "background-color: #26448F;";
      } else if (color == "Dropped") {
        return "background-color: #A12F31;";
      } else if (color == "OnHold") {
        return "background-color: #F9D457;";
      } else if (color == "Watching" || color == "Reading") {
        return "background-color: #2DB039;";
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

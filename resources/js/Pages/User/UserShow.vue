<template>
  <app-layout color="#E5E7EB">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ perfilUsu.name }} Profile
      </h2>
    </template>

    <div class="max-w-7xl w-full mx-3 sm:mx-auto sm:px-6 lg:px-8 py-12">
      <banner-propio
        v-if="datosInfo['mostrar']"
        @close="datosInfo['mostrar'] = false"
        :color="datosInfo['color']"
        :style="datosInfo['style']"
        :message="datosInfo['mensaje']"
      />

      <template v-if="!cargando">
        <div class="bg-gray-200">
          <button @click="ponerTodo">CONSOLE.LOG</button>
        </div>
      </template>

      <loading v-else color="gray" />
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from "@/Jetstream/Button";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetDialogModal from "@/Jetstream/DialogModal";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import Loading from "../Componentes/Loading.vue";
import BannerPropio from "@/Pages/Componentes/BannerPropio";

export default {
  components: {
    AppLayout,
    JetDialogModal,
    JetInput,
    JetInputError,
    JetButton,
    JetDangerButton,
    Loading,
    BannerPropio,
  },

  props: ["clave", "perfil", "usuario"],

  data() {
    return {
      perfilUsu: {
        name: "",
        profilePhoto: "",
        last_online: "",
        gender: "",
        biography: "",
        animes: {
          total: 0,
          watching: 0,
          completed: 0,
          planToWatch: 0,
          dropped: 0,
          onHold: 0,
          watching100: 0,
          completed100: 0,
          planToWatch100: 0,
          dropped100: 0,
          onHold100: 0,
        },

        mangas: {
          total: 0,
          reading: 0,
          completed: 0,
          planToRead: 0,
          dropped: 0,
          onHold: 0,
          reading100: 0,
          completed100: 0,
          planToRead100: 0,
          dropped100: 0,
          onHold100: 0,
        },

        chapters: 0,
        episodes: 0,

        favouritesAnimes: 0,
        favouritesMangas: 0,

        animeMeanScore: 0,
        mangaMeanScore: 0,
      },

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
      borrandoAmigo: false,

      cargando: true,
      solicitudAmistad: null,
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
          this.perfilUsu.profilePhoto = res.data.data.profile_photo_url;
          this.perfilUsu.gender = res.data.data.gender;
          this.perfilUsu.biography = res.data.data.biography;
          this.perfilUsu.last_online = res.data.data.last_online;

          this.obtenerAnimes();
          this.obtenerMangas();
          this.obtenerAmigos();
        })
        .catch((err) => {
          this.datosInfo["color"] = "red";
          this.datosInfo["style"] = "danger";
          this.datosInfo["mensaje"] = err.response.data.message;
          this.datosInfo["mostrar"] = true;
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
          this.perfilUsu.animes.total = res.data.data.length;

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
              this.perfilUsu.animes.watching++;
            } else if (res.data.data[actual].pivot.watchStatus == "Completed") {
              this.perfilUsu.animes.completed++;
            } else if (res.data.data[actual].pivot.watchStatus == "PlanToWatch") {
              this.perfilUsu.animes.planToWatch++;
            } else if (res.data.data[actual].pivot.watchStatus == "Dropped") {
              this.perfilUsu.animes.dropped++;
            } else if (res.data.data[actual].pivot.watchStatus == "OnHold") {
              this.perfilUsu.animes.onHold++;
            }
          }

          if (animesScored > 0) {
            this.perfilUsu.animeMeanScore = scoreTotal / animesScored;
          }

          if (this.perfilUsu.animes.total > 0) {
            this.perfilUsu.animes.watching100 =
              this.perfilUsu.animes.watching / this.perfilUsu.animes.total;
            this.perfilUsu.animes.completed100 =
              this.perfilUsu.animes.completed / this.perfilUsu.animes.total;
            this.perfilUsu.animes.planToWatch100 =
              this.perfilUsu.animes.planToWatch / this.perfilUsu.animes.total;
            this.perfilUsu.animes.dropped100 =
              this.perfilUsu.animes.dropped / this.perfilUsu.animes.total;
            this.perfilUsu.animes.onHold100 =
              this.perfilUsu.animes.onHold / this.perfilUsu.animes.total;
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

                  this.afinidadAnimes100 = (this.afinidadAnimes * 100) / grande.length;
                }
              });
          }

          this.procesosTerminados++;
          if (this.procesosTerminados == 3) {
            this.cargando = false;
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
          this.perfilUsu.mangas.total = res.data.data.length;

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
              this.perfilUsu.mangas.reading++;
            } else if (res.data.data[actual].pivot.readStatus == "Completed") {
              this.perfilUsu.mangas.completed++;
            } else if (res.data.data[actual].pivot.readStatus == "PlanToRead") {
              this.perfilUsu.mangas.planToRead++;
            } else if (res.data.data[actual].pivot.readStatus == "Dropped") {
              this.perfilUsu.mangas.dropped++;
            } else if (res.data.data[actual].pivot.readStatus == "OnHold") {
              this.perfilUsu.mangas.onHold++;
            }
          }

          if (mangasScored > 0) {
            this.perfilUsu.mangaMeanScore = scoreTotal / mangasScored;
          }

          if (this.perfilUsu.mangas.total > 0) {
            this.perfilUsu.mangas.reading100 =
              this.perfilUsu.mangas.reading / this.perfilUsu.mangas.total;
            this.perfilUsu.mangas.completed100 =
              this.perfilUsu.mangas.completed / this.perfilUsu.mangas.total;
            this.perfilUsu.mangas.planToRead100 =
              this.perfilUsu.mangas.planToRead / this.perfilUsu.mangas.total;
            this.perfilUsu.mangas.dropped100 =
              this.perfilUsu.mangas.dropped / this.perfilUsu.mangas.total;
            this.perfilUsu.mangas.onHold100 =
              this.perfilUsu.mangas.onHold / this.perfilUsu.mangas.total;
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

                console.log(pequeña);
                console.log(grande);

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

                  this.afinidadMangas100 = (this.afinidadMangas * 100) / grande.length;
                  console.log(
                    this.afinidadMangas100 +
                      "=" +
                      this.afinidadMangas +
                      "/" +
                      grande.length
                  );
                }
              });
          }

          this.procesosTerminados++;
          if (this.procesosTerminados == 3) {
            this.cargando = false;
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
          this.amigos = res.data.data;

          if (this.perfil == this.usuario.id) {
            this.solicitudAmistad = "soyYo";
          } else {
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
            this.cargando = false;
          }
        });
    },

    cambiarAmigo() {
      if (this.solicitudAmistad == null) {
        axios
          .post(route("friends.store", this.perfil), {
            headers: {
              Authorization: "Bearer " + this.clave,
            },
          })
          .then((res) => {
            this.solicitudAmistad = "enviadaYo";
            this.datosInfo["color"] = "gray";
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
        axios
          .put(route("friends.update", this.perfil), {
            headers: {
              Authorization: "Bearer " + this.clave,
            },
          })
          .then((res) => {
            this.solicitudAmistad = "amigos";
            this.datosInfo["color"] = "gray";
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
      } //TODO
    },

    borrarAmigo() {
      axios
        .delete(route("friends.destroy", this.perfil), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.solicitudAmistad = null;
          this.datosInfo["color"] = "gray";
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
      var datos = new FormData();

      datos.append("message", this.mensaje);
      datos.append("recipient", this.perfil);

      axios
        .post(route("messages.store", datos), {
          headers: {
            Authorization: "Bearer " + this.clave,
          },
        })
        .then((res) => {
          this.datosInfo["color"] = "gray";
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

    ponerTodo() {
      console.log(this.perfilUsu);
      console.log(this.amigos);
      console.log(this.favAnimesList);
      console.log(this.favMangasList);
      console.log(this.afinidadAnimes);
      console.log(this.afinidadAnimes100);
      console.log(this.userAnimes);
      console.log(this.myAnimes);
    },
  },
};
</script>

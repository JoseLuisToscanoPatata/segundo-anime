<template>
  <div>
    <div class="p-2 sm:px-20 bg-purple-400 border-4 border-purple-600">
      <div
        class="mt-8 text-2xl transition-all duration-300 ease-in-out md:text-3xl lg:text-4xl xl:text-5xl flex flex-row justify-evenly text-purple-800"
      >
        !! Welcome to Big Chungus !!
        <div>
          <jet-application-logo class="block h-20 w-auto" />
        </div>
      </div>

      <div class="mt-6 text-justify text-gray-600">
        Big Chungus is a funny meme from some years ago that appeared from some old
        cartoons, and now is the name of a website about Anime and Manga, where you can
        look for all type of information about these you love, and and these you have seen
        to your list, to never forget what have you seen until now
      </div>
    </div>

    <div class="bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
      <div class="p-4 bg-pink-300 border-4 border-pink-500">
        <div class="flex items-center">
          <img src="img/search.svg" alt="" class="w-8 h-8" />
          <div class="ml-4 text-lg text-pink-600 leading-7 font-semibold">Search</div>
        </div>

        <div class="ml-12">
          <div class="mt-2 text-sm text-gray-600 text-justify">
            We have all kind of information about almost every anime and manga that exist
            up to date: Creators, stuff, characters, release date, episodes - chapters,
            voice actors, etc. All the info you might need can be found here :)
          </div>

          <a :href="route('AnimeList')">
            <div class="mt-3 flex items-center text-sm font-semibold text-pink-700">
              <div>Search animes</div>

              <div class="ml-1 text-pink-500">
                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                  <path
                    fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="p-4 bg-red-400 border-4 border-red-600">
        <div class="flex items-center">
          <img src="img/list.svg" alt="" class="w-8 h-8" />
          <div class="ml-4 text-lg text-red-600 leading-7 font-semibold">
            Add to your list
          </div>
        </div>

        <div class="ml-12">
          <div class="mt-2 text-sm text-gray-600 text-justify">
            You have lists for both your animes and mangas, where you can filter and order
            according to the watch date, your personal score to these, by your status
            (watching, completed, planning to red, etc.).
          </div>

          <a :href="route('MangaList')">
            <div class="mt-3 flex items-center text-sm font-semibold text-red-700">
              <div>Search mangas</div>

              <div class="ml-1 text-red-500">
                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                  <path
                    fill-rule="evenodd"
                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="p-4 bg-yellow-300 border-4 border-yellow-500">
        <div class="flex items-center">
          <img src="img/star.svg" alt="" class="w-8 h-8" />
          <div class="ml-4 text-lg text-yellow-600 leading-7 font-semibold">
            Meet people
          </div>
        </div>

        <div class="ml-12">
          <div class="mt-2 text-sm text-gray-600 text-justify">
            In our website, you can make friends with tons of people, and do cool things
            like comparing your lists, chatting with them, recommend stuff you like, and
            thats actually everything you can do.
          </div>
        </div>
      </div>

      <div class="p-4 bg-green-300 border-4 border-green-500">
        <div class="flex items-center">
          <img src="img/friend.svg" alt="" class="w-8 h-8" />
          <div class="ml-4 text-lg text-green-500 leading-7 font-semibold">
            Social media
          </div>
        </div>

        <div class="ml-12">
          <div class="mt-2 text-sm text-gray-600 text-justify">
            Como en realidad el proyecto no da para tanto, no hay nada más, aunque tenía
            pensado añadir otras cosas como grupos, más registros en la BD, mejores
            filtros de búsqueda, y casi todo de lo que pone en los otros bloques :/
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import JetApplicationLogo from "@/Jetstream/ApplicationLogo";

export default {
  components: {
    JetApplicationLogo,
  },
};
</script>

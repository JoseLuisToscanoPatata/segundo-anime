<template>
  <div>
    <jet-banner />

    <div
      class="min-h-screen bg-gray-100"
      style="background-image: url('/img/kirby5.jpg')"
    >
      <nav class="border-b-2 p border-gray-600" style="background-color: #33312f">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between h-16">
            <div class="flex">
              <!-- Logo -->
              <div class="flex-shrink-0 flex items-center">
                <inertia-link :href="route('dashboard')">
                  <jet-application-mark class="block h-9 w-auto" />
                </inertia-link>
              </div>

              <!-- Navigation Links -->

              <div class="hidden space-x-8 sm:-my-px sm:ml-6 sm:flex">
                <jet-nav-link
                  :href="route('AnimeList')"
                  :active="route().current('AnimeList')"
                  class="text-purple-500 hover:text-purple-700 focus:text-purple-800 hover:border-purple-700 focus:border-purple-800"
                  :class="{
                    'border-purple-700': route().current('AnimeList'),
                  }"
                >
                  ANIME
                </jet-nav-link>
              </div>

              <div class="hidden space-x-8 sm:-my-px sm:ml-3 sm:flex">
                <jet-nav-link
                  :href="route('MangaList')"
                  :active="route().current('MangaList')"
                  class="text-yellow-500 hover:text-yellow-700 focus:text-yellow-800 hover:border-yellow-700 focus:border-yellow-800"
                  :class="{
                    'border-yellow-700': route().current('MangaList'),
                  }"
                >
                  MANGA
                </jet-nav-link>
              </div>

              <div class="hidden space-x-8 sm:my-px sm:flex sm:items-center sm:ml-6">
                <div class="relative">
                  <jet-dropdown
                    align="right"
                    width="48"
                    :estilos="['background-color: white;']"
                  >
                    <template #trigger>
                      <button class="focus:outline-none">
                        <img
                          class="h-11 w-11 object-cover m-1 transform hover:scale-110"
                          src="/img/list2.svg"
                          alt="Lista"
                        />
                      </button>
                    </template>

                    <template #content>
                      <div
                        class="block px-4 py-2 text-xs bg-white text-gray-700 font-extrabold"
                      >
                        YOUR LISTS
                      </div>

                      <jet-dropdown-link
                        :href="route('AnimeUserList', $page.props.user.id)"
                        :color="[
                          'text-purple-400',
                          'bg-white',
                          'hover:text-white',
                          'hover:bg-purple-400',
                          'border-purple-400',
                        ]"
                        :active="route().current('AnimeUserList', $page.props.user.id)"
                      >
                        Anime List
                      </jet-dropdown-link>

                      <jet-dropdown-link
                        :href="route('MangaUserList', $page.props.user.id)"
                        :color="[
                          'text-yellow-400',
                          'bg-white',
                          'hover:text-white',
                          'hover:bg-yellow-400',
                          'border-yellow-400',
                        ]"
                        :active="route().current('MangaUserList', $page.props.user.id)"
                      >
                        Manga List
                      </jet-dropdown-link>

                      <jet-dropdown-link
                        :href="route('SharedLists')"
                        :color="[
                          'text-lime-400',
                          'bg-white',
                          'hover:text-white',
                          'hover:bg-lime-400',
                          'border-lime-400',
                        ]"
                        :active="route().current('SharedLists')"
                      >
                        Shared Lists
                      </jet-dropdown-link>
                    </template>
                  </jet-dropdown>
                </div>
              </div>

              <div
                v-if="$page.props.user.role == 'admin'"
                class="hidden space-x-8 sm:my-px sm:flex sm:items-center sm:ml-6"
              >
                <div class="relative">
                  <jet-dropdown
                    align="right"
                    width="48"
                    :estilos="['background-color: white;']"
                  >
                    <template #trigger>
                      <button class="focus:outline-none">
                        <img
                          class="h-11 w-11 object-cover m-1 transform hover:scale-110"
                          src="/img/config.svg"
                          alt="Lista"
                        />
                      </button>
                    </template>

                    <template #content>
                      <div
                        class="block px-4 py-2 text-xs bg-white text-gray-700 font-extrabold"
                      >
                        ADMIN SITE
                      </div>

                      <jet-dropdown-link
                        :href="route('AnimeAdminList')"
                        :color="[
                          'text-purple-400',
                          'bg-white',
                          'hover:text-white',
                          'hover:bg-purple-400',
                          'border-purple-400',
                        ]"
                        :active="route().current('AnimeAdminList')"
                      >
                        Anime database
                      </jet-dropdown-link>

                      <jet-dropdown-link
                        :href="route('MangaAdminList')"
                        :color="[
                          'text-yellow-400',
                          'bg-white',
                          'hover:text-white',
                          'hover:bg-yellow-400',
                          'border-yellow-400',
                        ]"
                        :active="route().current('MangaAdminList')"
                      >
                        Manga database
                      </jet-dropdown-link>

                      <jet-dropdown-link
                        :href="route('UserAdminList')"
                        :color="[
                          'text-lime-400',
                          'bg-white',
                          'hover:text-white',
                          'hover:bg-lime-400',
                          'border-lime-400',
                        ]"
                        :active="route().current('UserAdminList')"
                      >
                        User database
                      </jet-dropdown-link>
                    </template>
                  </jet-dropdown>
                </div>
              </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-4">
              <!-- Settings Dropdown -->
              <div class="ml-3 relative">
                <jet-dropdown
                  align="right"
                  width="48"
                  :estilos="['background-color: white;']"
                >
                  <template #trigger>
                    <button
                      v-if="$page.props.jetstream.managesProfilePhotos"
                      class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out"
                    >
                      <img
                        class="h-11 w-11 rounded-full object-cover"
                        :src="$page.props.user.profile_photo_url"
                        :alt="$page.props.user.name"
                      />
                    </button>
                  </template>

                  <template #content>
                    <!-- Account Management -->
                    <div
                      class="block px-4 py-2 text-xs bg-white text-gray-700 font-extrabold"
                    >
                      My Account
                    </div>

                    <jet-dropdown-link
                      :href="route('UserShow', $page.props.user.id)"
                      :color="[
                        'text-lime-400',
                        'bg-white',
                        'hover:text-white',
                        'hover:bg-lime-400',
                        'border-lime-400',
                      ]"
                    >
                      Profile
                    </jet-dropdown-link>

                    <jet-dropdown-link
                      :href="route('profile.show')"
                      :color="[
                        'text-pink-400',
                        'bg-white',
                        'hover:text-white',
                        'hover:bg-pink-400',
                        'border-pink-400',
                      ]"
                    >
                      Account Settings
                    </jet-dropdown-link>

                    <jet-dropdown-link
                      :href="route('FriendsList', $page.props.user.id)"
                      :color="[
                        'text-yellow-400',
                        'bg-white',
                        'hover:text-white',
                        'hover:bg-yellow-400',
                        'border-yellow-400',
                      ]"
                    >
                      Friends
                    </jet-dropdown-link>

                    <jet-dropdown-link
                      :href="route('MessagesList')"
                      :color="[
                        'text-purple-400',
                        'bg-white',
                        'hover:text-white',
                        'hover:bg-purple-400',
                        'border-purple-400',
                      ]"
                    >
                      Messages
                    </jet-dropdown-link>

                    <div class="border-t border-gray-100"></div>

                    <!-- Authentication -->
                    <form @submit.prevent="logout">
                      <jet-dropdown-link
                        as="button"
                        :color="[
                          'text-gray-700',
                          'bg-white',
                          'hover:text-white',
                          'hover:bg-gray-700',
                          'border-gray-700',
                        ]"
                      >
                        Log Out
                      </jet-dropdown-link>
                    </form>
                  </template>
                </jet-dropdown>
              </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
              <button
                @click="showingNavigationDropdown = !showingNavigationDropdown"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
              >
                <svg
                  class="h-6 w-6 text-pink-500"
                  stroke="currentColor"
                  fill="none"
                  viewBox="0 0 24 24"
                >
                  <path
                    :class="{
                      hidden: showingNavigationDropdown,
                      'inline-flex': !showingNavigationDropdown,
                    }"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                  />
                  <path
                    :class="{
                      hidden: !showingNavigationDropdown,
                      'inline-flex': showingNavigationDropdown,
                    }"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div
          :class="{
            block: showingNavigationDropdown,
            hidden: !showingNavigationDropdown,
          }"
          class="sm:hidden"
        >
          <div class="pt-2 pb-3 space-y-1">
            <jet-responsive-nav-link
              :href="route('AnimeList')"
              :active="route().current('AnimeList')"
              class="text-purple-500 hover:text-purple-700 focus:text-purple-800 hover:border-purple-700 focus:border-purple-800"
              :class="{
                'border-purple-700': route().current('AnimeList'),
              }"
            >
              ANIME
            </jet-responsive-nav-link>
          </div>

          <div class="pt-2 pb-3 space-y-1">
            <jet-responsive-nav-link
              :href="route('MangaList')"
              :active="route().current('MangaList')"
              class="text-yellow-500 hover:text-yellow-700 focus:text-yellow-800 hover:border-yellow-700 focus:border-yellow-800"
              :class="{
                'border-yellow-700': route().current('MangaList'),
              }"
            >
              MANGA
            </jet-responsive-nav-link>
          </div>

          <!-- Responsive Settings Options -->
          <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
              <div class="flex-shrink-0 mr-3">
                <img
                  class="h-10 w-10 object-cover m-1 transform hover:scale-110"
                  src="/img/list2.svg"
                  alt="lista"
                />
              </div>

              <div class="font-extrabold text-base text-white">YOUR LISTS</div>
            </div>

            <div class="mt-3 space-y-1">
              <div class="pt-2 pb-3 space-y-1">
                <jet-responsive-nav-link
                  :href="route('AnimeUserList', $page.props.user.id)"
                  :active="route().current('AnimeUserList', $page.props.user.id)"
                  class="text-purple-500 hover:text-purple-700 focus:text-purple-800 hover:border-purple-700 focus:border-purple-800"
                  :class="{
                    'border-white': route().current('AnimeUserList', $page.props.user.id),
                  }"
                >
                  ANIME LIST
                </jet-responsive-nav-link>
              </div>

              <div class="pt-2 pb-3 space-y-1">
                <jet-responsive-nav-link
                  :href="route('MangaUserList', $page.props.user.id)"
                  :active="route().current('MangaUserList', $page.props.user.id)"
                  class="text-yellow-500 hover:text-yellow-700 focus:text-yellow-800 hover:border-yellow-700 focus:border-yellow-800"
                  :class="{
                    'border-white': route().current('MangaUserList', $page.props.user.id),
                  }"
                >
                  MANGA LIST
                </jet-responsive-nav-link>
              </div>

              <div class="pt-2 pb-3 space-y-1">
                <jet-responsive-nav-link
                  :href="route('SharedLists')"
                  :active="route().current('SharedLists')"
                  class="text-lime-500 hover:text-lime-700 focus:text-lime-800 hover:border-lime-700 focus:border-lime-800"
                  :class="{
                    'border-white': route().current('SharedLists'),
                  }"
                >
                  SHARED LISTS
                </jet-responsive-nav-link>
              </div>
            </div>
          </div>

          <div
            v-if="$page.props.user.role == 'admin'"
            class="pt-4 pb-1 border-t border-gray-200"
          >
            <div class="flex items-center px-4">
              <div class="flex-shrink-0 mr-3">
                <img
                  class="h-10 w-10 object-cover m-1 transform hover:scale-110"
                  src="/img/config.svg"
                  alt="lista"
                />
              </div>

              <div class="font-extrabold text-base text-white">ADMIN SITE</div>
            </div>

            <div class="mt-3 space-y-1">
              <div class="pt-2 pb-3 space-y-1">
                <jet-responsive-nav-link
                  :href="route('AnimeAdminList')"
                  :active="route().current('AnimeAdminList')"
                  class="text-purple-500 hover:text-purple-700 focus:text-purple-800 hover:border-purple-700 focus:border-purple-800"
                  :class="{
                    'border-white': route().current('AnimeAdminList'),
                  }"
                >
                  ANIME DATABASE
                </jet-responsive-nav-link>
              </div>

              <div class="pt-2 pb-3 space-y-1">
                <jet-responsive-nav-link
                  :href="route('MangaAdminList')"
                  :active="route().current('MangaAdminList')"
                  class="text-yellow-500 hover:text-yellow-700 focus:text-yellow-800 hover:border-yellow-700 focus:border-yellow-800"
                  :class="{
                    'border-white': route().current('MangaAdminList'),
                  }"
                >
                  MANGA DATABASE
                </jet-responsive-nav-link>
              </div>

              <div class="pt-2 pb-3 space-y-1">
                <jet-responsive-nav-link
                  :href="route('UserAdminList')"
                  :active="route().current('UserAdminList')"
                  class="text-lime-500 hover:text-lime-700 focus:text-lime-800 hover:border-lime-700 focus:border-lime-800"
                  :class="{
                    'border-white': route().current('UserAdminList'),
                  }"
                >
                  USER DATABASE
                </jet-responsive-nav-link>
              </div>
            </div>
          </div>

          <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
              <div
                v-if="$page.props.jetstream.managesProfilePhotos"
                class="flex-shrink-0 mr-3 rounded-full"
              >
                <img
                  class="h-10 w-10 rounded-full object-cover m-1"
                  :src="$page.props.user.profile_photo_url"
                  :alt="$page.props.user.name"
                />
              </div>

              <div>
                <div class="font-medium text-base text-white">
                  {{ $page.props.user.name }}
                </div>
                <div class="font-medium text-sm text-white">
                  {{ $page.props.user.email }}
                </div>
              </div>
            </div>

            <div class="mt-3 space-y-1">
              <jet-responsive-nav-link
                :href="route('UserShow', $page.props.user.id)"
                :active="route().current('UserShow', $page.props.user.id)"
                class="text-lime-400 hover:text-lime-500 focus:text-lime-600 hover:border-lime-500 focus:border-lime-600"
                :class="{
                  'border-white': route().current('UserShow', $page.props.user.id),
                }"
              >
                My Profile
              </jet-responsive-nav-link>

              <jet-responsive-nav-link
                :href="route('profile.show')"
                :active="route().current('profile.show')"
                class="text-pink-400 hover:text-pink-500 focus:text-pink-600 hover:border-pink-500 focus:border-pink-600"
                :class="{
                  'border-white': route().current('profile.show'),
                }"
              >
                Account Settings
              </jet-responsive-nav-link>

              <jet-responsive-nav-link
                :href="route('FriendsList', $page.props.user.id)"
                :active="route().current('FriendsList', $page.props.user.id)"
                class="text-yellow-400 hover:text-yellow-500 focus:text-yellow-600 hover:border-yellow-500 focus:border-yellow-600"
                :class="{
                  'border-white': route().current('FriendsList'),
                }"
              >
                Friends
              </jet-responsive-nav-link>

              <jet-responsive-nav-link
                :href="route('MessagesList')"
                :active="route().current('MessagesList')"
                class="text-purple-400 hover:text-yellow-500 focus:text-yellow-600 hover:border-yellow-500 focus:border-yellow-600"
                :class="{
                  'border-white': route().current('MessagesList'),
                }"
              >
                Messages
              </jet-responsive-nav-link>

              <!-- Authentication -->
              <form method="POST" @submit.prevent="logout">
                <jet-responsive-nav-link
                  as="button"
                  class="text-gray-100 hover:text-gray-300 focus:text-gray-400 hover:border-gray-300 focus:border-gray-400"
                >
                  Log Out
                </jet-responsive-nav-link>
              </form>
            </div>
          </div>
        </div>
      </nav>

      <!-- Page Heading -->
      <header class="shadow" v-if="$slots.header" :style="headerColor">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 font-extrabold">
          <slot name="header"></slot>
        </div>
      </header>

      <!-- Page Content -->
      <main>
        <slot></slot>
      </main>
    </div>
  </div>
</template>

<script>
import JetApplicationMark from "@/Jetstream/ApplicationMark";
import JetBanner from "@/Jetstream/Banner";
import JetDropdown from "@/Jetstream/Dropdown";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetNavLink from "@/Jetstream/NavLink";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink";

export default {
  components: {
    JetApplicationMark,
    JetBanner,
    JetDropdown,
    JetDropdownLink,
    JetNavLink,
    JetResponsiveNavLink,
  },

  data() {
    return {
      showingNavigationDropdown: false,
    };
  },

  props: {
    color: "",
  },

  computed: {
    headerColor() {
      return "background-color: " + this.color;
    },
  },

  methods: {
    switchToTeam(team) {
      this.$inertia.put(
        route("current-team.update"),
        {
          team_id: team.id,
        },
        {
          preserveState: false,
        }
      );
    },

    logout() {
      this.$inertia.post(route("logout"));
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

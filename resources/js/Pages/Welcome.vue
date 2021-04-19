<template>
  <div
    class="relative flex items-center justify-center min-h-screen sm:items-center"
    :style="image"
  >
    <div class="max-w-6xl mx-auto">
      <div class="overflow-hidden shadow">
        <div class="rounded-full flex justify-center">
          <img
            src="img/bigChungus.png"
            alt="bigChungus"
            class="h-52 w-auto lg:h-60 xl:h-72 2xl:h-80"
          />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2">
          <template v-if="!$page.props.user">
            <div
              class="p-6 m-4 sm:m-20 rounded-full flex flex-col bg-purple-300 transition-all ease-in-out duration-200 hover:bg-white border-purple-600 border-6"
              @click="register"
            >
              <div class="flex items-center mx-2">
                <img src="img/knucles.png" alt="knucles" class="h-10 w-auto" />
                <div class="text-lg leading-4 text-purple-600">New on our website?</div>
              </div>

              <div class="mt-2 mx-auto text-purple-600 text-3xl font-bold">REGISTER</div>
            </div>

            <div
              class="p-6 m-4 sm:m-20 rounded-full flex flex-col transition-all ease-in-out duration-200 border-pink-600 hover:bg-white bg-pink-300 border-6"
              @click="login"
            >
              <div class="flex items-center mx-2">
                <img src="img/knucles.png" alt="knucles" class="h-10 w-auto" />
                <div class="text-lg leading-4 text-pink-500">
                  Already have an account?
                </div>
              </div>

              <div class="mt-2 mx-auto text-pink-500 text-3xl font-bold">LOGIN</div>
            </div>
          </template>

          <div
            v-else
            class="p-6 m-20 rounded-full flex flex-col col-span-2 transition-all ease-in-out duration-200 border-blue-600 hover:bg-white bg-blue-300 border-6"
            @click="dashboard"
          >
            <div class="flex items-center mx-2">
              <img src="img/knucles.png" alt="knucles" class="h-10 w-auto" />
              <div class="text-lg leading-4 text-blue-500">Welcome back bro :)</div>
            </div>

            <div class="mt-2 mx-auto text-blue-500 text-3xl font-bold">DASHBOARD</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.bg-gray-100 {
  background-color: #f7fafc;
  background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
}

.border-gray-200 {
  border-color: #edf2f7;
  border-color: rgba(237, 242, 247, var(--tw-border-opacity));
}

.text-gray-400 {
  color: #cbd5e0;
  color: rgba(203, 213, 224, var(--tw-text-opacity));
}

.text-gray-500 {
  color: #a0aec0;
  color: rgba(160, 174, 192, var(--tw-text-opacity));
}

.text-gray-600 {
  color: #718096;
  color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.text-gray-700 {
  color: #4a5568;
  color: rgba(74, 85, 104, var(--tw-text-opacity));
}

.text-gray-900 {
  color: #1a202c;
  color: rgba(26, 32, 44, var(--tw-text-opacity));
}

@media (prefers-color-scheme: dark) {
  .dark\:bg-gray-800 {
    background-color: #2d3748;
    background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
  }

  .dark\:bg-gray-900 {
    background-color: #1a202c;
    background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
  }

  .dark\:border-gray-700 {
    border-color: #4a5568;
    border-color: rgba(74, 85, 104, var(--tw-border-opacity));
  }

  .dark\:text-white {
    color: #fff;
    color: rgba(255, 255, 255, var(--tw-text-opacity));
  }

  .dark\:text-gray-400 {
    color: #cbd5e0;
    color: rgba(203, 213, 224, var(--tw-text-opacity));
  }
}
</style>

<script>
export default {
  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },

  data() {
    return {
      image: {
        backgroundImage: "url(/img/undertale.jpg)",
      },
    };
  },

  methods: {
    login() {
      window.location.href = route("login");
    },

    register() {
      window.location.href = route("register");
    },

    dashboard() {
      window.location.href = "/dashboard";
    },
  },
};
</script>

<template>
  <div
    class="relative flex items-center flex-col justify-center min-h-screen sm:items-center"
    :style="image"
  >
    <div class="h-10 mb-12 w-full flex flex-row justify-end absolute top-0">
      <template v-if="!$page.props.user">
        <div
          @click="register"
          class="mx-5 px-5 text-purple-600 text-xl font-bold bg-purple-400 hover:bg-purple-700 hover:text-white rounded-3xl rounded-t-none transition-all ease-in-out cursor-pointer"
        >
          REGISTER
        </div>

        <div
          @click="login"
          class="mx-5 px-5 text-yellow-600 text-xl font-bold bg-yellow-400 hover:bg-yellow-700 hover:text-white rounded-3xl rounded-t-none transition-all ease-in-out cursor-pointer"
        >
          LOGIN
        </div>
      </template>

      <div
        @click="dashboard"
        v-else
        class="mx-5 px-5 text-red-600 text-xl font-bold bg-red-400 hover:bg-red-700 hover:text-white rounded-full rounded-t-none transition-all ease-in-out cursor-pointer"
      >
        DASHBOARD
      </div>
    </div>

    <div class="rounded-full flex justify-center my-4">
      <img
        src="img/bigChungus.png"
        alt="bigChungus"
        class="h-52 w-auto lg:h-60 xl:h-72 2xl:h-80"
      />
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-6">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <welcome2 />
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
import Welcome2 from "@/Jetstream/Welcome";

export default {
  components: {
    Welcome2,
  },
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

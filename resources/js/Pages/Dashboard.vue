<template>
  <app-layout color="#d61dc9;">
    <template #header>
      <h2 class="text-xl text-gray-800 leading-tight">BIG CHUNGUS</h2>
    </template>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <welcome />
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";

export default {
  components: {
    AppLayout,
    Welcome,
  },
};
</script>

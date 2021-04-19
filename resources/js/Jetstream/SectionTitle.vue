<template>
  <div class="md:col-span-1">
    <div class="p-4 rounded-xl bg-white">
      <h3 class="text-lg font-medium text-gray-900">
        <slot name="title"></slot>
      </h3>

      <p class="mt-1 text-sm text-gray-600">
        <slot name="description"></slot>
      </p>
    </div>
  </div>
</template>

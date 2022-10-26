<template>

  <Head title="All Communities" />

  <GuestLayout>
    <template #header>
      <div class="flex justify-between items-center p-2">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ post.title }}
        </h2>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end">
        </div>

        <section class="flex md:flex-row">
          <div class="w-3/4">
            Post Details
          </div>
          <div class="w-1/4">
            <div class="p-2 bg-slate-500 text-white rounded-lg">
              <h2>Latests Communities</h2>
            </div>
          </div>
        </section>

      </div>
    </div>
  </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
  community: Object,
  post: Object
});
</script>
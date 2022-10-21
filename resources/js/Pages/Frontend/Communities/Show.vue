<template>
  <GuestLayout>
    <div class="flex justify-end m-2 p-2">
      <Link v-show="$page.props.auth.auth_check" :href="route('communities.posts.create', communities.slug)" class="px-3 py-4 rounded bg-indigo-500">Create Post</Link>
    </div>
    <h1>Community {{ communities.name }}</h1>
  </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
  communities: Object
});

</script>
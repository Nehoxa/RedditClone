<template>

  <Head title="All Communities" />

  <GuestLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end">
        </div>

        <section class="flex md:flex-row">
          <div class="w-3/4">
            <PostCard v-for="post in posts.data" :post="post" :community="post.community_slug" :key="post.id" />
          </div>
          <div class="w-1/4">
            <div class="p-4 bg-slate-500 text-white rounded-lg">
              <h2>Top Communities</h2>
              <CommunityList :communities="communities" />
            </div>
          </div>
        </section>
      </div>
    </div>
  </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Head } from '@inertiajs/inertia-vue3';
import PostCard from '@/Components/PostCard.vue';
import CommunityList from '@/Components/CommunityList.vue';

defineProps({
  communities: Object,
  posts: Object,
});

</script>
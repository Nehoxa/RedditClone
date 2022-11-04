<template>

  <Head title="All Communities" />

  <GuestLayout>
    <template #header>
      <div class="flex justify-between items-center p-2">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          r/{{ community.name }}
        </h2>

        <Link v-show="$page.props.auth.auth_check" :href="route('communities.posts.create', community.slug)"
          class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
        Create Post
        </Link>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end">
        </div>

        <section class="flex md:flex-row">
          <div class="w-3/4">
            <PostCard v-for="post in posts.data" :post="post" :community="community.slug" :key="post.id" />
            <div class="mt-4 p-2">
              <Pagination class="m-2 p-2 flex justify-center" :links="posts.meta.links" />
            </div>
          </div>
          <div class="w-1/4">
            <div class="mb-4">
              <h2 class="font-semibold text-lg p-6 bg-indigo-700 rounded-t-lg text-white">
                About {{ community.name }}
              </h2>
              <p class="bg-white rounded-b-lg p-4">
                {{ community.description }}
              </p>
            </div>
            <CommunityList :communities="communities">
              <template #title>
                Latest Communities
              </template>
            </CommunityList>
          </div>
        </section>
      </div>
    </div>
  </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import PostCard from '@/Components/PostCard.vue';
import Pagination from '@/Components/Pagination.vue';
import CommunityList from '@/Components/CommunityList.vue';

defineProps({
  community: Object,
  posts: Object,
  communities: Object,
});

</script>
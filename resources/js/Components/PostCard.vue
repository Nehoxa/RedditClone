<template>
  <Link
    :href="route('frontend.communities.posts.show', [community, post.slug])"
    class="mb-4 max-w-4xl flex bg-white rounded-lg border border-gray-200 shadow-m hover:border-gray-800">
    <div class="mr-3">
      <PostVote :post="post" />
    </div>
    <div>
      <div class="flex m-2 p-2 text-sm">
        <Link :href="route('frontend.communities.show', community)" class="font-semibold mr-3 hover:text-indigo-700">r/{{ community }}</Link>
        <div class="flex">Posted by
          <span class="font-semibold mx-1">{{ post.username }}</span> 
          <span class="text-slate-400">{{ post.created_at }}</span>
        </div>
      </div>
      <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ post.title }}</h5>
      </a>
      <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ post.description }}</p>
      <div class="flex m-2 p-2">
        <p class="mr-4 p-2">Comments({{ post.comments_count }})</p>
        <Link :href="route('frontend.communities.posts.show', [community, post.slug])"
          class="inline-flex items-center py-2 px-3 text-sm text-center text-white bg-indigo-600 rounded-md font-semibold">
          Read more
        </Link>
      </div>
    </div>
  </Link>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import PostVote from '@/Components/PostVote.vue'


defineProps({
  post: Object,
  community: String
});

</script>
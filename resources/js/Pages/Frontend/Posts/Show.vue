<template>
  <GuestLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <section class="flex flex-col md:flex-row">
          <div class="w-full md:w-3/4">
            <div class="mr-4 px-4 py-2 bg-white rounded-full w-min">
              <h2 class="font-semibold text-2xl text-black">
                <Link :href="route('frontend.communities.show', community.slug)">
                r/{{ community.name }}
                </Link>
              </h2>
            </div>
            <div class="m-2 p-2 bg-white">
              <div class="text-sm text-slate-400 flex flex-col md:flex-row justify-between">
                <span>Posted by
                  <Link href="" class="text-slate-700 hover:underline">{{ post.data.username }}</Link>
                  at {{ post.data.created_at }}
                </span>
                <div>
                  <Link :href="route('communities.posts.edit', [community.slug, post.data.slug])"
                    class="text-blue-500 font-semibold hover:text-blue-700">
                    Edit
                  </Link>
                  <Link :href="route('communities.posts.destroy', [community.slug, post.data.slug])"
                    class="text-red-500 font-semibold mx-2 hover:text-red-700">
                    Delete
                  </Link>
                </div>
              </div>
              <h1 class="font-semibold text-3xl text-black">{{ post.data.title }}</h1>
              <p class="text-slate-700">{{ post.data.description }}</p>
              <a href="post.data.url" class="font-semibold text-blue-500 text-sm hover:text-blue-300">{{ post.data.url
              }}</a>
            </div>
          </div>
          <div class="w-full md:w-1/4">
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
import { Link } from '@inertiajs/inertia-vue3';

defineProps({
  community: Object,
  post: Object
});
</script>
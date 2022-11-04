<template>
  <GuestLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <section class="flex flex-col md:flex-row">
          <div class="w-full md:w-3/4">
            <div class="mr-4 px-4 py-2 bg-white rounded-full w-min">
              <h2 class="font-semibold text-2xl text-black">
                <Link :href="route('frontend.communities.show', community.slug)" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 mr-3">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                r/{{ community.name }}
                </Link>
              </h2>
            </div>
            <div class="my-2 mr-4 bg-white rounded-lg flex">
              <div>
                <PostVote :post="post.data" />
              </div>
              <div class="w-full m-4">
                <div class="text-sm text-slate-400 flex flex-col md:flex-row justify-between my-2">
                  <span>Posted by
                    <Link href="" class="text-slate-700 hover:underline">{{ post.data.username }}</Link>
                    at {{ post.data.created_at }}
                  </span>
                  <div v-if="$page.props.auth.auth_check && post.data.owner">
                    <Link :href="route('communities.posts.edit', [community.slug, post.data.slug])"
                      class="text-white bg-blue-500 font-semibold mr-2 hover:bg-blue-700 p-2 rounded-md">
                    Edit
                    </Link>
                    <Link :href="route('communities.posts.destroy', [community.slug, post.data.slug])" method="delete"
                      as="button" type="button"
                      class="text-white bg-red-500 font-semibold hover:bg-red-700 p-2 rounded-md">
                    Delete
                    </Link>
                  </div>
                </div>
                <div class="mb-5">
                  <h1 class="font-semibold text-3xl text-black mb-3">{{ post.data.title }}</h1>
                  <p class="text-slate-700">{{ post.data.description }}</p>
                  <a href="post.data.url" class="font-semibold text-blue-500 text-sm hover:text-blue-300">
                    {{ post.data.url }}
                  </a>
                </div>
                <div>
                  <hr>
                  <ul role="list" class="divide-y divide-gray-200 m-2 p-2">
                    <li v-for="(comment, index) in post.data.comments" :key="index" class="py-4 flex flex-col">
                      <div class="text-sm">Commented by<span class="font-semibold ml-1">{{ comment.username }}</span>
                      </div>
                      <div>{{ comment.content }}</div>
                    </li>
                  </ul>
                </div>
                <div v-if="$page.props.auth.auth_check">
                  <hr>
                  <form class="m-2 p-2 max-w-md" @submit.prevent="submit">
                    <div class="mt-2">
                      <label for="comment" class="block mb-2 text-sm font-medium text-gray-900">Your comment</label>
                      <textarea v-model="form.content" name="comment" id="comment" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-200"></textarea>
                    </div>
                    <div class="mt-2">
                      <button class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md"
                        preserve-scroll>Comment</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="w-full md:w-1/4">
            <PostList 
              :community="community"
              :posts="posts"
              class="mt-16">
              <template #title>
                Latest Posts
              </template>
            </PostList>
          </div>
        </section>
      </div>
    </div>
  </GuestLayout>
</template>

<script setup>
import PostList from '@/Components/PostList.vue';
import PostVote from '@/Components/PostVote.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue'
import { Link, useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
  community: Object,
  post: Object,
  posts: Object,
});

const form = useForm({
  content: ""
});

const submit = () => {
  form.post(
    route('frontend.posts.comments', [props.community.slug, props.post.data.slug]), {
    onSuccess: () => form.reset('content')
  }
  );
};

</script>
<template>
  <div class="w-12 pt-6 bg-slate-200 rounded-l-lg flex flex-col items-center h-full">
    <UpVoteLink :slug="post.slug" :class="{ 'text-blue-600': post.postVotes[0] && post.postVotes[0].vote == 1 }" />
    <div 
      class="my-1 font-bold py-6" :class="{ 
        'text-blue-600': post.postVotes[0] && post.postVotes[0].vote == 1,
        'text-red-600': post.postVotes[0] && post.postVotes[0].vote == -1 
      }"
    >
      {{ post.votes }}
    </div>
    <DownVoteLink :slug="post.slug" :class="{ 'text-red-600': post.postVotes[0] && post.postVotes[0].vote == -1 }" />
  </div>
</template>

<script setup>
import DownVoteLink from './DownVoteLink.vue';
import UpVoteLink from './UpVoteLink.vue';

defineProps({
  post: Object,
});
</script>
<template>
  <div>
    <h1>Wesh le sang ! {{ subreddit.name }}</h1>
  </div>
</template>

<script setup>
defineProps({
  subreddit: Object
});

</script>
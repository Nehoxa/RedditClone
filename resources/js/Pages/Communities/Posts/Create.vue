<template>

  <Head title="Create Community" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create Post for {{ community.name }}
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto bg-white m-2 p-6 rounded">
          <form @submit.prevent="submit">

            <div>
              <InputLabel for="title" value="Title" />
              <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" autofocus
                autocomplete="title" />
              <InputError class="mt-2" :message="form.errors.title" />
            </div>

            <div class="mt-4">
              <InputLabel for="url" value="Url" />
              <TextInput id="url" type="text" class="mt-1 block w-full" v-model="form.url"
                autocomplete="url" />
              <InputError class="mt-2" :message="form.errors.url" />
            </div>

            <div class="mt-4">
              <InputLabel for="description" value="Description" />
              <TextInput id="description" type="text" class="mt-1 block w-full" v-model="form.description"
                autocomplete="description" />
              <InputError class="mt-2" :message="form.errors.description" />
            </div>

            <div class="flex items-center justify-end mt-4">
              <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Create
              </PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
  title: '',
  description: '',
  url: '',
});


const props = defineProps({
  community: Object,
});

const submit = () => {
  form.post(route('communities.posts.store', props.community.slug));
};
</script>

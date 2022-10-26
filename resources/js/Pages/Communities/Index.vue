<template>

  <Head title="All Communities" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        All Communities
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div v-if="$page.props.flash.message" class="flex rounded-lg p-4 mb-4 text-sm" :class="$page.props.flash.class"
          role="alert">
          <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
              clip-rule="evenodd"></path>
          </svg>
          <div>
            <span class="font-medium">{{ $page.props.flash.message }}</span>
          </div>
        </div>

        <div class="sm:flex justify-end">
          <div class="mt-4 sm:mt-0 sm:ml-16">
            <Link type="button" :href="route('communities.create')"
              class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
            Add Community
            </Link>
          </div>
        </div>
        <div class="mt-8 flex flex-col">
          <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
              <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col"
                        class="w-2/5 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                        Name
                      </th>
                      <th scope="col" class="w-2/5 px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                        Slug
                      </th>
                      <th scope="col" class="w-1/5 relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">Edit</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200 bg-white">
                    <tr v-for="community in communities.data" :key="community.id">
                      <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                        <Link :href="route('frontend.communities.show', community.slug)"> {{ community.name }}</Link>
                      </td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        {{ community.slug }}
                      </td>
                      <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                        <Link :href="route('communities.edit', community.id)"
                          class="text-indigo-600 hover:text-indigo-900 mr-5">Edit</Link>
                        <Link :href="route('communities.destroy', community.id)" class="text-red-600 hover:text-red-900"
                          method="delete" as="button" type="button">Delete</Link>
                      </td>
                    </tr>
                    <!-- More people... -->
                  </tbody>
                </table>
                <div class="m-2 p-2 flex justify-center">
                  <Pagination :links="communities.links" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>

</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Pagination from '../../Components/Pagination.vue'

defineProps({
  communities: Object,
});

</script>
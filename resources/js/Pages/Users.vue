<template>
    <Head>
        <title>Users</title>
        <meta name="description" content="My Inertia App's users page" head-key="description">
    </Head>

    <div class="flex justify-between mb-6">
        <h1 class="text-4xl font-bold">Users</h1>

        <input 
            type="search"
            class="py-2 px-3 whitespace-nowrap border border-gray-200 sm:rounded-lg"
            placeholder="Search"
            name="search"
            id="search"
            v-model="search"
        />
    </div>

    <div v-if="users.data.length" class="align-middle inline-block min-w-full">
        <div class="overflow-hidden border border-gray-200 sm:rounded-lg">
            <table class="min-w-full">
                <tbody class="divide-y divide-solid divide-gray-200">
                    <tr v-for="user in users.data" :key="user.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ user.name }}
                                </p>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <Link :href="`/users/${user.id}/edit`" class="text-blue-600 hover:text-blue-900">Edit</Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <p v-else>No results found for {{ props.filters.search }}.</p>

    <Pagination :links="users.links" class="mt-6 text-right" v-if="users.data.length" />

</template>

<script setup>
import Pagination from '../Shared/Pagination';
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';

let props = defineProps({ 
    users: Object,
    filters: Object
});

let search = ref(props.filters.search);

console.clear();
console.log(Inertia);

watch(search, value => {
    Inertia.get(
        '/users', 
        { search: value },
        { 
            preserveState: true,
            replace: true
        }
    );
});
</script>
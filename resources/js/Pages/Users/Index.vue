<template>
    <Head title="Users" />

    <div class="flex justify-between mb-6">
        <div class="flex items-end space-x-3">
            <h1 class="text-4xl font-bold">Users</h1>
            <p v-if="users.data.length" class="text-2xl text-gray-400">{{ users.total }}</p>
        </div>

        <div class="flex items-end space-x-6">
            <Link href="/users/create" class="bg-blue-600 hover:bg-blue-900 px-4 py-2 font-bold text-white">Create New User</Link>
            <input 
                type="search"
                class="py-2 px-3 whitespace-nowrap border border-gray-200"
                placeholder="Search"
                name="search"
                id="search"
                v-model="search"
            />
        </div>

    </div>

    <div v-if="users.data.length" class="align-middle inline-block min-w-full">
        <div class="overflow-hidden border border-gray-200">
            <table class="min-w-full">
                <tbody class="divide-y divide-solid divide-gray-200">
                    <tr v-for="user in users.data" :key="user.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <p class="text-sm font-medium text-gray-900">
                                {{ user.name }}
                            </p>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-4">
                            <Link :href="`/users/${user.id}/edit`" class="text-blue-600 hover:text-blue-900">Edit</Link>
                            <Link :href="`/users/${user.id}/delete`" class="text-red-600 hover:text-red-900">Delete</Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <p v-else-if="props.filters.search">No results found for {{ props.filters.search }}.</p>
    <p v-else>No results found.</p>

    <Pagination :links="users.links" class="mt-6" v-if="users.total > users.data.length" />

</template>

<script setup>
import Pagination from '../../Shared/Pagination';
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';

let props = defineProps({ 
    users: Object,
    filters: Object
});

let search = ref(props.filters.search);

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
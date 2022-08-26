<template>
    <Head>
        <title>Users</title>
        <meta name="description" content="My Inertia App's users page" head-key="description">
    </Head>
    <h1 class="text-4xl font-bold">Users</h1>


    <div class="mt-6 align-middle inline-block min-w-full">
        <div class="shadow overflow-hidden border border-gray-200 sm:rounded-lg">
            <table class="min-w-full">
                <tbody class="divide-y divide-solid divide-gray-200">
                    <tr v-for="user in users" :key="user.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ user.name }}
                                </p>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <Link :href="`/users/${user.id}/edit`" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


</template>

<script setup>
defineProps({ users: Array })
</script>
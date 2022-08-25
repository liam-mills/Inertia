<template>
    <Head>
        <title>Users</title>
        <meta name="description" content="My Inertia App's users page" head-key="description">
    </Head>
    <h1 class="text-4xl font-bold">Users</h1>
    <ul class="mt-6">
        <li v-for="user in users" :key="user.id">{{ user.name }}</li>
    </ul>
</template>

<script setup>
defineProps({ users: Array })
</script>
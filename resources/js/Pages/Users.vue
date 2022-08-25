<template>
    <Head>
        <title>Users</title>
        <meta name="description" content="My Inertia App's users page" head-key="description">
    </Head>
    <h1 class="text-4xl font-bold">Users</h1>
    <div style="margin-top:800px">
        <p>Current time is {{ time }}.</p>
        <Link href="/users" class="text-blue-500 hover:underline" preserve-scroll>Get latest time.</Link>
    </div>
</template>

<script setup>
defineProps({ time: String })
</script>
<template>
    <h1 class="text-4xl font-bold">Users</h1>
    <div style="margin-top:800px">
        <p>Current time is {{ time }}.</p>
        <Link href="/users" class="text-blue-500 hover:underline" preserve-scroll>Get latest time.</Link>
    </div>
</template>

<script>
export default {
    props: { time: String }
};
</script>
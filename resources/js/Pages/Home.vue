<template>
    <Layout :username="username">
        <h1 class="text-4xl font-bold">Home</h1>
    </Layout>
</template>

<script>
import Layout from "../Shared/Layout";

export default {
    components: { Layout },

    props: {
        username: String
    }
};
</script>
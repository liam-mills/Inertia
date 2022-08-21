<template>
    <h1>Hello {{ name }}.</h1>

    <p>We'll be using the following frameworks:</p>
    <ul>
        <li v-for="framework in frameworks">{{ framework }}</li>
    </ul>
</template>

<script>
export default {
    props: {
        name: String,
        frameworks: Array
    }
};
</script>
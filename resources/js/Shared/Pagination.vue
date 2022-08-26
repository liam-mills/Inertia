<template>
    <nav>
        <Component 
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links" 
            v-html="link.label"
            :href="link.url" 
            :key="link.label"
            class="p-2 font-medium inline-flex items-center justify-center"
            :class="{ 'text-gray-200': !link.url, 'text-blue-600 hover:text-blue-900': link.url, 'underline': link.active }"
            preserve-scroll
        >
        </Component>
    </nav>
</template>

<script>
export default {
    props: {
        links: Array
    }
};
</script>
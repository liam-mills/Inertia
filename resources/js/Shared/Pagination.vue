<template>
    <nav class="pagination flex justify-end">
        <Component 
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links" 
            v-html="link.label"
            :href="link.url" 
            :key="link.label"
            class="pagination-link p-1 w-7 h-7 font-medium inline-flex items-center justify-center rounded-full"
            :class="{ 'text-gray-200': !link.url, 'text-blue-600 hover:text-blue-900': link.url && !link.active , 'font-bold active text-white bg-blue-600': link.active }"
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
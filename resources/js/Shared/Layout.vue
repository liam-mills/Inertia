<template>
    <header class="bg-gray-100 p-8">
        <div class="flex justify-between items-center max-w-6xl mx-auto">
            <div class="flex items-center">
                <h1 class="font-bold text-lg">Inertia</h1>
                <p class="ml-6">{{ username }}</p>
            </div>
            <Nav />
        </div>
    </header>
    <main class="p-8">
        <div class="max-w-6xl mx-auto">
            <slot />
        </div>
    </main>
</template>

<script>
import Nav from './Nav';

export default {
    components: { Nav },

    computed: {
        username() {
            return this.$page.props.auth.user.username;
        }
    }
};
</script>
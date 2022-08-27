<template>
    <Head title="Create New User" />

    <h1 class="text-4xl font-bold mb-6">Create New User</h1>

    <form @submit.prevent="submit" class="space-y-6 max-w-md mx-auto">
        <div>
            <label for="name" class="block pb-2 font-bold text-xs text-gray-600">Name</label>
            <input v-model="form.name" type="text" name="name" id="name" class="border border-gray-200 p-2 w-full" required>
        </div>
        <div>
            <label for="email" class="block pb-2 font-bold text-xs text-gray-600">Email Address</label>
            <input v-model="form.email" type="email" email="email" id="email" class="border border-gray-200 p-2 w-full" required>
        </div>
        <div>
            <label for="password" class="block pb-2 font-bold text-xs text-gray-600">Password</label>
            <input v-model="form.password" type="password" password="password" id="password" class="border border-gray-200 p-2 w-full" required>
        </div>
        <div class="text-right">
            <button type="submit" class="bg-blue-600 hover:bg-blue-900 px-4 py-2 font-bold text-white">Create</button>
        </div>
    </form>
</template>

<script setup>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

let form = reactive({
    name: '',
    email: '',
    password: '',
})

let submit = () => {
    Inertia.post('/users', form);
}
</script>
<template>
    <Head title="Create New User" />

    <h1 class="text-4xl font-bold mb-6">Create New User</h1>

    <form @submit.prevent="submit" class="space-y-6 max-w-md mx-auto">
        <div>
            <div class="flex justify-between">
                <label for="name" class="block pb-2 font-bold text-xs text-gray-600">Name</label>
                <p v-if="form.errors.name" class="text-xs font-bold text-red-600">{{ form.errors.name }}</p>
            </div>
            <input v-model="form.name" type="text" name="name" id="name" class="border border-gray-200 p-2 w-full" :class="{ 'border-red-600': form.errors.name }" required>
        </div>
        <div>
            <div class="flex justify-between">
                <label for="email" class="block pb-2 font-bold text-xs text-gray-600">Email Address</label>
                <p v-if="form.errors.email" class="text-xs font-bold text-red-600">{{ form.errors.email }}</p>
            </div>
            <input v-model="form.email" type="email" email="email" id="email" class="border border-gray-200 p-2 w-full" :class="{ 'border-red-600': form.errors.email }" required>
        </div>
        <div>
            <div class="flex justify-between">
                <label for="password" class="block pb-2 font-bold text-xs text-gray-600">Password</label>
                <p v-if="form.errors.password" class="text-xs font-bold text-red-600">{{ form.errors.password }}</p>
            </div>
            <input v-model="form.password" type="password" password="password" id="password" class="border border-gray-200 p-2 w-full" :class="{ 'border-red-600': form.errors.password }" required>
        </div>
        <div class="text-right">
            <button type="submit" as="button" class="bg-blue-600 hover:bg-blue-900 px-4 py-2 font-bold text-white disabled:bg-gray-600" :disabled="form.processing" preserve-scroll>Create</button>
        </div>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3'

let form = useForm({
    name: '',
    email: '',
    password: '',
})

let submit = () => {
    form.post('/users');
}
</script>
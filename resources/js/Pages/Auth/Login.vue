<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit" class="sm:w-[500px] w-full h-screen sm:h-full flex items-center justify-center sm:block">
            <div>
                <div>
                    <InputLabel for="email" value="Email" />
    
                    <TextInput id="email" type="email"
                         v-model="form.email"
                        required autofocus autocomplete="username" />
    
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
    
                <div class="mt-4">
                    <InputLabel for="password" value="Password" />
    
                    <TextInput id="password" type="password" v-model="form.password" required
                        autocomplete="current-password" />
    
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>
    
                <div class="block mt-4">
                    <label class="flex items-center">
                        <Checkbox name="remember" v-model:checked="form.remember" />
                        <span class="ml-2 text-sm text-[hsl(0,0%,90%)]">Remember me</span>
                    </label>
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <Link v-if="canResetPassword" :href="route('register')"
                        class="underline text-sm text-[hsl(0,0%,80%)] hover:text-[hsl(0,0%,100%)] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    No account? Register here
                    </Link>
    
                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Log in
                    </PrimaryButton>
                </div>
            </div>
        </form>
    </GuestLayout>
</template>

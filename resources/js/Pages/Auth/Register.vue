<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';


const url = ref();

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    image: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};


const onFileChange = e => {
    const file = e.target.files[0];
    url.value = URL.createObjectURL(file);
    form.image = file;
}

</script>

<template>
    <GuestLayout>

        <Head title="Register" />
        <form @submit.prevent="submit"
            class="sm:w-[500px] w-sreen sm:min-h-full min-h-screen flex items-center justify-center sm:block ">
            <div>
                <div>
                    <InputLabel for="name" value="Name" />

                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus
                        autocomplete="name" />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div class="mt-4">
                    <InputLabel for="image" value="Profile picture" />
                    <div class="py-1 px-2 inline-block bg-blue-500 rounded my-2"
                        onclick="document.getElementById('getFile').click()">Select</div>
                    <input name="image" type='file' id="getFile" class="hidden" @change="onFileChange">
                    <img class="max-w-[100px] mt-2 rounded" placeholder="nani" accept="image/*" v-if="url" :src="url" />
                    <InputError class="mt-2" :message="form.errors.image" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Email" />

                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email"
                        autocomplete="username" />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password" />

                    <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password"
                        autocomplete="new-password" />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password_confirmation" value="Confirm Password" />

                    <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                        v-model="form.password_confirmation" autocomplete="new-password" />

                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link :href="route('login')"
                        class="underline text-sm text-[hsl(0,0%,80%)] hover:text-[hsl(0,0%,100%)] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Already registered?
                    </Link>

                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Register
                    </PrimaryButton>
                </div>
            </div>
        </form>
    </GuestLayout>
</template>

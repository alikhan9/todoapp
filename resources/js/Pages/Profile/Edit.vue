<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile" />
    <div class="lg:max-h-[80vh] max-h-[87vh] overflow-auto">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 sm:mt-2 lg:mt-0">
                <div class="p-4 sm:p-6 bg-[hsl(0,0%,15%)] text-white border-2 rounded-xl border-[hsl(0,0%,25%)]">
                    <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" class="max-w-xl" />
                </div>

                <div class="p-4 sm:p-8 bg-[hsl(0,0%,15%)] text-white border-2 rounded-xl border-[hsl(0,0%,25%)]">
                    <UpdatePasswordForm class="max-w-xl" />
                </div>

                <div class="p-4 sm:p-6 bg-[hsl(0,0%,15%)] text-white border-2 rounded-xl border-[hsl(0,0%,25%)]">
                    <DeleteUserForm class="max-w-xl" />
                </div>
            </div>
        </div>
    </div>
</template>

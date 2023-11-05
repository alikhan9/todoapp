<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="sm:bg-[hsl(0,0%,10%)] text-white h-screen w-screen absolute top-0 left-0 sm:flex justify-center items-center">

        <div class="bg-[hsl(0,0%,15%)] sm:border-2 sm:rounded-xl border-[hsl(0,0%,25%)] py-8 px-6">
            <slot />
        </div>
    </div>
</template>

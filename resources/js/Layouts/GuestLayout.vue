<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="bg-[hsl(0,0%,10%)] text-white h-screen w-screen fixed top-0 left-0 flex sm:justify-center items-center">

        <div class="bg-[hsl(0,0%,15%)] min-w-full sm:min-w-min sm:border-2 sm:rounded-xl border-[hsl(0,0%,25%)] py-8 px-6">
            <slot />
        </div>
    </div>
</template>

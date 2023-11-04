<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="bg-[hsl(0,0%,10%)] text-white h-screen w-screen absolute top-0 left-0 flex justify-center items-center">

        <div class="bg-[hsl(0,0%,15%)] border-2 rounded-xl border-[hsl(0,0%,25%)] py-8 px-6">
            <slot />
        </div>
    </div>
</template>

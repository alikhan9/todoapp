<script setup>
import { Link } from '@inertiajs/vue3';
import SvgIcon from '@jamescoyle/vue-icon';
import { mdiHome } from '@mdi/js';

defineProps({
    active: {
        type: Boolean,
        defualt: true
    },
    url: {
        type: String,
        default: ''
    },
    path: {
        type: String,
        default: mdiHome,
    },
    title: {
        type: String,
        default: 'Title',
    },
    method: {
        type: String,
        default: 'GET'
    },
    type: String

})

</script>

<template>
    <Link :href="url" :method="method" :data="{ type: type }" as="button" :class="{
        'px-6 py-3 transition flex items-center gap-4 text-white w-full hover:bg-[hsl(0,0%,18%)] hover:brightness-100': true,
        'border-r-4 border-green-500': active,
        'brightness-75': !active
    }">
    <svg-icon class="box sm:box" type="mdi" size="32" :path="path"></svg-icon>
    <svg-icon class="hidden sm:box" type="mdi" :path="path"></svg-icon>
    <div class="text-xl sm:text-base">{{ title }}</div>
    </Link>
</template>
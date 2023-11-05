<script setup>
import SvgIcon from '@jamescoyle/vue-icon';
import { mdiCog,mdiArrowCollapseLeft } from '@mdi/js';
import { Link } from '@inertiajs/vue3';

const emit = defineEmits(['closeUserDetails']);
defineProps({
    user: Object
})

const emitCloseUserDetails = () => {
    emit('closeUserDetails');
}

</script>

<template>
    <div class="w-[300px] absolute bg-white rounded-2xl top-52 text-black">
        <div class="flex gap-3 items-center pt-12 pl-6">
            <div class="w-14 h-14 rounded-[50%] overflow-hidden flex justify-center items-center">
                <img src="../../images/kabita-darlami-okiDQrCoTd4-unsplash.jpg" />
            </div>
            <div>
                <div class="truncate">{{ user.name }}</div>
                <div class="text-gray-700 brightness-75 italic">{{ user.email }}</div>
            </div>
        </div>
        <Link href="/profile" @click="emitCloseUserDetails" as="button" class="mb-2 py-2 mt-6 ml-3 pl-3 w-[250px] flex gap-4 hover:cursor-pointer hover:bg-blue-500 hover:text-white rounded-lg">
            <svg-icon type="mdi" :path="mdiCog"></svg-icon>
            <div>Manage account</div>
        </Link>
        <Link href="/logout" method="POST" as="button" class="mb-4 py-2 ml-3 pl-3 w-[250px] flex gap-4 hover:cursor-pointer hover:bg-red-500 hover:text-white rounded-lg">
            <svg-icon type="mdi" :path="mdiArrowCollapseLeft"></svg-icon>
            <div>Sign out</div>
        </Link>
    </div>
</template>


<style>
.pulse:hover {
    animation: pulseAnimation .5s ease-in;
}

@keyframes pulseAnimation {

    50% {
        transform: scale(1.01);
    }

    100% {
        transform: scale(1);
    }

}
</style>
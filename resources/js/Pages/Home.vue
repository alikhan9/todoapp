<script setup>
import SvgIcon from '@jamescoyle/vue-icon';
import NewTask from './NewTask.vue'
import { mdiPlus, mdiFileEdit, mdiDelete } from '@mdi/js';
import { ref } from 'vue';

defineProps({
    title: {
        type: String,
        default: 'All Tasks'
    }
})

const showCreateTasks = ref(false);

const toggleCreateTask = () => {
    showCreateTasks.value = !showCreateTasks.value;
}

</script>


<template>
    <NewTask v-if="showCreateTasks" @closeCreateTask="toggleCreateTask" />
    <div>
        <div class="flex justify-between">
            <div>
                <span class="text-3xl title-border">
                    {{ title }}
                </span>
            </div>
            <div class="rounded-full p-2 border-[hsl(0,0%,25%)] border-2 hover:border-[hsl(0,0%,35%)] hover:cursor-pointer transition-colors duration-200"
                @click="toggleCreateTask">
                <svg-icon class="animate-plus-button" size="28" type="mdi" :path="mdiPlus"></svg-icon>
            </div>
        </div>
        <div class="mt-6">
            <div class="rounded-xl border-[hsl(0,0%,25%)] bg-[hsl(0,0%,20%)] border-2 px-4 py-6 w-80 flex flex-col gap-4">
                <div class="text-xl">
                    Titre
                </div>
                <div class="h-[100px] line-clamp-4 text-justify">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, excepturi dolor sunt suscipit ducimus
                    magni ex quidem quas unde fuga omnis inventore modi dolore alias atque sed maxime vel labore!
                </div>
                <div>
                    13/08/2021
                </div>
                <div class="flex justify-between items-center">
                    <button class="px-3 py-1 bg-green-500 rounded-full">Completed</button>
                    <!-- <button class="px-3 py-1 bg-red-500 rounded-full">Incomplete</button> -->
                    <div class="flex gap-4">
                        <svg-icon type="mdi" class="hover:cursor-pointer" :path="mdiFileEdit"></svg-icon>
                        <svg-icon type="mdi" class="hover:cursor-pointer" :path="mdiDelete"></svg-icon>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>


<style>
.title-border {
    border-bottom: 4px solid;
    border-image: linear-gradient(to right, rgb(34 197 94) 50%, transparent 50%) 100% 1;
    padding-bottom: .25em;
}

.animate-plus-button {
    animation: heartbeat 1s linear infinite alternate;

}

@keyframes heartbeat {
    0% {
        transform: scale(1);
    }

    100% {
        transform: scale(0.75);
        filter: brightness(70%);
    }
}
</style>
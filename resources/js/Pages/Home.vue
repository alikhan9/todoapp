<script setup>
import SvgIcon from '@jamescoyle/vue-icon';
import NewTask from './NewTask.vue'
import EditTask from './EditTask.vue';
import Task from '@/Components/Task.vue';
import { mdiPlus } from '@mdi/js';
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    title: {
        type: String,
        default: 'All Tasks'
    },
    tasks: Object
})

const showCreateTask = ref(false);
const showEditTask = ref(false);
const selectedTask = ref(null);

const toggleCreateTask = () => {
    showCreateTask.value = !showCreateTask.value;
    if (showCreateTask.value) {
        document.getElementsByTagName('body')[0].style.maxHeight = "600px";
        document.getElementsByTagName('body')[0].style.overflow = "hidden";
    } else
        document.getElementsByTagName('body')[0].style.maxHeight = "none";
}

const toggleEditTask = task => {
    if (selectedTask.value != task)
        selectedTask.value = task;
    showEditTask.value = !showEditTask.value;
    if (showCreateTask.value) {
        document.getElementsByTagName('body')[0].style.maxHeight = "600px";
        document.getElementsByTagName('body')[0].style.overflow = "hidden";
    } else
        document.getElementsByTagName('body')[0].style.maxHeight = "none";
}

</script>


<template>
    <Head title="Tasks" />
    <Transition name="slide-from-top">
        <NewTask v-if="showCreateTask" @closeCreateTask="toggleCreateTask" />
    </Transition>
    <Transition name="pop">
        <EditTask v-if="showEditTask" @closeEditTask="toggleEditTask" :task="selectedTask" />
    </Transition>
    <div class="h-full">
        <div class="flex justify-between xl:pt-4 sm:pt-2">
            <div>
                <span class="sm:text-3xl text-xl title-border">
                    {{ title }}
                </span>
            </div>
            <div class="rounded-full p-2 hidden sm:block border-[hsl(0,0%,25%)] border-2 hover:border-[hsl(0,0%,35%)] hover:cursor-pointer transition-colors duration-200"
                @click="toggleCreateTask">
                <svg-icon class="animate-plus-button" size="28" type="mdi" :path="mdiPlus"></svg-icon>
            </div>
            <div class="rounded-full block sm:hidden p-2 border-[hsl(0,0%,25%)] border-2 hover:border-[hsl(0,0%,35%)] hover:cursor-pointer transition-colors duration-200"
                @click="toggleCreateTask">
                <svg-icon class="animate-plus-button" size="16" type="mdi" :path="mdiPlus"></svg-icon>
            </div>
        </div>
        <div
            class="mt-6 grid xl:grid-cols-3 2xl:grid-cols-4 lg:grid-cols-2 grid-cols-1 overflow-auto px-2 h-[79vh] gap-y-8 gap-x-4">
            <Task v-for="(task, index) in tasks" @showEditTask="toggleEditTask" :key="index" :task="task" />
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
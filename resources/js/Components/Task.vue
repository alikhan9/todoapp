<script setup>
import { mdiFileEdit, mdiDelete } from '@mdi/js';
import SvgIcon from '@jamescoyle/vue-icon';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    task: Object
})

const emit = defineEmits(['showEditTask']);


const toggleTask = () => {
    router.post(`/task/toggle/${props.task.id}`, {}, { only: ['tasks'] })
}

const deleteTask = () => {
    router.delete(`/task/delete/${props.task.id}`, {}, { only: ['tasks'] })
}

const emitShowCreateTask = () => {
    emit('showEditTask', props.task);
}

</script>

<template>
    <div class="rounded-xl border-[hsl(0,0%,25%)] bg-[hsl(0,0%,20%)] border-2 px-4 py-6 w-full flex flex-col gap-4">
        <div class="sm:text-xl text-lg">
            {{ task.title }}
        </div>
        <div class="h-[100px] line-clamp-4 text-justify text-sm sm:text-base">
            {{ task.description }} 
        </div>
        <div class="text-sm sm:text-base">
            {{ task.date }}
        </div>
        <div class="flex justify-between items-center text-sm sm:text-base">
            <button @click="toggleTask" v-if="task.completed" class="px-3 py-1 bg-green-500 rounded-full">Completed</button>
            <button @click="toggleTask" v-else class="px-3 py-1 bg-red-500 rounded-full">Incomplete</button>
            <div class="flex gap-4">
                <svg-icon @click="emitShowCreateTask" type="mdi" class="hover:cursor-pointer"
                    :path="mdiFileEdit"></svg-icon>
                <svg-icon @click="deleteTask" type="mdi" class="hover:cursor-pointer" :path="mdiDelete"></svg-icon>
            </div>
        </div>
    </div>
</template>
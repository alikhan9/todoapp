<script setup>
import { ref } from 'vue';
import { onClickOutside } from '@vueuse/core'

const emit = defineEmits(['closeCreateTask']);
const target = ref(null)
const title = ref('');
const description = ref('');


onClickOutside(target, (event) => emitCloseCreateTask())


const emitCloseCreateTask = () => {
    emit('closeCreateTask');
}

</script>

<template>
    <div
        class="absolute w-screen h-screen top-0 left-0 flex justify-center items-center backdrop-blur-sm backdrop-brightness-75 z-50">
        <div class="pt-12 pb-8 px-6 flex flex-col gap-4 w-[500px] rounded-xl bg-[hsl(0,0%,15%)]" ref="target">
            <div class="text-2xl">Create a Task</div>
            <div>Title</div>
            <input v-model="title" placeholder="Drink water"
                class="bg-[hsl(0,0%,10%)] px-4 py-2 mb-2 focus:outline-none  rounded-md w-full" type="text">
            <div>Description</div>
            <textarea v-model="description" placeholder="2L per day"
                class="bg-[hsl(0,0%,10%)] min-h-[150px] max-h-[300px] overflow-auto px-4 py-2 mb-2 focus:outline-none  rounded-md w-full"
                type="text" />
            <div>Date</div>
            <input class="bg-[hsl(0,0%,10%)] px-4 py-2 mb-2 focus:outline-none  rounded-md w-full" type="date">
            <div class="flex justify-between pr-4">
                <div>Toggle Completed</div>
                <input type="checkbox">
            </div>
            <div class="flex justify-between pr-4">
                <div>Toggle Important</div>
                <input type="checkbox">
            </div>
            <div class="flex gap-8 mt-4">
                <button @click="emitCloseCreateTask"
                    class="bg-red-500 hover:cursor-pointer hover:bg-red-700 transition px-6 py-2 rounded-md w-full">Cancel</button>
                <button
                    class="bg-blue-500 hover:cursor-pointer hover:bg-blue-700 transition px-6 py-2 rounded-md w-full">Submit</button>
            </div>
        </div>
    </div></template>



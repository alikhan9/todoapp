<script setup>
import { ref } from 'vue';
import { onClickOutside } from '@vueuse/core'
import { useForm } from '@inertiajs/vue3';

const emit = defineEmits(['closeCreateTask']);
const target = ref(null)

const form = useForm({
    title: '',
    description: '',
    date: '',
    completed: false,
    important: false,
});


const submit = () => {
    form.post('/task/create', {
        onSuccess: () => emitCloseCreateTask(),
    });
};

onClickOutside(target, (event) => emitCloseCreateTask())


const emitCloseCreateTask = () => {
    emit('closeCreateTask');
}

</script>

<template>
    <div
        class="absolute w-screen h-screen top-0 left-0 lg:flex justify-center overflow-auto items-center lg:backdrop-blur-lg lg:backdrop-brightness-75 z-50">
        <div class="pt-12 pb-8 px-6 flex flex-col gap-4 md:max-h-[80vh] w-full lg:min-h-0 min-h-full lg:w-[500px] lg:rounded-xl bg-[hsl(0,0%,15%)]" ref="target">
            <div class="text-2xl">Create a Task</div>
            <div>Title</div>
            <input v-model="form.title" placeholder="Drink water"
                class="bg-[hsl(0,0%,10%)] px-4 py-2 mb-2 focus:outline-none  rounded-md w-full" type="text">
            <div>Description</div>
            <textarea v-model="form.description" placeholder="2L per day"
                class="bg-[hsl(0,0%,10%)] min-h-[150px] max-h-[300px] overflow-auto px-4 py-2 mb-2 focus:outline-none  rounded-md w-full"
                type="text" />
            <div>Date</div>
            <input v-model="form.date" class="bg-[hsl(0,0%,10%)] px-4 py-2 mb-2 focus:outline-none  rounded-md w-full" type="date">
            <div class="flex justify-between pr-4">
                <div>Toggle Completed</div>
                <input v-model="form.completed" type="checkbox">
            </div>
            <div class="flex justify-between pr-4">
                <div>Toggle Important</div>
                <input v-model="form.important" type="checkbox">
            </div>
            <div class="flex gap-8 mt-4">
                <button @click="emitCloseCreateTask"
                    class="bg-red-500 hover:cursor-pointer hover:bg-red-700 transition px-6 py-2 rounded-md w-full">Cancel</button>
                <button @click="submit"
                    class="bg-blue-500 hover:cursor-pointer hover:bg-blue-700 transition px-6 py-2 rounded-md w-full">Submit</button>
            </div>
        </div>
    </div>
</template>



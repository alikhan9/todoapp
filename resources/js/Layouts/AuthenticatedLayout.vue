<script setup>
import MenuItem from '../Components/MenuItem.vue';
import { mdiPlaylistStar, mdiCheckDecagramOutline, mdiCalendarClockOutline, mdiArrowCollapseLeft } from '@mdi/js';
import { usePage } from '@inertiajs/vue3'
import { computed, ref } from 'vue';
import UserDetails from '@/Components/UserDetails.vue';
import { onClickOutside } from '@vueuse/core'



const page = usePage()
const showUserDetails = ref(false);
const user = computed(() => page.props.auth.user)
const active = computed(() => page.props.active)
const target = ref();
const toggleUserDetails = () => {
    showUserDetails.value = !showUserDetails.value;
}

onClickOutside(target, (event) => toggleUserDetails())

</script>


<template>
    <div class="flex gap-4 bg-[hsl(0,0%,10%)] text-white min-h-screen p-12">
        <div class="bg-[hsl(0,0%,15%)] border-2 rounded-xl border-[hsl(0,0%,25%)] flex flex-col justify-between w-[250px]">
            <div class="py-8 px-3">
                <div class="flex gap-3 relative items-center hover:cursor-pointer rounded-lg px-6 py-4 hover:scale-[1.02] transition
                 hover:bg-[hsl(0,0%,10%)]"
                    @click="toggleUserDetails">
                    <div class="w-20 h-20 rounded-[50%] overflow-hidden flex justify-center items-center">
                        <img src="../../images/kabita-darlami-okiDQrCoTd4-unsplash.jpg" />
                    </div>
                    <div class="truncate max-w-[80px]">{{ user.name }}</div>
                </div>
                <UserDetails ref="target" v-if="showUserDetails" @closeUserDetails="toggleUserDetails" :user="user" />

            </div>
            <div>
                <MenuItem title="All Tasks" url="/" type="all" :active="active == 'all'" />
                <MenuItem :path="mdiPlaylistStar" title="Important" url="/" method="GET" type="important"
                    :active="active == 'important'" />
                <MenuItem :path="mdiCheckDecagramOutline" title="Completed" type="completed"
                    :active="active == 'completed'" />
                <MenuItem :path="mdiCalendarClockOutline" title="Do it today" type="toDoNow"
                    :active="active == 'toDoNow'" />
            </div>
            <div>
                <MenuItem class="rounded-b-xl" method="POST" url="/logout" :path="mdiArrowCollapseLeft" title="SIGN OUT" />
            </div>
        </div>

        <div class="bg-[hsl(0,0%,15%)] border-2 rounded-xl border-[hsl(0,0%,25%)] py-12 px-6 w-full">
            <slot />
        </div>
    </div>
</template>
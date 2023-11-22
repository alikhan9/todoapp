<script setup>
import MenuItem from '../Components/MenuItem.vue';
import SvgIcon from '@jamescoyle/vue-icon';
import { mdiPlaylistStar, mdiCheckDecagramOutline, mdiCalendarClockOutline, mdiArrowCollapseLeft, mdiMenu, mdiCog } from '@mdi/js';
import { usePage, router } from '@inertiajs/vue3'
import { computed, ref, onMounted } from 'vue';
import UserDetails from '@/Components/UserDetails.vue';
import { onClickOutside } from '@vueuse/core'
import axios from 'axios';



const page = usePage()
const showUserDetails = ref(false);
const showMobileMenu = ref(false);
const user = computed(() => page.props.auth.user)
const active = computed(() => page.props.active)
const target = ref();

const toggleUserDetails = () => {
    showUserDetails.value = !showUserDetails.value;
}

const toggleMobileMenu = () => {
    showMobileMenu.value = !showMobileMenu.value;
}

onClickOutside(target, (event) => toggleUserDetails())

</script>


<template>
    <div class="sm:flex gap-4 bg-[hsl(0,0%,15%)] sm:bg-[hsl(0,0%,10%)] text-white min-h-screen sm:p-12">

        <div
            class="bg-[hsl(0,0%,15%)] border-2 rounded-xl border-[hsl(0,0%,25%)] flex-col justify-between w-[250px] hidden sm:flex sm:fixed h-[90vh]">
            <div class="py-8 px-3">
                <div class="flex gap-3 relative items-center hover:cursor-pointer rounded-lg px-6 py-4 hover:scale-[1.02] transition
                     hover:bg-[hsl(0,0%,10%)]" @click="toggleUserDetails">
                    <div class="w-20 h-20 rounded-[50%] overflow-hidden flex justify-center items-center">
                        <img :src="user.image" />
                    </div>
                    <div class="truncate max-w-[80px]">{{ user.name }} </div>
                </div>
                <UserDetails class="z-30" ref="target" v-if="showUserDetails" @closeUserDetails="toggleUserDetails"
                    :user="user" />

            </div>
            <div>
                <MenuItem title="All Tasks" url="/" :active="active == 'all'" />
                <MenuItem :path="mdiPlaylistStar" title="Important" url="/" method="GET" type="important"
                    :active="active == 'important'" />
                <MenuItem url="/" :path="mdiCheckDecagramOutline" title="Completed" type="completed"
                    :active="active == 'completed'" />
                <MenuItem url="/" :path="mdiCalendarClockOutline" title="Do it today" type="toDoNow"
                    :active="active == 'toDoNow'" />
            </div>
            <div>
                <MenuItem class="rounded-b-xl" method="POST" url="/logout" :path="mdiArrowCollapseLeft" title="SIGN OUT" />
            </div>
        </div>

        <div class="sm:hidden mb-4 mr-6">
            <div class="flex justify-between items-center">
                <div class="flex gap-3 relative items-center  rounded-lg px-6 py-4" @click="toggleUserDetails">
                    <div class="w-14 h-14 rounded-[50%] overflow-hidden flex justify-center items-center">
                        <img :src="user.image" />
                    </div>
                    <div class="truncate max-w-[80px]">{{ user.name }}</div>
                </div>
                <svg-icon @click="toggleMobileMenu" class="" type="mdi" size="32" :path="mdiMenu"></svg-icon>
            </div>
        </div>

        <div v-if="showMobileMenu" class="sm:hidden absolute h-screen w-screen z-50 bg-[hsl(0,0%,15%)]">
            <MenuItem @click="toggleMobileMenu" title="All Tasks" url="/" :active="active == 'all'" />
            <MenuItem @click="toggleMobileMenu" :path="mdiPlaylistStar" title="Important" url="/" method="GET"
                type="important" :active="active == 'important'" />
            <MenuItem url="/" @click="toggleMobileMenu" :path="mdiCheckDecagramOutline" title="Completed" type="completed"
                :active="active == 'completed'" />
            <MenuItem url="/" @click="toggleMobileMenu" :path="mdiCalendarClockOutline" title="Do it today" type="toDoNow"
                :active="active == 'toDoNow'" />
            <MenuItem @click="toggleMobileMenu" url="/profile" :path="mdiCog" title="Manage account"
                :active="active == 'manage'" />
            <MenuItem @click="toggleMobileMenu" class="rounded-b-xl" method="POST" url="/logout"
                :path="mdiArrowCollapseLeft" title="SIGN OUT" />
        </div>

        <div
            class="bg-[hsl(0,0%,15%)] sm:border-2 overflow-hidden sm:rounded-xl sm:border-[hsl(0,0%,25%)] lg:h-[90vh] sm:ml-[270px] w-full px-6">
            <slot />
        </div>
    </div>
</template>
<script setup>
import MenuItem from '../Components/MenuItem.vue';
import { mdiPlaylistStar, mdiCheckDecagramOutline, mdiCalendarClockOutline, mdiArrowCollapseLeft } from '@mdi/js';

</script>


<template>
    <div class="flex gap-4 bg-[hsl(0,0%,10%)] text-white min-h-screen p-12">
        <div class="bg-[hsl(0,0%,15%)] border-2 rounded-xl border-[hsl(0,0%,25%)] flex flex-col justify-between w-[250px]">
            <div class="flex gap-3 items-center py-12 pl-6">
                <div class="w-20 h-20 rounded-[50%] overflow-hidden flex justify-center items-center">
                    <img src="../../images/kabita-darlami-okiDQrCoTd4-unsplash.jpg" />
                </div>
                <div class="truncate max-w-[80px]">Goerge51zdzdzdzadazdazd</div>
            </div>
            <div>
                <MenuItem title="All Tasks" />
                <MenuItem :path="mdiPlaylistStar" title="Important" :active="true"/>
                <MenuItem :path="mdiCheckDecagramOutline" title="Completed" />
                <MenuItem :path="mdiCalendarClockOutline" title="Do it now" />
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
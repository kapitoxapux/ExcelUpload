<script setup>
import { Link }  from '@inertiajs/vue3';

defineProps({
    data: {
        type: Object,
        default: () => ({}),
    },
});
</script>


<template>
    <div v-if="data.links.length > 10" class="flex justify-center mt-4 space-x-4">
        <Link
            v-for="(link, k) in data.links"
            :key="k"
            class="px-4 py-3 text-sm leading-4 bg-black rounded hover:bg-black focus:text-indigo-500 hover:shadow"
            :class="{'bg-indigo-400 text-black': link.active}"
            :href="link.url"
            v-html="link.label"
        />
    </div>
</template>

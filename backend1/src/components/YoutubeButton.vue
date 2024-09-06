<template>
    <a :href="href" target="_blank"
        class="px-3 py-2 rounded border-2 border-red-600 text-white bg-red-500 hover:bg-red-600 transition-colors">
        <slot></slot>
    </a>
</template>

<script setup>
import {defineProps} from 'vue'
const props = defineProps({
    href : String
})
</script>
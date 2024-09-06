<template>
    <div  class="bg-white shadow rounded-xl">
        <router-link :to="{ name: 'MealDetail', params: { id: meal.idMeal } }">
            <img :src="meal.strMealThumb" :alt="meal.strMeal" class="rounded-t-2xl object-cover w-full h-48">
        </router-link>
        <div class="p-3">
            <h3 class="font-bold">{{ meal.strMeal }}</h3>
            <p class="mb-4"></p>
            <div class="flex items-center justify-between">
                <YoutubeButton :href="meal.strYoutube">Youtube</YoutubeButton>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue'
import YoutubeButton from '@/components/YoutubeButton.vue'

const {meal} = defineProps({
    meal: {
        type: Object,
        required: true
    }
})
</script>
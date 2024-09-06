<template>
    <div class="max-w-[800px] mx-auto p-8">
        <h1 class="text-5xl font-bold mb-5">{{ meal.strMeal }}</h1>
        <img :src="meal.strMealThumb" :alt="meal.strMeal" class="max-w-[100%]">
        <div class="grid grid-cols-1 sm:grid-cols-3 text-lg py-2">
            <div>
                <strong class="font-bold">Category: </strong>{{ meal.strCategory }}
            </div>
            <div>
                <strong class="font-bold">Area: </strong> {{ meal.strArea }}
            </div>
            <div>
                <strong class="font-bold">Tags: </strong> {{ meal.strTags }}
            </div>
        </div>

        <div class="my-3">
            {{ meal.strInstructions }}
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2">
            <div>
                <h2 class=" text-2xl font-semibold mb-2">Ingredients</h2>
                <ul>
                    <template v-for="(el, i) of new Array(20)">
                        <li v-if="meal[`strIngredient${i + 1}`]">{{ i+1 }} . {{ meal[`strIngredient${i+1}`] }}</li>
                    </template>
                </ul>
            </div>
            <div>
                <h2 class=" text-2xl font-semibold mb-2">Measure</h2>
                <ul>
                    <template v-for="(el, i) of new Array(20)">
                        <li v-if="meal[`strMeasure${i + 1}`]">{{ i+1 }} . {{ meal[`strMeasure${i+1}`] }}</li>
                    </template>
                </ul>
            </div>
            <div class="mt-4">
                <YoutubeButton :href="meal.strYoutube">
                    Go Youtube
                </YoutubeButton>
                <a :href="meal.strSoure" target="_blank"
                    class="ml-3 px-3 py-2 rounded border-2 border-transparent text-indigo-600 hover:text-white hover:bg-indigo-600 transition-colors">
                    View Original Source
                </a>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router' 
import baseAxios from '@/axios'
import YoutubeButton from '@/components/YoutubeButton.vue'

const meal = ref({})
const route = useRoute();
onMounted(() => {
    baseAxios.get(`lookup.php?i=${route.params.id}`)
    .then((data) => {
        meal.value = data.data.meals[0] || {}
    }) 

})

</script>
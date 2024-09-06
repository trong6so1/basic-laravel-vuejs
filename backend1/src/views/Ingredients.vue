<template>
  <div class="p-8">
    <h1 class="text-4xl font-bold mb-4">Ingredients</h1>
    <input  v-model="keyword" type="text" class="mb-3 rounded bg-white border-2 border-gray-200 w-full"
      placeholder="Search for ingredient" />
    <router-link :to="{ name: 'ByIngredient', params: { ingredient: ingredient.strIngredient } }"
      v-for="ingredient of computedIngredients" :key="ingredient.idIngredient" class="block bg-white rounded p-3 mb-3 shadow">
      <h3 class="text-2xl font-bold mb-2">{{ ingredient.strIngredient }}</h3>
      <p>{{ ingredient.strDescription }}</p>
    </router-link>
  </div>
</template>

<script setup>
import store from '@/stores';
import { ref, onMounted, watch } from 'vue';
import { useRoute } from 'vue-router';
import { computed } from '@vue/reactivity';
import MealItem from '@/components/MealItem.vue'
import baseAxios from '@/axios'

const ingredients = ref([]);
const keyword = ref('');
const computedIngredients = computed(() => {
  if(!computedIngredients) return ingredients;
  return ingredients.value.filter((i) => 
  i.strIngredient.toLowerCase().includes(keyword.value.toLowerCase()));
})
onMounted(() => {
  baseAxios.get('list.php?i=list')
    .then((data) => {
      ingredients.value = data.data.meals
    });
})
</script>
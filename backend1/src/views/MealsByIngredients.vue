<template>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-5 p-8">
    <MealItem v-for="meal of meals" :key="meal.idMeal" :meal="meal" />
  </div>
</template>

<script setup>
import store from '@/stores';
import { ref, onMounted, watch } from 'vue';
import { useRoute } from 'vue-router';
import { computed } from '@vue/reactivity';
import MealItem from '@/components/MealItem.vue'

const meals = computed(() => store.state.mealByIngredient);
const route = useRoute();

watch(route, () => {
  store.dispatch('searchMealsByIngredient', route.params.ingredient)
})

onMounted(() => {
  store.dispatch('searchMealsByIngredient', route.params.ingredient)
})
</script>
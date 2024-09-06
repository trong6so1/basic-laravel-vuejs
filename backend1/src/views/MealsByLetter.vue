<template>
  <div>
    <div class="flex justify-center gap-2 mt-2">
      <router-link :to="{ name: 'ByLetter', params: { letter } }" v-for="letter of letters.split('')">
        {{ letter }}
      </router-link>
    </div>
  </div>


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

const letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
const meals = computed(() => store.state.mealByLetter);
const route = useRoute();

watch(route, () => {
  store.dispatch('searchMealsByLetter', route.params.letter)
})

onMounted(() => {
  store.dispatch('searchMealsByLetter', route.params.letter)
})
</script>
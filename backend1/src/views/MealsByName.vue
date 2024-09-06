<template>
    <div class="p-8 pb-0">
        <input @change="searchMeals" v-model="keyword" type="text"
            class="rounded bg-white border-2 border-gray-200 w-full" placeholder="Search for meals" />
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 p-8">
        <MealItem v-for="meal of meals" :key="meal.idMeal" :meal="meal" />
    </div>
</template>

<script setup>
import store from '@/stores';
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router'
import { computed } from '@vue/reactivity';
import MealItem from '@/components/MealItem.vue'
const route = useRoute();
const keyword = ref('');
const meals = computed(() => store.state.searchedMeals);
function searchMeals() {
    if (keyword.value) {
        store.dispatch('searchMeals', keyword.value)

    }
    else {
        store.commit('setSearchedMeals', [])
    }

}

onMounted(() => {
    keyword.value = route.params.name;
    if (keyword.value) {
        searchMeals();
    }
})
</script>

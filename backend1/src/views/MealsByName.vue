<template>
    <div class="p-8">
        <input @change="searchMeals" v-model="keyword" type="text" class="rounded border-2 border-gray-200 w-full"
            placeholder="Search for meals" />

            <pre>{{meals}}</pre>
    </div>
</template>

<script>
import store from '@/stores';
import {
  computed,
        ref
    } from 'vue';

    export default {

        setup() {
            const keyword = ref('');
            const meals = computed(() => store.state.searchedMeals);
            const searchMeals = () => {
              console.log(store)
              store.dispatch('searchMeals', keyword.value)
            }
            return {
                keyword,
                meals,
                searchMeals
            }
        }
    }
</script>

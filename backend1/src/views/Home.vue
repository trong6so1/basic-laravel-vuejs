<template>
    <div class="flex p-8 flex-col">
        <input type="text" class="rounded border-2 border-gray-200 w-full" placeholder="Search for meals" />
        <div class="flex justify-center gap-2 mt-2">
            <router-link :to="{name: 'ByLetter', params: {letter} }" v-for="letter of letters.split('')">
                {{ letter }}
            </router-link>
        </div>
    </div>
</template>
<script>
import baseAxios from "@/axios/index.js"
import store from '@/stores';
    import { onMounted, ref } from 'vue';
    export default {
        setup() {
            const letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            const ingredients = ref([]);

            onMounted(async () => {
              const response = await baseAxios.get('list.php?i=list');
              ingredients.value = response.data.meals
            })
            return {
                letters,
                ingredients
            }
        },
    }
</script>

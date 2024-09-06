<template>
    <div class="flex p-8 flex-col">
        <input type="text" class="rounded border-2 border-gray-200 w-full" placeholder="Search for meals" />
    </div>
</template>
<script>
import baseAxios from "@/axios/index.js"
import store from '@/stores';
    import { onMounted, ref } from 'vue';
    export default {
        setup() {
            const ingredients = ref([]);

            onMounted(async () => {
              const response = await baseAxios.get('list.php?i=list');
              ingredients.value = response.data.meals
            })
            return {
                ingredients
            }
        },
    }
</script>

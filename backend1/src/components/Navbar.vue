<template>
  <header class="bg-white shadow h-16 flex justify-between items-stretch">
    <router-link :to="{name: 'Home'}" class="inline-flex items-center h-full px-5">
      Home
    </router-link>
    <div class="flex items-center gap-1">
      <router-link :to="{name: 'ByName'}" class="px-2 inline-flex items-center h-full hover:bg-purple-100">
        Search Meals
      </router-link>
      <router-link :to="{name: 'ByLetter'}" class="px-2 inline-flex items-center h-full hover:bg-purple-100">
        Meals By Letter
      </router-link>
      <router-link :to="{name: 'ByIngredients'}" class="px-2 inline-flex items-center h-full hover:bg-purple-100">
        Meal By Ingredients
      </router-link>
    </div>
  </header>
</template>
import baseAxios from "@/axios";


export function searchMeals({ commit }, keyword) {
  baseAxios.get(`search.php?s=${keyword}`)
    .then(({ data }) => {
      commit('setSearchedMeals', data.meals)
    })
}
export function searchMealsByLetter({ commit }, letter) {
  baseAxios.get(`/search.php?f=${letter}`)
    .then(({ data }) => {
      commit('setMealByLetter', data.meals)
    })
}
export function searchMealsByIngredient({ commit }, ingredient) {
  baseAxios.get(`filter.php?i=${ingredient}`)
    .then(({ data }) => {
      commit('setMealByIngredient', data.meals)
    })
}


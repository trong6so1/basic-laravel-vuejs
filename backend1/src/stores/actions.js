import baseAxios from "@/axios";


export function searchMeals({commit},keyword)
{ 
  baseAxios.get(`search.php?s=${keyword.value}`)
            .then((data) => {
              debugger;
              commit('setSearchedMeals', data)
            })
}
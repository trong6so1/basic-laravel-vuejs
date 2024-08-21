<template>
  <h1>Day la trang quan ly user</h1>
</template>
<script>
import { useMenu } from "@/stores/menu.js";
import { ref } from "vue";
export default {
  setup() {
    useMenu().onSelectedKeys(["users"]);
    const users = ref([]);
    users.value = this.getUsers();
  },
  methods: {
    getUsers() {
      axios
        .get("http://localhost:8000/api/users/index")
        .then((response) => {
          console.log(response.data);
          return 1;
        })
        .catch((error) => {
          return error;
        });
    },
  },
};
</script>

<template>
  <h1>Day la trang quan ly user</h1>
</template>
<script>
import { useMenu } from "@/stores/menu.js";
import { ref } from "vue";
export default {
  setup() {
    const users = ref([]);

    const getUsers = async () => {
      try {
        const response = await axios.get("http://localhost:8000/api/users/index");
        users.value = response.data;
      } catch (error) {
        console.error("Error fetching users:", error);
        // Có thể xử lý lỗi tại đây
      }
    };

    // Gọi hàm getUsers khi component được mount
    onMounted(() => {
      getUsers();
    });

    // Trả về các biến và hàm để sử dụng trong template
    return {
      users,
    };
};
</script>

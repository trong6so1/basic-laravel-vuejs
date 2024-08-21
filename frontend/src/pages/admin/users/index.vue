<template>
  <h1>Day la trang quan ly user</h1>
</template>
<script>
import { useMenu } from "@/stores/menu.js";

export default {
  setup() {
    useMenu().onSelectedKeys(["users"]);
  },
};
</script>

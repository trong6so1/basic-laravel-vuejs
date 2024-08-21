<template>
  <h1>Day la trang quan ly roles</h1>
</template>
<script>
import { useMenu } from "@/stores/menu.js";

export default {
  setup() {
    useMenu().onSelectedKeys(["roles"]);
  },
};
</script>

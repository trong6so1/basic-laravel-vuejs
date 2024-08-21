<template>
  <a-menu v-model:openKeys="openKeys" v-model:selectedKeys="selectedKeys" mode="inline">
    <a-menu-item v-for="item in items" :key="item.key">
      <router-link :to="{ name: item.name }">
        <div class="custom-menu-item">
          <span><i :class="item.icon" class="me-3"></i>{{ item.label }}</span>
        </div>
      </router-link>
    </a-menu-item>
  </a-menu>
</template>

<script setup>
import { reactive } from "vue";
import { useMenu } from "@/stores/menu.js";
import { storeToRefs } from "pinia";

const store = useMenu();
const { selectedKeys, openKeys } = storeToRefs(store);
const items = reactive([
  {
    key: "users",
    label: "Users",
    name: "adminUsers",
    path: "/admin/users",
    icon: "fa-solid fa-user",
  },
  {
    key: "roles",
    label: "Roles",
    name: "adminRoles",
    path: "/admin/roles",
    icon: "fa-solid fa-tag",
  },
  {
    key: "settings",
    name: "adminSettings",
    label: "Settings",
    path: "/admin/settings",
    icon: "fa-solid fa-gear",
  },
]);
</script>

<template>
  <div class="container-fluid">
    <div class="row header text-white">
      <div class="col-1 d-flex d-sm-none align-items-center justify-content-center">
        <span @click="showSideBar()">
          <i class="fa-solid fa-bars"></i>
        </span>
      </div>
      <div
        class="col-10 col-sm-9 d-flex align-items-center justify-content-center justify-content-sm-start"
      >
        <img
          src="../assets/logo.svg"
          alt="logo"
          height="32"
          width="34"
          class="ms-3 me-3"
        />
        <span class="d-none d-sm-flex">Dashboard</span>
      </div>
      <div class="col-sm-3 d-none d-sm-flex align-items-center justify-content-sm-end">
        Admin
      </div>
      <div class="col-1 d-flex d-sm-none align-items-center justify-content-center">
        <span @click="showUser()">
          <i class="fa-solid fa-user"></i>
        </span>
      </div>
    </div>
  </div>

  <a-drawer v-model:open="isShowSideBar" title="Side Bar" placement="left">
    <TheMenu />
  </a-drawer>

  <a-drawer v-model:open="isShowUser" title="Admin" placement="right">
    <p>Some contents...</p>
    <p>Some contents...</p>
    <p>Some contents...</p>
  </a-drawer>
</template>

<script setup>
import { ref } from "vue";

const isShowSideBar = ref(false);
const isShowUser = ref(false);
const showSideBar = () => {
  isShowSideBar.value = true;
};
const showUser = () => {
  isShowUser.value = true;
};
</script>

<script>
import TheMenu from "@/components/TheMenu.vue";

export default {
  components: {
    TheMenu,
  },
};
</script>
<style scoped>
.header {
  background-color: #0c713d;
  padding: 1rem;
}
</style>

<template>
  <TheHeader />
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 d-none d-sm-flex">
        <a-list bordered class="w-100">
          <TheMenu />
          <template #header>
            <div>Bảng Điều Khiển</div>
          </template>
        </a-list>
      </div>
      <div class="col-sm-9 col-12">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
import TheHeader from "@/components/TheHeader.vue";
import TheMenu from "@/components/TheMenu.vue";
export default {
  components: {
    TheHeader,
    TheMenu,
  },
};
</script>

<template>
    <div>
        <h1>Day laà crate uúủe</h1>
    </div>
</template>
<script>
import { useMenu } from '@/stores/menu';

export default {
    name: "adminUsersCreate",
    setup(){
        useMenu().onSelectedKeys(["users"]);
    }
}
</script>
<template>
    <a-card title="Tài Khoản" style="width: 100%">
        <div class="row">
            <div class="col-12 d-flex justify-content-end mb-3">
                <a-button type="primary">
                    <router-link :to="{name: 'adminUsersCreate'}">
                        <i class="fa-solid fa-plus"></i>
                    </router-link>
                </a-button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a-table :dataSource="users" :columns="columns" :scroll="{ x: 576 }">
                    <template #bodyCell="{ column, index, record }">
                        <template v-if="column.key == 'index'">
                            <span>{{ index + 1 }}</span>
                        </template>
                        <template v-if="column.key == 'status'">
                            <span
                                :class="record.status_id == 2 ? 'text-danger' : 'text-primary'">{{ record . status . name }}</span>
                        </template>
                    </template>
                </a-table>
            </div>
        </div>
    </a-card>
</template>
<script>
    import {
        useMenu
    } from "@/stores/menu.js";
    import {
        ref,
        onMounted
    } from "vue";
    export default {
        setup() {
            useMenu().onSelectedKeys(["users"]);
            const users = ref([]);
            const columns = [{
                    title: "#",
                    key: "index",
                },
                {
                    title: "Avatar",
                    dataIndex: "avatar",
                    key: "avatar",
                },
                {
                    title: "Tài Khoản",
                    dataIndex: "username",
                    key: "username",
                },
                {
                    title: "Họ Tên",
                    dataIndex: "name",
                    key: "name",
                },
                {
                    title: "Phòng Ban",
                    dataIndex: ["department", "name"],
                    key: "departments",
                    responsive: ["sm"]
                },
                {
                    title: "Vai Trò",
                    dataIndex: "address",
                    key: "address",
                    responsive: ["sm"]
                },
                {
                    title: "Tình Trạng",
                    dataIndex: ["status", "name"],
                    key: "status",
                },
                {
                    title: "Công Cụ",
                    dataIndex: "",
                    key: "actions",
                    fixed: "right"
                },
            ];
            const getUsers = () => {
                axios
                    .get("http://localhost:8000/api/users/index")
                    .then((response) => {
                        users.value = response.data.data;
                        console.log(users.value)
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            }

            onMounted(() => {
                getUsers(); // Call the function to fetch users
            });

            return {
                users,
                columns
            };
        },
    };
</script>

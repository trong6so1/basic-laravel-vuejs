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
                        <template v-if="column.key == 'actions'">
                            <router-link :to="{name:'adminUsersEdit', params: {id: record.id} }">
                                <a-button type="primary" class="me-sm-2 mb-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a-button>
                            </router-link>

                            <a-button type="primary" danger @click="deleteUser(record.id)">
                                <i class="fa-solid fa-trash"></i>
                            </a-button>

                            <a-modal v-model:open="open" title="Are You Sure" @ok="handleOk(record.id)"></a-modal>
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
import axios from "axios";
    import {
        ref,
        onMounted
    } from "vue";
    import { message } from "ant-design-vue";
    export default {
        setup() {
            useMenu().onSelectedKeys(["users"]);
            const users = ref([]);
            const open = ref(false);
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
            const deleteUser = () => {
                open.value = true;
                // alert(id);
            }
            const handleOk = (id) => {
                axios.delete(`http://127.0.0.1:8000/api/users/delete/${id}`)
                .then((response) => {
                    if(response.status == 200){
                        open.value = false;
                        message.success('Delete Success', 10);
                        getUsers();
                    }
                })
            }
            onMounted(() => {
                getUsers(); // Call the function to fetch users
            });

            return {
                users,
                columns,
                deleteUser,
                open,
                handleOk
            };
        },
    };
</script>

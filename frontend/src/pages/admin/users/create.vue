<template>
    <form @submit.prevent="createUser()">
        <a-card title="Tạo mới tài khoản" style="width: 100%">
            <div class="row mb-3">
                <div class="col-12 col-sm-4 ">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center mb-3">
                            <a-avatar shape="square" :size="200">
                                <template #icon>
                                    <img src="@/assets/images/avatar.jpg" alt="avatar">
                                </template>
                            </a-avatar>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <a-button type="primary">
                                <i class="fa-solid fa-plus me-3"></i>
                                Chọn ảnh
                            </a-button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-8">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-sm-end text-start">
                            <span class="text-danger me-1">*</span>
                            <label :class="{ 'text-danger': errors.status_id }">Tình Trạng:</label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-select v-model:value="users.status_id" show-search placeholder="Tình Trạng"
                                :options="listStatus" style="width: 100%;" :class="{ 'errors': errors.status_id }"
                                :filter-option="filterOption" allow-clear></a-select>
                            <div class="w-100"></div>
                            <small class="text-danger"
                                v-if="errors.status_id">{{ errors . status_id . join("\n") }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-sm-end text-start">
                            <span class="text-danger me-1">*</span>
                            <label :class="{ 'text-danger': errors.username }">Tên Tài Khoản:</label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input v-model:value="users.username" placeholder="Tên Tài Khoản" allow-clear
                                :class="{ 'errors': errors.username }" />
                            <div class="w-100"></div>
                            <small class="text-danger"
                                v-if="errors.username">{{ errors . username . join("\n") }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-sm-end text-start">
                            <span class="text-danger me-1">*</span>
                            <label :class="{ 'text-danger': errors.name }">Họ Tên:</label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input v-model:value="users.name" placeholder="Họ Tên" allow-clear
                                :class="{ 'errors': errors.name }" />
                            <div class="w-100"></div>
                            <small class="text-danger" v-if="errors.name">{{ errors . name . join("\n") }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-sm-end text-start">
                            <span class="text-danger me-1">*</span>
                            <label :class="{ 'text-danger': errors.email }">Email:</label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input v-model:value="users.email" placeholder="Email" allow-clear
                                :class="{ 'errors': errors.email }" />
                            <div class="w-100"></div>
                            <small class="text-danger" v-if="errors.email">{{ errors . email . join("\n") }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-sm-end text-start">
                            <span class="text-danger me-1">*</span>
                            <label :class="{ 'text-danger': errors.department_id }">Phòng Ban:</label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-select v-model:value="users.department_id" show-search placeholder="Phòng Ban"
                                :options="listDepartments" style="width: 100%;" :filter-option="filterOption"
                                allow-clear :class="{ 'errors': errors.department_id }"></a-select>
                            <div class="w-100"></div>
                            <small class="text-danger"
                                v-if="errors.department_id">{{ errors . department_id . join("\n") }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-sm-end text-start">
                            <span class="text-danger me-1">*</span>
                            <label :class="{ 'text-danger': errors.password }">Mật Khẩu:</label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input-password v-model:value="users.password" placeholder="Mật Khẩu" allow-clear
                                :class="{ 'errors': errors.password }" />
                            <div class="w-100"></div>
                            <small class="text-danger"
                                v-if="errors.password">{{ errors . password . join("\n") }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-sm-end text-start">
                            <span class="text-danger me-1">*</span>
                            <label :class="{ 'text-danger': errors.passwordConfirm }">Xác Nhận Mật Khẩu:</label>
                        </div>
                        <div class="col-12 col-sm-5">
                            <a-input-password v-model:value="users.passwordConfirm" placeholder="Xác Nhận Mật Khẩu"
                                allow-clear :class="{ 'errors': errors.passwordConfirm }" />
                            <div class="w-100"></div>
                            <small class="text-danger"
                                v-if="errors.passwordConfirm">{{ errors . passwordConfirm . join("\n") }}</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-grid d-sm-flex justify-content-end mx-auto">
                        <a-button class="me-sm-3 me-0 mb-3 mb-sm-0"><router-link
                                :to="{ name: 'adminUsers' }">Hủy</router-link></a-button>
                        <a-button type="primary" html-type="submit"><span>Lưu</span></a-button>
                    </div>
                </div>
            </div>
        </a-card>
    </form>
</template>
<script>
    import {
        useMenu
    } from '@/stores/menu';
    import axios from 'axios';
    import {
        ref,
        reactive,
        toRefs
    } from 'vue';

    export default {
        name: "adminUsersCreate",
        setup() {
            useMenu().onSelectedKeys(["users"]);
            const listStatus = ref([]);
            const listDepartments = ref([]);
            const errors = ref([]);
            const users = reactive({
                "status_id": [],
                "department_id": [],
                "username": "",
                "password": "",
                "passwordConfirm": "",
                "email": "",
                "name": ""
            });
            const getMaster = () => {
                axios.get('http://127.0.0.1:8000/api/users/create')
                    .then((response) => {
                        listStatus.value = response.data.listStatus;
                        listDepartments.value = response.data.listDepartments;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
            const filterOption = (input, option) => {
                return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
            };
            const createUser = () => {
                axios.post('http://127.0.0.1:8000/api/users/create', users)
                    .then((response) => {
                        console.log(response);
                    })
                    .catch((error) => {
                        errors.value = error.response.data.errors;
                        console.log(errors.value);
                    })
            }
            getMaster();
            return {
                listDepartments,
                listStatus,
                users,
                errors,
                ...toRefs(users),
                filterOption,
                createUser
            }
        }
    }
</script>
<style scoped>
    .errors {
        border: 1px solid red
    }

    ;
</style>

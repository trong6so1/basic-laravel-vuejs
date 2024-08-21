export const admin = [
  {
    path: '/admin',
    component: () => import('@/layouts/admin.vue'),
    children: [
      {
        path: 'users',
        name: 'adminUsers',
        component: () => import('@/pages/admin/users/index.vue')
      },
      {
        path: 'roles',
        name: 'adminRoles',
        component: () => import('@/pages/admin/roles/index.vue')
      },
      {
        path: 'settings',
        name: 'adminSettings',
        component: () => import('@/pages/admin/settings/index.vue')
      }
    ]
  }
]

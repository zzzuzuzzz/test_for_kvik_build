import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/vue/:group_id',
      name: 'userDesktop',
      component: () => import('../views/UserDesktop.vue')
    },
    {
      path: '/vue/admin/:group_id',
      name: 'adminDesktop',
      component: () => import('../views/AdminDesktop.vue')
    },
  ]
})

export default router

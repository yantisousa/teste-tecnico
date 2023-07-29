import { createRouter, createWebHistory } from 'vue-router'


const routes = [
  {
    path: '/',
    name: 'IndexEletrodomesticos',
    component: () => import('@/views/Eletrodomesticos.vue')
  },
  {
    path: '/eletrodomesticos/edit/:id',
    name: 'editEletrodomesticos',
    component: () => import('@/views/Edit.vue')
  }, 
  {
    path: '/marcas',
    name: 'MarcasIndex',
    component: () => import('@/views/Marcas.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '/', component: () => import('pages/IndexPage.vue') },
      { path: '/create', component: () => import('pages/CreateDog.vue') },
      { path: '/dog/:id', component: () => import('pages/DogPage.vue') },
      { path: '/edit/:id', component: () => import('pages/EditDog.vue') }
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes

import { createWebHistory, createRouter } from "vue-router";
import Home from "../views/Home.vue";
import Blog from "../views/Blog.vue";
import Shop from "../views/Shop.vue";

// lazy-loaded
const contact = () => import("../components/Contact/Contact.vue")

const routes = [
  {
    path: "/home",
    name: "home",
    component: Home,
    meta: {
      title: "Accueil - La boutique française",
    },
  },
  {
    path: "/actualites",
    name: "blog",
    component: Blog,
    meta: {
      title: "Actualités - La boutique française",
    },
  },
  {
    path: "/boutique",
    name: "Shop",
    component: Shop,
    meta: {
      title: "Boutique - La boutique française",
    },
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: () => import('../views/Dashboard.vue')
  },
  {
    path: "/contact",
    name: "contact",
    meta: {
      title: "Contact",
    },
    // lazy-loaded
    component: contact,
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;

router.beforeEach((to, from, next) => {
  const publicPages = ['/login', '/register', '/home', '/contact', '/dashboard', '/actualites', '/boutique'];
  const authRequired = !publicPages.includes(to.path);
  const loggedIn = localStorage.getItem('user');

  // trying to access a restricted page + not logged in
  // redirect to login page
  if (authRequired && !loggedIn) {
    next('/login');
  } else {
    next();
  }
});
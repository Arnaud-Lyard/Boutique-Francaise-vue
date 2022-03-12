import { createWebHistory, createRouter } from "vue-router";
import HomePage from "../views/HomePage.vue";
import BlogPage from "../views/BlogPage.vue";
import ShopPage from "../views/ShopPage.vue";
import ProductPage from "../views/ProductPage"

// lazy-loaded
const contact = () => import("../components/Contact/Contact.vue")

const routes = [
  {
    path: "/home",
    name: "HomePage",
    component: HomePage,
    meta: {
      title: "Accueil - La boutique française",
    },
  },
  {
    path: "/actualites",
    name: "BlogPage",
    component: BlogPage,
    meta: {
      title: "Actualités - La boutique française",
    },
  },
  {
    path: "/boutique",
    name: "ShopPage",
    component: ShopPage,
    meta: {
      title: "Boutique - La boutique française",
    },
  },
  {
    path: "/produit/:id",
    name: "ProductPage",
    component: ProductPage,
    meta: {
      title: "Détails du produit - La boutique française",
    },
    props: true,
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
  const publicPages = ['/login', '/register', '/home', '/contact', '/dashboard', '/actualites', '/boutique', '/produit/:id'];
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
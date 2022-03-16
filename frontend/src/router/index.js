import { createWebHistory, createRouter } from "vue-router";
import HomePage from "../views/HomePage.vue";
import BlogPage from "../views/BlogPage.vue";
import ShopPage from "../views/ShopPage.vue";
import ProductDetail from "../components/ProductDetail/ProductDetail";
import ContactPage from "../views/ContactPage";
import LoginPage from "../views/LoginPage";
import RegisterPage from "../views/RegisterPage"

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
    path: "/connexion",
    name: "LoginPage",
    component: LoginPage,
    meta: {
      title: "Connexion - La boutique française",
    },
  },
  {
    path: "/inscription",
    name: "RegisterPage",
    component: RegisterPage,
    meta: {
      title: "Inscription - La boutique française",
    },
  },
  {
    path: "/produit/:id",
    name: "ProductDetail",
    component: ProductDetail,
    meta: {
      title: "Détails du produit - La boutique française",
    },
    props: true,
  },

  {
    path: "/contact",
    name: "ContactPage",
    component: ContactPage,
    meta: {
      title: "Contact  - La boutique française",
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

  const loggedIn = localStorage.getItem('user');

  const privatePages = [''];
  const authRequired = privatePages.includes(to.path);
  
  // trying to access a restricted page + not logged in
  // redirect to login page
  if (authRequired && !loggedIn) {
    next('/login');
  } else {
    next();
  }
});


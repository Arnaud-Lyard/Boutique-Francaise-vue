import { createWebHistory, createRouter } from "vue-router";
import HomePage from "../views/HomePage.vue";
import BlogPage from "../views/BlogPage.vue";
import ContactPage from "../views/ContactPage";
import LoginPage from "../views/LoginPage";
import RegisterPage from "../views/RegisterPage"
import Cart from "../components/Cart/Cart"

// lazy-loaded
const contact = () => import("../components/Contact/Contact.vue")

const routes = [
  {
    path: '/cart',
    component: Cart,
    meta: {
      title: "Panier - La boutique Warhammer",
    },

  },
  {
    path: "/",
    name: "HomePage",
    component: HomePage,
    meta: {
      title: "La boutique Warhammer - Accueil",
    },
  },
  {
    path: "/actualites",
    name: "BlogPage",
    component: BlogPage,
    meta: {
      title: "Actualités - La boutique Warhammer",
    },
  },
  {
    path: "/connexion",
    name: "LoginPage",
    component: LoginPage,
    meta: {
      title: "Connexion - La boutique Warhammer",
    },
  },
  {
    path: "/inscription",
    name: "RegisterPage",
    component: RegisterPage,
    meta: {
      title: "Inscription - La boutique Warhammer",
    },
  },
  {
    path: "/contact",
    name: "ContactPage",
    component: ContactPage,
    meta: {
      title: "Contact  - La boutique Warhammer",
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


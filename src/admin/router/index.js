import Home from "admin/pages/Home.vue";
import Options from "admin/pages/Options.vue";
import Categorie from 'admin/pages/components/categorie.vue';
import Doc from 'admin/pages/components/doc.vue';
import { createRouter, createWebHashHistory} from 'vue-router'

const router = createRouter({
  history: createWebHashHistory(),
  routes: [
    {
      path: "/Doc",
      name: "Doc",
      component: Doc,
    },
    {
      path: "/",
      name: "Home",
      component: Home,
    },
    {
      path: "/categorie",
      name: "Categorie",
      component: Categorie,
    },
    {
      path: "/options",
      name: "Options",
      component: Options,
    },
  ],
});

export default router;
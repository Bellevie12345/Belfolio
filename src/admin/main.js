import { createApp } from "vue";
import App from "./App.vue";
import '@/admin/utils/tailwindcdn';
import router from "./router";
import menuFix from "./utils/admin-menu-fix";
const app = createApp(App);
app.use(router);
app.mount("#belfolio-admin-app");
menuFix("belfolio");

require("./bootstrap");
import Vue from "vue";
import Chakra, { CThemeProvider, CReset } from "@chakra-ui/vue";
import App from "./components/App";

Vue.use(Chakra);

const app = new Vue({
    el: "#app",
    components: {
        App
    },
    render: h => h(CThemeProvider, [h(CReset), h(App)])
});

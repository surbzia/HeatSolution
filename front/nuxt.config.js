import { productRoutes } from "./dynamic-routes";
export default {
  // Target: https://go.nuxtjs.dev/config-target
  target: "static",

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: "The Freshify",
    htmlAttrs: {
      lang: "en",
    },
    meta: [
      { charset: "utf-8" },
      { name: "viewport", content: "width=device-width, initial-scale=1" },
      { hid: "description", name: "description", content: "" },
      { name: "format-detection", content: "telephone=no" },
    ],
    link: [
      { rel: "icon", type: "image/png", href: "/favicon.png" },
      { rel: "stylesheet", href: "/css/custom.css" },
      { rel: "stylesheet", href: "/css/bootstrap.min.css" },
      { rel: "stylesheet", href: "/css/fancybox.min.css" },
      { rel: "stylesheet", href: "https://unpkg.com/aos@2.3.1/dist/aos.css" },
    ],
    script: [
      { src: "/js/jquery-3.6.0.min.js" },
      { src: "/js/popper.min.js" },
      { src: "/js/bootstrap.min.js" },
      { src: "/js/fontawesome.js" },
      {
        src: "https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js",
      },
      { src: "/js/custom.js" },
    ],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
    // '@/static/css/custom.css',
    // '@/static/css/bootstrap.min.css',
    // '@/static/css/slick.css',
    // '@/static/css/slick-theme.css',
    // '@/static/css/fancybox.min.css',
    "vue-slick-carousel/dist/vue-slick-carousel.css",
    "vue-slick-carousel/dist/vue-slick-carousel-theme.css",
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [{ src: "./plugins/vue-slick-carousel.js" }],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/bootstrap
    "bootstrap-vue/nuxt",
    "@nuxtjs/axios",
    "sweetalert",
  ],
  axios: {
    // baseURL: "http://127.0.0.1:8000/api/front/",
    baseURL: "https://api.thefreshify.com/api/front/",
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {},
  generate: {
    crawler: false, //turn on when live
    routes: productRoutes,
  },
};

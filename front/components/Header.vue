<template>
  <div>
    <header>
      <div class="top-row">
        <div class="container-fluid pl-3 pr-3">
          <div class="upper-row">
            <b-row style="margin-top: -8px; border-bottom: 1px solid #005fa3">
              <b-col md="12">
                <ul class="top_row_ul">
                  <li class="top_row_li"><nuxt-link to="/">Home</nuxt-link></li>
                  <li class="top_row_li"><nuxt-link to="/">News</nuxt-link></li>
                  <li class="top_row_li">
                    <nuxt-link to="/">Contact</nuxt-link>
                  </li>
                  <li class="top_row_li">
                    <nuxt-link to="/">About</nuxt-link>
                  </li>
                </ul>
              </b-col>
            </b-row>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="logo">
                <nuxt-link to="/"
                  ><img
                    src="https://www.logolynx.com/images/logolynx/53/53c631e42df6702a6feac90776f1c843.png"
                /></nuxt-link>
              </div>
            </div>
            <div class="col-md-9">
              <div class="row">
                <b-col md="6">
                  <div class="search">
                    <input
                      v-model="q"
                      @keyup.enter="goSearch"
                      type="text"
                      placeholder="What are you looking for"
                    />
                  </div>
                </b-col>
            </div>
          </div>
        </div>
        <div class="row mt-3" style="background-color: #f9f9f9;
    height: 35px !important;
    margin-bottom: -8px !important;">
          <div class="col-md-12">
                  <div class="nav-main">
                    <div class="nagivation-bar">
                      <nav class="navbar navbar-expand-md navbar-light">
                        <div
                          class="collapse navbar-collapse"
                          id="navbarCollapse"
                        >
                          <div class="navbar-nav" v-if="menus.length > 0">
                            <b-button
                              v-if="menu.children.length > 0"
                              v-for="menu in menus"
                              :key="menu.id"
                              v-b-toggle="'Nav_' + menu.id"
                              >{{ menu.name }}</b-button
                            >
                          </div>
                        </div>
                      </nav>
                    </div>
                  </div>
                
              </div>
              <b-collapse
                v-if="menu.children.length > 0"
                :id="`Nav_` + menu.id"
                v-model="menu.visible"
                class="megamenu-view desktop-menu"
                v-for="menu in menus"
                :key="menu.slug"
              >
                <b-card class="col-md-10">
                  <b-row>
                    <b-col md="12">
                      <div class="side-listing">
                        <div class="row">
                          <div
                            class="col-md-3"
                            v-if="children.service > 0"
                            v-for="children in menu.children"
                            :key="children.id"
                          >
                            <nuxt-link
                              :to="'/' + children.slug"
                              class="text-info"
                            >
                              <h4>{{ children.name }}</h4></nuxt-link
                            >
                            <ul class="ml-3">
                              <li v-for="ser in children.service" :key="ser.id">
                                <nuxt-link :to="'/' + ser.slug">{{
                                  ser.name
                                }}</nuxt-link>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </b-col>
                  </b-row>
                </b-card>
              </b-collapse>
          </div>
        </div>
      </div>
    </header>
  </div>
</template>
<script>
import Vue from "vue";
export default {
  computed: {
    // cartTotal() {
    //   return this.$store.state.cart.total;
    // },
    // items() {
    //   return this.$store.state.cart.items;
    // },
  },
  watch: {
    $route: function () {
      var button = $("button.not-collapsed");
      button.click();
    },
  },
  methods: {
    goSearch(ev) {
      if (this.q) {
        this.$router.push("/shop?q=" + this.q);
      }
    },
  },
  data() {
    return {
      menus: [],
      q: "",
    };
  },
  async mounted() {
    let data = await this.$axios
      .get("categories?show_in_menu=true&is_web=true")
      .then((e) => {
        return e.data.data;
      });
    let categories = data.map((v) => ({ ...v, visible: false }));
    this.menus = categories;
  },
};
</script>
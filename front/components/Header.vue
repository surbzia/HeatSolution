<template>
  <div>
    <header>
      <div class="top-row">
        <div class="container-fluid pl-3 pr-3">
          <div class="upper-row">
            <b-row style="margin-top: -8px;
    border-bottom: 1px solid #005fa3;">
              <b-col md="12">
               <ul class="top_row_ul">
  <li class="top_row_li"><nuxt-link to="/">Home</nuxt-link></li>
  <li class="top_row_li"><nuxt-link to="/">News</nuxt-link></li>
  <li class="top_row_li"><nuxt-link to="/">Contact</nuxt-link></li>
  <li class="top_row_li"><nuxt-link to="/">About</nuxt-link></li>
</ul>

              </b-col>
             
            </b-row>
          </div>
          <div class="row">
            <div class="col-md-2">
              <div class="logo">
                <nuxt-link to="/"><img src="https://www.logolynx.com/images/logolynx/53/53c631e42df6702a6feac90776f1c843.png" /></nuxt-link>
              </div>
            </div>
            <div class="col-md-10">
              <div class="row">
                <b-col md="3">
                  <div class="search">
                    <input
                      v-model="q"
                      @keyup.enter="goSearch"
                      type="text"
                      placeholder="What are you looking for"
                    />
                  </div>
                </b-col>

                <div class="col-md-6">
                  <div class="nav-main">

                    <div class="nagivation-bar">
                      <nav class="navbar navbar-expand-md navbar-light">
                        <div
                          class="collapse navbar-collapse"
                          id="navbarCollapse"
                        >
                          <div class="navbar-nav">
                               <b-button  v-for="menu in menus" :key="menu.id" v-b-toggle.my-collapse.menu.id
                            >Shop Products</b-button
                          >
                               <!-- <b-button v-b-toggle.my-collapse
                            >Shop Products</b-button
                          > -->
                          <b-collapse v-for="menu in menus" :key="menu.id" :id="my-collapse.menu.id" class="megamenu-view only-phone">
                            <b-card>
                              <b-row>
                                <b-col md="6">
                                  <div class="side-listing">
                                    <h4>Shop Products</h4>
                                    <!-- <ul>
                                      <li v-for="menu in menus" :key="menu.id">
                                        <nuxt-link :to="'/' + menu.slug"
                                          ><img :src="menu.icon_url" />
                                          {{ menu.name }}</nuxt-link
                                        >
                                      </li>
                                    </ul> -->
                                  </div>
                                
                                </b-col>
                              </b-row>
                            </b-card>
                          </b-collapse>
                            <!-- <nuxt-link to="/about-us" class="nav-item nav-link" v-for="menu in menus" :key="menu.id"
                              >{{menu.name}}</nuxt-link
                            > -->
                            <!-- <nuxt-link
                              to="/dealsandpromotions"
                              class="nav-item nav-link"
                              >Deals & Promotions</nuxt-link
                            > -->
                      
                          </div>
                        </div>
                        
                      </nav>
                    </div>
                  </div>
                </div>
                <div class="col-md-3"></div>
              </div>
               <b-collapse id="my-collapse" class="megamenu-view desktop-menu">
          <b-card>
            <b-row>
              <b-col md="3">
                <div class="side-listing">
                  <h4>Shop Products</h4>
                  <ul>
                    <li v-for="menu in menus" :key="menu.id">
                      <nuxt-link :to="'/' + menu.slug"
                        ><img :src="menu.icon_url" /> {{ menu.name }}</nuxt-link
                      >
                    </li>
                  </ul>
                </div>
              </b-col>
              <b-col md="9">
                <div class="cat-products">
                  <b-row>
                    <b-col md="4">
                      <div class="img-holder">
                        <nuxt-link to="/inquiry"
                          ><img src="/images/aqiqa.png"
                        /></nuxt-link>
                      </div>
                      <div class="short-details">
                        <div class="p-title">
                          <img src="/images/aqiqaicn.png" />
                          <h5>
                            <nuxt-link to="/inquiry">Aqiqa Service</nuxt-link>
                          </h5>
                        </div>
                      </div>
                    </b-col>
                    <b-col md="4">
                      <div class="img-holder">
                        <nuxt-link to="/inquiry"
                          ><img src="/images/sadqa.png"
                        /></nuxt-link>
                      </div>
                      <div class="short-details">
                        <div class="p-title">
                          <img src="/images/sadqaicn.png" />
                          <h5>
                            <nuxt-link to="/inquiry">Sadqa Service</nuxt-link>
                          </h5>
                        </div>
                      </div>
                    </b-col>

                    <b-col md="4">
                      <div class="img-holder">
                        <nuxt-link to="/inquiry"
                          ><img src="/images/qurbani.png"
                        /></nuxt-link>
                      </div>
                      <div class="short-details">
                        <div class="p-title">
                          <img src="/images/qurbaniicn.png" />
                          <h5>
                            <nuxt-link to="/inquiry">Qurbani Service</nuxt-link>
                          </h5>
                        </div>
                      </div>
                    </b-col>
                  </b-row>
                </div>
              </b-col>
            </b-row>
          </b-card>
        </b-collapse>
            </div>
          </div>
        </div>
      </div>
    </header>
  </div>
</template>
<script>
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
  mounted() {
    this.$axios.get("categories?show_in_menu=true&is_web=true").then((e) => {
      this.menus = e.data.data;
    });
  },
};
</script>
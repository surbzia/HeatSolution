<template>
  <header>
  <!-- <div class="top-ticket">
  <marquee>
  <ul>
  <li><img src="/images/hen-icon-top.png" alt="" /></li>
  <li><p>5% Discount on all products to our loyalty card holders</p></li>
  <li><nuxt-link to="/">Apply Now</nuxt-link></li>
  
  </ul>

  </marquee>
  </div> -->
  
    <!-- Begin: Top Row -->
    <div class="top-row">
      <div class="container">
        <div class="upper-row">
          <b-row>
            <b-col md="3">
              <!-- <div class="search">
              <input type="text" placeholder="What are you looking for" />
              <i class="fa fa-search" aria-hidden="true"></i>
              
              </div> -->
            </b-col>
             <b-col md="9">
              <div class="shopping-main">
                <div class="shopping-options">
                  <p>Rs {{ cartTotal }}</p>

                  <nuxt-link to="/cart">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>

                    <div class="total">
                      <p>{{ items.length }}</p>
                    </div>
                  </nuxt-link>

                  <!-- <a href="">
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <div class="totall">
                      <p>1</p>
                    </div>
                  </a> -->
                </div>

                <!-- <div class="dropdown u-profile">
                  <button
                    class="btn btn-secondary dropdown-toggle"
                    type="button"
                    id="dropdownMenuButton"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <span><img src="/images/user.png" alt="" /></span>
                  </button>

                  <div
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton"
                  >
                    <a class="dropdown-item" href="#"
                      ><i class="fa fa-list-alt" aria-hidden="true"></i>
                      Dashboard</a
                    >

                    <a class="dropdown-item" href="#"
                      ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      Edit Profile</a
                    >

                    <a class="dropdown-item" href="#"
                      ><i class="fa fa-sign-out" aria-hidden="true"></i> Log
                      Out</a
                    >
                  </div>
                </div> -->
              </div>
            </b-col>
          </b-row>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="logo">
              <nuxt-link to="/"><img src="/images/logo1.png" /></nuxt-link>
            </div>
          </div>
          <div class="col-md-9">
            <b-col md="12">
              <div class="shopping-main">
                <div class="shopping-options">
                  <!-- <p>Rs {{ cartTotal }}</p> -->

                  <!-- <nuxt-link to="/cart">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>

                    <div class="total">
                      <p>{{ items.length }}</p>
                    </div>
                  </nuxt-link> -->

                  <!-- <a href="">
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <div class="totall">
                      <p>1</p>
                    </div>
                  </a> -->
                </div>

                <!-- <div class="dropdown u-profile">
                  <button
                    class="btn btn-secondary dropdown-toggle"
                    type="button"
                    id="dropdownMenuButton"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <span><img src="/images/user.png" alt="" /></span>
                  </button>

                  <div
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton"
                  >
                    <a class="dropdown-item" href="#"
                      ><i class="fa fa-list-alt" aria-hidden="true"></i>
                      Dashboard</a
                    >

                    <a class="dropdown-item" href="#"
                      ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      Edit Profile</a
                    >

                    <a class="dropdown-item" href="#"
                      ><i class="fa fa-sign-out" aria-hidden="true"></i> Log
                      Out</a
                    >
                  </div>
                </div> -->
              </div>
            </b-col>
            <div class="row">
              <b-col md="6">
                <div class="search">
                  <input
                    v-model="q"
                    @keyup.enter="goSearch"
                    type="text"
                    placeholder="What are you looking for"
                  />
                  <i class="fa fa-search" aria-hidden="true"></i>
                </div>
              </b-col>

              <div class="col-md-6">
                <div class="nav-main">
                  <div class="nagivation-bar">
                    <nav class="navbar navbar-expand-md navbar-light">
                      <button
                        type="button"
                        class="navbar-toggler"
                        data-toggle="collapse"
                        data-target="#navbarCollapse"
                      >
                        <span class="navbar-toggler-icon"></span>
                      </button>

                      <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav">
                          <b-button v-b-toggle.my-collapse
                            >Shop Products</b-button
                          >
                          <b-collapse id="my-collapse" class="megamenu-view only-phone">
                            <b-card>
                              <b-row>
                                <b-col md="3">
                                  <div class="side-listing">
                                    <h4>Shop Products</h4>
                                    <ul>
                                      <li v-for="menu in menus" :key="menu.id">
                                        <nuxt-link :to="'/' + menu.slug"
                                          ><img :src="menu.icon_url" />
                                          {{ menu.name }}</nuxt-link
                                        >
                                      </li>
                                    </ul>
                                  </div>
                                  <ul class="extra-ser">
                                   <li>
                                   <img src="/images/aqiqaicn.png" />
                                   <nuxt-link to="/inquiry">Aqiqa Service</nuxt-link>
                                   </li>
                                  <li>
                                  <img src="/images/sadqaicn.png" />
                                   <nuxt-link to="/inquiry">Sadqa Service</nuxt-link>
                                   </li>
                                   <li>
                                   <img src="/images/qurbaniicn.png" />
                                   <nuxt-link to="/inquiry">Qurbani Service</nuxt-link>
                                   </li>
                                  </ul>
                                </b-col>
                                <b-col md="9">
                                  <div class="cat-products">
                                    <b-row>
                                      <b-col md="4">
                                        <div class="img-holder">
                                          <nuxt-link to="/inquiry"
                                            ><img
                                              src="/images/aqiqa.png"
                                          /></nuxt-link>
                                        </div>
                                        <div class="short-details">
                                          <div class="p-title">
                                            <img src="/images/aqiqaicn.png" />
                                            <h5>
                                              <nuxt-link to="/inquiry"
                                                >Aqiqa Service</nuxt-link
                                              >
                                            </h5>
                                          </div>
                                        </div>
                                      </b-col>
                                      <b-col md="4">
                                        <div class="img-holder">
                                          <nuxt-link to="/inquiry"
                                            ><img
                                              src="/images/sadqa.png"
                                          /></nuxt-link>
                                        </div>
                                        <div class="short-details">
                                          <div class="p-title">
                                            <img src="/images/sadqaicn.png" />
                                            <h5>
                                              <nuxt-link to="/inquiry"
                                                >Sadqa Service</nuxt-link
                                              >
                                            </h5>
                                          </div>
                                        </div>
                                      </b-col>

                                      <b-col md="4">
                                        <div class="img-holder">
                                          <nuxt-link to="/inquiry"
                                            ><img
                                              src="/images/qurbani.png"
                                          /></nuxt-link>
                                        </div>
                                        <div class="short-details">
                                          <div class="p-title">
                                            <img src="/images/qurbaniicn.png" />
                                            <h5>
                                              <nuxt-link to="/inquiry"
                                                >Qurbani Service</nuxt-link
                                              >
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
                          <nuxt-link to="/about-us" class="nav-item nav-link"
                            >About Us</nuxt-link
                          >
                          <nuxt-link
                            to="/dealsandpromotions"
                            class="nav-item nav-link"
                            >Deals & Promotions</nuxt-link
                          >
                          <!-- <nuxt-link to="/store-location" class="nav-item nav-link">Store Locations</nuxt-link>
                      <nuxt-link to="/shipping-and-return" class="nav-item nav-link">Shipping and Returns</nuxt-link> -->
                        </div>
                      </div>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- MEGA MENU -->
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
        <!-- END MEGA MENU  -->
      </div>
    </div>
  </header>
</template>
<script>
export default {
  computed: {
    cartTotal() {
      return this.$store.state.cart.total;
    },
    items() {
      return this.$store.state.cart.items;
    },
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
    this.$axios.get("categories?show_in_menu=true").then((e) => {
      this.menus = e.data.data;
    });
  },
};
</script>
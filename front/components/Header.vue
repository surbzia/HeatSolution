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
                          <div class="navbar-nav" v-if="menus.length > 0">
                             <b-button  v-for="menu in menus" :key="menu.id" v-b-toggle="'Nav_' + menu.id" >{{menu.name}}</b-button>
                             <!-- <b-button  
                             v-for="(menu,index) in menus" 
                             :key="menu.id" 
                              v-on:mouseover="collapse(index)" 
                              v-on:mouseleave="collapse(index)" 
                             
                              aria-controls="collapse1"
                             >{{menu.name}}</b-button> -->
                            

                               <!-- <b-button v-b-toggle.my-collapse
                            >Shop Products</b-button
                          > -->
                         
                            <!-- <nuxt-link to="/about-us" class="nav-item nav-link" v-for="menu in menus" :key="menu.id"
                              >{{menu.name}}</nuxt-link
                            > -->
                            <!-- <nuxt-link
                              to="/dealsandpromotions"
                              class="nav-item nav-link"
                              >Deals & Promotions</nuxt-link
                            > -->
                      
                          </div>
                           <!-- <b-collapse v-for="menu in menus" :key="menu.id" :id="menu.id" class="megamenu-view only-phone">
                            <b-card>
                              <b-row>
                                <b-col md="6">
                                  <div class="side-listing">
                                    <h4>Shop Products</h4>
                                   
                                  </div>
                                
                                </b-col>
                              </b-row>
                            </b-card>
                          </b-collapse> -->
                        </div>
                        
                      </nav>
                    </div>
                  </div>
                </div>
                <div class="col-md-3"></div>
              </div>
           <b-collapse :id="`Nav_`+menu.id" v-model="menu.visible"  class="megamenu-view desktop-menu" v-for="menu in menus" :key="menu.slug">
          <b-card class="col-md-10">
            <b-row>
              <b-col md="12">
                <div class="side-listing">
                  <h4>{{menu.name}}</h4>
                  <ul>
                    <li v-for="service in menu.service" :key="service.id">
                     <!--  <nuxt-link :to="'/' + menu.slug"
                        ><img :src="menu.icon_url" /> {{ menu.name }}</nuxt-link
                      > -->
                      <nuxt-link :to="'/' + service.slug">{{ service.name }}</nuxt-link>
                    </li>
                  </ul>
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
import Vue from 'vue'
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
     collapse(index) {
       
     let val = !this.menus[index].visible;
        // console.log(val);
        this.$set(this.menus, index, val)
      //  Vue.set(this.menus, index, true);
          // for (let i = 0; i < this.menus.length; i++) {
        //     this.menus.map((v,i) => ({
        //     console.log('Before', v.visible)
        //    this.menus[index].visible = !this.menus[index].visible;
        // }));
        // console.log('After', this.menus[index].visible);
  
     }
  },
  data() {
    return {
      menus: [],
      q: "",
    };
  },
 async mounted() {
    let data = await this.$axios.get("categories?show_in_menu=true&is_web=true").then((e) => {
      return e.data.data;
    });
   let categories =  data.map(v => ({...v, visible: false}));
   this.menus = categories;
  },
};
</script>
<template>
  <div>
    <BreadCrumb
      :breadcrumbs="[
        { to: '/', name: 'Home >', class: '' },
        {
          to: '/all',
          name: 'All',
          class: 'active',
        },
      ]"
    />    
    <section class="cat-select show-all-cats">
      <b-container>
        <b-row>
          <b-col md="12">
            <div class="cat-view" v-if="categories.length > 0">
            <h2>All</h2>
            <VueSlickCarousel class="allcatslick" v-bind="featured_category_settings" >
              <nuxt-link class="allcat-slidegrid" v-for="category_feature in categories" :key="category_feature.id" :to="'/'+category_feature.slug">
              <img :src="category_feature.icon_url" :alt="category_feature.name" />
              {{ category_feature.name }}
              </nuxt-link>
            </VueSlickCarousel>
            </div>
          </b-col>
        </b-row>
      </b-container>
    </section>
    <section class="all-products show-all-cats-products">
      <b-container>
        <b-row v-if="!loading && products.length > 0">
          <b-col md="4" v-for="(product) in products" :key="product.id">
            <ProductCard :product="product" />
          </b-col>
        </b-row>
        <b-row v-else-if="loading==true&&products.length==0" class="MainGallerSec">
          <ProductSkeleton v-for="i in 9" :key="i" />
        </b-row>
        <b-row v-else>
          <b-col md="12"><h1>No Products Found</h1></b-col>
        </b-row>
      </b-container>
    </section>
  </div>
</template>
<script>
export default {
  watchQuery: ['q'],
  // async asyncData({ params, query, $axios, redirect }) {
  //   let category_id = 0;
  //   const { data } = await $axios.$get("categories?featured=1");
  //   let search = (query.q?query.q:'')
  //   let categories = data;
  //   return { category_id, categories, search};
  // },

  data() {
    return {
      loading: false,
      categories:[],
      products: [],
      featured_category_settings:{
        "dots": true,
        "focusOnSelect": true,
        "infinite": true,
        "arrows":true,
        // "speed": 500,
        "slidesToShow": 7,
        "slidesToScroll": 7,
        "touchThreshold": 5,
        "responsive": [
          {
      "breakpoint": 1024,
      "settings": {
        "slidesToShow": 3,
        "slidesToScroll": 3,
        "infinite": true,
        "dots": true
      }
    },
    {
      "breakpoint": 600,
      "settings": {
        "slidesToShow": 2,
        "slidesToScroll": 2,
        "initialSlide": 2
      }
    },
    {
      "breakpoint": 480,
      "settings": {
        "slidesToShow": 3,
        "slidesToScroll": 3
      }
    }
  ]
      }
    };
  },
  watch: {
    $route: function(){
      this.search = (this.$route.query?this.$route.query.q:'')
      this.getProducts()
    }
  },
  methods:{
    getProducts(){
      this.loading = true
      this.products = []
      this.$axios.$post('products-viaslug',{
        slug: 'all',
        search: this.search
      }).then(e=>{
        this.products = e.data;
        this.loading = false
      })
    },
   async fetchCategories() {
   const  res  = await this.$axios.$get("categories?featured=1");
    // console.log(res);

    this.categories = res.data;
  },
  },
  mounted(){
    this.fetchCategories();
    this.getProducts();
  }
};
</script>

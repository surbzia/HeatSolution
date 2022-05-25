<template>
  <div>
    <BreadCrumb
      :breadcrumbs="[
        { to: '/', name: 'Home >', class: '' },
        {
          to: '/' + routeMatch,
          name: category.name,
          class: 'active',
        },
      ]"
    />
    <section class="about-banner new-banner">
      <div class="inner-banner-img">
        <img src="/images/about-banner.png" />
        <div class="container">
          <div class="about-heading">
            <!-- <h2>Browse by Category</h2> -->
          </div>
        </div>
      </div>
    </section>
    
    <section class="cat-select" >
      <b-container>
        <b-row>
          <b-col md="6">
            <div class="cat-view">
            <h2>{{ category.name }}</h2>
            <div  v-html="category.description"></div>
            </div>
          </b-col>
          <b-col  md="6" class="ryt-side">
            <div  class="img-holder">
            <img :src="category.image_url" alt="" /></div>
          </b-col>
        </b-row>
      </b-container>
    </section>
    <section  class="all-products">
      <b-container>
        <b-row v-if="!loading&&products.length>0">
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
  async asyncData({ params, $axios, redirect }) {
    // try {
    //   if (params.pathMatch) {
    //     let routeMatch = params.pathMatch;
    //     let category_id = 0;
    //     if (routeMatch[routeMatch.length - 1] == "/") {
    //       routeMatch = routeMatch.slice(0, -1);
    //     }
    //     const slugUrl = routeMatch.split("/");
    //     let slug_url = "";
    //     if (slugUrl.length > 0) {
    //       slug_url = slugUrl[0];
    //     } else {
    //       slug_url = slugUrl[0];
    //     }
    //     const { category } = await $axios.$get("/category/" + slug_url);
    //     category_id = category.id;
    //     return { category_id, category, routeMatch };
    //   } else {
    //     redirect(301, "/");
    //   }
    // } catch (ex) {
    //   redirect(301, "/");
    // }
  },
  data() {
    return {
      loading: false,
      products: [],
      routeMatch: '',
      category: {},
    };
  },
  methods:{
    getProducts(){
      this.loading = true
      this.products = []
      this.$axios.$post('products-viaslug',{
        slug: this.routeMatch
      }).then(e=>{
        this.products = e.data
        this.loading = false
      })
    }
  },
  async mounted(){
    let pathMatch = this.$route.params.pathMatch
    if (pathMatch[pathMatch.length - 1] == "/") {
      pathMatch = pathMatch.slice(0, -1);
    }
    this.routeMatch = pathMatch
    let res = await this.$axios.get('/category/'+pathMatch).then(e=>e.data.data)
    // console.log(res);
     this.category = res;
    this.getProducts()
  }    
};
</script>

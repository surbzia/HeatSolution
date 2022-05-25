<template>
  <div>
    <!-- Begin: Bottom Row -->
    <div class="bottom-row">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 p-0">
            <div id="demo" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
              </ul>
              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                    src="/images/carousel.png"
                    alt="Los Angeles"
                    width="100"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="/images/carousel.png"
                    alt="Los Angeles"
                    width="100"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="/images/carousel.png"
                    alt="Los Angeles"
                    width="100"
                  />
                </div>
                <div
                  class="carousel-captionn"
                  data-aos="fade-up"
                  data-aos-duration="2000"
                >
                  <div class="container">
                    <h5 class="heading-1">The Freshify</h5>
                    <!-- <h5></h5> -->
                    <p>Where hygiene comes first</p>
                    <nuxt-link to="/shop">Shop Now</nuxt-link>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="col-md-3">
            <div class="carousel-img">
              <img src="/images/carousel-img1.png" />
              <div class="cap-1" data-aos="fade-left" data-aos-duration="2000">
                <div class="container">
                  <a href="javascript:void(0)">Promotions</a>
                  <h6>-15% discount for all Fresh and Quality Meat</h6>
                  <p>1 January - 30 November</p>
                </div>
              </div>
            </div>
            <div class="carousel-img">
              <img src="/images/carousel-img2.png" />
              <div class="cap-2" data-aos="fade-up" data-aos-duration="2000">
                <div class="container">
                  <a href="javascript:void(0)">Promotion</a>
                  <p>Sign up & Save</p>
                  <h5>-30%</h5>
                  <a href="#newsletter" class="sletter">Newsletter</a>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <!-- Header End -->
    <!-- Featurd Works Sec Start -->
    <section class="feturd-sec">
      <div class="container">
        <div class="seach-category">
          <div class="row">
            <div class="col-md-8">
              <div class="browse">
                <h5>Browse by Category</h5>
                <p>
                  Please browse through our product portfolio to find your
                  desirable top-quality meats.
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="view">
                <nuxt-link to="/shop">See All</nuxt-link>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="CategoriesSec row">
        <div class="col-md-12 catg-btns">
          <button @click="getProducts(0)" class="btn btn-default">
            <img src="/images/category1.png" /> All
          </button>
          <button @click="getProducts(category.id)" v-for="category in categories" :key="category.id" class="btn btn-default">
            <img :src="category.image_url" />{{category.name}}
          </button>
        </div>
      </div> -->
        <!-- ALL CATEGORIES -->
        <!-- DAIRY CATEGORIES -->
        <div class="CategoriesSec row">
          <div class="col-md-12 catg-btns">
            <button @click="getProducts(0, true)" class="btn btn-default">
              <img src="/images/category1.png" /> All
            </button>
            <button
              @click="getProducts(category.id, false,category)"
              v-for="category in dairy_categories"
              :key="category.id"
              class="btn btn-default"
            >
              <img :src="category.icon_url" :alt="category.name" />
              {{ category.name }}
            </button>
          </div>
        </div>
         <!-- MEAT CATEGORIES -->
        <div class="CategoriesSec row">
          <div class="col-md-12 catg-btns">
            <button @click="getProducts(0, true)" class="btn btn-default">
              <img src="/images/category1.png" /> All
            </button>
            <button
              @click="getProducts(category.id, false,category)"
              v-for="category in meat_categories"
              :key="category.id"
              class="btn btn-default"
            >
              <img :src="category.icon_url" :alt="category.name" />
              {{ category.name }}
            </button>
          </div>
        </div>
        <!-- END ALL CATEGORIES -->
        <!-- <div v-if="loadingProducts===false" class="MainGallerSec row">
        <div v-for="product in products" :key="product.id" class="gallery_product col-md-3 MGallery filter milk">
          <div class="ftr-proj">
            <nuxt-link :to="'/product/'+product.slug">
              <div class="proj-img">
                <img :src="product.image_url" alt="" />
              </div>
            </nuxt-link>
            <div class="proj-text">
              <h4>{{product.name}}</h4>
              <h5>Rs {{product.price}}</h5>
              <div class="proj-btn">
                <nuxt-link :to="'/product/'+product.slug">add to cart</nuxt-link>
              </div>
            </div>
          </div>
        </div>
        <h2 v-if="products.length==0">No Products Found</h2>
      </div> -->
        <div class="all-products">
          <b-container>
            <b-row v-if="loadingProducts === false&&products.length>0">
              <b-col md="4" v-for="(product) in products" :key="product.id">
                <ProductCard :product="product" />
              </b-col>
              <b-col v-if="current_category.id" md="12">
                <nuxt-link :to="'/'+current_category.slug">View All</nuxt-link>
              </b-col>
            </b-row>
            <b-row v-else-if="loadingProducts === true&&products.length==0" class="MainGallerSec">
              <ProductSkeleton v-for="i in 9" :key="i" />
            </b-row>
            <b-row v-else class="MainGallerSec">
              <h2>No Products Found</h2>
              <b-col v-if="current_category.id" md="12">
                <nuxt-link :to="'/'+current_category.slug">View All</nuxt-link>
              </b-col>
            </b-row>
          </b-container>
        </div>
     </div>
    </section>
    <!-- Featurd Works Sec End -->
    <section class="fresh-sec">
      <div class="fresh-main">
        <img src="/images/fresh.png" />
        <div class="fresh-list">
          <div class="container">
            <h5>Only Fresh</h5>
            <ul>
              <li>100% Fresh & Tender products</li>
              <li>Naturally Born Breed</li>
              <li>No products undergoes frozen</li>
              <li>No preservatives added</li>
              <li>High-quality boxes with air tight packaging done</li>
            </ul>
            <nuxt-link to="/shop">Shop Now</nuxt-link>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
export default {
  name: "IndexPage",
  // async asyncData({ $axios }) {
  //   const  res  = await $axios.$get("categories?featured=1").then((e)=>{
  //     return e;
  //   });
  //   let categories = res.data;
  //   return { categories };
  // },
  //  async fetch() {
  //  const res = await this.$axios.$get("categories?featured=1");
  //   this.categories = res.data;
  // },
  methods: {
    async getProducts(category = 0, featured=true, categoryobj={}) {
      this.current_category = categoryobj
      this.loadingProducts = true;
      this.products = []
      this.products = await this.$axios
      .$get("products?category_id=" + category+(featured==true?'&featured=1':'&perpage=6'))
      .then((e) => {
        if(featured==true){
          return e.data;
        }else{
          return e.data.data;
        }
      });
      this.loadingProducts = false;
    },
    async getCategories() {
    const res = await this.$axios.$get("categories?featured=1");
    this.meat_categories = res.data.Meat;
    this.dairy_categories = res.data.Dairy;
    }
  },
  mounted() {
    this.getProducts(0, true);
    this.getCategories();
  },
  data() {
    return {
      products: [],
      meat_categories: [],
      dairy_categories: [],
      loadingProducts: true,
      current_category: {}
    };
  },
};
</script>
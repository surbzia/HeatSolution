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
              </ul>
              <!-- The slideshow -->
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                    src="https://t4.ftcdn.net/jpg/04/67/93/01/360_F_467930159_UcfrOkjhFG436zoT9fSetYccBgpNkokp.jpg"
                    alt="Los Angeles"
                    width="100"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    src="https://thumbs.dreamstime.com/z/computer-cogs-technology-background-blue-banner-old-new-using-circuits-old-machine-31582628.jpg"
                    alt="Los Angeles"
                    width="100"
                  />
                </div>
                <!-- <div class="carousel-item">
                  <img
                    src="/images/carousel.png"
                    alt="Los Angeles"
                    width="100"
                  />
                </div> -->
                <div
                  class="carousel-captionn"
                  data-aos="fade-up"
                  data-aos-duration="2000"
                >
                  <div class="container">
                    <h5 class="heading-1">HEAT</h5>
                    <h5 class="heading-1">Solution</h5>
                    <!-- <nuxt-link to="/shop">Shop Now</nuxt-link> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Header End -->

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
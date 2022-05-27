<template>
  <div>
<div class="bottom-row">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12 p-0">
            <div id="demo" class="carousel slide" data-ride="carousel">
               <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
               </ul>
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
                  <div
                     class="carousel-captionn"
                     data-aos="fade-up"
                     data-aos-duration="2000"
                     >
                     <div class="container">
                        <h5 class="heading-1">HEAT</h5>
                        <h5 class="heading-1">Solution</h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
     
   </div>
</div>
<div class="container-fluid card p-3 m-2">
    <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="col-3 card m-2 p-2">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                     <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                     <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                     <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                     <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                  </div>
               </div>
               <div class="col-8">
                  <div class="tab-content" id="v-pills-tabContent">
                     <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">1 The JSON Formatter was created to help folks with debugging. As JSON data is often output without line breaks to save space, it can be extremely difficult to actually read and make sense of it. This tool hoped to solve the problem by formatting and beautifying the JSON data so that it is easy to read and debug by human beings.</div>
                     <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">2 The JSON Formatter was created to help folks with debugging. As JSON data is often output without line breaks to save space, it can be extremely difficult to actually read and make sense of it. This tool hoped to solve the problem by formatting and beautifying the JSON data so that it is easy to read and debug by human beings.</div>
                     <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">3 The JSON Formatter was created to help folks with debugging. As JSON data is often output without line breaks to save space, it can be extremely difficult to actually read and make sense of it. This tool hoped to solve the problem by formatting and beautifying the JSON data so that it is easy to read and debug by human beings.</div>
                     <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">4 The JSON Formatter was created to help folks with debugging. As JSON data is often output without line breaks to save space, it can be extremely difficult to actually read and make sense of it. This tool hoped to solve the problem by formatting and beautifying the JSON data so that it is easy to read and debug by human beings.</div>
                  </div>
               </div>
            </div>
         </div>
 </div>
</div>
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
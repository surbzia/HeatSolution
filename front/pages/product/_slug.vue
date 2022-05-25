<template>
  <div>
    <BreadCrumb :breadcrumbs="bread" />

    <!-- detailed page -->
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
    <section class="detailed-page">
      <div class="container">
        <div class="row" >
          <div class="col-md-12">
            <h2 class="dpage-heading">{{ product.name }}</h2>
          </div>
          <div class="col-md-8">
            <div class="detail-page-slider">
              <div class="banner-section">
                <div class="">
                  <div class="vehicle-detail-banner banner-content clearfix">
                    <div class="banner-slider">
                      <div class="slider slider-for">
                        <div class="slider-banner-image">
                          <img :src="product.image_url" alt="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="all-desc">
            <div class="detailed-page-heading">
              <!-- <h3></h3>  -->
              <!-- <p>
                <span
                  ><i class="fa fa-star"></i><i class="fa fa-star"></i
                  ><i class="fa fa-star"></i><i class="fa fa-star"></i
                  ><i class="fa fa-star"></i> (4.8)</span
                >
              </p>  -->
               <div class="price">
                <h6>Rs {{ product.price }} per KG</h6>
              </div> 
            </div>
            <div class="detailed-page-buttons">
               <div class="increment-btn">
                <div class="input-group">
                  <span class="input-group-btn">
                    <button
                      type="button"
                      class="quantity-left-minus btn minus-btn btn-number"
                      @click="qty = qty > 1 ? qty - 1 : 1"
                    >
                      <i class="fa fa-minus" aria-hidden="true"></i>
                    </button>
                  </span>
                  <input
                    type="text"
                    id="quantity"
                    name="quantity"
                    class="form-control input-number main-number"
                    :value="qty"
                    min="1"
                    max="100"
                    readonly
                  />
                  <span class="input-group-btn">
                    <button
                      type="button"
                      class="quantity-right-plus btn plus-btn btn-number"
                      @click="qty++"
                    >
                      <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                  </span>
                </div>
              </div> 
               <div class="add-to-cart-btn" v-if="product.in_stock == 1">
                <button type="button" @click="addToCart">add to cart</button>
              </div> 
               <div class="add-to-cart-btn" v-else>
                <span style="font-size: 16px;" class="badge badge-danger mt-2">Out of Stock</span>
              </div> 
            </div>
            <div class="payment-ob">
              <img src="/images/rsIconRed.jpg" alt="" />
              <p>Pay at the time of order delivery</p>
            </div>

            </div>
          </div>
          <div class="col-sm-12 col-md-8 short-desc">
            <h4>DESCRIPTION</h4>
            {{ product.short_description }}
          </div>

        </div>
      </div>
    </section>
     <!-- <section class="dairy-product-detail">
      <div class="container">
        <div class="dairy-product-heading">
          <h3>Product Details</h3>
        </div>
      </div>
      <div class="container">
        <div class="tabs-content">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a
                class="nav-link active"
                id="home-tab"
                data-toggle="tab"
                href="#home"
                role="tab"
                aria-controls="home"
                aria-selected="true"
                >Description</a
              >
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div
              v-html="product.description"
              class="tab-pane fade show active"
              id="home"
              role="tabpanel"
              aria-labelledby="home-tab"
            ></div>
          </div>
        </div>
      </div>
    </section> -->
    <section v-if=" product.length > 0 &&  product.related.length > 0" class="also-like-this">
      <div class="container">
        <div class="like-this-heading">
          <h3>You Also Like This</h3>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div
            v-for="related in product.related"
            :key="related.id"
            class="col-md-3">
            <div class="ftr-proj">
              <nuxt-link :to="'/product/' + related.reference.slug">
                <div class="proj-img">
                  <img :src="related.reference.image_url" alt="" />
                </div>
              </nuxt-link>
              <div class="proj-text">
                <h4>{{ related.reference.name }}</h4>
                <p>{{ related.reference.short_description }}</p>
                <!-- <p>
                  <span
                    ><i class="fa fa-star"></i><i class="fa fa-star"></i
                    ><i class="fa fa-star"></i><i class="fa fa-star"></i
                    ><i class="fa fa-star"></i> 117 Reviews</span
                  >
                </p> -->
                <h5>Rs {{ related.reference.price }}</h5>
                <div class="proj-btn" v-if="product.in_stock == 1">
                  <nuxt-link :to="'/product/' + related.reference.slug"
                    >add to cart</nuxt-link
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
export default {
  // async asyncData({ params, query, $axios, redirect, payload }) {
    // let slug = params.slug;
    // const qty = query.qty?parseInt(query.qty):1;
    // if (payload) {
    //   return { product: payload, qty: qty }
    // }
    // const { data } = await $axios.$get("products/" + params.slug);
    // let product = data;
    // return { product, qty };
  //   return true;
  // },
  data(){
return{
qty:1,
product:[],
bread:[{ to: '/', name: 'Home >', class: '' },],
};
  },
  methods: {
    addToCart() {
      this.$store.commit("cart/add", { item: this.product, quantity: this.qty });
    },
    getProduct(){
       let slug = this.$route.params.slug;
      this.$axios.$get("products/" + slug).then((e)=>{
        this.product = e.data;
        this.bread.push({ to: '/'+this.product.category.slug, name: this.product.category.name+' >', class: '' })
        this.bread.push({ to: '/'+this.product.slug, name: this.product.name, class: 'active' })
      });
    }
  },
  mounted(){
    this.getProduct();
  }
};
</script>
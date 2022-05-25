<template>
  <section class="add-to-cart">
    <BreadCrumb :breadcrumbs="[
    { to: '/', name: 'Home >', class: '' },
    { to: '/cart', name: 'Cart', class: 'active' },
    
    ]" />
    <section class="about-banner new-banner">
      <div class="inner-banner-img">
        <img src="/images/about-banner.png" />
        <div class="container">
          <div class="about-heading">
            <h2>Cart</h2>
          </div>
        </div>
      </div>
    </section>

    <div class="checkout-view">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Image</th>

                    <th class="pro-tab">Product</th>
                    <th>QUANTITY</th>
                    <th>TOTAL IN PKR</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="(item, itemk) in items"
                    :key="item.id"
                    class="space"
                  >
                    <td class="">
                      <div class="">
                        <div class="">
                          <div class="">
                            <div class="product-img">
                              <img
                                :src="item.product.image_url"
                                alt=""
                                class="img-responsive"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="no-space">
                        <p>{{ item.product.name }}</p>
                      </div>
                    </td>
                    <td class="">
                      <div class="number-item">
                        <button @click="lessQty(itemk)" class="minus">
                          <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                        <input
                          readonly
                          type="text"
                          class="qtystyle"
                          :value="item.quantity"
                        />
                        <button @click="addQty(itemk)" class="plus">
                          <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                      </div>
                    </td>
                    <!-- <td class="col-md-2">
                      <h4>Rs {{ item.product.price }}</h4>
                    </td> -->
                    <td class="">
                      <p>Rs {{ item.product.price * item.quantity }}</p>
                    </td>
                    <td>
                      <button @click="removeItem(itemk)" class="remove">
                        <i class="fa fa-times" aria-hidden="true"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="total-section">
              <!-- <b-form v-if="show" >
                <b-form-group id="input-group-2" label="Enter Code:" label-for="input-coupon">
                <b-form-input
                  id="input-coupon"
                  v-model="form.coupon"
                  placeholder="Enter Code"
                  required
                ></b-form-input>
                 </b-form-group>
                 <b-button type="submit">Apply</b-button>
              </b-form> -->
              <p class="col-md-12">Subtotal: <span>Rs {{ total }}</span></p>
            </div>

            <div class="cart-two">
              <b-row>
                <b-col md="5">
                  <div class="cod">
                    <div class="img-holder">
                      <img src="/images/rsIconRed.jpg" alt="" />
                    </div>
                    <div class="content-holder">
                      <h4>Cash on delivery</h4>
                      <p>Pay cash at the time of order delivery</p>
                    </div>
                  </div>
                </b-col>
                <b-col md="7">
                  <div class="cod">
                    <div class="img-holder">
                      <img src="/images/rsIconRed.jpg" alt="" />
                    </div>
                    <div class="content-holder">
                      <h4>Total</h4>
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <tbody>
                            <tr>
                              <td>Sub Total</td>
                              <td>Rs. {{ total }}</td>
                            </tr>
                            <tr>
                              <td>You Saved</td>
                              <td>0</td>
                            </tr>
                            <tr>
                              <td>Grand Total</td>
                              <td>Rs. {{ total }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- <p>Minium order Rs.1000</p> -->
                      <div class="row">
                        <div class="col-md-12">
                          <div class="proceed">
                            <div class="col-md-6">
                              <nuxt-link to="/"
                                ><span><i class="fa fa-angle-left"></i></span>
                                Continue Shopping</nuxt-link
                              >
                            </div>

                            <div class="col-md-6 text-center">
                              <nuxt-link class="checkout-btn" to="/checkout"
                                >Proceed To Checkout</nuxt-link
                              >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </b-col>
              </b-row>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  data() {
      return {
        form: {
        
          coupon: '',
        
        
        },
        
        show: true
      }
    },
    methods: {
      onSubmit(event) {
      },
      
    },
  computed: {
    items() {
      return this.$store.state.cart.items;
    },
    total() {
      return this.$store.state.cart.total;
    },
  },
  methods: {
    lessQty(index) {
      this.$store.commit("cart/qtyChange", {
        index: index,
        type: "less",
      });
    },
    addQty(index) {
      this.$store.commit("cart/qtyChange", {
        index: index,
        type: "add",
      });
    },
    removeItem(index) {
      this.$store.commit("cart/remove", {
        index: index,
      });
    },
  },
};
</script>
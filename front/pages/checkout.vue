<template>
  <section class="checkout-sec about_section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="checkout-heading">
            <h5>Billing Address</h5>
          </div>
          <div class="form-tab">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input
                      class="form-control"
                      required=""
                      type="text"
                      name="f_name"
                      placeholder="First Name"
                      @input="billing_first_name"
                      :value="billing_first_name_comp"
                    />
                    <b-form-invalid-feedback v-if="billing_first_name_err.length>0" :force-show="true" id="input-1-live-feedback">{{ billing_first_name_err[0] }}</b-form-invalid-feedback>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input
                      class="form-control"
                      type="text"
                      placeholder="Last Name"
                      name="l_name"
                      required=""
                      @input="billing_last_name"
                      :value="billing_last_name_comp"
                    />
                    <b-form-invalid-feedback v-if="billing_last_name_err.length>0" :force-show="true" id="input-1-live-feedback">{{ billing_last_name_err[0] }}</b-form-invalid-feedback>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input
                      class="form-control"
                      type="Email"
                      required=""
                      placeholder="Email Address"
                      name="email"
                      @input="billing_email"
                      :value="billing_email_comp"
                    />
                    <b-form-invalid-feedback v-if="billing_email_err.length>0" :force-show="true" id="input-1-live-feedback">{{ billing_email_err[0] }}</b-form-invalid-feedback>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input
                      class="form-control"
                      required=""
                      placeholder="Address*"
                      type="text"
                      name="address"
                      @input="billing_address"
                      :value="billing_address_comp"
                    />
                    <b-form-invalid-feedback v-if="billing_address_err.length>0" :force-show="true" id="input-1-live-feedback">{{ billing_address_err[0] }}</b-form-invalid-feedback>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input
                      class="form-control"
                      placeholder="Apartment, suite, etc. (optional)"
                      type="text"
                      name="address"
                      @input="billing_address_2"
                      :value="billing_address_2_comp"
                    />
                    <b-form-invalid-feedback v-if="billing_address_2_err.length>0" :force-show="true" id="input-1-live-feedback">{{ billing_address_2_err[0] }}</b-form-invalid-feedback>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input
                      class="form-control"
                      required=""
                      placeholder="City"
                      type="text"
                      name="city"
                      @input="billing_city"
                      :value="billing_city_comp"
                    />
                    <b-form-invalid-feedback v-if="billing_city_err.length>0" :force-show="true" id="input-1-live-feedback">{{ billing_city_err[0] }}</b-form-invalid-feedback>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input
                      class="form-control"
                      required=""
                      placeholder="Postal Code *"
                      type="text"
                      name="city"
                      @input="billing_zip"
                      :value="billing_zip_comp"
                    />
                    <b-form-invalid-feedback v-if="billing_zip_err.length>0" :force-show="true" id="input-1-live-feedback">{{ billing_zip_err[0] }}</b-form-invalid-feedback>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input
                      class="form-control"
                      required=""
                      type="number"
                      placeholder="Phone"
                      name="phone_num"
                      @input="billing_phone"
                      :value="billing_phone_comp"
                    />
                    <b-form-invalid-feedback v-if="billing_phone_err.length>0" :force-show="true" id="input-1-live-feedback">{{ billing_phone_err[0] }}</b-form-invalid-feedback>
                  </div>
                </div>
              </div>

              <div class="form-group frm-check">
                <div class="row">
                  <div class="col-md-1 col-sm-1 col-xs-1">
                    <input type="checkbox" v-model="same_as_billing_comp" name="same-as-above" />
                  </div>

                  <div class="col-md-11 col-sm-11 col-xs-11">
                    <label for="">Shipping Same As Above *</label>
                  </div>
                </div>
              </div>
          </div>

          <div v-if="same_as_billing_comp===false" class="checkout-heading">
            <h5>Shipping Address</h5>
          </div>
          <div v-if="same_as_billing_comp===false" class="form-tab">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input
                      class="form-control"
                      required=""
                      type="text"
                      name="f_name"
                      placeholder="First Name"
                      @input="shipping_first_name"
                      :value="shipping_first_name_comp"
                    />
                    <b-form-invalid-feedback v-if="shipping_first_name_err.length>0" :force-show="true" id="input-1-live-feedback">{{ shipping_first_name_err[0] }}</b-form-invalid-feedback>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input
                      class="form-control"
                      type="text"
                      placeholder="Last Name"
                      name="l_name"
                      required=""
                      @input="shipping_last_name"
                      :value="shipping_last_name_comp"
                    />
                    <b-form-invalid-feedback v-if="shipping_last_name_err.length>0" :force-show="true" id="input-1-live-feedback">{{ shipping_last_name_err[0] }}</b-form-invalid-feedback>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input
                      class="form-control"
                      required=""
                      placeholder="Address*"
                      type="text"
                      name="address"
                      @input="shipping_address"
                      :value="shipping_address_comp"
                    />
                    <b-form-invalid-feedback v-if="shipping_address_err.length>0" :force-show="true" id="input-1-live-feedback">{{ shipping_address_err[0] }}</b-form-invalid-feedback>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input
                      class="form-control"
                      placeholder="Apartment, suite, etc. (optional)"
                      type="text"
                      name="address"
                      @input="shipping_address_2"
                      :value="shipping_address_2_comp"
                    />
                    <b-form-invalid-feedback v-if="shipping_address_2_err.length>0" :force-show="true" id="input-1-live-feedback">{{ shipping_address_2_err[0] }}</b-form-invalid-feedback>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input
                      class="form-control"
                      required=""
                      placeholder="City"
                      type="text"
                      name="city"
                      @input="shipping_city"
                      :value="shipping_city_comp"
                    />
                    <b-form-invalid-feedback v-if="shipping_city_err.length>0" :force-show="true" id="input-1-live-feedback">{{ shipping_city_err[0] }}</b-form-invalid-feedback>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input
                      class="form-control"
                      required=""
                      placeholder="Postal Code *"
                      type="text"
                      name="city"
                      @input="shipping_zip"
                      :value="shipping_zip_comp"
                    />
                    <b-form-invalid-feedback v-if="shipping_zip_err.length>0" :force-show="true" id="input-1-live-feedback">{{ shipping_zip_err[0] }}</b-form-invalid-feedback>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <input
                      class="form-control"
                      required=""
                      type="number"
                      placeholder="Phone"
                      name="phone_num"
                      @input="shipping_phone"
                      :value="shipping_phone_comp"
                    />
                    <b-form-invalid-feedback v-if="shipping_phone_err.length>0" :force-show="true" id="input-1-live-feedback">{{ shipping_phone_err[0] }}</b-form-invalid-feedback>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="checkoutSec">
            <div class="checkoutBox">
              <div class="checkoutHead">
                <h5>your order</h5>
              </div>
              <div class="checkoutBody">
                <ul class="list-unstyled mb-0">
                  <li v-for="(item, itemk) in items" :key="item.id">
                    {{ item.product.name }} x {{ item.quantity }}
                    <span class="pull-right"
                      >Rs {{ item.product.price * item.quantity }}</span
                    >
                  </li>
                  <!-- <li>
                    Shipping <span class="pull-right">Free Shipping</span>
                  </li> -->
                  <!-- <li>VAT 19.0 % <span class="pull-right">$95</span></li> -->
                  <li>
                    Order Total <span class="pull-right">Rs {{ total }}</span>
                  </li>
                </ul>
              </div>

              <div class="checkoutFoot p-3">
                <div class="web-btn">
                  <button  v-show="items.length>0" v-if="!formloading" :disabled="formloading" @click="saveOrder" type="button">PLACE ORDER</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import { mapMutations, mapState, mapActions } from 'vuex'
export default {
  computed:{
    ...mapState({
      shipping_email_comp: state=>state.checkout.form.shipping.shipping_email,
      shipping_notes_comp: state=>state.checkout.form.shipping.shipping_notes,
      shipping_first_name_comp: state=>state.checkout.form.shipping.shipping_first_name,
      shipping_last_name_comp: state=>state.checkout.form.shipping.shipping_last_name,
      shipping_address_comp: state=>state.checkout.form.shipping.shipping_address,
      shipping_address_2_comp: state=>state.checkout.form.shipping.shipping_address_2,
      shipping_city_comp: state=>state.checkout.form.shipping.shipping_city,
      shipping_zip_comp: state=>state.checkout.form.shipping.shipping_zip,
      shipping_phone_comp: state=>state.checkout.form.shipping.shipping_phone,
      shipping_company_comp: state=>state.checkout.form.shipping.shipping_company,
      shipping_country_comp: state=>state.checkout.form.shipping.shipping_country,
      shipping_state_comp: state=>state.checkout.form.shipping.shipping_state,
      billing_first_name_comp: state=>state.checkout.form.billing.billing_first_name,
      billing_last_name_comp: state=>state.checkout.form.billing.billing_last_name,
      billing_address_comp: state=>state.checkout.form.billing.billing_address,
      billing_address_2_comp: state=>state.checkout.form.billing.billing_address_2,
      billing_city_comp: state=>state.checkout.form.billing.billing_city,
      billing_zip_comp: state=>state.checkout.form.billing.billing_zip,
      billing_phone_comp: state=>state.checkout.form.billing.billing_phone,
      billing_email_comp: state=>state.checkout.form.billing.billing_email,
      //errors
      shipping_email_err: state=>state.checkout.errors.shipping_email,
      shipping_notes_err: state=>state.checkout.errors.shipping_notes,
      shipping_first_name_err: state=>state.checkout.errors.shipping_first_name,
      shipping_last_name_err: state=>state.checkout.errors.shipping_last_name,
      shipping_address_err: state=>state.checkout.errors.shipping_address,
      shipping_address_2_err: state=>state.checkout.errors.shipping_address_2,
      shipping_city_err: state=>state.checkout.errors.shipping_city,
      shipping_zip_err: state=>state.checkout.errors.shipping_zip,
      shipping_phone_err: state=>state.checkout.errors.shipping_phone,
      shipping_company_err: state=>state.checkout.errors.shipping_company,
      shipping_country_err: state=>state.checkout.errors.shipping_country,
      shipping_state_err: state=>state.checkout.errors.shipping_state,
      billing_first_name_err: state=>state.checkout.errors.billing_first_name,
      billing_last_name_err: state=>state.checkout.errors.billing_last_name,
      billing_address_err: state=>state.checkout.errors.billing_address,
      billing_address_2_err: state=>state.checkout.errors.billing_address_2,
      billing_city_err: state=>state.checkout.errors.billing_city,
      billing_zip_err: state=>state.checkout.errors.billing_zip,
      billing_phone_err: state=>state.checkout.errors.billing_phone,
      billing_email_err: state=>state.checkout.errors.billing_email,
      formloading: state=>state.checkout.formloading,
      items: state=>state.cart.items,
      subtotal: state=>state.cart.total,
      total: state=>state.cart.total,
      currency: state=>state.currency,
    }),
    same_as_billing_comp:{
      get(){
        return this.$store.state.checkout.same_as_billing
      },
      set(value){
        this.$store.commit('checkout/set_same_as_billing', value)
      }
    },
  },
  methods: {
    ...mapMutations({
      shipping_email: 'checkout/set_shipping_email',
      shipping_notes: 'checkout/set_shipping_notes',
      shipping_first_name: 'checkout/set_shipping_first_name',
      shipping_last_name: 'checkout/set_shipping_last_name',
      shipping_address: 'checkout/set_shipping_address',
      shipping_address_2: 'checkout/set_shipping_address_2',
      shipping_city: 'checkout/set_shipping_city',
      shipping_zip: 'checkout/set_shipping_zip',
      shipping_phone: 'checkout/set_shipping_phone',
      shipping_company: 'checkout/set_shipping_company',
      shipping_country: 'checkout/set_shipping_country',
      shipping_state: 'checkout/set_shipping_state',
      billing_first_name: 'checkout/set_billing_first_name',
      billing_last_name: 'checkout/set_billing_last_name',
      billing_address: 'checkout/set_billing_address',
      billing_address_2: 'checkout/set_billing_address_2',
      billing_city: 'checkout/set_billing_city',
      billing_zip: 'checkout/set_billing_zip',
      billing_phone: 'checkout/set_billing_phone',
      billing_email: 'checkout/set_billing_email',
    }),
    saveOrder(){
      this.$store.dispatch('checkout/save',{
        items: this.items,
        subtotal:this.subtotal,
        total:this.total,
      })
    },
  }
};
</script>
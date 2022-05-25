<template>
  <b-row>
    <b-col md="6">
      <div class="detailed-page-buttons">
        <div class="increment-btn">
          <!-- <div class="input-group">
            <span class="input-group-btn">
              <button
                type="button"
                class="quantity-left-minus btn minus-btn btn-number"
                @click="less"
                :disabled="qty==1"
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
                @click="add"
              >
                <i class="fa fa-plus" aria-hidden="true"></i>
              </button>
            </span>
          </div> -->
        </div>
      </div>
    </b-col>
    <b-col md="12">
      <div class="proj-btn" v-if="product.in_stock == 1">
        <a href="javascript:;" class="col-md-12 text-center" @click="addToCart(product)" >Add to cart</a>
      </div>
      <div class="proj-btn" v-else>
        <a href="javascript:;" style="background: #800000 !important;" class="col-md-12 text-center" >Out of Stock</a>
      </div>
    </b-col>
  </b-row>
</template>
<script>
export default {
    props:{
        product:{
            type: Object,
            default: {},
        }
    },
    data(){
        return{
            qty: 1,
        }
    },
    methods:{
        add(){
            this.qty++
        },
        less(){
            this.qty = (this.qty>1?(this.qty-1):1)
        },
        addToCart(product){
            this.$store.commit("cart/add", { item: product, quantity: this.qty });
        }
    }
}
</script>
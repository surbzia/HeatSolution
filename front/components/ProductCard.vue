<template>
  <div class="pro-box">
    <div class="img-holder">
      <nuxt-link :to="'/product/' + product.slug">
        <img :src="product.image_url" alt="" />
      </nuxt-link>
    </div>
    <div class="pro-details">
      <div class="pro-title">
        <h5>
          <nuxt-link :to="'/product/' + product.slug">{{ product.name }}</nuxt-link>
        </h5>
      </div>
       <div class="price">
        <p>
          Rs. {{ product.price }}
          {{ product.product_sale_type.single_qty_text }}
        </p>
      </div> 
       <ProductCartQty :product="product" />
    </div>
  </div>
</template>
<script>
export default {
    props:{
        product:{
            type: Object,
            default: {},
        }
    }
}
</script>
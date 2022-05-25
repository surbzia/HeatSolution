<template>
  <div>
    <Header />
    <Nuxt />
    <Footer />
  </div>
</template>
<script>
import AOS from 'aos';
export default {
  mounted(){
    if (process.client) {
      AOS.init();
    }
    this.$store.commit('cart/initialize')
  }
}
</script>
<template>
  <section class="inner-breadcrumb">
    <div class="container">
      <div class="col-lg-12">
        <ul>
          <li v-for="(breadcrumb, breadcrumbk) in breadcrumbs" :key="breadcrumbk"><nuxt-link :class="breadcrumb.class" :to="breadcrumb.to">{{breadcrumb.name}}</nuxt-link></li>
        </ul>
      </div>
    </div>
  </section>
</template>
<script>
export default {
    props:{
        breadcrumbs:{
            type: Array,
            default: [{to: "/", name: "Home >", class: ""}]
        }
    }
}
</script>
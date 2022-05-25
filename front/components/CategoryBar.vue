<template>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <nuxt-link :to="'/' + category.slug">
            All
          </nuxt-link>
        </h4>
      </div>
    </div>

    <div v-for="child in category.child" :key="child.id" class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <nuxt-link v-if="child.child.length==0" :to="'/' + category.slug+'/'+child.slug">
            {{child.name}}
          </nuxt-link>
          <a v-else class="collapsed" data-toggle="collapse" data-parent="#accordion" :href="'#collapse'+child.id" aria-expanded="true">{{child.name}}</a>
        </h4>
      </div>
      <div v-if="child.child.length>0" :id="'collapse'+child.id" class="panel-collapse collapse show" aria-expanded="true" style="">
          <div class="panel-body">
              <div class="panel-group" id="nested">
                  <li v-for="childthird in child.child" :key="childthird.id"><nuxt-link :to="'/' + category.slug+'/'+child.slug+'/'+childthird.slug">{{childthird.name}}</nuxt-link></li>
              </div>
          </div>
      </div>
    </div>

  </div>
</template>
<script>
export default {
  props: {
    category: {
      type: Object,
      default: {},
    },
  },
};
</script>
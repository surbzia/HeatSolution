<template>
  <div class="col-md-4 product-skeleton">
    <b-skeleton-wrapper :loading="loading">
      <template #loading>
        <b-card>
          <b-skeleton width="85%"></b-skeleton>
          <b-skeleton width="55%"></b-skeleton>
          <b-skeleton width="70%"></b-skeleton>
        </b-card>
      </template>
    </b-skeleton-wrapper>
  </div>
</template>
<script>
export default {
  data() {
    return {
      loading: true,
    };
  },
};
</script>
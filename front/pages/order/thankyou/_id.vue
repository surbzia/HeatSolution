<template>
    <div>
        <BreadCrumb
        :breadcrumbs="[
            { to: '/', name: 'Home >', class: '' },
            {
            to: '/order/thankyou/'+order_id,
            name: 'Thank you #'+order_id,
            class: 'active',
            },
        ]"
        />
        <section class="about-banner new-banner">
        <div class="inner-banner-img">
            <img src="/images/about-banner.png" />
            <div class="container">
            <div class="about-heading">
                <h2>YOU ARE DONE!</h2>
                <h3 class="text-white">We hope to serve you again!</h3>
            </div>
            </div>
        </div>
        </section>
        <div class="thankyou-inner text-center">
            <b-container>
            <h1>Thank You!</h1>
            <div class="block ref">Ref Number: {{order_id}}</div>
            <p>We have received your order.
            The Freshify customer service agent will call you shortly for Order Confirmation.</p>
            <nuxt-link to="/">Back to The Freshify</nuxt-link>
            </b-container>
        </div>
    </div>
</template>
<script>
export default {
    async asyncData({ params, $axios, redirect }){
        let order_id = params.id
        return {order_id}
    },
}
</script>
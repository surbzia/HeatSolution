<template>
  <div>
    <section class="about-banner">
      <div class="inner-banner-img">
        <img src="/images/about-banner.png" />
        <div class="container">
          <div class="about-heading">
            <h2>Deals & Promotions</h2>
          </div>
        </div>
      </div>
    </section>
    <BreadCrumb
      :breadcrumbs="[
        { to: '/', name: 'Home >', class: '' },
        { to: '/dealsandpromotions', name: 'Deal & Promotions', class: 'active' },
      ]"
    />
    <section class="our-deals">
      <b-container>
      <b-row>
        <b-col md="3">
          <div class="img-holder">
          <nuxt-link to="/inquiryform"><img src="/images/aqiqa.png" alt="deals"/></nuxt-link>
          </div>
          <div class="deal-service">
            <div class="deal-icn">
              <img src="/images/aqiqaicn.png" alt="Aqiqa Service"/>
            </div>
            <h4><nuxt-link to="/inquiryform">
            
            Aqiqa Service
            
            </nuxt-link></h4>
            
            <p>Frestify now offers a convenient Aqiqa service</p>
          </div>
        </b-col>

        <b-col md="3">
          <div class="img-holder">
            <nuxt-link to="/inquiryform"><img src="/images/sadqa.png" alt="deals"/></nuxt-link>
          </div>
          <div class="deal-service">
            <div class="deal-icn">
              <img src="/images/sadqaicn.png" alt="Sadqa Service"/>
            </div>
             <h4><nuxt-link to="/inquiryform">Sadqa Service</nuxt-link></h4>
            <p>Delivery Deal is coming soon. Stay connected with us to find all about it!</p>
          </div>
        </b-col>

        <b-col md="3">
          <div class="img-holder">
            <nuxt-link to="/inquiryform"><img src="/images/qurbani.png" alt="deals"/></nuxt-link>
          </div>
          <div class="deal-service">
            <div class="deal-icn">
              <img src="/images/qurbaniicn.png" alt="Qurbani Service"/>
            </div>
             <h4><nuxt-link to="/inquiryform">Qurbani Service</nuxt-link></h4>
            <p>Qurbani bookings are now open</p>
          </div>
        </b-col>
        <b-col md="3">
          <div class="img-holder">
            <nuxt-link to="/inquiryform"><img src="/images/life-animals.png" alt="deals"/></nuxt-link>
          </div>
          <div class="deal-service">
            <div class="deal-icn">
              <img src="/images/sadqaicn.png" alt="deals"/>
            </div>
             <h4><nuxt-link to="/inquiryform">Sell live Animals</nuxt-link></h4>
            <p>Bookings of live animals are now open</p>
          </div>
        </b-col>
      </b-row>
      </b-container>
    </section>

    <!-- <section class="man-meat">
      <div class="container">
        <div class="meat-people">
          <img src="/images/About-Us-1.png" />
        </div>
      </div>
    </section> -->

    

    
  <div>
  
</div>

  </div>
</template>

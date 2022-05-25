<template>
  <div>
    <section class="contact-banner">
      <div class="inner-banner-img">
        <img src="/images/store-location.png" />
        <div class="container">
          <div class="about-heading location-heading">
            <h2>Store Location</h2>
          </div>
        </div>
      </div>
    </section>
    <BreadCrumb
      :breadcrumbs="[
        { to: '/', name: 'Home >', class: '' },
        { to: '/store-location', name: 'Store Location', class: 'active' },
      ]"
    />
    <!-- location content  -->
    <section class="location-content">
      <div class="location-content-heading">
        <div class="container">
          <h1>Contrary to Location</h1>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="location-map">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14472.637021074677!2d67.0902108!3d24.9266441!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x99c402b86cef223!2sThe%20Soft%20Cube!5e0!3m2!1sen!2s!4v1642437930428!5m2!1sen!2s"
                width="1100"
                height="650"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
              ></iframe>
              <div class="freshify-location-card">
                <h3>The Freshify</h3>
                <div class="location-card-avatar">
                  <div class="location-card-avatar-img">
                    <img src="/images/white-card-img.png" alt="img" />
                  </div>

                  <div class="location-card-txt">
                    <h6>Lorem Ipsum Dolor</h6>
                    <p>It is a long established fact reader.</p>
                  </div>
                </div>
                <div class="location-card-addresses">
                  <div class="location-card-address">
                    <i class="fa fa-map-marker"></i>
                    <span>
                      <h6>Address</h6>
                      <p>
                        Lorem ipsum ground floor, dumy text about lorem Near
                        dummy text, 123456
                      </p>
                    </span>
                  </div>

                  <div class="location-card-address">
                    <i class="fa fa-phone"></i>
                    <span>
                      <h6>Phone</h6>
                      <p>Call: 123 456 789 0</p>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- location content End -->
  </div>
</template>
<script>
export default {};
</script>
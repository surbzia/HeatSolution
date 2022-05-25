<template>
  <div>
    <!-- <section class="contact-banner">
      <div class="inner-banner-img">
        <img src="/images/shiiping-banner.png" />
        <div class="container">
          <div class="about-heading">
            <h2>FAQs</h2>
          </div>
        </div>
      </div>
    </section> -->
    <BreadCrumb
      :breadcrumbs="[
        { to: '/', name: 'Home >', class: '' },
        {
          to: '/faq',
          name: 'FAQs',
          class: 'active',
        },
      ]"
    />
    <section class="faq-main">
      <b-container>
        <div class="faq-title">
          <h2>FAQs</h2>
        </div>

        <div class="accordion" role="tablist">
          <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
              <b-button block v-b-toggle.accordion-1 variant="info"
                >1. How should your customers know that your meat is 100%
                Halal?</b-button
              >
            </b-card-header>
            <b-collapse
              id="accordion-1"
              visible
              accordion="my-accordion"
              role="tabpanel"
            >
              <b-card-body>
                <b-card-text
                  >The Freshify has its in-house panel of Muftis, veterinarians,
                  and food scientists to confirm that all our meat products are
                  certified Halal and 100% safe for consuming. The Freshify has
                  its own microbiological testing labs, ensuring meat is
                  properly check and is approved to be consumed by our
                  customers.</b-card-text
                >
              </b-card-body>
            </b-collapse>
          </b-card>

          <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
              <b-button block v-b-toggle.accordion-2 variant="info"
                >2. What happens when a customer is not satisfied with the
                product?</b-button
              >
            </b-card-header>
            <b-collapse
              id="accordion-2"
              accordion="my-accordion"
              role="tabpanel"
            >
              <b-card-body>
                <b-card-text
                  >If you are unhappy with your purchase, return it with
                  packaging or invoice and get your money back, or the meat will
                  be replaced, no questions asked!</b-card-text
                >
              </b-card-body>
            </b-collapse>
          </b-card>

          <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
              <b-button block v-b-toggle.accordion-3 variant="info"
                >3. Are you confident that the meat provided is Fresh?</b-button
              >
            </b-card-header>
            <b-collapse
              id="accordion-3"
              accordion="my-accordion"
              role="tabpanel"
            >
              <b-card-body>
                <b-card-text
                  >All our meat reaches The Freshify stores within 24 hrs of
                  slaughtering after going through all the quality checks in a
                  temperature-controlled van. So it always gets to you fresh and
                  without any contaminants as the truck is securely shut and
                  temperature-controlled to prevent the meat from going bad.
                  This process enables us to ensure maximum hygiene and
                  freshness, which helps us retain the taste of
                  meat!</b-card-text
                >
              </b-card-body>
            </b-collapse>
          </b-card>

          <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
              <b-button block v-b-toggle.accordion-4 variant="info"
                >4. Are the meat products trimmed and cleaned?</b-button
              >
            </b-card-header>
            <b-collapse
              id="accordion-4"
              accordion="my-accordion"
              role="tabpanel"
            >
              <b-card-body>
                <b-card-text
                  >We abstain from charging you for excess bones and fats; we
                  weight the meat after removing them. Almost 12%-15% fat is
                  removed, giving you more meat than others, giving you 100%
                  value for your money!</b-card-text
                >
              </b-card-body>
            </b-collapse>
          </b-card>

          <b-card no-body class="mb-1">
            <b-card-header header-tag="header" class="p-1" role="tab">
              <b-button block v-b-toggle.accordion-5 variant="info"
                >5. Are your meat products pure?</b-button
              >
            </b-card-header>
            <b-collapse
              id="accordion-5"
              accordion="my-accordion"
              role="tabpanel"
            >
              <b-card-body>
                <b-card-text
                  >The Freshify commits to offering its customers pure Halal meat
                  with no contaminants and pollutants.</b-card-text
                >
              </b-card-body>
            </b-collapse>
          </b-card>
        </div>
      </b-container>
    </section>
  </div>
</template>
<template>
  <div>
    <section class="about-banner">
      <div class="inner-banner-img">
        <img src="/images/about-banner.png" />
        <div class="container">
          <div class="about-heading">
            <h2>Inquiry</h2>
          </div>
        </div>
      </div>
    </section>
    <BreadCrumb
      :breadcrumbs="[
        { to: '/', name: 'Home >', class: '' },
        { to: '/inquiry', name: 'Inquiry', class: 'active' },
      ]"
    />
    <section class="inq-form">
      <b-container>
        <b-row>
          <b-col md="7" >

              <b-form v-if="show">
                <h3>GET IN TOUCH</h3>
                <b-form-group
                  id="input-group-1"
                  label="Email address:"
                  label-for="input-1"
                >
                  <b-form-input
                    id="input-1"
                    type="email"
                    placeholder="Enter email"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group
                  id="input-group-2"
                  label="Your Name:"
                  label-for="input-2"
                >
                  <b-form-input
                    id="input-2"
                    placeholder="Enter name"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group
                  id="input-phone"
                  label="Phone Number:"
                  label-for="input-phone"
                >
                  <b-form-input
                    id="input-phone"
                    placeholder="Enter name your Phone Number"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group
                  id="input-group-3"
                  label="Dropdown:"
                  label-for="input-3"
                >
                  <b-form-select
                    id="input-3"
                    :options="dropdown"
                    required
                  ></b-form-select>
                </b-form-group>

                <b-form-group
                  id="input-message"
                  label="Message:"
                  label-for="textarea"
                >
                  <b-form-textarea
                    id="textarea"
                    placeholder="Enter your message"
                    rows="3"
                    max-rows="6"
                  ></b-form-textarea>
                </b-form-group>
                <b-button type="submit">Submit</b-button>
              </b-form>
            
          </b-col>
          <b-col md="5"> 
              <div class="cont-info">
                <h3>CONTACT INFO</h3>
                <ul>
                  <li><i class="fa fa-map-marker" aria-hidden="true"></i> <p>Office#105, 1st Floor, Noor Trade Center,<br>Gulshan-e-Iqbal, 13-B, Karachi</p></li>
                  <li><i class="fa fa-phone" aria-hidden="true"></i> <p>Ph: <a href="tel:02134813621">0213-4813621</a></p></li>
                  <li><i class="fa fa-phone" aria-hidden="true"></i> <p>Ph: <a href="tel:+923192004008">0319-2004008</a></p></li>
                  <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <p>Email: <a href="mailto:info@thefreshify.com">info@thefreshify.com</a></p></li>
                </ul>
                <hr>
                <div class="w-app">
                  <a href="https://api.whatsapp.com/send?phone=+923192004008"><i class="fa fa-whatsapp" aria-hidden="true"></i> Contact Us on WhatsApp</a>
                </div>
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
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: {},

      show: true,
      dropdown: [
        { text: "Select One", value: null },
        "Carrots",
        "Beans",
        "Tomatoes",
        "Corn",
      ],
    };
  },
  methods: {
    onSubmit(event) {},
  },
};
</script>
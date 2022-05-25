<template>
  <div>
    <section class="contact-banner">
      <div class="inner-banner-img">
        <img src="/images/shiiping-banner.png" />
        <div class="container">
          <div class="about-heading">
            <h2>Shipping & Returns</h2>
          </div>
        </div>
      </div>
    </section>
    <BreadCrumb
      :breadcrumbs="[
        { to: '/', name: 'Home >', class: '' },
        {
          to: '/shipping-and-return',
          name: 'Shipping & Returns',
          class: 'active',
        },
      ]"
    />
    <!-- privacy-policy-section  -->
    <section class="privacy-policy-content sar-content">
      <div class="container">
        <div class="col-md-12">
          <div class="privacy-policy-heading">
            <h5>Return & Refunds</h5>
          </div>
          <div class="privacy-policy-txt">
            <p>
              The Freshify aims always to provide its consumers with the best meat quality. Our Returns & Refunds policy approves returns and refunds in cases of delivering the wrong product delivering meat that has gone bad. We don't offer refunds, but we provide our consumers with replacements, sending the proper order to them, asking for return of the rancid meat delivered to them, and sending them freshly packed meat.
            </p>
          </div>
        </div>

        <!-- <div class="col-md-12">
          <div class="privacy-policy-heading">
            <h5>You Agree and Confirm</h5>
          </div>
          <div class="sar-txt">
            <ul>
              <li>
                <p><i class="fa fa-check"></i></p>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit nunc
                  at elit quis nulla posuere consectetur eget quis turpis
                  integer ut neque vitae dolor ullamcorper vestibulum vitae ut
                  felis.
                </p>
              </li>

              <li>
                <p><i class="fa fa-check"></i></p>
                <p>
                  Suspendisse elementum nibh at eros pretium lobortis quisque
                  varius sem rutrum ligula efficitur imperdiet fusce vitae diam
                  malesuada, mattis odio non, vestibulum augue pellentesque
                  aliquam diam nibh iaculis, vehicula posuere lectus ultrices
                  donec venenatis libero eget augue lobortis volutpat.
                </p>
              </li>

              <li>
                <p><i class="fa fa-check"></i></p>
                <p>
                  Vestibulum vitae magna pulvinar, dignissim enim in, molestie
                  nisl.
                </p>
              </li>

              <li>
                <p><i class="fa fa-check"></i></p>
                <p>
                  Suspendisse aliquet enim eget lacus dictum, at pretium ligula
                  aliquet nam sed orci et urna sodales facilisis vestibulum a
                  massa sed lacus mollis venenatis at sed velit.
                </p>
              </li>

              <li>
                <p><i class="fa fa-check"></i></p>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit nunc
                  at elit quis nulla posuere consectetur eget quis turpis
                  integer ut neque vitae dolor ullamcorper vestibulum vitae ut
                  felis.
                </p>
              </li>

              <li>
                <p><i class="fa fa-check"></i></p>
                <p>
                  Suspendisse elementum nibh at eros pretium lobortis quisque
                  varius sem rutrum ligula efficitur imperdiet fusce vitae diam
                  malesuada, mattis odio non, vestibulum augue pellentesque
                  aliquam diam nibh iaculis, vehicula posuere lectus ultrices
                  donec venenatis libero eget augue lobortis volutpat.
                </p>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-md-12">
          <div class="privacy-policy-heading">
            <h5>You May Not use the Site for Any of the Following Purposes</h5>
          </div>
          <div class="sar-txt sar-txt-2">
            <ul>
              <li>
                <p>01:</p>
                <p>
                  Pellentesque aliquam diam ut nibh iaculis, vehicula posuere
                  lectus ultrices.
                </p>
              </li>

              <li>
                <p>02:</p>
                <p>Donec venenatis libero eget augue lobortis volutpat.</p>
              </li>

              <li>
                <p>03:</p>
                <p>
                  Vestibulum vitae magna pulvinar, dignissim enim in, molestie
                  nisl suspendisse aliquet enim eget lacus dictum, at pretium
                  ligula aliquet.
                </p>
              </li>

              <li>
                <p>04:</p>
                <p>
                  Pellentesque aliquam diam ut nibh iaculis, vehicula posuere
                  lectus ultrices.
                </p>
              </li>

              <li>
                <p>05:</p>
                <p>Donec venenatis libero eget augue lobortis volutpat.</p>
              </li>

              <li>
                <p>06:</p>
                <p>
                  Vestibulum vitae magna pulvinar, dignissim enim in, molestie
                  nisl suspendisse aliquet enim eget lacus dictum, at pretium
                  ligula aliquet..
                </p>
              </li>
              <li>
                <p>07:</p>
                <p>
                  Donec venenatis libero eget augue lobortis volutpat donec
                  venenatis libero eget augue lobortis volutpat.
                </p>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-md-12">
          <div class="privacy-policy-heading">
            <h5>Colours</h5>
          </div>
          <div class="privacy-policy-txt">
            <p>
              It is a long established fact that a reader will be distracted by
              the readable content of a page when looking at its layout. The
              point of using Lorem Ipsum is that it has a more-or-less normal
              distribution of letters, as opposed to using 'Content here,
              content here', making it look like readable English. Many desktop
              publishing packages and web page editors now use Lorem Ipsum
              default.
            </p>
          </div>
        </div>

        <div class="col-md-12">
          <div class="privacy-policy-heading">
            <h5>Modification of Terms & Conditions of Service</h5>
          </div>
          <div class="privacy-policy-txt">
            <p>
              There are many variations of passages of Lorem Ipsum available,
              but the majority have suffered alteration in some form, by
              injected humour, or randomised words which don't look even
              slightly believable. If you are going to use a passage of Lorem
              Ipsum, you need to be sure there isn't anything embarrassing
              hidden in the middle of text. All the Lorem Ipsum generators on
              the Internet tend to repeat predefined chunks as necessary, making
              this the first true generator on the Internet. It uses a
              dictionary of over 200 Latin words, combined with a handful of
              model sentence structures, to generate Lorem Ipsum which looks
              reasonable. The generated Lorem Ipsum is therefore always free
              from repetition, injected humour, or non-characteristic words etc.
            </p>
          </div>
        </div>
        <div class="col-md-12">
          <div class="privacy-policy-heading">
            <h5>Governing Law and Jurisdiction</h5>
          </div>
          <div class="privacy-policy-txt">
            <p>
              Contrary to popular belief, Lorem Ipsum is not simply random text.
              It has roots in a piece of classical Latin literature from 45 BC,
              making it over 2000 years old. Richard McClintock, a Latin
              professor at Hampden-Sydney College in Virginia, looked up one of
              the more obscure Latin words, consectetur, from a Lorem Ipsum
              passage.
            </p>

            <p>
              The standard chunk of Lorem Ipsum used since the 1500s is
              reproduced below for those interested. Sections 1.10.32 and
              1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also
              reproduced in their exact original form, accompanied by English
              versions from the 1914 translation by H. Rackham.
            </p>
          </div>
        </div> -->
      </div>
    </section>
    <!-- privacy-policy-section END -->
  </div>
</template>
<script>
export default {};
</script>
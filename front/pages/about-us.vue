<template>
  <div>
    <section class="about-banner">
      <div class="inner-banner-img">
        <img src="/images/about-banner.png" />
        <div class="container">
          <div class="about-heading">
            <h2>About Us</h2>
          </div>
        </div>
      </div>
    </section>
    <BreadCrumb
      :breadcrumbs="[
        { to: '/', name: 'Home >', class: '' },
        { to: '/about-us', name: 'About us', class: 'active' },
      ]"
    />
    <section class="contrary">
      <div class="container">
        <div class="row">
          <!-- <div class="col-md-6">
            <div class="contrary-heading">
              <h2>
                Contrary to popular belief, Lorem Ipsum is not simply random
                text.
              </h2>
            </div>
          </div> -->

          <div class="col-md-12">
            <div class="contrary-content">
              <p>
                The Freshify is an organization that promotes premium and organic meat products. The Freshify breeds nurture and slaughter its own animals, from Goats to Bulls, from Crab to Ostrich. At Freshify, we offer our consumers a diverse and dynamic product portfolio; we give them top quality and farm-fresh meat. All of our animals are prioritized; their feed, surroundings, and health matter to us utmost. Freshify offers services for Qurbani, Aqiqa, Sadqa to cater to consumers' demand. As Freshify provides Halal meat in different cuts, you can exercise being creative in the kitchen.                
              </p>
              <p>Freshify allows its consumers to come and take a look at our outlets, what goes behind the counter, the hygienic SOPs we follow to ensure a safe product. As for now, Freshify is a Karachi-based organization; we operate in the areas of Gulshan-e-Iqbal and Gulistan-e-Johar.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="man-meat">
      <div class="container">
        <div class="meat-people">
          <img src="/images/About-Us-1.png" />
        </div>
      </div>
    </section>

    <!-- <section class="about-meat-kn">
      <div class="container">
        <div class="about-m-heading">
          <h2>
            Contrary to popular belief, Lorem<br />
            Ipsum is not simply.
          </h2>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="ab-meat-content">
              <h2>Lorem Ipsum is simply.</h2>

              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                mauris libero, aliquam et urna id, posuere rutrum erat.
                Curabitur maximus at diam ac malesuada. Etiam eget ipsum
                condimentum, feugiat orci et, accumsan libero. Cras rutrum
                feugiat odio, ut egestas nunc lobortis nec. Ut finibus rhoncus
                nunc sed pellentesque. Maecenas vitae blandit lacus. Nullam
                ultrices porta massa, sed tempor lectus egestas et. Aliquam
                mollis velit in augue accumsan, sit amet bibendum sem dapibus.
                Duis hendrerit id magna non convallis. Etiam eget bibendum
                lorem. Aenean enim lacus, pharetra ac tristique a, placerat id
                justo. In et tempor tellus, a auctor nunc. Suspendisse sit amet
                tincidunt risus. Integer id maximus urna.
              </p>
              <p>
                Suspendisse et quam vestibulum, rhoncus velit eu, accumsan
                justo. Sed eu lorem at velit convallis dapibus. Nunc rutrum nunc
                vitae velit bibendum, non porta tortor ultrices. Curabitur leo
                neque, hendrerit a diam ut, euismod gravida sapien. Etiam ut
                ante feugiat, finibus felis eu, porttitor quam. Sed tincidunt
                nibh eget dictum dapibus. Aliquam erat elit, scelerisque id
                finibus lacinia, laoreet id libero.
              </p>
              <p>
                Maecenas sodales turpis a massa dignissim venenatis. Aliquam
                cursus, massa sit amet aliquet fermentum, quam nibh convallis
                felis, at viverra libero nisi sed leo. Aenean eu nunc ultricies,
                molestie sapien a, cursus nulla. Vestibulum sit amet arcu vel
                lacus lobortis cursus non sed ex. Integer faucibus dolor elit,
                non fringilla quam dignissim at. Fusce eu porttitor leo,
                placerat tempor magna. Duis accumsan lectus arcu, a tempus arcu
                condimentum at. Duis a urna vel purus commodo scelerisque quis
                nec tellus. Quisque vitae lectus ac justo suscipit tempus.
                Phasellus cursus lectus arcu, eu finibus massa auctor non. Fusce
                at laoreet arcu.Sed sagittis mi ut lorem commodo dapibus.
              </p>
            </div>
          </div>

          <div class="col-md-6">
            <div class="ab-meat-im">
              <img src="/images/about-meat-2.png" />
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <!-- <section class="about-cout">
      <div class="container">
        <div class="cout-content">
          <h2>
            It is a long established fact a reader<br />
            will be distracted by the readable content<br />
            of a page when looking.
          </h2>
        </div>
      </div>
    </section> -->

    <!-- <section class="meat-shop">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="m-shop-im">
              <img src="/images/meat-shop.png" />
            </div>
          </div>
          <div class="col-md-6">
            <div class="m-shop-content">
              <h2>
                Lorem Ipsum is not simply<br />
                random text.
              </h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
                mauris libero, aliquam et urna id, posuere rutrum erat.
                Curabitur maximus at diam ac malesuada. Etiam eget ipsum
                condimentum, feugiat orci et, accumsan libero. Cras rutrum
                feugiat odio, ut egestas nunc lobortis nec. Ut finibus rhoncus
                nunc sed pellentesque. Maecenas vitae blandit lacus. Nullam
                ultrices porta massa, sed tempor lectus egestas et. Aliquam
                mollis velit in augue accumsan, sit amet bibendum sem dapibus.
                Duis hendrerit id magna non convallis. Etiam eget bibendum
                lorem. Aenean enim lacus, pharetra ac tristique a, placerat id
                justo. In et tempor tellus, a auctor nunc. Suspendisse sit amet
                tincidunt risus. Integer id maximus urna.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section> -->
  </div>
</template>
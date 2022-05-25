<template>
    <footer>
         <div class="container-fluid ml-5 mr-5">
            <div class="row mr-5">
               <div class="col-md-2">
                  <div class="ftr-logo">
                    <nuxt-link to="/"> <img src="https://www.logolynx.com/images/logolynx/53/53c631e42df6702a6feac90776f1c843.png"></nuxt-link>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="quick-links">
                     <h5>Quick Links</h5>
                     <ul>
                        <li>
                           <nuxt-link to="/shipping-and-return">Shipping and Returns</nuxt-link>
                        </li>
                        <li>
                           <nuxt-link to="/terms-and-conditions">Terms and Conditions</nuxt-link>
                        </li>
                        <li>
                           <nuxt-link to="/privacy-policy">Privacy Policy</nuxt-link>
                        </li>
                        <li>
                           <nuxt-link to="/faq">FAQs</nuxt-link>
                        </li>
                     </ul>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="customer-service">
                     <h5>Office Address</h5>
                     <!-- <p><span>Email:</span><a href="mailto:loremipsum@dummy.com">loremipsum@dummy.com 123-456-789 (0)</a></p> -->
                     <ul>
                        <li><a href="mailto:info@thefreshify.com">info@thefreshify.com</a></li>
                        <li><a href="https://goo.gl/maps/krEAxJZivUKVz4bRA" target="_blank">Suite No. 105 Noor Trade Center, Karachi, 75300</a></li>
                        
                        <li><a href="tel:02134813621">0213-4813621</a></li>
                     </ul>
                  </div>
                  <div class="social-icons">
                     <ul>
                        <li><a href="https://www.facebook.com/thefreshify" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/freshifyfood" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=+923192004008" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="our-deals" id="newsletter">
                     <h5>Be the first to know about our deals and offers</h5>
                     <!-- <p>Lorem Ipsum is simply dummy text.</p> -->
                     <form @submit="onSubscribe">
                        <input type="email" style="width: 100%;" v-model="email" placeholder="Enter Email">
                        <button type="submit" style="width: 100%;" >Subscribe</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="ftr-copyright">
               <p>© 2022 The Freshify. All Rights Reserved.</p>
            </div>
      </footer>
      <!-- <script>
        AOS.init();
      </script> -->
</template> 
<script>
import swal from 'sweetalert';
export default {
   data(){
return{
   email:'',
}
   },
   methods:{
      async onSubscribe(event) {
      event.preventDefault();
        let res = await this.$axios.post('newsletter',{email:this.email}).then(function(e){
           return e.data;
        });
        if(!res.success){
   swal({
      title: res.data,
      icon: "error",
      timer: 1500,
    });
        }else{
   swal({
      title: "Successfully subscribed for newsletter",
      icon: "success",
      timer: 1500,
    });

this.email ='';
}
      }
   }
}
</script>
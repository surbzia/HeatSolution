<template>
  <div>
    <section class="about-banner">
      <div class="inner-banner-img">
        <img src="/images/about-banner.png" />
        <div class="container">
          <div class="about-heading">
            <h2>Inquiry Form </h2>
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
    <b-container>
    <b-row>
    <b-col md="12">
    <div class="inquiry-form">
    <b-row>
    <b-col md="6">
     <label>Enter your first name</label>
    <b-form-input v-model="text" placeholder="First Name"></b-form-input>
    </b-col>
    <b-col md="6">
     <label>Enter your last name</label>
    <b-form-input v-model="text" placeholder="Last Name"></b-form-input>
    </b-col>
    <b-col md="6">
     <label>Enter your email</label>
    <b-form-input v-model="email" placeholder="email"></b-form-input>
    </b-col>
    <b-col md="6">
     <label>Enter your contact number</label>
    <b-form-input v-model="number" placeholder="Phone"></b-form-input>
    </b-col>
    <b-col md="12">
     <label>Address</label>
    <b-form-input v-model="text" placeholder="Complate Address"></b-form-input>
    </b-col>
<b-col md="12">
     <label>Message</label>
   <b-form-textarea
        
        placeholder="Some text"
      ></b-form-textarea>
    </b-col>
     
    </b-row>
 
    
    <div class="sub-btn-div">
     <b-button type="submit" variant="primary">Submit</b-button>
    </div>
    
    </div>
    </b-col>
   
    </b-row>
    
</b-container>
    
    <div class="chat-opt">
    <a href="#">
 <i class="fa fa-whatsapp" aria-hidden="true"></i>
 </a>
    </div>
    
  <div>
  
</div>

  </div>
</template>

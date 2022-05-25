<template>
  <div>
    <v-breadcrumbs :items="bread">
      <template v-slot:divider>
        <v-icon>mdi-forward</v-icon>
      </template></v-breadcrumbs
    >
</v-breadcrumbs>
<v-row no-gutters  class="grey lighten-5 pa-10 rounded elevation-10">
<v-col
cols="12"
sm="12"
>
<v-form
ref="form"
v-model="loading"
lazy-validation
>

<v-row>
<v-col
  cols="6"
  sm="6"
  class="pb-0"
>
  <v-text-field
    v-model="form.single_qty_text"
    :rules="[rules.required]"
    :error-messages="errors.single_qty_text"
    label="Single Qty Text"
  ></v-text-field>
</v-col>

<v-col
  cols="6"
  sm="6"
  class="pb-0"
>
  <v-text-field
    v-model="form.multiple_qty_text"
    :rules="[rules.required]"
    :error-messages="errors.multiple_qty_text"
    label="Multi Qty Text"
  ></v-text-field>
</v-col>




 <v-col
  cols="12"
  sm="12"
  class="pb-0"
>
<v-btn
    color="secondary"
    elevation="1"
    large
    raised
    @click="addpermission"
    :loading="btnloading"
    :disabled="btnloading"
  >{{form.id>0?'Update':'Add'}}</v-btn>
</v-col>

</v-row>

</v-form>
</v-col>
</v-row>
  </div>
</template>

<script>
import defaultservice from "@services/auth/default";
const service = new defaultservice('product-sale-type')
export default {
  name: "auth.product_sale_type.add",
  async mounted(){
    if(this.$route.params.id){
        var res = await service.get(this.form.id)
        this.form = {
            single_qty_text: res.single_qty_text,
            multiple_qty_text: res.multiple_qty_text,
            id: this.$route.params.id,
        }
        this.bread.push({
          text: "Edit",
          to: { name: "auth.product_sale_type.edit", params: {id: this.$route.params.id} },
          disabled: false,
          exact: true,
        })
    }else{
        this.bread.push({
          text: "Add",
          to: { name: "auth.product_sale_type.add"},
          disabled: false,
          exact: true,
        })
    }
  },
  methods: {
    resetError(){
        this.errors = {
          single_qty_text:[],
          multiple_qty_text: [],
      }
    },
    addpermission: async function () {
        this.resetError()
      if (this.$refs.form.validate()) {
        this.btnloading = true;
        var formdata = new FormData();
        formdata.append("single_qty_text", this.form.single_qty_text);
        formdata.append("multiple_qty_text", this.form.multiple_qty_text);
        this.btnloading = false;
        if(this.form.id>0){
            var res = await service.update(formdata, this.form.id)
        }else{
            var res = await service.create(formdata)
        }
        if(!res.status){
            if(res.data.single_qty_text){
                this.errors.single_qty_text = res.data.single_qty_text
            }
            if(res.data.multiple_qty_text){
                this.errors.multiple_qty_text = res.data.multiple_qty_text
            }
            //errors here
        }else{
            //suuccess here
            this.$router.push({ name: "auth.product_sale_type.listing" });
        }
      }
    },
  },
  computed: {
    user() {
        return this.$store.getters.loggedInUser;
    },
  },
  data() {
    return {
    MIX_FRONT_WEBSITE_URL: process.env.MIX_FRONT_WEBSITE_URL,
      form:{
          id: (this.$route.params.id?this.$route.params.id:0),
          single_qty_text: '',
          multiple_qty_text: '',
      },
      errors: {
          single_qty_text:[],
          multiple_qty_text: [],
      },
      bread: [
        {
          text: "Dashboard",
          to: { name: "auth.dashboard" },
          disabled: false,
          exact: true,
        },
        {
          text: "Product Sale Type",
          to: { name: "auth.banners.listing" },
          disabled: false,
          exact: true,
        }
      ],
      loading: false,
      btnloading: false,
      rules: {
        required: (value) => !!value || "Required.",
      },
    };
  },
};
</script>

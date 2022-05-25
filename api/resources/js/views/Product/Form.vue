<template>
  <div>
    <v-breadcrumbs :items="bread">
      <template v-slot:divider>
        <v-icon>mdi-forward</v-icon>
      </template>
    </v-breadcrumbs>
    <v-row no-gutters class="grey lighten-5 pa-10 rounded elevation-10">
      <v-col cols="12" sm="12">
        <v-form ref="form" v-model="loading" lazy-validation>
          <v-row>
            <v-col cols="12" sm="12" class="pb-0">
              <v-text-field
                v-model="form.name"
                :rules="[rules.required]"
                :error-messages="errors.name"
                label="Name"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="12" class="pb-0">
              <v-text-field
                v-model="form.slug"
                :rules="[rules.required]"
                :error-messages="errors.slug"
                label="Slug"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="12" class="pb-0">
              <v-text-field
                v-model="form.price"
                :rules="[rules.required]"
                :error-messages="errors.price"
                label="Price"
                type="number"
                min="0"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="12" class="pb-0">
              <v-text-field
                v-model="form.short_description"
                :rules="[rules.required]"
                :error-messages="errors.short_description"
                label="Short Description"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="12" class="pb-0">
              <label>Description</label>
              <ckeditor
                :editor="editor"
                v-model="form.description"
                :config="editorConfig"
              ></ckeditor>
            </v-col>

            <v-col cols="12" cm="12" class="pb-0">
              <v-file-input
                accept="image/*"
                v-model="form.image"
                :error-messages="errors.image"
                label="Image"
              ></v-file-input>
            </v-col>
            <v-col
              v-if="form.id > 0 && form.image_url"
              cols="12"
              cm="12"
              class="pb-0"
            >
              <v-img
                :lazy-src="form.image_url"
                max-height="150"
                max-width="250"
                :src="form.image_url"
              ></v-img>
            </v-col>
            <v-col cols="12" sm="12" class="pb-0">
              <v-checkbox
                v-model="form.is_featured"
                label="Is Featured?"
              ></v-checkbox>
              <v-checkbox
              v-model="form.in_stock"
              :error-messages="errors.in_stock"
              label="In Stock?"
            ></v-checkbox>
            </v-col>

            <v-col cols="12" sm="12" class="pb-0">
              <v-select
                v-model="form.related_products"
                :items="related_products"
                label="Related Products"
                item-text="name"
                item-value="id"
                return-object
                multiple
                chips
                hint="Select All Products which you want to show in Related Products Grid on Product Detail Page"
                persistent-hint
              ></v-select>
            </v-col>

            <v-col cols="12" sm="12" class="pb-0">
              <v-select
                v-model="form.product_sale_type_id"
                :items="product_sale_types"
                label="Product Type"
                item-text="single_qty_text"
                item-value="id"
              ></v-select>
            </v-col>

            <v-col cols="12" sm="12" class="pb-0">
              <label>Primary Category</label>
              <v-alert
                dense
                outlined
                type="error"
                v-if="errors.category_id.length > 0"
              >
                {{ errors.category_id.join(", ") }}
              </v-alert>
              <v-treeview
                @update:active="getCurrentSelectionParent"
                activatable
                dense
                :items="categories"
                :active="default_category"
                :open="default_category"
              ></v-treeview>
            </v-col>

            <v-col cols="12" sm="12" class="pb-0">
              <v-btn
                color="secondary"
                elevation="1"
                large
                raised
                @click="addpermission"
                :loading="btnloading"
                :disabled="btnloading"
                >{{ form.id > 0 ? "Update" : "Add" }}</v-btn
              >
            </v-col>
          </v-row>
        </v-form>
      </v-col>
    </v-row>
  </div>
</template>

<script>
import productservice from "@services/auth/product";
import categoryservice from "@services/auth/category";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import defaultservice from "@services/auth/default";
const productsaletype = new defaultservice("product-sale-type");
export default {
  name: "auth.products.add",
  async mounted() {
    productservice.getlist("").then((e) => {
      this.related_products = e.data;
    });
    productsaletype.getlist("").then((e) => {
      this.product_sale_types = e.data;
    });
    categoryservice.getlist("").then((e) => {
      this.categories.push(
        ...e.data.filter((e) => {
          return e.parent_id == 0;
        })
      );
    });
    if (this.$route.params.id) {
      var res = await productservice.get(this.form.id);
      let related_to_select = res.related.map((e) => {
        return { name: e.reference.name, id: e.reference_product };
      });
      this.form = {
        name: res.name,
        slug: res.slug,
        price: res.price,
        description: res.description,
        short_description: res.short_description,
        image_url: res.image_url,
        category_id: res.category_id,
        product_sale_type_id: res.product_sale_type_id,
        in_stock: (res.in_stock==1?true:false),
        is_featured: res.is_featured == 1 ? true : false,
        id: this.$route.params.id,
        related_products: related_to_select,
      };
      this.default_category = [];
      this.default_category.push(res.category_id);
      this.bread.push({
        text: "Edit",
        to: {
          name: "auth.products.edit",
          params: { id: this.$route.params.id },
        },
        disabled: false,
        exact: true,
      });
    } else {
      this.bread.push({
        text: "Add",
        to: { name: "auth.products.add" },
        disabled: false,
        exact: true,
      });
    }
  },
  methods: {
    getCurrentSelectionParent(value) {
      this.form.category_id = value[0];
    },
    resetError() {
      this.errors = {
        name: [],
        slug: [],
        price: [],
        description: [],
        short_description: [],
        related_products: [],
        image: [],
        is_featured: [],
        category_id: [],
        product_sale_type_id: [],
      };
    },
    addpermission: async function () {
      this.resetError();
      if (this.$refs.form.validate()) {
        this.btnloading = true;
        var formdata = new FormData();
        formdata.append("name", this.form.name);
        formdata.append("slug", this.form.slug);
        formdata.append("description", this.form.description);
        formdata.append("short_description", this.form.short_description);
        formdata.append("price", this.form.price);
        formdata.append("category_id", this.form.category_id);
        formdata.append("product_sale_type_id", this.form.product_sale_type_id);
        formdata.append("is_featured", this.form.is_featured == true ? 1 : 0);
        formdata.append("in_stock", (this.form.in_stock==true?1:0));
        if (this.form.related_products.length > 0) {
          for (let i = 0; i < this.form.related_products.length; i++) {
            formdata.append(
              "related_products[" + i + "]",
              this.form.related_products[i].id
            );
          }
        }
        if (this.form.image) {
          formdata.append("image", this.form.image);
        }
        this.btnloading = false;
        if (this.form.id > 0) {
          var res = await productservice.update(formdata, this.form.id);
        } else {
          var res = await productservice.create(formdata);
        }
        if (!res.status) {
          if (res.data.name) {
            this.errors.name = res.data.name;
          }
          if (res.data.slug) {
            this.errors.slug = res.data.slug;
          }
          if (res.data.description) {
            this.errors.description = res.data.description;
          }
          if (res.data.short_description) {
            this.errors.short_description = res.data.short_description;
          }
          if (res.data.price) {
            this.errors.price = res.data.price;
          }
          if (res.data.image) {
            this.errors.image = res.data.image;
          }
          if (res.data.related_products) {
            this.errors.related_products = res.data.related_products;
          }
          if (res.data.is_featured) {
            this.errors.is_featured = res.data.is_featured;
          }
          if (res.data.category_id) {
            this.errors.category_id = res.data.category_id;
          }
          if (res.data.product_sale_type_id) {
            this.errors.product_sale_type_id = res.data.product_sale_type_id;
          }
          //errors here
        } else {
          //suuccess here
          this.$router.push({ name: "auth.products.listing" });
        }
      }
    },
  },
  computed: {
    user() {
      return this.$store.getters.loggedInUser;
    },
  },
  watch: {
    "form.name": function () {
      let _val = this.form.name;
      _val = _val.replace(/([^a-zA-Z0-9\-_\s]+)/gi, "");
      _val = _val.replace(/\s+/g, "-");
      this.form.slug = _val.toLowerCase();
    },
  },
  data() {
    return {
      related_products: [],
      categories: [],
      product_sale_types: [],
      editor: ClassicEditor,
      editorConfig: {},
      default_category: [],
      form: {
        id: this.$route.params.id ? this.$route.params.id : 0,
        name: "",
        slug: "",
        price: "0",
        description: "",
        short_description: "",
        image: {},
        related_products: [],
        in_stock: true,
        is_featured: false,
        category_id: 0,
        product_sale_type_id: 0,
      },
      errors: {
        name: [],
        slug: [],
        price: [],
        description: [],
        short_description: [],
        image: [],
        related_products: [],
        is_featured: [],
        category_id: [],
        product_sale_type_id: [],
      },
      bread: [
        {
          text: "Dashboard",
          to: { name: "auth.dashboard" },
          disabled: false,
          exact: true,
        },
        {
          text: "Products",
          to: { name: "auth.products.listing" },
          disabled: false,
          exact: true,
        },
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

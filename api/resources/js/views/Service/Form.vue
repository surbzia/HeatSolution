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
            <v-col cols="6" sm="6" class="pb-0">
              <v-text-field
                v-model="form.name"
                :rules="[rules.required]"
                :error-messages="errors.name"
                label="Name"
              ></v-text-field>
            </v-col>
           

            <v-col cols="6" sm="6" class="pb-0">
              <v-text-field
                v-model="form.slug"
                :rules="[rules.required]"
                :error-messages="errors.slug"
                label="Slug"
              ></v-text-field>
            </v-col>

            <v-col cols="12" sm="12" class="pb-0">
              <label>Short Description</label>
              <ckeditor
                :editor="editor"
                v-model="form.short_description"
                :config="editorConfig"
              ></ckeditor>
            </v-col>

            <v-col cols="12" sm="12" class="pb-0">
              <label>Description</label>
              <ckeditor
                :editor="editor"
                v-model="form.description"
                :config="editorConfig"
              ></ckeditor>
            </v-col>
            <v-col cols="6" sm="6" class="pb-0">
              <v-checkbox
                v-model="form.is_featured"
                label="Is Featured?"
              ></v-checkbox>
            </v-col>
            <v-col cols="6" sm="6" class="pb-0">
              <v-checkbox
                v-model="form.show_in_menu"
                label="Show in Menu?"
              ></v-checkbox>
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

            <v-col
              v-if="form.id > 0 && form.icon_url"
              cols="12"
              cm="12"
              class="pb-0"
            >
              <v-img
                :lazy-src="form.icon_url"
                max-height="150"
                max-width="250"
                :src="form.icon_url"
              ></v-img>
            </v-col>

            <v-col cols="12" sm="12" class="pb-0">
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
import Servicesservice from "@services/auth/service";
import Categoryservice from "@services/auth/category";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
export default {
  name: "auth.categories.add",
  watch: {
    "form.name": function () {
      let _val = this.form.name;
      _val = _val.replace(/([^a-zA-Z0-9\-_\s]+)/gi, "");
      _val = _val.replace(/\s+/g, "-");
      this.form.slug = _val.toLowerCase();
    },
  },
  async mounted() {
    Categoryservice.getlist("").then((e) => {
      this.categories.push(
        ...e.data.filter((e) => {
          return e.parent_id == 0;
        })
      );
    });
    if (this.$route.params.id) {
      var res = await Servicesservice.get(this.form.id);
      this.form = {
        name: res.name,
        slug: res.slug,
        category_id: res.category_id,
        description: res.description,
        short_description: res.short_description,
        is_featured: res.is_featured == 1 ? true : false,
        show_in_menu: res.show_in_menu == 1 ? true : false,
        image_url: res.image_url,
        icon_url: res.icon_url,
        sort_order: res.sort_order,
        id: res.id,
      };
      this.default_category = [];
      this.default_category.push(res.category_id);
      this.bread.push({
        text: "Edit",
        to: {
          name: "auth.services.edit",
          params: { id: this.$route.params.id },
        },
        disabled: false,
        exact: true,
      });
      await this.$nextTick();
      this.form.slug = res.slug;
    } else {
      this.bread.push({
        text: "Add",
        to: { name: "auth.services.add" },
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
        category_id: [],
        description: [],
        short_description: [],
        is_featured:false,
        show_in_menu: false,
        image: [],
        icon: [],
      };
    },
    addpermission: async function () {
      this.resetError();
      if (this.$refs.form.validate()) {
        this.btnloading = true;
        var formdata = new FormData();
        formdata.append("name", this.form.name);
        formdata.append("slug", this.form.slug);
        formdata.append("category_id", this.form.category_id);
        formdata.append("sort_order", this.form.sort_order);
        formdata.append("description", this.form.description);
        formdata.append("short_description", this.form.short_description);
        formdata.append("is_featured", this.form.is_featured == true ? 1 : 0);
        formdata.append("show_in_menu", this.form.show_in_menu == true ? 1 : 0);
        if (this.form.image) {
          formdata.append("image", this.form.image);
        }
        if (this.form.icon) {
          formdata.append("icon", this.form.icon);
        }
        this.btnloading = false;
        if (this.form.id > 0) {
          var res = await Servicesservice.update(formdata, this.initialslug);
        } else {
          var res = await Servicesservice.create(formdata);
        }
        if (!res.status) {
          if (res.data.name) {
            this.errors.name = res.data.name;
          }
          if (res.data.slug) {
            this.errors.slug = res.data.slug;
          }
          if (res.data.category_id) {
            this.errors.category_id = res.data.category_id;
          }
          if (res.data.description) {
            this.errors.description = res.data.description;
          }
          if (res.data.short_description) {
            this.errors.short_description = res.data.short_description;
          }
          if (res.data.is_featured) {
            this.errors.is_featured = res.data.is_featured;
          }
          if (res.data.show_in_menu) {
            this.errors.show_in_menu = res.data.show_in_menu;
          }
          if (res.data.image) {
            this.errors.image = res.data.image;
          }
          if (res.data.icon) {
            this.errors.icon = res.data.icon;
          }
          //errors here
        } else {
          //suuccess here
          this.$router.push({ name: "auth.services.listing" });
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
      editor: ClassicEditor,
      editorConfig: {},
      default_category: [],
      categories: [],
      initialslug: this.$route.params.id ? this.$route.params.id : "",
      form: {
        id: this.$route.params.id ? this.$route.params.id : 0,
        name: "",
        sort_order: "",
        slug: "",
        category_id: 0,
        description: "",
        short_description: "",
        image: undefined,
        icon: undefined,
        is_featured: false,
        show_in_menu: false,
      },
      errors: {
        name: [],
        slug: [],
        category_id: [],
        description: [],
        short_description: [],
        is_featured: [],
        show_in_menu: [],
        image: [],
        icon: [],
      },
      bread: [
        {
          text: "Dashboard",
          to: { name: "auth.dashboard" },
          disabled: false,
          exact: true,
        },
        {
          text: "Services",
          to: { name: "auth.services.listing" },
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

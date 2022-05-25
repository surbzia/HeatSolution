"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[912],{1912:(e,a,t)=>{t.r(a),t.d(a,{default:()=>h});var r=t(7757),n=t.n(r),s=t(2986);function i(e,a,t,r,n,s,i){try{var o=e[s](i),l=o.value}catch(e){return void t(e)}o.done?a(l):Promise.resolve(l).then(r,n)}function o(e){return function(){var a=this,t=arguments;return new Promise((function(r,n){var s=e.apply(a,t);function o(e){i(s,r,n,o,l,"next",e)}function l(e){i(s,r,n,o,l,"throw",e)}o(void 0)}))}}function l(e,a){for(var t=0;t<a.length;t++){var r=a[t];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var u=t(9669),c=new AbortController;const d=new(function(){function e(){!function(e,a){if(!(e instanceof a))throw new TypeError("Cannot call a class as a function")}(this,e)}var a,t,r,s,i;return a=e,t=[{key:"create",value:(i=o(n().mark((function e(a){var t;return n().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.next=2,u.post("/api/file",a).then((function(e){return{status:1,data:e.data}})).catch((function(e){return{status:0,data:e.response.data.errors}}));case 2:return t=e.sent,e.abrupt("return",t);case 4:case"end":return e.stop()}}),e)}))),function(e){return i.apply(this,arguments)})},{key:"get",value:(s=o(n().mark((function e(a){var t;return n().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return c.abort(),e.next=3,u.get("/api/file?"+a,{signal:c.signal}).then((function(e){return{status:1,data:e.data}})).catch((function(e){return{status:0,data:e.response.data.errors}}));case 3:return t=e.sent,e.abrupt("return",t);case 5:case"end":return e.stop()}}),e)}))),function(e){return s.apply(this,arguments)})}],t&&l(a.prototype,t),r&&l(a,r),Object.defineProperty(a,"prototype",{writable:!1}),e}());function p(e,a,t,r,n,s,i){try{var o=e[s](i),l=o.value}catch(e){return void t(e)}o.done?a(l):Promise.resolve(l).then(r,n)}function m(e){return function(){var a=this,t=arguments;return new Promise((function(r,n){var s=e.apply(a,t);function i(e){p(s,r,n,i,o,"next",e)}function o(e){p(s,r,n,i,o,"throw",e)}i(void 0)}))}}var f;const v={name:"auth.company.edit",mounted:function(){this.startProfile()},methods:{startProfile:function(){var e=this;return m(n().mark((function a(){var t;return n().wrap((function(a){for(;;)switch(a.prev=a.next){case 0:return e.id=e.$route.params.id,a.next=3,s.Z.me();case 3:t=a.sent,e.name=t.name,e.email=t.email,e.password="",e.imageurl=t.image_url;case 8:case"end":return a.stop()}}),a)})))()},resetError:function(){this.errors={name:[],password:[],email:[],file:[]}},addbrand:(f=m(n().mark((function e(){var a,t,r;return n().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(this.resetError(),!this.$refs.form.validate()){e.next=28;break}return this.btnloading=!0,(a=new FormData).append("name",this.name),a.append("email",this.email),this.password&&a.append("password",this.password),this.image.size&&a.append("file",this.image),this.btnloading=!1,e.next=11,s.Z.updateProfile(a,this.id);case 11:if((t=e.sent).status){e.next=19;break}t.data.name&&(this.errors.name=t.data.name),t.data.email&&(this.errors.email=t.data.email),t.data.password&&(this.errors.password=t.data.password),t.data.file&&(this.errors.file=t.data.file),e.next=28;break;case 19:if(!this.image.size){e.next=27;break}return(r=new FormData).append("ref_id",t.data.id),r.append("table_name","users"),r.append("type","1"),r.append("attachements[0]",this.image),e.next=27,d.create(r);case 27:this.startProfile();case 28:case"end":return e.stop()}}),e,this)}))),function(){return f.apply(this,arguments)})},data:function(){return{name:"",id:0,email:"",password:"",imageurl:"",errors:{name:[],email:[],password:[],file:[]},image:{},loading:!1,btnloading:!1,rules:{required:function(e){return!!e||"Required."}}}}};const h=(0,t(1900).Z)(v,(function(){var e=this,a=e.$createElement,t=e._self._c||a;return t("div",[t("v-row",{staticClass:"grey lighten-5 pa-10 rounded elevation-10",attrs:{"no-gutters":""}},[t("v-col",{attrs:{cols:"12",sm:"12"}},[t("v-form",{ref:"form",attrs:{"lazy-validation":""},model:{value:e.loading,callback:function(a){e.loading=a},expression:"loading"}},[t("v-row",[t("v-col",{staticClass:"pb-0",attrs:{cols:"12",sm:"12"}},[t("v-text-field",{attrs:{rules:[e.rules.required],"error-messages":e.errors.name,label:"Company Name"},model:{value:e.name,callback:function(a){e.name=a},expression:"name"}})],1),e._v(" "),t("v-col",{staticClass:"pb-0",attrs:{cols:"12",sm:"12"}},[t("v-text-field",{attrs:{rules:[e.rules.required],"error-messages":e.errors.email,label:"Email"},model:{value:e.email,callback:function(a){e.email=a},expression:"email"}})],1),e._v(" "),t("v-col",{staticClass:"pb-0",attrs:{cols:"12",sm:"12"}},[t("v-text-field",{attrs:{"error-messages":e.errors.password,label:"password",type:"password",autocomplete:"new-password"},model:{value:e.password,callback:function(a){e.password=a},expression:"password"}})],1),e._v(" "),t("v-col",{staticClass:"pb-0",attrs:{cols:"12",sm:"12"}},[t("v-file-input",{attrs:{"show-size":"","error-messages":e.errors.file,accept:"image/png, image/jpeg, image/bmp",label:"Title Image",rules:[e.rules.required],"truncate-length":"15"},model:{value:e.image,callback:function(a){e.image=a},expression:"image"}}),e._v(" "),t("v-img",{attrs:{"lazy-src":e.imageurl,"max-height":"100","max-width":"150",contain:"",src:e.imageurl}})],1),e._v(" "),t("v-col",{staticClass:"pb-0",attrs:{cols:"12",sm:"12"}},[t("v-btn",{attrs:{color:"secondary",elevation:"1",large:"",raised:"",loading:e.btnloading,disabled:e.btnloading},on:{click:e.addbrand}},[e._v("Save")])],1)],1)],1)],1)],1)],1)}),[],!1,null,null,null).exports}}]);
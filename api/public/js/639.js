"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[639],{3567:(t,e,r)=>{r.d(e,{Z:()=>u});var a=r(7757),n=r.n(a);function s(t,e,r,a,n,s,o){try{var c=t[s](o),i=c.value}catch(t){return void r(t)}c.done?e(i):Promise.resolve(i).then(a,n)}function o(t){return function(){var e=this,r=arguments;return new Promise((function(a,n){var o=t.apply(e,r);function c(t){s(o,a,n,c,i,"next",t)}function i(t){s(o,a,n,c,i,"throw",t)}c(void 0)}))}}function c(t,e){for(var r=0;r<e.length;r++){var a=e[r];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(t,a.key,a)}}var i=r(9669);const u=new(function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t)}var e,r,a,s,u;return e=t,r=[{key:"getlist",value:function(t){return i.get("/api/brief-form".concat(t)).then((function(t){return t.data})).catch((function(t){return t}))}},{key:"create",value:(u=o(n().mark((function t(e){var r;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,i.post("/api/brief-form",e).then((function(t){return{status:1,data:t.data.data}})).catch((function(t){return{status:0,data:t.response.data.errors}}));case 2:return r=t.sent,t.abrupt("return",r);case 4:case"end":return t.stop()}}),t)}))),function(t){return u.apply(this,arguments)})},{key:"delete",value:function(t){t.query;var e=t.id;return i.delete("/api/brief-form/".concat(e))}},{key:"get",value:function(t){return i.get("/api/brief-form/".concat(t)).then((function(t){return t.data.data}))}},{key:"update",value:(s=o(n().mark((function t(e,r){var a;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return e.append("_method","put"),t.next=3,i.post("/api/brief-form/"+r,e).then((function(t){return{status:1,data:t.data.data}})).catch((function(t){return{status:0,data:t.response.data.errors}}));case 3:return a=t.sent,t.abrupt("return",a);case 5:case"end":return t.stop()}}),t)}))),function(t,e){return s.apply(this,arguments)})}],r&&c(e.prototype,r),a&&c(e,a),t}())},9556:(t,e,r)=>{r.d(e,{Z:()=>u});var a=r(7757),n=r.n(a);function s(t,e,r,a,n,s,o){try{var c=t[s](o),i=c.value}catch(t){return void r(t)}c.done?e(i):Promise.resolve(i).then(a,n)}function o(t){return function(){var e=this,r=arguments;return new Promise((function(a,n){var o=t.apply(e,r);function c(t){s(o,a,n,c,i,"next",t)}function i(t){s(o,a,n,c,i,"throw",t)}c(void 0)}))}}function c(t,e){for(var r=0;r<e.length;r++){var a=e[r];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(t,a.key,a)}}var i=r(9669);const u=new(function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t)}var e,r,a,s,u,l,d,v;return e=t,r=[{key:"getlist",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"";return i.get("/api/leads".concat(t)).then((function(t){return t.data})).catch((function(t){return t}))}},{key:"delete",value:function(t){t.query;var e=t.id;return i.delete("/api/leads/".concat(e))}},{key:"create",value:(v=o(n().mark((function t(e){var r;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,i.post("/api/leads",e).then((function(t){return{status:1,data:t.data.data}})).catch((function(t){return{status:0,data:t.response.data.errors}}));case 2:return r=t.sent,t.abrupt("return",r);case 4:case"end":return t.stop()}}),t)}))),function(t){return v.apply(this,arguments)})},{key:"get",value:(d=o(n().mark((function t(e){var r;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,i.get("/api/leads/".concat(e));case 2:return r=t.sent,t.abrupt("return",r.data.data);case 4:case"end":return t.stop()}}),t)}))),function(t){return d.apply(this,arguments)})},{key:"update",value:(l=o(n().mark((function t(e,r){var a;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return e.append("_method","put"),t.next=3,i.post("/api/leads/"+r,e).then((function(t){return{status:1,data:t.data.data}})).catch((function(t){return{status:0,data:t.response.data.errors}}));case 3:return a=t.sent,t.abrupt("return",a);case 5:case"end":return t.stop()}}),t)}))),function(t,e){return l.apply(this,arguments)})},{key:"updateStatus",value:(u=o(n().mark((function t(e,r){var a;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,i.post("/api/leads/"+e+"/"+r).then((function(t){return{status:1}})).catch((function(t){return{status:0}}));case 2:return a=t.sent,t.abrupt("return",a);case 4:case"end":return t.stop()}}),t)}))),function(t,e){return u.apply(this,arguments)})},{key:"assignUser",value:(s=o(n().mark((function t(e,r){var a;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,i.post("/api/leads/"+e+"/user/"+r).then((function(t){return{status:1}})).catch((function(t){return{status:0}}));case 2:return a=t.sent,t.abrupt("return",a);case 4:case"end":return t.stop()}}),t)}))),function(t,e){return s.apply(this,arguments)})}],r&&c(e.prototype,r),a&&c(e,a),t}())},5333:(t,e,r)=>{r.d(e,{Z:()=>u});var a=r(7757),n=r.n(a);function s(t,e,r,a,n,s,o){try{var c=t[s](o),i=c.value}catch(t){return void r(t)}c.done?e(i):Promise.resolve(i).then(a,n)}function o(t){return function(){var e=this,r=arguments;return new Promise((function(a,n){var o=t.apply(e,r);function c(t){s(o,a,n,c,i,"next",t)}function i(t){s(o,a,n,c,i,"throw",t)}c(void 0)}))}}function c(t,e){for(var r=0;r<e.length;r++){var a=e[r];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(t,a.key,a)}}var i=r(9669);const u=new(function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t)}var e,r,a,s,u,l,d,v;return e=t,r=[{key:"getlist",value:function(t,e){return i.get("/api/leads/".concat(t,"/payments").concat(e)).then((function(t){return t.data})).catch((function(t){return t}))}},{key:"delete",value:function(t){var e=t.lead,r=t.id;return i.delete("/api/leads/".concat(e,"/payments/").concat(r))}},{key:"create",value:(v=o(n().mark((function t(e,r){var a;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,i.post("/api/leads/".concat(e,"/payments"),r).then((function(t){return{status:1,data:t.data.data}})).catch((function(t){return{status:0,data:t.response.data.errors}}));case 2:return a=t.sent,t.abrupt("return",a);case 4:case"end":return t.stop()}}),t)}))),function(t,e){return v.apply(this,arguments)})},{key:"get",value:(d=o(n().mark((function t(e,r){var a;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,i.get("/api/leads/".concat(e,"/payments/").concat(r));case 2:return a=t.sent,t.abrupt("return",a.data.data);case 4:case"end":return t.stop()}}),t)}))),function(t,e){return d.apply(this,arguments)})},{key:"update",value:(l=o(n().mark((function t(e,r,a){var s;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return e.append("_method","put"),t.next=3,i.post("/api/leads/".concat(a,"/payments/").concat(r),e).then((function(t){return{status:1,data:t.data.data}})).catch((function(t){return{status:0,data:t.response.data.errors}}));case 3:return s=t.sent,t.abrupt("return",s);case 5:case"end":return t.stop()}}),t)}))),function(t,e,r){return l.apply(this,arguments)})},{key:"checkEmail",value:(u=o(n().mark((function t(e,r){var a;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,i.post("/api/payments/"+e,r).then((function(t){return{status:1,data:t.data}})).catch((function(t){return{status:0,data:t.response.message}}));case 2:return a=t.sent,t.abrupt("return",a);case 4:case"end":return t.stop()}}),t)}))),function(t,e){return u.apply(this,arguments)})},{key:"getBrand",value:(s=o(n().mark((function t(e){var r;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,i.post("/api/payments-getbrand/"+e).then((function(t){return t.data}));case 2:return r=t.sent,t.abrupt("return",r);case 4:case"end":return t.stop()}}),t)}))),function(t){return s.apply(this,arguments)})}],r&&c(e.prototype,r),a&&c(e,a),t}())},8941:(t,e,r)=>{function a(t,e){for(var r=0;r<e.length;r++){var a=e[r];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(t,a.key,a)}}r.d(e,{Z:()=>s});var n=r(9669);const s=new(function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t)}var e,r,s;return e=t,(r=[{key:"getlist",value:function(t){return n.get("/api/project".concat(t)).then((function(t){return t.data})).catch((function(t){return t}))}},{key:"validateTask",value:function(t){return n.post("/api/task-validate",t).then((function(t){return{status:1,data:"validated"}})).catch((function(t){return{status:0,data:t.response.data.errors}}))}},{key:"createTask",value:function(t,e){return n.post("/api/project/"+t+"/task",e).then((function(t){return{status:1,data:t.data}})).catch((function(t){return{status:0,data:t.response.data.errors}}))}},{key:"create",value:function(t){return n.post("/api/project",t).then((function(t){return{status:1,data:t.data.data}})).catch((function(t){return{status:0,data:t.response.data.errors}}))}},{key:"get",value:function(t){return n.get("/api/project/".concat(t)).then((function(t){return t.data.data})).catch((function(t){return t}))}}])&&a(e.prototype,r),s&&a(e,s),t}())},5961:(t,e,r)=>{r.d(e,{Z:()=>u});var a=r(7757),n=r.n(a);function s(t,e,r,a,n,s,o){try{var c=t[s](o),i=c.value}catch(t){return void r(t)}c.done?e(i):Promise.resolve(i).then(a,n)}function o(t){return function(){var e=this,r=arguments;return new Promise((function(a,n){var o=t.apply(e,r);function c(t){s(o,a,n,c,i,"next",t)}function i(t){s(o,a,n,c,i,"throw",t)}c(void 0)}))}}function c(t,e){for(var r=0;r<e.length;r++){var a=e[r];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(t,a.key,a)}}var i=r(9669);const u=new(function(){function t(){!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t)}var e,r,a,s,u;return e=t,r=[{key:"getlist",value:function(t){return i.get("/api/user-briefs".concat(t)).then((function(t){return t.data})).catch((function(t){return t}))}},{key:"create",value:(u=o(n().mark((function t(e){var r;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,i.post("/api/user-briefs",e).then((function(t){return{status:1,data:t.data.data}})).catch((function(t){return{status:0,data:t.response.data.errors}}));case 2:return r=t.sent,t.abrupt("return",r);case 4:case"end":return t.stop()}}),t)}))),function(t){return u.apply(this,arguments)})},{key:"delete",value:function(t){t.query;var e=t.id;return i.delete("/api/user-briefs/".concat(e))}},{key:"get",value:function(t){return i.get("/api/user-briefs/".concat(t)).then((function(t){return t.data.data}))}},{key:"update",value:(s=o(n().mark((function t(e,r){var a;return n().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return e.append("_method","put"),t.next=3,i.post("/api/user-briefs/"+r,e).then((function(t){return{status:1,data:t.data.data}})).catch((function(t){return{status:0,data:t.response.data.errors}}));case 3:return a=t.sent,t.abrupt("return",a);case 5:case"end":return t.stop()}}),t)}))),function(t,e){return s.apply(this,arguments)})}],r&&c(e.prototype,r),a&&c(e,a),t}())},2639:(t,e,r)=>{r.r(e),r.d(e,{default:()=>m});var a=r(7757),n=r.n(a),s=r(9556),o=r(8941),c=r(5333),i=r(3567),u=r(5961);const l={props:{status:String,text:String},data:function(){return{}},computed:{}};var d=r(1900);function v(t,e,r,a,n,s,o){try{var c=t[s](o),i=c.value}catch(t){return void r(t)}c.done?e(i):Promise.resolve(i).then(a,n)}function f(t){return function(){var e=this,r=arguments;return new Promise((function(a,n){var s=t.apply(e,r);function o(t){v(s,a,n,o,c,"next",t)}function c(t){v(s,a,n,o,c,"throw",t)}o(void 0)}))}}const p={components:{StatusChip:(0,d.Z)(l,(function(){var t=this,e=t.$createElement;return(t._self._c||e)("v-chip",{attrs:{label:"","text-color":"white",color:t.status}},[t._v(t._s(t.text))])}),[],!1,null,null,null).exports},data:function(){return{createPaymentTgl:!1,createBriefTgl:!1,lead:{},payments:[],briefs:[],form:{amount:0,status:0,merchant:"stripe",description:"",payment_type:"sell",project_id:0,currency:"USD"},briefform:{name:"",form_id:0},briefforms:[],formerrors:{amount:[],status:[],merchant:[],description:[],payment_type:[],project_id:[],currency:[]},merchants:[{key:"stripe",value:"Stripe"},{key:"paypal",value:"paypal"},{key:"authorize.net",value:"Authorize.Net"},{key:"other",value:"Other"}],statuses:[{key:0,value:"Pending/Waiting"},{key:1,value:"Paid"},{key:2,value:"Failed"}],payment_types:[{key:"sell",value:"Sell"},{key:"upsell",value:"UpSell"},{key:"bonus",value:"Bonus"}],lead_projects:[],valid:!1}},mounted:function(){var t=this;return f(n().mark((function e(){return n().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return t.getLead(t.$route.params.id),e.next=3,i.Z.get("?all=true");case 3:if(t.briefforms=e.sent,!(parseInt(t.lead.user_id)>0)){e.next=8;break}return e.next=7,o.Z.getlist("?perpage=0&customer_id="+t.lead.user_id).then((function(t){return t.data}));case 7:t.lead_projects=e.sent;case 8:case"end":return e.stop()}}),e)})))()},methods:{sendForm:function(){var t=this;return f(n().mark((function e(){var r;return n().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if(!(t.briefform.form_id>0&&""!=t.briefform.name)){e.next=19;break}return(r=new FormData).append("form_name",t.briefform.name),r.append("form_id",t.briefform.form_id),r.append("user_id",t.lead.user_id),r.append("brand_id",t.lead.brand_id),e.next=8,u.Z.create(r);case 8:if(!e.sent.status){e.next=17;break}return t.$store.commit("setNotification","Brief Sent to Customer"),e.next=13,u.Z.get("?user_id="+t.lead.user_id);case 13:t.briefs=e.sent,t.briefform.form_id=0,t.briefform.name="",t.createBriefTgl=!1;case 17:e.next=20;break;case 19:t.$store.commit("setNotification","Please Select Form and Type name to sent brief to user");case 20:case"end":return e.stop()}}),e)})))()},getLead:function(t){var e=this;return f(n().mark((function r(){return n().wrap((function(r){for(;;)switch(r.prev=r.next){case 0:return r.next=2,s.Z.get(t);case 2:if(e.lead=r.sent,!e.lead){r.next=11;break}return r.next=6,c.Z.get(e.lead.id,"");case 6:if(e.payments=r.sent,!(e.lead.user_id>0)){r.next=11;break}return r.next=10,u.Z.get("?user_id="+e.lead.user_id);case 10:e.briefs=r.sent;case 11:case"end":return r.stop()}}),r)})))()},CopyLinkToClipBoard:function(t){var e=this;return f(n().mark((function r(){return n().wrap((function(r){for(;;)switch(r.prev=r.next){case 0:navigator.clipboard.writeText(t),e.$store.commit("setNotification","Payment Link Copied to Clip Board");case 2:case"end":return r.stop()}}),r)})))()},createPayment:function(){var t=this;return f(n().mark((function e(){var r,a;return n().wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return t.formerrors={amount:[],status:[],merchant:[],description:[],project_id:[],payment_type:[],currency:[]},(r=new FormData).append("amount",t.form.amount),r.append("status",t.form.status),r.append("merchant",t.form.merchant),r.append("description",t.form.description),r.append("payment_type",t.form.payment_type),r.append("project_id",t.form.project_id),r.append("currency",t.form.currency),e.next=11,c.Z.create(t.lead.id,r);case 11:if(!(a=e.sent).status){e.next=22;break}if(t.$store.commit("setNotification","Payment Created"),t.form={amount:0,status:0,merchant:"stripe",description:"",currency:"USD"},t.createPaymentTgl=!1,!t.lead){e.next=20;break}return e.next=19,c.Z.get(t.lead.id,"");case 19:t.payments=e.sent;case 20:e.next=29;break;case 22:a.data.amount&&(t.formerrors.amount=a.data.amount),a.data.status&&(t.formerrors.status=a.data.status),a.data.merchant&&(t.formerrors.merchant=a.data.merchant),a.data.description&&(t.formerrors.description=a.data.description),a.data.payment_type&&(t.formerrors.payment_type=a.data.payment_type),a.data.project_id&&(t.formerrors.project_id=a.data.project_id),a.data.currency&&(t.formerrors.currency=a.data.currency);case 29:case"end":return e.stop()}}),e)})))()}},watch:{},computed:{}};const m=(0,d.Z)(p,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("v-row",[t._l(5,(function(e){return r("v-col",{directives:[{name:"show",rawName:"v-show",value:!t.lead.id,expression:"!lead.id"}],key:e},[r("v-sheet",{staticClass:"pa-3"},[r("v-skeleton-loader",{staticClass:"mx-auto",attrs:{"max-width":"300",type:"card"}})],1)],1)})),t._v(" "),t.lead.id>0?r("v-col",[r("v-card",{attrs:{elevation:"2",tile:""}},[r("v-card-title",[r("v-icon",{attrs:{color:"indigo",size:"55"}},[t._v(" mdi-projector-screen ")]),t._v("\n        Total Projects"),r("v-chip",{staticClass:"ma-2",attrs:{color:"pink",label:"","text-color":"white"}},[t._v("\n          Tags\n        ")])],1)],1)],1):t._e(),t._v(" "),t.lead.id>0?r("v-col",[r("v-card",{attrs:{elevation:"2",tile:""}},[r("v-card-title",[r("v-icon",{attrs:{color:"indigo",size:"55"}},[t._v(" mdi-currency-usd ")]),t._v("\n        Total Paid"),r("v-chip",{staticClass:"ma-2",attrs:{color:"pink",label:"","text-color":"white"}},[t._v("\n          "+t._s(t.lead.totalPaid)+"\n        ")])],1)],1)],1):t._e(),t._v(" "),t.lead.id>0?r("v-col",[r("v-card",{attrs:{elevation:"2",tile:""}},[r("v-card-title",[r("v-icon",{attrs:{color:"indigo",size:"55"}},[t._v(" mdi-calendar-today ")]),t._v("\n        Created@\n        "),r("v-chip",{staticClass:"ma-2",attrs:{color:"pink",label:"","text-color":"white"}},[t._v("\n          "+t._s(t.lead.created_at_formatted)+"\n        ")])],1)],1)],1):t._e(),t._v(" "),t.lead.id>0?r("v-col",[r("v-card",{attrs:{elevation:"2",tile:""}},[r("v-card-title",[r("v-icon",{attrs:{color:"indigo",size:"55"}},[t._v(" mdi-calendar-alert ")]),t._v("\n        Total Running Tasks"),r("v-chip",{staticClass:"ma-2",attrs:{color:"pink",label:"","text-color":"white"}},[t._v("\n          Tags\n        ")])],1)],1)],1):t._e(),t._v(" "),t.lead.id>0?r("v-col",[r("v-card",{attrs:{elevation:"2",tile:""}},[r("v-card-title",[r("v-icon",{attrs:{color:"indigo",size:"55"}},[t._v(" mdi-watermark ")]),t._v("\n        Brand"),r("v-chip",{staticClass:"ma-2",attrs:{color:"pink",label:"","text-color":"white"}},[t._v("\n          "+t._s(t.lead.brand_code)+"\n        ")])],1)],1)],1):t._e(),t._v(" "),r("v-col",{attrs:{cols:"12"}},[r("v-divider")],1),t._v(" "),r("v-col",{attrs:{cols:"12"}},[r("v-form",{model:{value:t.valid,callback:function(e){t.valid=e},expression:"valid"}},[r("v-container",[r("v-row",[r("v-col",{attrs:{cols:"12",md:"12"}},[r("v-btn",{on:{click:function(e){t.createPaymentTgl=!t.createPaymentTgl}}},[t._v("\n              Generate Payment Link\n              "),r("v-icon",[t._v(t._s(t.createPaymentTgl?"mdi-chevron-up":"mdi-chevron-down"))])],1),t._v(" "),t.lead.user_id>0?r("v-btn",{attrs:{color:"success"}},[t._v("User Signedup")]):t._e(),t._v(" "),t.lead.user_id>0?r("v-btn",{on:{click:function(e){t.createBriefTgl=!t.createBriefTgl}}},[t._v("\n              Send Brief Form\n              "),r("v-icon",[t._v(t._s(t.createBriefTgl?"mdi-chevron-up":"mdi-chevron-down"))])],1):t._e(),t._v(" "),t.lead.user_id>0?r("v-badge",{attrs:{bordered:"",color:"info",content:0==t.lead.unseen_messages?"0":t.lead.unseen_messages,overlap:""}},[r("v-btn",{attrs:{link:"",to:{name:"auth.leads.messages",params:{id:t.lead.id}}}},[t._v("\n                Messages\n                "),r("v-icon",[t._v("mdi-message-processing-outline")])],1)],1):t._e()],1),t._v(" "),r("v-expand-transition",[r("div",{directives:[{name:"show",rawName:"v-show",value:t.createPaymentTgl,expression:"createPaymentTgl"}],staticClass:"col-md-12"},[r("v-divider"),t._v(" "),r("v-row",{staticClass:"pa-4"},[r("v-col",{attrs:{cols:"6",md:"6"}},[r("v-text-field",{attrs:{label:"Amount$",required:"","error-messages":t.formerrors.amount},model:{value:t.form.amount,callback:function(e){t.$set(t.form,"amount",e)},expression:"form.amount"}})],1),t._v(" "),r("v-col",{attrs:{cols:"6",md:"6"}},[r("v-select",{attrs:{items:t.merchants,label:"Merchant","item-text":"value","item-value":"key",required:"","error-messages":t.formerrors.merchant},model:{value:t.form.merchant,callback:function(e){t.$set(t.form,"merchant",e)},expression:"form.merchant"}})],1),t._v(" "),r("v-col",{attrs:{cols:"6",md:"6"}},[r("v-text-field",{attrs:{label:"Description","error-messages":t.formerrors.description},model:{value:t.form.description,callback:function(e){t.$set(t.form,"description",e)},expression:"form.description"}})],1),t._v(" "),r("v-col",{attrs:{cols:"6",md:"6"}},[r("v-select",{attrs:{items:t.statuses,label:"Payment Status","item-text":"value","item-value":"key",required:"","error-messages":t.formerrors.status},model:{value:t.form.status,callback:function(e){t.$set(t.form,"status",e)},expression:"form.status"}})],1),t._v(" "),r("v-col",{attrs:{cols:"3",md:"3"}},[r("v-select",{attrs:{items:t.payment_types,label:"Type","item-text":"value","item-value":"key",required:"","error-messages":t.formerrors.status},model:{value:t.form.payment_type,callback:function(e){t.$set(t.form,"payment_type",e)},expression:"form.payment_type"}})],1),t._v(" "),r("v-col",{attrs:{cols:"3",md:"3"}},[r("v-select",{attrs:{items:[{key:"USD",value:"USD"},{key:"GBP",value:"GBP"}],label:"Currency","item-text":"key","item-value":"value",required:"","error-messages":t.formerrors.currency},model:{value:t.form.currency,callback:function(e){t.$set(t.form,"currency",e)},expression:"form.currency"}})],1),t._v(" "),t.lead.user_id>0?r("v-col",{attrs:{cols:"6",md:"6"}},[r("v-select",{attrs:{items:t.lead_projects,label:"Projects","item-text":"project_id","item-value":"project_id_int",required:"","error-messages":t.formerrors.project_id},model:{value:t.form.project_id,callback:function(e){t.$set(t.form,"project_id",e)},expression:"form.project_id"}})],1):t._e(),t._v(" "),r("v-col",{attrs:{cols:"6",md:"12"}},[r("v-btn",{staticClass:"white--text",attrs:{color:"blue-grey float-left"},on:{click:t.createPayment}},[r("v-icon",{attrs:{left:"",dark:""}},[t._v(" mdi-currency-usd ")]),t._v("\n                    Generate\n                  ")],1)],1)],1)],1)]),t._v(" "),r("v-expand-transition",[r("div",{directives:[{name:"show",rawName:"v-show",value:t.createBriefTgl,expression:"createBriefTgl"}],staticClass:"col-md-12"},[r("v-divider"),t._v(" "),r("v-row",{staticClass:"pa-4"},[r("v-col",{attrs:{cols:"6",md:"6"}},[r("v-select",{attrs:{items:t.briefforms,label:"Brief Forms","item-text":"form_name","item-value":"id",required:""},model:{value:t.briefform.form_id,callback:function(e){t.$set(t.briefform,"form_id",e)},expression:"briefform.form_id"}})],1),t._v(" "),r("v-col",{attrs:{cols:"6",md:"6"}},[r("v-text-field",{attrs:{label:"Name",required:""},model:{value:t.briefform.name,callback:function(e){t.$set(t.briefform,"name",e)},expression:"briefform.name"}})],1),t._v(" "),r("v-col",{attrs:{cols:"6",md:"12"}},[r("v-btn",{staticClass:"white--text",attrs:{color:"blue-grey float-right"},on:{click:t.sendForm}},[r("v-icon",{attrs:{left:"",dark:""}},[t._v(" mdi-database-eye-outline ")]),t._v("\n                    Send\n                  ")],1)],1)],1)],1)])],1)],1)],1)],1),t._v(" "),r("v-col",{attrs:{cols:"12"}},[r("v-divider")],1),t._v(" "),r("v-col",{attrs:{cols:"12"}},[r("v-container",[r("v-row",[r("v-col",{attrs:{cols:"12",md:"12"}},[r("h2",[t._v("Past Payment Links")])]),t._v(" "),r("v-col",{attrs:{cols:"12"}},[r("v-simple-table",{scopedSlots:t._u([{key:"default",fn:function(){return[r("thead",[r("tr",[r("th",{staticClass:"text-left"},[t._v("Amount")]),t._v(" "),r("th",{staticClass:"text-left"},[t._v("Description")]),t._v(" "),r("th",{staticClass:"text-left"},[t._v("Merchant")]),t._v(" "),r("th",{staticClass:"text-left"},[t._v("Type")]),t._v(" "),r("th",{staticClass:"text-left"},[t._v("Currency")]),t._v(" "),r("th",{staticClass:"text-left"},[t._v("Project")]),t._v(" "),r("th",{staticClass:"text-left"},[t._v("Status")]),t._v(" "),r("th",{staticClass:"text-left"})])]),t._v(" "),r("tbody",t._l(t.payments,(function(e){return r("tr",{key:e.id},[r("td",[t._v(t._s(e.amount))]),t._v(" "),r("td",[t._v(t._s(e.description))]),t._v(" "),r("td",[t._v(t._s(e.merchant))]),t._v(" "),r("td",[t._v(t._s(e.payment_type_text))]),t._v(" "),r("td",[t._v(t._s(e.currency))]),t._v(" "),r("td",[t._v(t._s(e.project_id>0?e.project.project_id:"N/A"))]),t._v(" "),r("td",[0==e.status?r("StatusChip",{attrs:{status:"orange",text:e.payment_status_text}}):t._e(),t._v(" "),1==e.status?r("StatusChip",{attrs:{status:"green",text:e.payment_status_text}}):t._e(),t._v(" "),2==e.status?r("StatusChip",{attrs:{status:"red",text:e.payment_status_text}}):t._e()],1),t._v(" "),r("td",[1!=e.status&&"other"!=e.merchant?r("v-btn",{staticClass:"white--text",attrs:{small:"",color:"blue float-right"},on:{click:function(r){return t.CopyLinkToClipBoard(e.payment_link)}}},[r("v-icon",{attrs:{left:"",dark:""}},[t._v(" mdi-anchor ")]),t._v("\n                      Copy Link\n                    ")],1):t._e()],1)])})),0)]},proxy:!0}])})],1)],1)],1)],1),t._v(" "),t.lead.user_id>0?r("v-col",{attrs:{cols:"12"}},[r("v-divider")],1):t._e(),t._v(" "),t.lead.user_id>0?r("v-col",{attrs:{cols:"12"}},[r("v-container",[r("v-row",[r("v-col",{attrs:{cols:"12",md:"12"}},[r("h2",[t._v("Briefs Sent to Client")])]),t._v(" "),r("v-col",{attrs:{cols:"12"}},[r("v-simple-table",{scopedSlots:t._u([{key:"default",fn:function(){return[r("thead",[r("tr",[r("th",{staticClass:"text-left"},[t._v("Form")]),t._v(" "),r("th",{staticClass:"text-left"},[t._v("Status")]),t._v(" "),r("th",{staticClass:"text-left"},[t._v("Sent@")]),t._v(" "),r("th",{staticClass:"text-left"},[t._v("Filled@")]),t._v(" "),r("th",{staticClass:"text-left"})])]),t._v(" "),r("tbody",t._l(t.briefs,(function(e){return r("tr",{key:e.id},[r("td",[t._v(t._s(e.form_name))]),t._v(" "),r("td",[t._v(t._s(e.status_text))]),t._v(" "),r("td",[t._v(t._s(e.created_at_formatted))]),t._v(" "),r("td",[t._v("\n                    "+t._s(0!=e.status?e.updated_at_formatted:"N/A")+"\n                  ")]),t._v(" "),r("td",[0!=e.status?r("v-btn",{staticClass:"white--text",attrs:{link:"",to:{name:"guest.brief.detail",params:{id:e.id}},small:"",color:"blue float-right"}},[r("v-icon",{attrs:{left:"",dark:""}},[t._v(" mdi-database-eye-outline ")]),t._v("\n                      See Details\n                    ")],1):t._e()],1)])})),0)]},proxy:!0}],null,!1,3443444841)})],1)],1)],1)],1):t._e()],2)}),[],!1,null,null,null).exports}}]);
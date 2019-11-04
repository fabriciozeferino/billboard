(window.webpackJsonp=window.webpackJsonp||[]).push([[4],{hlHH:function(t,e,s){"use strict";s.r(e);var i=s("ta7f"),r={data:function(){return{title:"",description:"",notes:""}},validations:{title:{required:i.required},description:{required:i.required,maxLength:Object(i.maxLength)(255),minLength:Object(i.minLength)(6)}},methods:{createNewProject:function(){var t=this;this.$v.$touch(),this.$v.$invalid||axios.post("/projects ",{title:this.title,description:this.description}).then((function(){return t.$router.push({name:"projects"})})).catch((function(t){var e={type:"error",title:"",text:""};if(t.response){if(e.title=t.response.status,e.text=t.response.data.status,422===t.response.status){var s=t.response.data.errors,i="<ul>";for(var r in s)i+="<li>".concat(s[r],"</li>");i+="</lu>",e.html=i}}else t.request?(e.title="The request was made but no response was received",e.text=t.request):(e.title="Something happened in setting up the request that triggered an Error",e.text=t.message);swal.fire(e)}))}}},a=s("KHd+"),n=Object(a.a)(r,(function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"flex"},[s("div",{staticClass:"w-full"},[s("div",{staticClass:"block mx-auto w-full max-w-sm bg-white my-6 rounded-lg overflow-hidden"},[s("div",[s("div",{staticClass:"border-b p-4 font-bold text-black text-xl tracking-widest uppercase bg-white"},[t._v("\n                    New Project\n                ")]),t._v(" "),s("form",{staticClass:"bg-gray-100",on:{submit:function(e){return e.preventDefault(),t.createNewProject(e)}}},[s("div",{staticClass:"px-6 py-6"},[s("div",[s("label",{staticClass:"form-label",attrs:{for:"inputTitle"}},[t._v("Title")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model.lazy",value:t.$v.title.$model,expression:"$v.title.$model",modifiers:{lazy:!0}}],staticClass:"form-input",class:t.$v.title.$error?" form-error":"",attrs:{autofocus:"",id:"inputTitle",placeholder:"Project's title",type:"text"},domProps:{value:t.$v.title.$model},on:{change:function(e){return t.$set(t.$v.title,"$model",e.target.value)}}})]),t._v(" "),t.$v.title.$dirty?s("div",[t.$v.title.required?t._e():s("p",{staticClass:"form-error-message"},[t._v("\n                                Project Title is required.\n                            ")])]):t._e()]),t._v(" "),s("div",{staticClass:"px-6 pb-6"},[s("div",[s("label",{staticClass:"form-label",attrs:{for:"inputDescription"}},[t._v("Description")]),t._v(" "),s("textarea",{directives:[{name:"model",rawName:"v-model.lazy",value:t.$v.description.$model,expression:"$v.description.$model",modifiers:{lazy:!0}}],staticClass:"form-textarea",class:t.$v.description.$error?" form-error":"",attrs:{autofocus:"",id:"inputDescription",placeholder:"Description",type:"text"},domProps:{value:t.$v.description.$model},on:{change:function(e){return t.$set(t.$v.description,"$model",e.target.value)}}})]),t._v(" "),t.$v.description.$dirty?s("div",[t.$v.description.minLength?t._e():s("p",{staticClass:"form-error-message"},[t._v("\n                                The description must not have more than "+t._s(t.$v.description.$params.minLength.min)+"\n                                characters.\n                            ")]),t._v(" "),t.$v.description.maxLength?t._e():s("p",{staticClass:"form-error-message"},[t._v("\n                                The description must have at least "+t._s(t.$v.description.$params.maxLength.min)+"\n                                characters.\n                            ")]),t._v(" "),t.$v.description.required?t._e():s("p",{staticClass:"form-error-message"},[t._v("\n                                The description is required.\n                            ")])]):t._e()]),t._v(" "),t._m(0)])])])])])}),[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"border-t p-6 bg-white"},[e("div",{staticClass:"flex justify-between items-center"},[e("button",{staticClass:"button button-primary",attrs:{type:"submit"}},[this._v("\n                                New\n                            ")]),this._v(" "),e("a",{staticClass:"px-6 py-3 text-blue-800 text-sm font-bold"},[this._v("Create a new Project")])])])}],!1,null,null,null);e.default=n.exports}}]);
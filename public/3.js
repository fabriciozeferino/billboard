(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[3],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/ProjectCreate.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/ProjectCreate.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vuelidate/lib/validators */ "./node_modules/vuelidate/lib/validators/index.js");
/* harmony import */ var vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      title: '',
      description: '',
      notes: ''
    };
  },
  validations: {
    title: {
      required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
    },
    description: {
      required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"],
      maxLength: Object(vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["maxLength"])(255),
      minLength: Object(vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["minLength"])(6)
    }
  },
  methods: {
    createNewProject: function createNewProject() {
      var _this = this;

      this.$v.$touch();

      if (!this.$v.$invalid) {
        /*this.$store
            .dispatch('/projects ', {
                title: this.title,
                description: this.description,
            })*/
        axios.post('/projects ', {
          title: this.title,
          description: this.description
        }).then(function () {
          return _this.$router.push({
            name: 'projects'
          });
        })["catch"](function (error) {
          var notification = {
            type: 'error',
            title: '',
            text: ''
          };

          if (error.response) {
            notification.title = error.response.status;
            notification.text = error.response.data.status;

            if (error.response.status === 422) {
              var errors = error.response.data.errors;
              var list = "<ul>";

              for (var prop in errors) {
                list += "<li>".concat(errors[prop], "</li>");
              }

              list += "</lu>";
              notification.html = list;
            }
          } else if (error.request) {
            notification.title = 'The request was made but no response was received';
            notification.text = error.request;
          } else {
            notification.title = 'Something happened in setting up the request that triggered an Error';
            notification.text = error.message;
          }

          swal.fire(notification);
        });
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/ProjectCreate.vue?vue&type=template&id=1bfe4734&":
/*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/ProjectCreate.vue?vue&type=template&id=1bfe4734& ***!
  \***********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "flex" }, [
    _c("div", { staticClass: "w-full" }, [
      _c(
        "div",
        {
          staticClass:
            "block mx-auto w-full max-w-sm bg-white my-6 rounded-lg overflow-hidden"
        },
        [
          _c("div", [
            _c(
              "div",
              {
                staticClass:
                  "border-b p-4 font-bold text-black text-xl tracking-widest uppercase bg-white"
              },
              [_vm._v("\n                    New Project\n                ")]
            ),
            _vm._v(" "),
            _c(
              "form",
              {
                staticClass: "bg-gray-100",
                on: {
                  submit: function($event) {
                    $event.preventDefault()
                    return _vm.createNewProject($event)
                  }
                }
              },
              [
                _c("div", { staticClass: "px-6 py-6" }, [
                  _c("div", [
                    _c(
                      "label",
                      {
                        staticClass: "form-label",
                        attrs: { for: "inputTitle" }
                      },
                      [_vm._v("Title")]
                    ),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model.lazy",
                          value: _vm.$v.title.$model,
                          expression: "$v.title.$model",
                          modifiers: { lazy: true }
                        }
                      ],
                      staticClass: "form-input",
                      class: _vm.$v.title.$error ? " form-error" : "",
                      attrs: {
                        autofocus: "",
                        id: "inputTitle",
                        placeholder: "Project's title",
                        type: "text"
                      },
                      domProps: { value: _vm.$v.title.$model },
                      on: {
                        change: function($event) {
                          return _vm.$set(
                            _vm.$v.title,
                            "$model",
                            $event.target.value
                          )
                        }
                      }
                    })
                  ]),
                  _vm._v(" "),
                  _vm.$v.title.$dirty
                    ? _c("div", [
                        !_vm.$v.title.required
                          ? _c("p", { staticClass: "form-error-message" }, [
                              _vm._v(
                                "\n                                Project Title is required.\n                            "
                              )
                            ])
                          : _vm._e()
                      ])
                    : _vm._e()
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "px-6 pb-6" }, [
                  _c("div", [
                    _c(
                      "label",
                      {
                        staticClass: "form-label",
                        attrs: { for: "inputDescription" }
                      },
                      [_vm._v("Description")]
                    ),
                    _vm._v(" "),
                    _c("textarea", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model.lazy",
                          value: _vm.$v.description.$model,
                          expression: "$v.description.$model",
                          modifiers: { lazy: true }
                        }
                      ],
                      staticClass: "form-textarea",
                      class: _vm.$v.description.$error ? " form-error" : "",
                      attrs: {
                        autofocus: "",
                        id: "inputDescription",
                        placeholder: "Description",
                        type: "text"
                      },
                      domProps: { value: _vm.$v.description.$model },
                      on: {
                        change: function($event) {
                          return _vm.$set(
                            _vm.$v.description,
                            "$model",
                            $event.target.value
                          )
                        }
                      }
                    })
                  ]),
                  _vm._v(" "),
                  _vm.$v.description.$dirty
                    ? _c("div", [
                        !_vm.$v.description.minLength
                          ? _c("p", { staticClass: "form-error-message" }, [
                              _vm._v(
                                "\n                                The description must not have more than " +
                                  _vm._s(
                                    _vm.$v.description.$params.minLength.min
                                  ) +
                                  "\n                                characters.\n                            "
                              )
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        !_vm.$v.description.maxLength
                          ? _c("p", { staticClass: "form-error-message" }, [
                              _vm._v(
                                "\n                                The description must have at least " +
                                  _vm._s(
                                    _vm.$v.description.$params.maxLength.min
                                  ) +
                                  "\n                                characters.\n                            "
                              )
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        !_vm.$v.description.required
                          ? _c("p", { staticClass: "form-error-message" }, [
                              _vm._v(
                                "\n                                The description is required.\n                            "
                              )
                            ])
                          : _vm._e()
                      ])
                    : _vm._e()
                ]),
                _vm._v(" "),
                _vm._m(0)
              ]
            )
          ])
        ]
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "border-t p-6 bg-white" }, [
      _c("div", { staticClass: "flex justify-between items-center" }, [
        _c(
          "button",
          { staticClass: "button button-blue", attrs: { type: "submit" } },
          [
            _vm._v(
              "\n                                New\n                            "
            )
          ]
        ),
        _vm._v(" "),
        _c("a", { staticClass: "px-6 py-3 text-blue-800 text-sm font-bold" }, [
          _vm._v("Create a new Project")
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/views/ProjectCreate.vue":
/*!**********************************************!*\
  !*** ./resources/js/views/ProjectCreate.vue ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProjectCreate_vue_vue_type_template_id_1bfe4734___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProjectCreate.vue?vue&type=template&id=1bfe4734& */ "./resources/js/views/ProjectCreate.vue?vue&type=template&id=1bfe4734&");
/* harmony import */ var _ProjectCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProjectCreate.vue?vue&type=script&lang=js& */ "./resources/js/views/ProjectCreate.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ProjectCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProjectCreate_vue_vue_type_template_id_1bfe4734___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ProjectCreate_vue_vue_type_template_id_1bfe4734___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/ProjectCreate.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/ProjectCreate.vue?vue&type=script&lang=js&":
/*!***********************************************************************!*\
  !*** ./resources/js/views/ProjectCreate.vue?vue&type=script&lang=js& ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProjectCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./ProjectCreate.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/ProjectCreate.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProjectCreate_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/ProjectCreate.vue?vue&type=template&id=1bfe4734&":
/*!*****************************************************************************!*\
  !*** ./resources/js/views/ProjectCreate.vue?vue&type=template&id=1bfe4734& ***!
  \*****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProjectCreate_vue_vue_type_template_id_1bfe4734___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./ProjectCreate.vue?vue&type=template&id=1bfe4734& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/ProjectCreate.vue?vue&type=template&id=1bfe4734&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProjectCreate_vue_vue_type_template_id_1bfe4734___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProjectCreate_vue_vue_type_template_id_1bfe4734___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
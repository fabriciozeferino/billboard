(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[3],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/auth/RegisterComponent.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/auth/RegisterComponent.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************/
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
      name: '',
      email: '',
      password: '',
      password_confirmation: ''
    };
  },
  validations: {
    name: {
      required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"]
    },
    email: {
      required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"],
      email: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["email"]
    },
    password: {
      required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"],
      minLength: Object(vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["minLength"])(6)
    },
    password_confirmation: {
      required: vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["required"],
      sameAsPassword: Object(vuelidate_lib_validators__WEBPACK_IMPORTED_MODULE_0__["sameAs"])('password')
    }
  },
  methods: {
    register: function register() {
      var _this = this;

      this.$v.$touch();

      if (!this.$v.$invalid) {
        this.$store.dispatch('auth/register', {
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation
        }).then(function () {
          return _this.$router.push({
            name: 'home'
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/auth/RegisterComponent.vue?vue&type=template&id=73ff475e&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/auth/RegisterComponent.vue?vue&type=template&id=73ff475e& ***!
  \*************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "flex justify-center items-center" }, [
    _c("div", { staticClass: "w-full max-w-md" }, [
      _c(
        "div",
        {
          staticClass:
            "block mx-auto w-full max-w-sm bg-white my-6 shadow-lg rounded-lg overflow-hidden"
        },
        [
          _c("div", [
            _c(
              "div",
              {
                staticClass:
                  "border-b py-8 font-bold text-black text-center text-xl tracking-widest uppercase bg-white"
              },
              [_vm._v("\n                    Register\n                ")]
            ),
            _vm._v(" "),
            _c(
              "form",
              {
                staticClass: "bg-gray-100",
                on: {
                  submit: function($event) {
                    $event.preventDefault()
                    return _vm.register($event)
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
                        attrs: { for: "inputName" }
                      },
                      [_vm._v("Name")]
                    ),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model.lazy",
                          value: _vm.$v.name.$model,
                          expression: "$v.name.$model",
                          modifiers: { lazy: true }
                        }
                      ],
                      staticClass: "form-input",
                      class: _vm.$v.name.$error ? " form-error" : "",
                      attrs: {
                        autofocus: "",
                        id: "inputName",
                        placeholder: "Type your full name",
                        type: "text"
                      },
                      domProps: { value: _vm.$v.name.$model },
                      on: {
                        change: function($event) {
                          return _vm.$set(
                            _vm.$v.name,
                            "$model",
                            $event.target.value
                          )
                        }
                      }
                    })
                  ]),
                  _vm._v(" "),
                  _vm.$v.name.$dirty
                    ? _c("div", [
                        !_vm.$v.name.required
                          ? _c("p", { staticClass: "form-error-message" }, [
                              _vm._v(
                                "\n                                Name is required.\n                            "
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
                        attrs: { for: "inputEmail" }
                      },
                      [
                        _vm._v(
                          "E-mail\n                                Address"
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model.lazy",
                          value: _vm.$v.email.$model,
                          expression: "$v.email.$model",
                          modifiers: { lazy: true }
                        }
                      ],
                      staticClass: "form-input",
                      class: _vm.$v.email.$error ? " form-error" : "",
                      attrs: {
                        autofocus: "",
                        id: "inputEmail",
                        placeholder: "Email address",
                        type: "text"
                      },
                      domProps: { value: _vm.$v.email.$model },
                      on: {
                        change: function($event) {
                          return _vm.$set(
                            _vm.$v.email,
                            "$model",
                            $event.target.value
                          )
                        }
                      }
                    })
                  ]),
                  _vm._v(" "),
                  _vm.$v.email.$dirty
                    ? _c("div", [
                        !_vm.$v.email.email
                          ? _c("p", { staticClass: "form-error-message" }, [
                              _vm._v(
                                "\n                                Please enter a valid E-mail address.\n                            "
                              )
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        !_vm.$v.email.required
                          ? _c("p", { staticClass: "form-error-message" }, [
                              _vm._v(
                                "\n                                E-mail is required.\n                            "
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
                        attrs: { for: "inputPassword" }
                      },
                      [_vm._v("Password")]
                    ),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model.lazy",
                          value: _vm.$v.password.$model,
                          expression: "$v.password.$model",
                          modifiers: { lazy: true }
                        }
                      ],
                      staticClass: "form-input",
                      class: _vm.$v.password.$error ? " form-error" : "",
                      attrs: {
                        id: "inputPassword",
                        placeholder: "Password",
                        autofocus: "",
                        type: "password"
                      },
                      domProps: { value: _vm.$v.password.$model },
                      on: {
                        change: function($event) {
                          return _vm.$set(
                            _vm.$v.password,
                            "$model",
                            $event.target.value
                          )
                        }
                      }
                    })
                  ]),
                  _vm._v(" "),
                  _vm.$v.password.$dirty
                    ? _c("div", [
                        !_vm.$v.password.required
                          ? _c("p", { staticClass: "form-error-message" }, [
                              _vm._v(
                                "\n                                Password is required.\n                            "
                              )
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        !_vm.$v.password.minLength
                          ? _c("p", { staticClass: "form-error-message" }, [
                              _vm._v(
                                "\n                                Password must have at least " +
                                  _vm._s(
                                    _vm.$v.password.$params.minLength.min
                                  ) +
                                  " characters.\n                            "
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
                        attrs: { for: "inputPasswordConfirmation" }
                      },
                      [_vm._v("Confirm Password")]
                    ),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model.lazy",
                          value: _vm.$v.password_confirmation.$model,
                          expression: "$v.password_confirmation.$model",
                          modifiers: { lazy: true }
                        }
                      ],
                      staticClass: "form-input",
                      class: _vm.$v.password_confirmation.$error
                        ? " form-error"
                        : "",
                      attrs: {
                        id: "inputPasswordConfirmation",
                        placeholder: "Password",
                        autofocus: "",
                        type: "password"
                      },
                      domProps: { value: _vm.$v.password_confirmation.$model },
                      on: {
                        change: function($event) {
                          return _vm.$set(
                            _vm.$v.password_confirmation,
                            "$model",
                            $event.target.value
                          )
                        }
                      }
                    })
                  ]),
                  _vm._v(" "),
                  _vm.$v.password_confirmation.$dirty
                    ? _c("div", [
                        !_vm.$v.password_confirmation.required
                          ? _c("p", { staticClass: "form-error-message" }, [
                              _vm._v(
                                "\n                                Confirm Password is required\n                            "
                              )
                            ])
                          : _vm._e(),
                        _vm._v(" "),
                        !_vm.$v.password_confirmation.sameAsPassword
                          ? _c("p", { staticClass: "form-error-message " }, [
                              _vm._v(
                                "\n                                Passwords must be identical.\n                            "
                              )
                            ])
                          : _vm._e()
                      ])
                    : _vm._e()
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "border-t p-6 bg-white" }, [
                  _c(
                    "div",
                    { staticClass: "flex justify-between items-center" },
                    [
                      _c(
                        "button",
                        {
                          staticClass: "button button-blue",
                          class: this.$v.$invalid
                            ? " button-blue-invalid "
                            : "",
                          attrs: { type: "submit" }
                        },
                        [_vm._v("Register\n                            ")]
                      )
                    ]
                  )
                ])
              ]
            )
          ])
        ]
      ),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "text-gray-700 text-sm text-center" },
        [
          _vm._v("\n            Don't have an account?\n            "),
          _c(
            "router-link",
            {
              staticClass: "py-3 text-blue-600 hover:text-blue-800 font-bold ",
              attrs: { to: { name: "login" } }
            },
            [_vm._v("\n                Sign in\n            ")]
          )
        ],
        1
      )
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/auth/RegisterComponent.vue":
/*!************************************************************!*\
  !*** ./resources/js/components/auth/RegisterComponent.vue ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _RegisterComponent_vue_vue_type_template_id_73ff475e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./RegisterComponent.vue?vue&type=template&id=73ff475e& */ "./resources/js/components/auth/RegisterComponent.vue?vue&type=template&id=73ff475e&");
/* harmony import */ var _RegisterComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./RegisterComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/auth/RegisterComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _RegisterComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _RegisterComponent_vue_vue_type_template_id_73ff475e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _RegisterComponent_vue_vue_type_template_id_73ff475e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/auth/RegisterComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/auth/RegisterComponent.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/auth/RegisterComponent.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_RegisterComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./RegisterComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/auth/RegisterComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_RegisterComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/auth/RegisterComponent.vue?vue&type=template&id=73ff475e&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/components/auth/RegisterComponent.vue?vue&type=template&id=73ff475e& ***!
  \*******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_RegisterComponent_vue_vue_type_template_id_73ff475e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./RegisterComponent.vue?vue&type=template&id=73ff475e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/auth/RegisterComponent.vue?vue&type=template&id=73ff475e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_RegisterComponent_vue_vue_type_template_id_73ff475e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_RegisterComponent_vue_vue_type_template_id_73ff475e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
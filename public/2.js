(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[2],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/project/ProjectCard.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/project/ProjectCard.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _shared_Icon__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../shared/Icon */ "./resources/js/shared/Icon.vue");
/* harmony import */ var _stores_modules_projectsHelper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../stores/modules/projectsHelper */ "./resources/js/stores/modules/projectsHelper.js");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(source, true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(source).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

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
  name: "ProjectCard",
  props: ['project'],
  components: {
    Icon: _shared_Icon__WEBPACK_IMPORTED_MODULE_0__["default"]
  },
  methods: _objectSpread({}, _stores_modules_projectsHelper__WEBPACK_IMPORTED_MODULE_1__["projectMethods"])
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Project.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Project.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _stores_modules_projectsHelper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../stores/modules/projectsHelper */ "./resources/js/stores/modules/projectsHelper.js");
/* harmony import */ var _components_project_ProjectCard_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components/project/ProjectCard.vue */ "./resources/js/components/project/ProjectCard.vue");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(source, true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(source).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  mounted: function mounted() {// this.project = this.getProject(this.$route.params.id);
  },
  computed: _objectSpread({}, _stores_modules_projectsHelper__WEBPACK_IMPORTED_MODULE_0__["projectComputed"]),
  methods: _objectSpread({}, _stores_modules_projectsHelper__WEBPACK_IMPORTED_MODULE_0__["projectMethods"]),
  components: {
    ProjectCard: _components_project_ProjectCard_vue__WEBPACK_IMPORTED_MODULE_1__["default"]
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/project/ProjectCard.vue?vue&type=template&id=2547ec38&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/project/ProjectCard.vue?vue&type=template&id=2547ec38&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************************/
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
  return _c("div", [
    _c(
      "article",
      { staticClass: "overflow-hidden rounded-lg shadow-lg bg-white" },
      [
        _vm._m(0),
        _vm._v(" "),
        _c(
          "header",
          {
            staticClass:
              "flex items-center justify-between leading-tight p-2 md:p-4"
          },
          [
            _c(
              "h1",
              {
                staticClass: "text-lg no-underline hover:underline text-black",
                on: {
                  click: function($event) {
                    return _vm.editProject(_vm.project.id)
                  }
                }
              },
              [
                _vm._v(
                  "\n                    " +
                    _vm._s(_vm.project.title) +
                    "\n            "
                )
              ]
            )
          ]
        ),
        _vm._v(" "),
        _c("div", { staticClass: "p-2 md:p-4" }, [
          _vm._v(_vm._s(_vm.project.description))
        ]),
        _vm._v(" "),
        _c(
          "footer",
          {
            staticClass:
              "flex items-center justify-between leading-none p-2 md:p-4"
          },
          [
            _c(
              "a",
              {
                staticClass:
                  "flex items-center no-underline hover:underline text-black",
                attrs: { href: "#" }
              },
              [
                _c("img", {
                  staticClass: "w-10 h-10 rounded-full mr-4",
                  attrs: {
                    alt: "Placeholder",
                    src: "https://picsum.photos/32/32/?random"
                  }
                }),
                _vm._v(" "),
                _c("div", { staticClass: "text-sm" }, [
                  _c("p", { staticClass: "text-gray-900 leading-none" }, [
                    _vm._v("Jonathan Reinink")
                  ]),
                  _vm._v(" "),
                  _c("p", { staticClass: "text-gray-600" }, [_vm._v("Aug 18")]),
                  _vm._v(" "),
                  _c(
                    "div",
                    { staticClass: "mt-2 flex items-center" },
                    _vm._l(5, function(i) {
                      return _c(
                        "svg",
                        {
                          staticClass: "h-4 w-4 fill-current",
                          class:
                            i <= _vm.project.id
                              ? "text-blue-500"
                              : "text-gray-400",
                          attrs: {
                            xmlns: "http://www.w3.org/2000/svg",
                            viewBox: "0 0 20 20"
                          }
                        },
                        [
                          _c("path", {
                            attrs: {
                              d:
                                "M10 1.3l2.388 6.722H18.8l-5.232 3.948 1.871 6.928L10 14.744l-5.438 4.154 1.87-6.928-5.233-3.948h6.412L10 1.3z"
                            }
                          })
                        ]
                      )
                    }),
                    0
                  )
                ])
              ]
            ),
            _vm._v(" "),
            _c("Icon", {
              staticClass:
                "mr-1 fill-current text-gray-200 hover:text-red-400 inline-block h-5 w-5 cursor-pointer",
              attrs: { name: "trash" },
              nativeOn: {
                click: function($event) {
                  return _vm.deleteProjects(_vm.project)
                }
              }
            })
          ],
          1
        )
      ]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("a", { attrs: { href: "#" } }, [
      _c("img", {
        staticClass: "block h-auto w-full",
        attrs: {
          alt: "Placeholder",
          src: "https://picsum.photos/300/100/?random"
        }
      })
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Project.vue?vue&type=template&id=39c6aa6c&":
/*!*****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/Project.vue?vue&type=template&id=39c6aa6c& ***!
  \*****************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    [
      _c("ProjectCard", {
        attrs: { project: this.getProject(this.$route.params.id) }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/project/ProjectCard.vue":
/*!*********************************************************!*\
  !*** ./resources/js/components/project/ProjectCard.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ProjectCard_vue_vue_type_template_id_2547ec38_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ProjectCard.vue?vue&type=template&id=2547ec38&scoped=true& */ "./resources/js/components/project/ProjectCard.vue?vue&type=template&id=2547ec38&scoped=true&");
/* harmony import */ var _ProjectCard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ProjectCard.vue?vue&type=script&lang=js& */ "./resources/js/components/project/ProjectCard.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ProjectCard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ProjectCard_vue_vue_type_template_id_2547ec38_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ProjectCard_vue_vue_type_template_id_2547ec38_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "2547ec38",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/project/ProjectCard.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/project/ProjectCard.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/project/ProjectCard.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProjectCard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProjectCard.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/project/ProjectCard.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ProjectCard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/project/ProjectCard.vue?vue&type=template&id=2547ec38&scoped=true&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/components/project/ProjectCard.vue?vue&type=template&id=2547ec38&scoped=true& ***!
  \****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProjectCard_vue_vue_type_template_id_2547ec38_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./ProjectCard.vue?vue&type=template&id=2547ec38&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/project/ProjectCard.vue?vue&type=template&id=2547ec38&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProjectCard_vue_vue_type_template_id_2547ec38_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ProjectCard_vue_vue_type_template_id_2547ec38_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/views/Project.vue":
/*!****************************************!*\
  !*** ./resources/js/views/Project.vue ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Project_vue_vue_type_template_id_39c6aa6c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Project.vue?vue&type=template&id=39c6aa6c& */ "./resources/js/views/Project.vue?vue&type=template&id=39c6aa6c&");
/* harmony import */ var _Project_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Project.vue?vue&type=script&lang=js& */ "./resources/js/views/Project.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Project_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Project_vue_vue_type_template_id_39c6aa6c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Project_vue_vue_type_template_id_39c6aa6c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Project.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/Project.vue?vue&type=script&lang=js&":
/*!*****************************************************************!*\
  !*** ./resources/js/views/Project.vue?vue&type=script&lang=js& ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Project_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Project.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Project.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Project_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/Project.vue?vue&type=template&id=39c6aa6c&":
/*!***********************************************************************!*\
  !*** ./resources/js/views/Project.vue?vue&type=template&id=39c6aa6c& ***!
  \***********************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Project_vue_vue_type_template_id_39c6aa6c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Project.vue?vue&type=template&id=39c6aa6c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/Project.vue?vue&type=template&id=39c6aa6c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Project_vue_vue_type_template_id_39c6aa6c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Project_vue_vue_type_template_id_39c6aa6c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);
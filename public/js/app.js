webpackJsonp([1],{

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/ItemList.vue":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__services_helper__ = __webpack_require__("./resources/js/services/helper.js");
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
    name: "item-list",

    props: {
        title: {
            type: String,
            required: true
        },
        count: {
            type: Number,
            required: true
        },
        total: {
            type: Number,
            required: true
        }
    },

    data: function data() {
        return {
            columnCount: 1
        };
    },


    methods: {
        selectItem: function selectItem() {
            if (this.$lastSelectedItem) {
                this.$lastSelectedItem.classList.remove('selected');
                this.$lastSelectedItem = false;
            }

            if (window.location.hash && window.location.hash.match(/^#_\d+$/)) {
                var el = document.querySelector(window.location.hash);

                if (el) {
                    el.classList.add('selected');
                    this.$lastSelectedItem = el;
                }
            }
        }
    },

    mounted: function mounted() {
        this.columnCount = this.$refs.items.firstChild.childElementCount;
        console.log(this.$el);
        __WEBPACK_IMPORTED_MODULE_0__services_helper__["a" /* default */].activate(this.$el);

        this.selectItem();
        window.addEventListener('hashchange', this.selectItem);
    }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/UsageCharts/Chart.vue":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_moment__ = __webpack_require__("./node_modules/moment/moment.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_moment___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_moment__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__services_api__ = __webpack_require__("./resources/js/services/api.js");
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
    name: "chart",

    props: {
        meter: {
            type: Object,
            required: false
        },
        range: {
            type: Object,
            required: false
        },
        consumptionsRoute: {
            type: String,
            required: false
        }
    },

    data: function data() {
        return {
            levels: [],
            labels: [],

            chartOptions: {
                scales: {
                    xAxes: [{
                        type: "time",
                        time: {
                            parser: 'MM/DD/YYYY HH:mm',
                            tooltipFormat: 'll HH:mm'
                        },
                        scaleLabel: {
                            display: true,
                            labelString: 'Date'
                        }
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Energy Usage'
                        },
                        ticks: {
                            beginAtZero: true,
                            max: 100
                        }
                    }]
                }
            }
        };
    },
    created: function created() {
        var _this = this;

        __WEBPACK_IMPORTED_MODULE_1__services_api__["a" /* default */].get(this.meter ? this.meter.consumptions : this.consumptionsRoute, this.range || {}).then(function (_ref) {
            var data = _ref.data;

            data.data.forEach(function (v) {
                var m = __WEBPACK_IMPORTED_MODULE_0_moment___default()(v.created_at);

                _this.levels.push({
                    x: m.format('MM/DD/YYYY HH:mm'),
                    y: v.usage
                });

                _this.labels.push(m.toDate());
            });
        }).catch(__WEBPACK_IMPORTED_MODULE_1__services_api__["a" /* default */].handlers.error);
    }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/UsageCharts/History.vue":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_moment__ = __webpack_require__("./node_modules/moment/moment.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_moment___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_moment__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__Chart__ = __webpack_require__("./resources/js/components/UsageCharts/Chart.vue");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__Chart___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__Chart__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_vue_ctk_date_time_picker__ = __webpack_require__("./node_modules/vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.min.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2_vue_ctk_date_time_picker___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2_vue_ctk_date_time_picker__);
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
    name: "history",

    components: {
        Chart: __WEBPACK_IMPORTED_MODULE_1__Chart___default.a, VueCtkDateTimePicker: __WEBPACK_IMPORTED_MODULE_2_vue_ctk_date_time_picker___default.a
    },

    props: {
        consumptionsRoute: {
            type: String,
            required: true
        }
    },

    data: function data() {
        var start = __WEBPACK_IMPORTED_MODULE_0_moment___default()().startOf('month').format('YYYY-MM-DD'),
            end = __WEBPACK_IMPORTED_MODULE_0_moment___default()().format('YYYY-MM-DD');

        return {
            range: { start: start, end: end },
            show: false
        };
    },


    watch: {
        range: function range(_ref) {
            var _this = this;

            var start = _ref.start,
                end = _ref.end;

            if (!start || !end) {
                return;
            }

            this.show = false;

            setTimeout(function () {
                _this.show = true;
            }, 200);
        }
    }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/UsageCharts/index.vue":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__services_api__ = __webpack_require__("./resources/js/services/api.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__Chart__ = __webpack_require__("./resources/js/components/UsageCharts/Chart.vue");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__Chart___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__Chart__);
//
//
//
//
//
//
//
//





/* harmony default export */ __webpack_exports__["default"] = ({
    name: "usage-charts",

    components: {
        Chart: __WEBPACK_IMPORTED_MODULE_1__Chart___default.a
    },

    props: {
        metersRoute: {
            type: String,
            required: true
        }
    },

    data: function data() {
        return {
            meters: []
        };
    },
    created: function created() {
        var _this = this;

        __WEBPACK_IMPORTED_MODULE_0__services_api__["a" /* default */].get(this.metersRoute).then(function (_ref) {
            var data = _ref.data;

            _this.meters = data.data;
        }).catch(__WEBPACK_IMPORTED_MODULE_0__services_api__["a" /* default */].handlers.error);
    }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/pages/App.vue":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__services_helper__ = __webpack_require__("./resources/js/services/helper.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__components_UsageCharts__ = __webpack_require__("./resources/js/components/UsageCharts/index.vue");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__components_UsageCharts___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__components_UsageCharts__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__components_ItemList__ = __webpack_require__("./resources/js/components/ItemList.vue");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__components_ItemList___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_2__components_ItemList__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__components_UsageCharts_History__ = __webpack_require__("./resources/js/components/UsageCharts/History.vue");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__components_UsageCharts_History___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_3__components_UsageCharts_History__);







/* harmony default export */ __webpack_exports__["default"] = ({
    components: {
        UsageCharts: __WEBPACK_IMPORTED_MODULE_1__components_UsageCharts___default.a, ItemList: __WEBPACK_IMPORTED_MODULE_2__components_ItemList___default.a, UsageHistory: __WEBPACK_IMPORTED_MODULE_3__components_UsageCharts_History___default.a
    },

    mounted: function mounted() {
        __WEBPACK_IMPORTED_MODULE_0__services_helper__["a" /* default */].activate(this.$el);
    }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-22fb6f2c\",\"hasScoped\":false,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/UsageCharts/Chart.vue":
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "meter consumption chart" },
    [
      _vm.meter
        ? _c("h2", { staticClass: "ui header" }, [
            _c("span", { staticClass: "content" }, [
              _vm._v(
                "\n            Meter #" + _vm._s(_vm.meter.id) + "\n        "
              )
            ])
          ])
        : _vm._e(),
      _vm._v(" "),
      _vm.levels.length
        ? _c("chartjs-line", {
            attrs: {
              data: _vm.levels,
              labels: _vm.labels,
              datalabel: "Energy Usage",
              fill: true,
              bordercolor: "#efba4f",
              backgroundcolor: "rgba(255, 237, 178, 0.2)",
              pointbordercolor: "#ffedb2",
              pointcolor: "#efba4f",
              pointhoverbackgroundcolor: "#efba4f",
              option: _vm.chartOptions
            }
          })
        : _vm._e()
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-22fb6f2c", module.exports)
  }
}

/***/ }),

/***/ "./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-2ea44104\",\"hasScoped\":false,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/UsageCharts/index.vue":
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "section",
    { attrs: { id: "usage-charts" } },
    [
      _c(
        "h1",
        { staticClass: "ui header", staticStyle: { "margin-top": "50px" } },
        [_vm._v("Your usages for the last 30 days")]
      ),
      _vm._v(" "),
      _vm._l(_vm.meters, function(m, i) {
        return _c("chart", { key: i, attrs: { meter: m } })
      })
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-2ea44104", module.exports)
  }
}

/***/ }),

/***/ "./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-480cc5c0\",\"hasScoped\":false,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/UsageCharts/History.vue":
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "ui grid" }, [
    _vm._m(0),
    _vm._v(" "),
    _c("div", { staticClass: "row" }, [
      _c(
        "div",
        { staticClass: "eight wide column" },
        [
          _c("vue-ctk-date-time-picker", {
            attrs: {
              "range-mode": "",
              "overlay-background": "",
              color: "purple",
              "enable-button-validate": "",
              format: "YYYY-MM-DD",
              formatted: "ddd D MMM YYYY",
              label: "Select range"
            },
            model: {
              value: _vm.range,
              callback: function($$v) {
                _vm.range = $$v
              },
              expression: "range"
            }
          })
        ],
        1
      )
    ]),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "sixteen wide column" },
      [
        _vm.show
          ? _c("chart", {
              attrs: {
                "consumptions-route": _vm.consumptionsRoute,
                range: _vm.range
              }
            })
          : _vm._e()
      ],
      1
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "sixteen wide column" }, [
      _c("h2", { staticClass: "ui header" }, [
        _vm._v("\n            Usage History\n        ")
      ])
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-480cc5c0", module.exports)
  }
}

/***/ }),

/***/ "./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-e04d3988\",\"hasScoped\":false,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/ItemList.vue":
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "table",
    { staticClass: "ui single line table", attrs: { "data-item-list": "" } },
    [
      _c("thead", [
        _c("tr", [
          _c("th", { attrs: { colspan: _vm.columnCount } }, [
            _c("div", [
              _vm._v(
                "\n                " +
                  _vm._s(_vm.title) +
                  "\n\n                "
              ),
              _c(
                "div",
                { staticClass: "item list filter" },
                [_vm._t("filter")],
                2
              )
            ])
          ])
        ])
      ]),
      _vm._v(" "),
      _c("tbody", { ref: "items" }, [_vm._t("default")], 2),
      _vm._v(" "),
      _c("tfoot", [
        _c("tr", [
          _c(
            "th",
            {
              staticClass: "right aligned",
              attrs: { colspan: _vm.columnCount }
            },
            [
              _vm._v(
                "\n            Showing " +
                  _vm._s(_vm.count) +
                  " of " +
                  _vm._s(_vm.total) +
                  " items.\n        "
              )
            ]
          )
        ])
      ])
    ]
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-e04d3988", module.exports)
  }
}

/***/ }),

/***/ "./resources/js/app.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue__ = __webpack_require__("./node_modules/vue/dist/vue.common.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_vue__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__pages_App__ = __webpack_require__("./resources/js/pages/App.vue");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__pages_App___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1__pages_App__);
var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

__webpack_require__("./resources/js/bootstrap.js");




__webpack_require__("./node_modules/chart.js/src/chart.js");
__webpack_require__("./node_modules/hchs-vue-charts/dist/vue-charts.min.js");
__WEBPACK_IMPORTED_MODULE_0_vue___default.a.use(VueCharts);

window.Vue = __WEBPACK_IMPORTED_MODULE_0_vue___default.a;
window.app = new __WEBPACK_IMPORTED_MODULE_0_vue___default.a(_extends({}, __WEBPACK_IMPORTED_MODULE_1__pages_App___default.a)).$mount('#app');

/***/ }),

/***/ "./resources/js/bootstrap.js":
/***/ (function(module, exports, __webpack_require__) {


window._ = __webpack_require__("./node_modules/lodash/lodash.js");
window.Popper = __webpack_require__("./node_modules/popper.js/dist/esm/popper.js").default;
window.NProgress = __webpack_require__("./node_modules/nprogress/nprogress.js");

try {
    window.$ = window.jQuery = __webpack_require__("./node_modules/jquery/dist/jquery.js");

    __webpack_require__("./node_modules/semantic-ui-css/semantic.js");
} catch (e) {}

window.axios = __webpack_require__("./node_modules/axios/index.js");
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.interceptors.request.use(function (config) {
    window.NProgress.start();
    return config;
});

window.axios.interceptors.response.use(function (response) {
    window.NProgress.done();
    return response;
}, function (error) {
    window.NProgress.done();
    return Promise.reject(error);
});

var token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/***/ }),

/***/ "./resources/js/components/ItemList.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/ItemList.vue")
/* template */
var __vue_template__ = __webpack_require__("./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-e04d3988\",\"hasScoped\":false,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/ItemList.vue")
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/ItemList.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-e04d3988", Component.options)
  } else {
    hotAPI.reload("data-v-e04d3988", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ "./resources/js/components/UsageCharts/Chart.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/UsageCharts/Chart.vue")
/* template */
var __vue_template__ = __webpack_require__("./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-22fb6f2c\",\"hasScoped\":false,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/UsageCharts/Chart.vue")
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/UsageCharts/Chart.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-22fb6f2c", Component.options)
  } else {
    hotAPI.reload("data-v-22fb6f2c", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ "./resources/js/components/UsageCharts/History.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/UsageCharts/History.vue")
/* template */
var __vue_template__ = __webpack_require__("./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-480cc5c0\",\"hasScoped\":false,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/UsageCharts/History.vue")
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/UsageCharts/History.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-480cc5c0", Component.options)
  } else {
    hotAPI.reload("data-v-480cc5c0", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ "./resources/js/components/UsageCharts/index.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/components/UsageCharts/index.vue")
/* template */
var __vue_template__ = __webpack_require__("./node_modules/vue-loader/lib/template-compiler/index.js?{\"id\":\"data-v-2ea44104\",\"hasScoped\":false,\"buble\":{\"transforms\":{}}}!./node_modules/vue-loader/lib/selector.js?type=template&index=0!./resources/js/components/UsageCharts/index.vue")
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/components/UsageCharts/index.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-2ea44104", Component.options)
  } else {
    hotAPI.reload("data-v-2ea44104", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ "./resources/js/pages/App.vue":
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__("./node_modules/vue-loader/lib/component-normalizer.js")
/* script */
var __vue_script__ = __webpack_require__("./node_modules/babel-loader/lib/index.js?{\"cacheDirectory\":true,\"presets\":[[\"env\",{\"modules\":false,\"targets\":{\"browsers\":[\"> 2%\"],\"uglify\":true}}]],\"plugins\":[\"transform-object-rest-spread\",[\"transform-runtime\",{\"polyfill\":false,\"helpers\":false}]]}!./node_modules/vue-loader/lib/selector.js?type=script&index=0!./resources/js/pages/App.vue")
/* template */
var __vue_template__ = null
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources/js/pages/App.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-41ac2cb0", Component.options)
  } else {
    hotAPI.reload("data-v-41ac2cb0", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ "./resources/js/services/api.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_lodash__ = __webpack_require__("./node_modules/lodash/lodash.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_lodash___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_lodash__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__helper__ = __webpack_require__("./resources/js/services/helper.js");
var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };




/* harmony default export */ __webpack_exports__["a"] = ({
    get: function get(url, data, config) {
        return this.request('get', url, data, config);
    },
    post: function post(url, data, config) {
        return this.request('post', url, data, config);
    },
    delete: function _delete(url, data, config) {
        return this.request('delete', url, data, config);
    },
    request: function request(method, url, data, config) {
        if ((typeof config === 'undefined' ? 'undefined' : _typeof(config)) !== 'object') {
            config = {};
        }

        var query = '';
        if (['get', 'delete'].includes(method.toLowerCase())) {
            if (typeof data === 'string') {
                query = data;
            } else {
                __WEBPACK_IMPORTED_MODULE_0_lodash___default.a.forEach(data, function (value, key) {
                    query += encodeURIComponent(key) + '=' + encodeURIComponent(value) + '&';
                });
            }

            if (query !== '') {
                url += (url.includes('?') ? '&' : '?') + (query.endsWith('&') ? query.slice(0, -1) : query);
            }

            data = {};
        }

        if (!url.includes('://')) {
            url = '/api/' + url;
        }

        __WEBPACK_IMPORTED_MODULE_0_lodash___default.a.extend(config, {
            url: url, method: method, data: data
        });

        return window.axios.request(config);
    },


    handlers: {
        error: function error(_error) {
            if (_typeof(_error.response) === 'object') {
                if (_typeof(_error.response.data) === 'object') {
                    var data = _error.response.data;

                    if (_typeof(data.errors) === 'object') {
                        __WEBPACK_IMPORTED_MODULE_1__helper__["a" /* default */].notify('error', data.message || _error.response.statusText);

                        __WEBPACK_IMPORTED_MODULE_0_lodash___default.a.forEach(data.errors, function (msg, key) {
                            var $el = $('[name=' + key + '], #ctrl_' + key).eq(0);

                            if ($el.not(':visible')) {
                                $el = $el.parent();
                            }

                            $el.popup({
                                content: msg[0],
                                position: 'right center',
                                on: 'manual'
                            }).popup('show');
                        });
                    } else {
                        __WEBPACK_IMPORTED_MODULE_1__helper__["a" /* default */].notify('error', data.message || _error.response.statusText);
                    }
                } else {
                    __WEBPACK_IMPORTED_MODULE_1__helper__["a" /* default */].notify('error', _error.response.statusText);
                }
            } else {
                __WEBPACK_IMPORTED_MODULE_1__helper__["a" /* default */].notify('error', 'Please check console for more information.');
                console.error(_error);
                throw _error;
            }
        }
    }
});

/***/ }),

/***/ "./resources/js/services/form.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__api__ = __webpack_require__("./resources/js/services/api.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1__helper__ = __webpack_require__("./resources/js/services/helper.js");



/* harmony default export */ __webpack_exports__["a"] = ({
    init: function init(form, config) {
        var _this = this;

        var $form = $(form);

        $form.find('[name]').on('change', function (e) {
            $(e.target).popup('destroy');
        });

        $form.on('submit', function (e) {
            e.preventDefault();

            _this.submit(form, config).then(_this.handlers.success).catch(_this.handlers.error);
        });
    },
    submit: function submit(form, config) {
        var $form = $(form),
            data = void 0,
            redirect = __WEBPACK_IMPORTED_MODULE_1__helper__["a" /* default */].truth(form.dataset.redirect) || false,
            method = form.getAttribute('method') || 'get',
            action = form.getAttribute('action');

        if (form.getAttribute('enctype') === 'multipart/form-data') {
            data = new FormData();

            _.forEach(form.querySelectorAll('[name]'), function (el) {
                var $el = $(el).eq(0);

                if ($el.attr('type') === 'file') {
                    for (var i = 0; i < el.files.length; i++) {
                        data.append($el.attr('name'), el.files[i]);
                    }
                } else {
                    if ($el.attr('type') === 'checkbox') {
                        if ($el.is(':checked')) {
                            data.append($el.attr('name'), $el.val());
                        }
                    } else {
                        data.append($el.attr('name'), $el.val());
                    }
                }
            });
        } else {
            data = $form.serialize();
        }

        form.classList.add('loading');

        return __WEBPACK_IMPORTED_MODULE_0__api__["a" /* default */].request(method, action, data, config).then(function (r) {
            r.allowRedirection = redirect;
            form.classList.remove('loading');

            return r;
        }).catch(function (e) {
            form.classList.remove('loading');

            throw e;
        });
    },


    handlers: {
        success: function success(response) {
            if (typeof response.data.warning === 'string') {
                __WEBPACK_IMPORTED_MODULE_1__helper__["a" /* default */].notify('warning', response.data.warning);
            } else {
                __WEBPACK_IMPORTED_MODULE_1__helper__["a" /* default */].notify('success', response.data.message || response.headers['x-message'] || 'Changes have been successfully saved.', 1200);
            }

            if (response.allowRedirection && response.data.redirect) {
                setTimeout(function () {
                    if (window.location.href === response.data.redirect) {
                        window.location.reload(true);
                    } else {
                        window.location.href = response.data.redirect;
                    }
                }, 1500);
            }

            return response;
        },
        error: function error(_error) {
            __WEBPACK_IMPORTED_MODULE_0__api__["a" /* default */].handlers.error(_error);
        }
    }
});

/***/ }),

/***/ "./resources/js/services/helper.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_lodash__ = __webpack_require__("./node_modules/lodash/lodash.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_lodash___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_lodash__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_noty__ = __webpack_require__("./node_modules/noty/lib/noty.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_1_noty___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_1_noty__);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_2__api__ = __webpack_require__("./resources/js/services/api.js");
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_3__form__ = __webpack_require__("./resources/js/services/form.js");





/* harmony default export */ __webpack_exports__["a"] = ({
    activate: function activate(el) {
        var _this = this;

        __WEBPACK_IMPORTED_MODULE_0_lodash___default.a.forEach(el.querySelectorAll('.ui.dropdown'), function (el) {
            if (el.dataset.dropdownInit) {
                return;
            }

            var $el = $(el);

            if (el.dataset.value) {
                $el.val(el.dataset.value);
            }

            $el.dropdown({
                on: el.dataset.on || 'click',
                action: el.dataset.action || 'activate',
                allowAdditions: _this.truth(el.dataset.allowAdditions),
                allowCategorySelection: _this.truth(el.dataset.allowCategorySelection),
                placeholder: el.dataset.placeholder || 'auto'
            });

            el.dataset.dropdownInit = true;
        });

        __WEBPACK_IMPORTED_MODULE_0_lodash___default.a.forEach(el.querySelectorAll('.ui.modal'), function (el) {
            if (el.dataset.modalInit) {
                return;
            }

            var $el = $(el);

            $el.modal({
                blurring: _this.truth(el.dataset.blurring || false)
            });

            el.dataset.modalInit = true;
        });

        __WEBPACK_IMPORTED_MODULE_0_lodash___default.a.forEach(el.querySelectorAll('.ui.checkbox'), function (el) {
            if (el.dataset.checkboxInit) {
                return;
            }

            var $el = $(el);

            $el.checkbox({});

            el.dataset.checkboxInit = true;
        });

        __WEBPACK_IMPORTED_MODULE_0_lodash___default.a.forEach(el.querySelectorAll('form.ajax'), function (el) {
            if (el.dataset.ajaxInit) {
                return;
            }

            __WEBPACK_IMPORTED_MODULE_3__form__["a" /* default */].init(el);
            el.dataset.ajaxInit = true;
        });

        __WEBPACK_IMPORTED_MODULE_0_lodash___default.a.forEach(el.querySelectorAll('[data-overlay]'), function (el) {
            if (el.dataset.overlayInit) {
                return;
            }

            el.addEventListener('click', function (e) {
                e.preventDefault();
                window.app.$emit('overlay-trigger', el, e);
            });

            el.dataset.overlayInit = true;
        });

        __WEBPACK_IMPORTED_MODULE_0_lodash___default.a.forEach(el.querySelectorAll('[data-delete]'), function (el) {
            if (el.dataset.deleteInit) {
                return;
            }

            el.addEventListener('click', function (e) {
                e.preventDefault();

                var href = el.dataset.href || el.getAttribute('href'),
                    model = el.dataset.delete;

                window.app.$emit('delete.confirm', href, model);
            });

            el.dataset.deleteInit = true;
        });
    },
    notify: function notify(type, text) {
        var timeout = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;

        return new __WEBPACK_IMPORTED_MODULE_1_noty___default.a({
            type: type, text: text, timeout: timeout
        }).show();
    },
    truth: function truth(val) {
        return val === true || val === 1 || val === '1' || val === 'on' || val === 'yes' || val === 'true' || val === 'si';
    }
});

/***/ }),

/***/ "./resources/sass/app.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/font.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/vendor.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("./resources/js/app.js");
__webpack_require__("./resources/sass/app.scss");
__webpack_require__("./resources/sass/vendor.scss");
module.exports = __webpack_require__("./resources/sass/font.scss");


/***/ })

},[0]);
Nova.booting((Vue, router) => {
    Vue.component('index-resource-index-link', require('./components/IndexField'));
    Vue.component('detail-resource-index-link', require('./components/DetailField'));
    Vue.component('form-resource-index-link', require('./components/FormField'));
})

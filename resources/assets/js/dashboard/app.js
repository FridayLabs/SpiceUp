
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('modal', require('./components/Modal.vue'));
Vue.component('core-widget', require('./components/CoreWidget.vue'));
Vue.component('widget_score', require('./components/ScoreWidget.vue'));
Vue.component('widget_timer', require('./components/TimerWidget.vue'));

const app = new Vue({
    el: '#app'
});
Echo.channel('ololo3')
    .listen('.TestEvent', function (e) {
    console.log(e);
});

// Echo.channel('screen.1111')
//     .listen('TestEvent', function (e) {
//         console.log(e)
//     });
import Vue from "vue";

Vue.component('generateTeams', require('./components/GenerateTeamsButton.vue').default);
Vue.component('startSeason', require('./components/StartSeasonButton.vue').default);
Vue.component('pointTable', require('./components/PointTable.vue').default);
export const eventBus = new Vue();

require('./bootstrap');

const app = new Vue({
    el: "#app"
});

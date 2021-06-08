import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
  	state: {
        activeEvent: {},
        betKeys: [],
  	},
  	mutations: {
		SET_ACTIVE_EVENT(state, event) {
			state.activeEvent = event;
		},
		SET_BET_KEYS(state, betKeys) {
			state.betKeys = betKeys;
		},
		ADD_BET_KEYS(state, key) {
			state.betKeys.push(key);
			localStorage.setItem('betKeys', JSON.stringify(state.betKeys));
		},
		REMOVE_BET_KEYS(state, key) {
			var keys = []
			state.betKeys.forEach((value) => {
				if(value != key) {
					keys.push(value);
				}
			});
			state.betKeys = keys
			localStorage.setItem('betKeys', JSON.stringify(state.betKeys));
		},
	},
	actions: {
		setActiveEvent({ commit, state }, event) {
			return commit('SET_ACTIVE_EVENT', event);
		},
		setBetKeys({ commit, state }, arr) {
			return commit('SET_BET_KEYS', arr);
		},
		addBetKeys({ commit, state }, key) {
			return commit('ADD_BET_KEYS', key);
		},
		removeBetKeys({ commit, state }, key) {
			return commit('REMOVE_BET_KEYS', key);
		},
	},
  	modules: {

  	},
});
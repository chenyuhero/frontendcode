import Vuex from 'vuex'
import Vue from 'vue'

Vue.ues(Vuex)
export default new Vuex.store({

	state:{

		count:0
	},
	mutations:{


		increment (state){

			state.count++
		}
	}




})
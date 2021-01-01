import { dictionary } from '@/api/base'

let dic = localStorage.getItem('dictionary');

try {
    dic = JSON.parse(dic)
} catch (error) {
    dic = {}
    console.log('字典解析错误', error)
}

const state = {
    dictionary: dic
}

const mutations = {
    SET_DIC: (state, dictionary) => {
        state.dictionary = dictionary
    }
}

const actions = {
    getDicData({ commit }) {
        return new Promise((resolve, reject) => {
            dictionary().then(response => {
                const { data } = response
                localStorage.setItem('dictionary', JSON.stringify(data))
                commit('SET_DIC', data)
                resolve()
            }).catch(error => {
                reject(error)
            })
        })
    }
}

export default {
    namespaced: true,
    state,
    mutations,
    actions
}

import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
// import * as VueGoogleMaps from 'vue2-google-maps'
import '@mdi/font/css/materialdesignicons.css'

Vue.use(Vuetify);


// Vue.use(VueGoogleMaps, {
//     load: {
//         key: 'AAIzaSyD1atOVeabWTCfC0SOiyYwpsvJh6w2Y_CI',
//         libraries: 'places',
//     }
// })


const opts = {
    icons: {
        iconfont: 'mdi', // default - only for display purposes
    },
    theme: {
        dark: false,
        themes: {
            light: {
                primary: '#536DFE',
                success: '#FF5C93',
                warning: '#FFC260',
                success: '#3CD4A0',
                info: '#9013FE',
            },
            dark: {
                primary: '#34495e',
                success: '#FF5C93',
                warning: '#FFC260',
                success: '#3CD4A0',
                info: '#9013FE',
            }
        }
    }
}

export default new Vuetify(opts)

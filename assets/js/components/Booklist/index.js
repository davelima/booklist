import Book from './../Book/Index.vue'
import data from './attrs/data'
import mounted from './attrs/mounted'
import methods from './attrs/methods'
import Autocomplete from './../../../../node_modules/vuejs-auto-complete'

export default {
    name: "booklist",
    data,
    mounted,
    methods,
    components: {
        'book': Book,
        'autocomplete': Autocomplete
    }
}

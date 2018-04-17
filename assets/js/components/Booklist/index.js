import Book from './../Book/Index.vue'
import data from './attrs/data'
import mounted from './attrs/mounted'
import methods from './attrs/methods'

export default {
    name: "booklist",
    data,
    mounted,
    methods,
    components: {
        'book': Book
    }
}

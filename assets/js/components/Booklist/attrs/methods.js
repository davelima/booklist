export default {
    load () {
        return new Promise((resolve) => {
            this.reset()

            $.getJSON('/user-books/', function(data) {
                resolve(data)
            }).then((data) => {
                let books = data || []

                books.forEach(book => {
                    this.books.push(book)
                })
            })
        })
    },

    reset () {
        this.books = []
    },

    showBookForm () {
        $('#addBook').modal('show')
    },

    hideBookForm () {
        $('#addBook').modal('hide')
    },

    addBook () {
        $('#addBook').find('button').prop('disabled', true)

        return new Promise((resolve) => {
            $.post('/user-books/', {}, function(data) {
                resolve(data)
            }, 'JSON').then((data) => {
                $('#addBook').find('button').prop('disabled', false)
                this.hideBookForm()

                this.showMessage('success', data.message)
            })
        })
    },

    showMessage (type, message) {
        $.notify(message, {
            type: type,
            allow_dismiss: true,
            delay: 2000
        })
    },

    showBook (id) {
        return new Promise((resolve) => {
            $.getJSON(`/user-books/?id=${id}`, function(data) {
                resolve(data)
            }).then((data) => {
                this.shownBook = data

                $('#showBook').modal('show')
            })
        })
    },
}

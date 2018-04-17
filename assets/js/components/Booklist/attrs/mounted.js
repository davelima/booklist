export default function() {
    this.load()

    this.$root.$on('addBook', () => {
        this.showBookForm()
    })

    this.$root.$on('showBook', (id) => {
        this.showBook(id)
    })
}

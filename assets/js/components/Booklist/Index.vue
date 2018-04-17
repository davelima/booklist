<template>
    <div class="container" id="booklist">
        <h1>Livros</h1>
        <div id="messageZone"></div>
        <div class="row">
            <div v-for="book in books">
                <book :title="book.title" :cover="book.cover" :id="book.id"></book>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="addBook">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add book</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <label for="bookSearch">Search book</label>
                            <input id="bookSearch" type="search" placeholder="Enter book title or ISBN" class="form-control" required>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" v-on:click="addBook()">Add book</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="showBook">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" v-if="shownBook.title">{{ shownBook.title }}</h4>
                    </div>
                    <div class="modal-body" v-if="shownBook">
                        <img :src="shownBook.cover" :title="shownBook.title">
                        <p>{{ shownBook.description }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script src="./index.js"></script>

<template>
    <div class="col-xs-2 book-item" :data-id="`book${id}`" v-on:click="showBook(id)">
        <div class="thumbnail">
            <img :src="cover" :title="title">
            <div class="caption">{{ title }}</div>
        </div>
    </div>
</template>

<script src="./index.js"></script>

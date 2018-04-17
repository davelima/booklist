<template>
    <header>
        <h1 class="text-center">{{ name }}</h1>
        <div class="profile-photo">
            <div class="thumbnail avatar">
                <img v-bind:src="avatar">
            </div>
        </div>
        <div class="profile-menu">
            <ul>
                <li>
                    <button class="btn btn-info" v-on:click="addBook()">Add book</button>
                </li>
                <li>
                    <a href="#" class="btn btn-info">Edit profile</a>
                </li>
            </ul>
        </div>
    </header>
</template>

<script src="./index.js"></script>

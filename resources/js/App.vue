<template>
    <v-app>
        <v-app-bar>
            <v-app-bar-nav-icon icon="mdi-home" href="/"></v-app-bar-nav-icon>
            <v-app-bar-title>Recettes de grand mère</v-app-bar-title>
        </v-app-bar>
        <v-main>
            <RecipeList />
            <v-btn icon="$plus" size="x-large"></v-btn>
        </v-main>
    </v-app>
</template>

<script>
import RecipeList from '@/components/RecipeList.vue';

export default {
    components: {
        RecipeList,
    },
    data: function() {
        return {
            recipes: []
        };
    },
    methods: {
        getRecipes() {

        }
    },
    created() {
        this.getRecipes();
    }
}
</script>

<style lang="scss" scoped>
.v-btn {
    position: fixed;
    bottom: 10rem;
    right: 10rem;
    background-color: lightcoral;
    color: #FFF;
    font-size: 2rem;
}
</style>
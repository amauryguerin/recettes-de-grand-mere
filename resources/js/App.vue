<template>
    <v-app>
        <v-app-bar color="orange-lighten-2">
            <v-app-bar-nav-icon icon="mdi-home" href="/"></v-app-bar-nav-icon>
            <v-app-bar-title>Recettes de grand mère</v-app-bar-title>
        </v-app-bar>
        <v-main>
            <RecipeList :recipes="recipes" v-on:reloadList="getRecipes()" />
            <v-row class="form--toggle" justify="center">
                <v-dialog v-model="dialog" persistent width="1024">
                    <template v-slot:activator="{ props }">
                        <v-btn class="font-weight-bold" color="green" v-bind="props">Ajouter une recette</v-btn>
                    </template>
                    <v-card class="form--container" color="white">
                        <v-btn color="white" variant="text" @click="dialog = false">x</v-btn>
                        <RecipeForm v-on:reloadList="getRecipes()" @recipeSubmitted="dialog=false" />
                    </v-card>
                </v-dialog>
            </v-row>
        </v-main>
    </v-app>
</template>

<script>
import RecipeList from '@/components/RecipeList.vue';
import RecipeForm from '@/components/RecipeForm.vue';

export default {
    components: {
        RecipeList,
        RecipeForm
    },
    data: function () {
        return {
            recipes: [],
            dialog: false
        };
    },

    methods: {
        getRecipes() {
            axios
                .get("api/recipes")
                .then(res => {
                    this.recipes = res.data;
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },

    created() {
        this.getRecipes();
    }
}
</script>

<style lang="scss" scoped>
main {
    background-color: #FFE0B2;
}

.form--toggle {
    position: fixed;
    bottom: 4rem;
    right: 4rem;
}

.form--container {
    background-color: lightgray;
    padding: 2rem;

    .v-btn {
        background-color: red;
        margin-left: auto;
        margin-bottom: 2rem;
        position: relative;

    }
}
</style>
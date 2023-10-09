<template>
    <v-app>
        <v-app-bar color="white">
            <v-btn icon="mdi-github" href="https://github.com/amauryguerin/recettes-de-grand-mere"></v-btn>
            <v-app-bar-title class="text-amber-darken-3">Recettes de grand mère</v-app-bar-title>
            <RecipeSearch :recipes="recipes" @filteredRecipes="updateFilteredRecipes" />
        </v-app-bar>
        <v-main class="bg-blue-grey-lighten-5">
            <RecipeList :recipes="filteredRecipes" v-on:reloadList="getRecipes()" />
            <v-row class="form--toggle" justify="center">
                <v-dialog v-model="dialog" persistent width="1024">
                    <template v-slot:activator="{ props }">
                        <v-btn class="font-weight-bold text-white" color="amber-darken-3" v-bind="props">Ajouter une
                            recette</v-btn>
                    </template>
                    <v-card class="form--container bg-blue-grey-lighten-5" color="white">
                        <v-btn color="white" variant="text" @click="dialog = false">X</v-btn>
                        <RecipeForm v-on:reloadList="getRecipes()" @recipeSubmitted="dialog = false" />
                    </v-card>
                </v-dialog>
            </v-row>
            
        </v-main>
    </v-app>
</template>
  
<script>
import RecipeList from '@/components/RecipeList.vue';
import RecipeForm from '@/components/RecipeForm.vue';
import RecipeSearch from '@/components/RecipeSearch.vue';

export default {
    components: {
        RecipeList,
        RecipeForm,
        RecipeSearch
    },

    data: function () {
        return {
            recipes: [],
            dialog: false,
            filteredRecipes: []
        };
    },

    methods: {
        getRecipes() {
            axios
                .get("api/recipes")
                .then(res => {
                    this.recipes = res.data;
                    this.filteredRecipes = res.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },

        updateFilteredRecipes(filteredRecipes) {
            this.filteredRecipes = filteredRecipes;
        }
    },

    created() {
        this.getRecipes();
    }
}
</script>
  

<style lang="scss">
header {
    padding: 0 1rem;

    @media (max-width: 768px) {
        height: 12rem;
    }
}

.v-toolbar__content {
    @media (max-width: 768px) {
        flex-direction: column;
        gap: 1rem;
    }

    .v-input {
        @media (max-width: 768px) {
            width: 18rem;
        }
    }
}

.v-main {
    @media (max-width: 1280px) {
        padding: 14rem 1rem !important;
    }
}

.v-input {
    padding: 0 1.5rem;
}

.form--toggle {
    position: fixed;
    bottom: 4rem;
    right: 4rem;
}

.form--container {
    padding: 2rem !important;

    .v-btn {
        background-color: red;
        margin-left: auto;
        margin-bottom: 2rem;
        position: relative;

    }
}
</style>
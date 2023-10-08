<template>
    <v-text-field v-model="searchQuery" placeholder="Rechercher par ingrédients"></v-text-field>
</template>
  
<script>
export default {
    props: {
        recipes: Array,
    },
    data() {
        return {
            searchQuery: "",
        };
    },
    computed: {
        filteredRecipes() {
            const query = this.searchQuery.toLowerCase();
            if (!query) {
                return this.recipes;
            }
            return this.recipes.filter((recipe) => {
                return recipe.ingredient.toLowerCase().includes(query);
            });
        },
    },
    watch: {
        searchQuery(newValue) {
            this.$emit("filteredRecipes", this.filteredRecipes);
        },
    },
};
</script>
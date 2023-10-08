<template>
    <li class="recipe--item">
        <v-card :loading="loading" class="mx-auto my-12" max-width="374">
            <v-img cover height="250" src="https://cdn.vuetifyjs.com/images/cards/cooking.png"></v-img>
            <v-card-item>
                <v-card-title> {{ recipe.title }} </v-card-title>
            </v-card-item>
            <v-card-text>
                <p> {{ recipe.ingredient }} </p>
                <p> {{ recipe.description }} </p>
            </v-card-text>
            <v-divider class="mx-4 mb-1"></v-divider>
            <v-card-actions>
                <v-btn color="orange-lighten-1" variant="text" class="font-weight-bold">
                    Modifier la recette
                </v-btn>
                <v-btn color="red" variant="text" icon="mdi-delete" @click="removeRecipe()"></v-btn>
            </v-card-actions>
        </v-card>
    </li>
</template>

<script>
export default {
    props: ["recipe"],
    methods: {
        removeRecipe() {
            axios
                .delete(`api/recipe/${this.recipe.id}`)
                .then(res => {
                    if (res.status == 200) {
                        this.$emit("recipeChanged");
                    }
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>

<style lang="scss">
    .v-card-text {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
</style>
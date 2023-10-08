<template>
    <li class="recipe--item">
        <v-card class="mx-auto my-12" max-width="374">
            <v-img cover height="250" src="https://cdn.vuetifyjs.com/images/cards/cooking.png"></v-img>
            <v-card-item>
                <v-card-title v-if="!recipe.editing">
                    {{ recipe.title }}
                </v-card-title>
                <v-textarea v-model="recipe.title" v-else></v-textarea>
            </v-card-item>
            <v-card-text>
                <p v-if="!recipe.editing">
                    {{ recipe.ingredient }}
                </p>
                <v-textarea v-model="recipe.ingredient" v-else></v-textarea>
                <p v-if="!recipe.editing">
                    {{ recipe.description }}
                </p>
                <v-textarea v-model="recipe.description" v-else></v-textarea>
            </v-card-text>
            <v-divider class="mx-4 mb-1"></v-divider>
            <v-card-actions>
                <v-btn color="amber-darken-3" variant="text" class="font-weight-bold" @click="toggleEditing()">
                    {{ recipe.editing ? "Enregistrer" : "Modifier la recette" }}
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
        toggleEditing() {
            this.recipe.editing = !this.recipe.editing;
            if (!this.recipe.editing) {
                axios
                    .put(`api/recipe/${this.recipe.id}`, { recipe: this.recipe })
                    .then(res => { if (res.status == 200) { this.$emit("recipeChanged"); } })
                    .catch(error => { console.log(error); })

                this.$emit("recipeChanged");
            }
        },

        removeRecipe() {
            axios
                .delete(`api/recipe/${this.recipe.id}`)
                .then((res) => {
                    if (res.status == 200) {
                        this.$emit("recipeChanged");
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>

<style lang="scss">
.v-card-text {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
</style>

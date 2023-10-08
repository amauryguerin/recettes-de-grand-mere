<template>
    <v-form ref="form" class="recipe--form">
        <v-text-field v-model="recipe.title" :rules="recipeTitleRules" label="Nom de la recette"
            required></v-text-field>
        <v-textarea v-model="recipe.ingredient" :rules="recipeIngredientRules" label="Ingrédients de la recette"
            required></v-textarea>
        <v-textarea v-model="recipe.description" :rules="recipeDescriptionRules" label="Description de la recette"
            required></v-textarea>
        <v-btn color="success" class="mt-4" block @click="validate, addRecipe()">
            Ajouter ma recette
        </v-btn>
        <v-btn color="error" class="mt-4" block @click="reset">
            Réinitialiser ma recette
        </v-btn>
    </v-form>
</template>

<script>
export default {
    data: () => ({
        recipeTitleRules: [
            v => !!v || 'Le nom de la recette est obligatoire',
            v => (v && v.length <= 50) || 'Le nom de la recette doit faire moins de 50 caractères.',
        ],
        recipeIngredientRules: [
            v => !!v || 'Les ingrédients de la recette sont obligatoires',
        ],
        recipeDescriptionRules: [
            v => !!v || 'La description de la recette est obligatoire',
        ],
        recipe: {
            title: "",
            ingredient: "",
            description: ""
        }
    }),

    methods: {
        addRecipe() {
            if (this.recipe.title == "") {
                return;
            }
            axios
                .post("api/recipe/store", {
                    recipe: this.recipe
                })
                .then(res => {
                    if (res.status == 201) {
                        this.recipe.title = "";
                        this.recipe.ingredient = "";
                        this.recipe.description = "";
                        this.$emit("reloadList");
                    }
                })
                .catch(error => {
                    console.log(error);
                })
        },
        async validate() {
            const { valid } = await this.$refs.form.validate()
        },
        reset() {
            this.$refs.form.reset()
        }
    },
}
</script>

<style lang="scss">
.recipe--form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}
</style>
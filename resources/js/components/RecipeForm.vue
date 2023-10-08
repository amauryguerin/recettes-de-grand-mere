<template>
    <v-form ref="form" class="recipe--form">
        <v-text-field v-model="recipe.title" :counter="50" :rules="recipeTitleRules" label="Nom de la recette"></v-text-field>
        <v-textarea v-model="recipe.ingredient" :rules="recipeIngredientRules"
            label="Ingrédients de la recette"></v-textarea>
        <v-textarea v-model="recipe.description" :rules="recipeDescriptionRules"
            label="Description de la recette"></v-textarea>
        <v-alert v-if="errorMessages.length > 0" type="error">
            <ul>
                <li v-for="(message, index) in errorMessages" :key="index">
                    {{ message }}
                </li>
            </ul>
        </v-alert>
        <v-btn color="success" class="mt-4" block @click="validateAndAddRecipe">
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
        },
        errorMessages: []
    }),

    methods: {
        validateAndAddRecipe() {
            const isValid = this.$refs.form.validate();
            if (this.recipe.title === "" || this.recipe.ingredient === "" || this.recipe.description === "") {
                return;
            }
            if (isValid) {
                this.addRecipe();
            }
        },

        addRecipe() {
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
                        this.$emit("recipeSubmitted");
                    }
                })
                .catch(error => {
                    console.log(error);
                });
        },

        reset() {
            this.$refs.form.reset();
        }
    }
}
</script>

<style lang="scss">
    .recipe--form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
</style>
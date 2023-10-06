<template>
    <v-form ref="form" class="recipe--form">
        <v-text-field v-model="recipeTitle" :counter="50" :rules="recipeTitleRules" label="Nom de la recette"
            required></v-text-field>
        <v-textarea v-model="recipeIngredient" :rules="recipeIngredientRules" label="Ingrédients de la recette"
            required></v-textarea>
        <v-textarea v-model="recipeDescription" :rules="recipeDescriptionRules" label="Description de la recette"
            required></v-textarea>
            <v-btn color="success" class="mt-4" block @click="validate">
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
        recipeTitle: '',
        recipeTitleRules: [
            v => !!v || 'Le nom de la recette est obligatoire',
            v => (v && v.length <= 50) || 'Le nom de la recette doit faire moins de 50 caractères.',
        ],
        recipeIngredient: '',
        recipeIngredientRules: [
            v => !!v || 'Les ingrédients de la recette sont obligatoires',
        ],
        recipeDescription: '',
        recipeDescriptionRules: [
            v => !!v || 'La description de la recette est obligatoire',
        ],

    }),

    methods: {
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
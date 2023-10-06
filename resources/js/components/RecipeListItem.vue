<template>
    <v-card :loading="loading" class="mx-auto my-12" max-width="374">
        <v-img cover height="250" src="https://cdn.vuetifyjs.com/images/cards/cooking.png"></v-img>
        <v-card-item>
            <v-card-title> {{ recipe.title }} </v-card-title>
        </v-card-item>
        <v-card-text>
            <v-list>
                <v-list-item v-for="n in 3" :key="n">Ingrédients</v-list-item>
            </v-list>
            <div>Étape 1 : allumer votre appareil...</div>
        </v-card-text>
        <v-divider class="mx-4 mb-1"></v-divider>
        <v-card-actions>
            <v-btn color="deep-purple-lighten-2" variant="text">
                Modifier la recette
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
export default {
    props: ["recipe"],
    methods: {

    }
}
</script>
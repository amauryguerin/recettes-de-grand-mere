<template>
    <v-card :loading="loading" class="mx-auto my-12" max-width="374">
        <template v-slot:loader="{ isActive }">
            <v-progress-linear :active="isActive" color="deep-purple" height="4" indeterminate></v-progress-linear>
        </template>
        <v-img cover height="250" src="https://cdn.vuetifyjs.com/images/cards/cooking.png"></v-img>
        <v-card-item>
            <v-card-title>Raclette savoyarde</v-card-title>
            <v-card-subtitle>
                Temps de préparation : ...
            </v-card-subtitle>
            <v-card-subtitle>
                Pour x personnes
            </v-card-subtitle>
        </v-card-item>
        <v-card-text>
            <v-list>
                <v-list-item v-for="n in 3" :key="n">Ingrédients</v-list-item>
            </v-list>
            <div>Étape 1 : allumer votre appareil...</div>
        </v-card-text>
        <v-divider class="mx-4 mb-1"></v-divider>
        <v-card-actions>
            <v-btn color="deep-purple-lighten-2" variant="text" @click="reserve">
                Modifier la recette
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
export default {
    data: () => ({
        loading: false,
        selection: 1,
    }),

    methods: {
        reserve() {
            this.loading = true
            setTimeout(() => (this.loading = false), 2000)
        },
    },
}
</script>
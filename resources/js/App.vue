<template>
    <v-app>
        <v-app-bar>
            <v-app-bar-nav-icon icon="mdi-home" href="/"></v-app-bar-nav-icon>
            <v-app-bar-title>Recettes de grand mère</v-app-bar-title>
        </v-app-bar>
        <v-main>
            <v-container>
                <v-row>
                    <v-col v-for="n in 5" :key="n" cols="3">
                        <RecipeCard />
                    </v-col>
                </v-row>
            </v-container>
            <v-btn icon="$plus" size="x-large"></v-btn>
        </v-main>
    </v-app>
</template>

<script>
import RecipeCard from '@/components/RecipeCard.vue';

export default {
    name: 'App',
    components: {
        RecipeCard,
    }
}
</script>

<style lang="scss" scoped>
.v-btn {
    position: fixed;
    bottom: 10rem;
    right: 10rem;
    color: lightcoral;
}
</style>
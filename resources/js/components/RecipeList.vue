<template>
    <ul class="recipe--list">
        <RecipeListItem :recipe="recipe" v-on:recipeChanged="$emit('reloadList')" v-for="recipe in recipes"
            :key="recipe.id" />
    </ul>
</template>

<script>
import RecipeListItem from '@/components/RecipeListItem.vue';

export default {
    components: {
        RecipeListItem,
    },
    props: ["recipes"]
}
</script>

<style lang="scss">
.recipe--list {
    list-style-type: none;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;

    .recipe--item {
        flex-basis: 30%;

        @media (max-width: 768px) {
            flex-basis: 100%;
        }
    }
}
</style>
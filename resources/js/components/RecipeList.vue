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
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        list-style-type: none;
    }

</style>
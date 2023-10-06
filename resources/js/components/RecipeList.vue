<template>
    <RecipeListItem />
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
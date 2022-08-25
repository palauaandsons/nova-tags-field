<template>
    <p class="py-3 tags-index-field"> {{ fieldName }} </p>
</template>

<script>
export default {
    props: ['field'],

    computed: {
        fieldValue() {
            return this.field.displayedAs || field.value.join(', ')
        },
    }
};
</script>

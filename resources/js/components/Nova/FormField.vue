<template>
    <DefaultField :field="field">
        <template #field>
            <component 
                :is="component" 
                :name="field.name" 
                :suggestion-limit="field.suggestionLimit" 
                v-model="tags"
            ></component>
        </template>
    </DefaultField>
</template>

<script>
import MultiTagsInput from '../Tags/MultiTagsInput';
import SingleTagsInput from '../Tags/SingleTagsInput';
import { FormField, HandlesValidationErrors } from 'laravel-nova';

export default {
    props: ['field'],

    mixins: [FormField, HandlesValidationErrors],

    data() {
        return {
            tags: this.field.value || [],
        };
    },

    components: {
        MultiTagsInput,
        SingleTagsInput,
    },

    computed: {
        component() {
            return this.field.multiple ? 'multi-tags-input' : 'single-tags-input';
        },
    },

    methods: {
        fill(formData) {
            formData.append(this.field.attribute, this.tags.join('-----'));
        },

        handleChange(value) {
            this.value = value;
        },
    },
};
</script>

<template>
    <TagsInput :tags="modelValue" :suggestion-limit="suggestionLimit" @input="handleInput">
        <template v-slot="{ tags, removeTag, inputProps, inputEvents, suggestions, insertSuggestion }">
            <div class="tags-input w-full form-control form-input form-input-bordered flex items-center"
                @click="focusInput">
                <span v-for="tag in tags" :key="tag" class="tags-input-tag mr-1">
                    <span>{{ tag }}</span>
                    <button type="button" class="tags-input-remove" @click.prevent.stop="removeTag(tag)">
                        &times;
                    </button>
                </span>
                <input ref="input" class="tags-input-text" :placeholder="__('Add tag...')" v-bind="inputProps"
                    v-on="inputEvents">
            </div>
            <ul v-if="suggestions && suggestions.length" class="tags-input-suggestions">
                <li v-for="suggestion in suggestions" :key="suggestion" class="mr-1">
                    <button class="tags-input-tag" @mousedown.prevent @click.prevent="insertSuggestion(suggestion)">
                        {{ suggestion }}
                    </button>
                </li>
            </ul>
        </template>
    </TagsInput>
</template>

<script>
import TagsInput from './TagsInput.vue';

export default {
    props: ['modelValue', 'suggestionLimit'],

    components: {
        TagsInput,
    },

    methods: {
        focusInput() {
            this.$refs.input.focus();
        },

        handleInput(tags) {
            this.$emit('update:modelValue', tags);

            // Re-focus the input after a suggestion was inserted
            this.focusInput();
        },
    },
};
</script>

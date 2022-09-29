<template>
    <select 
        v-if="loaded" 
        class="w-full form-control form-select" 
        :id="name" 
        :value="modelValue[0]"
        @input="$emit('update:modelValue', [$event.target.value])"
    >
        <option value="" selected disabled>
            {{ __('Choose an option') }}
        </option>
        <option 
            v-for="tag in availableTags" 
            :key="tag" 
            :value="tag"
        >
            {{ tag }}
        </option>
    </select>
</template>

<script>
export default {
    props: ['modelValue', 'name', 'suggestionLimit'],

    emits: ['update:modelValue'],

    data: () => ({
        loaded: false,
        availableTags: [],
    }),

    mounted() {
        this.getAvailableTags();
    },

    methods: {
        getAvailableTags() {
            Nova.request()
                .get(`/nova-vendor/palauaandsons/nova-tags-field`)
                .then(response => {
                    this.availableTags = response.data;

                    this.loaded = true;
                });
        },
    },
};
</script>

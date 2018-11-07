<template>
    <select
        v-if="loaded"
        class="w-full form-control form-select"
        :id="name"
        :value="tags[0]"
        @input="$emit('input', [$event.target.value])"
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
    props: ['tags', 'name', 'suggestionLimit'],

    model: {
        prop: 'tags',
    },

    data: () => ({
        loaded: false,
        availableTags: [],
    }),

    mounted() {
        this.getAvailableTags();
    },

    methods: {
        getAvailableTags() {
            window.axios
                .get(`/nova-vendor/palauaandsons/nova-tags-field`)
                .then(response => {
                    this.availableTags = response.data;

                    this.loaded = true;
                });
        },
    },
};
</script>

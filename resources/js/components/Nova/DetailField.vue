<template>
    <PanelItem :field="field" :index="index">
       <template #value>{{  field.value.join(', ') }}</template>
    </PanelItem>
</template>

<script>
export default {
    props: ['index', 'field'],
};
</script>

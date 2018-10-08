<template>
    <panel-item :field="field">
        <template slot="value">
            <p class="text-90">{{ field.value }}</p>
        </template>
    </panel-item>
</template>


<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>

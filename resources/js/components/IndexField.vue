<template>
    <div>
        <div v-if="field.value">
            <div class="flex items-center font-bold">
                <a
                    :href="`/nova/resources/${resourceName}/${field.id}`"
                    :target="target"
                    class="no-underline text-primary"
                    >{{ field.value }}</a>
            </div>
        </div>
        <p v-else>&nbsp;</p>
    </div>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
    computed: {
        target () {
            return field.newTab ? '_blank' : '_self'
        }
    }
}
</script>

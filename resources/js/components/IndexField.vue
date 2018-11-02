<template>
    <div>
        <div v-if="field.value">
            <div class="flex items-center font-bold">
                <router-link
                    :to="{ name: 'detail', params: {
                        resourceName: resourceName,
                        resourceId: field.id
                    }}"
                    :title="field.value"
                    :target="target"
                    class="no-underline dim text-primary font-bold"
                    >{{ field.value }}</router-link>
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
            return this.field.newTab ? '_blank' : '_self'
        }
    }
}
</script>

<template>
    <div>
        <div v-if="field.value">
            <div class="flex items-center font-bold">
                <router-link
                    :to="{ name: routerLinkName, params: {
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
        },
        routerLinkName () {
            return ('index_links_to_form' in this.field && this.field.index_links_to_form == true) ? 'edit' :  'detail';
        }
    }
}
</script>

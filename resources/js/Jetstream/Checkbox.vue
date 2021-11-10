<template>
    <input type="checkbox" :value="value" v-model="proxyChecked"
           class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-900 dark:border-transparent dark:focus:border-transparent dark:focus:ring-offset-indigo-300 dark:focus:ring-indigo-400 dark:focus:ring-opacity-75 dark:checked:bg-indigo-600">
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    emits: ['update:checked'],

    props: {
        checked: {
            type: [Array, Boolean],
            default: false,
        },
        value: {
            default: null,
        },
    },

    computed: {
        proxyChecked: {
            get() {
                return this.checked;
            },

            set(val) {
                this.$emit("update:checked", val);
            },
        },
    },
})
</script>

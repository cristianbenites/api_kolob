<template>
    <input
    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-300 dark:border-gray-900 dark:focus:border-indigo-400 dark:focus:ring-1 dark:focus:ring-indigo-400 dark:focus:ring-opacity-100"
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
    ref="input">
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: ['modelValue'],

        emits: ['update:modelValue'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    })
</script>

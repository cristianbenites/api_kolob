<template>
    <button :type="type" class="inline-flex items-center justify-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-red-600 border border-transparent rounded-md hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition dark:hover:bg-red-700 dark:focus:ring-red-400">
        <slot></slot>
    </button>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: {
            type: {
                type: String,
                default: 'button',
            },
        }
    })
</script>

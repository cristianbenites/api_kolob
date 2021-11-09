<template>
    <div>
        <button type="submit" class="block w-full px-4 py-2 text-sm text-left text-gray-700 leading-5 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-gray-300" v-if="as == 'button'">
            <slot></slot>
        </button>

        <a :href="href" class="block px-4 py-2 text-sm text-gray-700 leading-5 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-gray-300" v-else-if="as =='a'">
            <slot></slot>
        </a>

        <Link :href="href" class="block px-4 py-2 text-sm text-gray-700 leading-5 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-gray-300" v-else>
            <slot></slot>
        </Link>
    </div>
</template>

<script>
    import { defineComponent } from 'vue';
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
        props: ['href', 'as']
    })
</script>

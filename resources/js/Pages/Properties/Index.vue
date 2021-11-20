<template>
    <app-layout title="Properties">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-100">
                Properties
            </h2>

            <Link :href="route('properties.create')" class="block px-4 py-2 text-sm text-gray-700 leading-5 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition dark:text-gray-400 dark:hover:bg-gray-900 dark:hover:text-gray-300">
                Novo
            </Link>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg dark:bg-gray-800">

                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';
    import AppLayout from '@/Layouts/AppLayout.vue'
    //import Welcome from '@/Jetstream/Welcome.vue'
    import JetButton from '@/Jetstream/Button.vue'

    export default defineComponent({
        components: {
            Link,
            AppLayout,
            //Welcome,
            JetButton,
        },
    })
</script>

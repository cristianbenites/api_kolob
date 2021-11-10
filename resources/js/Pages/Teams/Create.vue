<template>
    <app-layout title="Create Team">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-100">
                Create Team
            </h2>
        </template>

        <div>
            <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <create-team-form />
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import CreateTeamForm from '@/Pages/Teams/Partials/CreateTeamForm.vue'

    export default defineComponent({
        components: {
            AppLayout,
            CreateTeamForm,
        },
    })
</script>

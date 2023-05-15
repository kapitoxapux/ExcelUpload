<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import FileUpload from '@/Components/FileUpload.vue';
    import TableComponent from '@/Components/TableComponent.vue';
    import {Head, useForm} from '@inertiajs/vue3';
    import Pagination from '@/Components/Pagination.vue';

    let data = {
        message: null,
        counter: 0,
    }

    defineProps({
        rows: {
            type: Object,
            default: () => ({}),
        },
    });

    Echo.channel(`upload-excel`)
        .listen('UploadExcel', (e) => {
            // console.dir(e);
            document.querySelector('.notification span').textContent = data.counter++;
        });

</script>

<style>
    .notification {
        color: red;
    }
</style>

<template>
    <Head title="Excel" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Upload excel</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <FileUpload class="max-w-xl"></FileUpload>
                        <div class="notification">Добавлено записей: <span>0</span></div>
                        <div v-if="rows.data.length > 0">
                            <TableComponent :rows="rows"></TableComponent>
                            <Pagination :data="rows"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import {router, useForm} from '@inertiajs/vue3'

    let form = useForm({
        excel: null,
    })

    function upload() {
        form.post(route('excel.store'));
    }

    function reload(){
        router.reload({ only: ['rows'] })
    }

    function uploadFile(file){
        form.excel = file.files[0];
    }
</script>
<style>
    .actions-block button {
        margin-right: .5rem;
    }
</style>
<template>
    <form @submit.prevent="upload">
        <div class="flex py-2">
            <div>
                <input
                    class="block w-full text-sm text-slate-500
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-full file:border-0
                      file:text-sm file:font-semibold
                      file:bg-violet-50 file:text-violet-700
                      hover:file:bg-violet-100
                    "
                    type="file"
                    @input="uploadFile($event.target)"
                    accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                />
            </div>

            <div class="actions-block">
                <button type="submit" class="px-4 py-2 font-semibold text-sm bg-sky-500 text-white rounded-none shadow-sm">Загрузить</button>
                <button type="button" @click="reload" class="px-4 py-2 font-semibold text-sm bg-sky-500 text-white rounded-none shadow-sm">Обновить</button>
            </div>
        </div>
    </form>
</template>

<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import {Inertia} from '@inertiajs/inertia'
import {reactive} from 'vue'
import {useForm} from '@inertiajs/inertia-vue3'

const props = defineProps({
    types: Array,
    result: Object,
    currentType: String
})

const form = useForm({
    string: null,
    type: null
})

function submit(type) {
    form.type = type
    form.post('case-converter', {
        onSuccess: (data) => {
            form.defaults({
                string: data.props?.result?.value,
            });

            form.reset();
        }
    })
}
</script>

<template>
    <Head title="Case converter">
        <meta charset="UTF-8">
        <meta name="description"
              content="Convert text case to upper case, lower case, sentence case, capitalized case, alternating case, inverse case or transform your text in any way  with this converter">
        <meta name="keywords"
              content="case converter, convert case, text converter, sentence case, lower case, upper case, capitalized case, alternating case, spongebob case, inverse case">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </Head>

    <div class="flex justify-center bg-slate-500 space-x-4">
        <Link :href="route('counter')"
              class="m-2 w-full md:w-1/3 lg:w-1/6 text-center bg-slate-200 hover:bg-slate-300 active:bg-slate-400 border-solid border-2 border-slate-500 rounded-xl">
            <p class="text-xl md:text-2xl font-medium text-slate-800 dark:text-gray-500">
                Counter
            </p>
        </Link>

        <Link :href="route('case-converter')"
              class="m-2 w-full md:w-1/3 lg:w-1/6 text-center bg-slate-200 hover:bg-slate-300 active:bg-slate-400 border-solid border-2 border-slate-700 rounded-xl">
            <p class="text-xl md:text-2xl font-medium text-slate-800 dark:text-gray-500">
                Case converter
            </p>
        </Link>
    </div>

    <div
        class="relative flex flex-col items-top justify-start min-h-screen bg-gradient-to-r from-slate-100 to-purple-100 sm:items-center sm:pt-0">

        <div class="flex w-full justify-center items-center h-32 md:h-48 lg:h-80">
            <h1 class="text-4xl md:text-6xl font-bold text-slate-800">Case converter</h1>
        </div>

        <div class="flex flex-col w-full justify-center items-center">
            <div class="w-full text-center my-2 md:my-4">
                <textarea
                    class="w-11/12 md:w-1/2 lg:w-1/3 text-slate-800 border-solid border-2 border-slate-300 rounded-xl"
                    name="string" id=""
                    cols="60"
                    rows="10" placeholder="Write your text here..." v-model="form.string"></textarea>
            </div>
            <div class="flex flex-wrap justify-between">
                <button @click="submit(type)"
                        class="mx-1 md:mx-2 my-1 p-4 bg-slate-200 hover:bg-slate-300 active:bg-slate-400 border-solid border-2 border-slate-300 rounded-xl text-sm md:text-xl text-slate-800"
                        :class="{ 'bg-slate-300': currentType === type, 'bg-slate-200': currentType !== type }"
                        v-for="type in types">
                    {{ type }}
                </button>
            </div>
        </div>
    </div>
</template>

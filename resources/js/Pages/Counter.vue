<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import {Inertia} from '@inertiajs/inertia'
import {reactive} from 'vue'

defineProps({
    types: Array,
    result: Object
})


const form = reactive({
    string: null,
    type: null
})

function submit(type) {
    form.type = type
    Inertia.post('counter', form)
}
</script>

<template>
    <Head title="Counter"/>

    <div class="flex justify-center bg-violet-500 space-x-4">
        <Link :href="route('counter')"
              class="m-2 w-full md:w-1/3 lg:w-1/6 text-center bg-violet-200 hover:bg-violet-300 active:bg-violet-400 border-solid border-2 border-violet-700 rounded-xl">
            <p class="text-xl md:text-2xl font-medium text-violet-800 dark:text-gray-500">
                Counter
            </p>
        </Link>

        <Link :href="route('case-converter')"
              class="m-2 w-full md:w-1/3 lg:w-1/6 text-center bg-violet-200 hover:bg-violet-300 active:bg-violet-400 border-solid border-2 border-violet-500 rounded-xl">
            <p class="text-xl md:text-2xl font-medium text-violet-800 dark:text-gray-500">
                Case converter
            </p>
        </Link>
    </div>

    <div
        class="relative flex flex-col items-top justify-start min-h-screen bg-gradient-to-r from-violet-100 to-purple-100 sm:items-center sm:pt-0">

        <div class="flex w-full justify-center items-center h-32 md:h-48 lg:h-80">
            <h1 class="text-4xl md:text-6xl font-bold text-violet-800">Counter</h1>
        </div>

        <div class="flex flex-col w-full justify-center items-center">
            <div class="w-full text-center my-2 md:my-4">
                <textarea
                    class="w-11/12 md:w-1/2 lg:w-1/3 text-violet-800 border-solid border-2 border-violet-300 rounded-xl"
                    name="string" id=""
                    cols="60"
                    rows="10" placeholder="Write your text here..." v-model="form.string"></textarea>
            </div>
            <div class="flex flex-wrap space-x-4">
                <button @click="submit(type)"
                        class="mx-1 md:mx-2 my-1 p-4 bg-violet-200 hover:bg-violet-300 active:bg-violet-400 border-solid border-2 border-violet-300 rounded-xl text-sm md:text-xl text-violet-800"
                        v-for="type in types">
                    {{ type }}
                </button>
            </div>
        </div>
        <div class="flex justify-center items-center mt-4 space-x-2 md:space-x-4" v-if="result">
            <div class="bg-violet-300 text-violet-800 border-solid border-2 border-violet-300 rounded-xl">
                <p class="text-xl font-medium text-violet-900 dark:text-gray-500 p-4">Result:</p>
            </div>
            <div class="bg-violet-300 text-violet-800 border-solid border-2 border-violet-300 rounded-xl" v-if="result">
                <p class="text-xl font-bold text-violet-900 dark:text-gray-500 p-4"
                >{{ result.value }}</p>
            </div>
        </div>
    </div>
</template>

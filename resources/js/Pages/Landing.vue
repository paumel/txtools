<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<template>
    <Head :title="$page.props.appName"/>

    <div
        class="relative flex flex-col items-top justify-start min-h-screen bg-gradient-to-r from-violet-100 to-purple-100 sm:items-center sm:pt-0">

        <div class="flex w-full justify-center items-center h-32 md:h-48 lg:h-80">
            <h1 class="text-6xl font-bold text-violet-800">{{ $page.props.appName }}</h1>
        </div>

        <div class="flex flex-wrap w-full justify-center">
            <Link :href="route('counter')"
                  class="m-2 w-full md:w-1/3 lg:w-1/4 text-center py-20 md:py-30 lg:py-40 bg-violet-200 hover:bg-violet-300 active:bg-violet-400 border-solid border-2 border-violet-300 rounded-3xl">
                <p class="text-5xl font-medium text-violet-800 dark:text-gray-500">
                    Counter
                </p>
            </Link>

            <Link :href="route('case-converter')"
                  class="m-2 w-full md:w-1/3 lg:w-1/4 text-center py-20 md:py-30 lg:py-40 bg-violet-200 hover:bg-violet-300 active:bg-violet-400 border-solid border-2 border-violet-300 rounded-3xl">

                <p class="text-5xl font-medium text-violet-800 dark:text-gray-500">
                    Case converter
                </p>
            </Link>

        </div>

    </div>
</template>

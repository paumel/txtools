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
    <Head :title="$page.props.appName">
        <meta name="description"
              content="This is a free, online tool, that helps you to easily convert a case or you can easily count characters, words and letters in your text, title or message">
        <meta name="keywords"
              content="case converter, convert case, text converter, sentence case, lower case, upper case, capitalized case, alternating case, spongebob case, inverse case, characters counter, word counter, letter counter, char counter">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </Head>

    <div
        class="relative flex flex-col items-top justify-start min-h-screen bg-gradient-to-r from-violet-100 to-purple-100 sm:items-center sm:pt-0">

        <div class="flex w-full justify-center items-center h-32 md:h-48 lg:h-80">
            <h1 class="text-6xl font-bold text-violet-800">{{ $page.props.appName }}</h1>
        </div>
        <div class="text-left px-3 md:px-0 md:text-center mb-5">
            <p class="text-md md:text-xl font-medium text-violet-800">This is a free, online tool to help you with your
                texts
                titles or messages.</p>
            <p class="text-md md:text-xl font-medium text-violet-800">You can choose Case Converter if you want to
                transform your
                text to any shape you like.</p>
            <p class="text-md md:text-xl font-medium text-violet-800">If you want to know how many characters words or
                letters your
                text contains you can choose Counter</p>
        </div>

        <div class="flex flex-wrap w-full justify-center">
            <Link :href="route('counter')"
                  class="m-2 w-full md:w-1/3 lg:w-1/4 text-center py-10 md:py-30 lg:py-40 bg-violet-200 hover:bg-violet-300 active:bg-violet-400 border-solid border-2 border-violet-300 rounded-3xl">
                <p class="text-3xl md:text-5xl font-medium text-violet-800 dark:text-gray-500">
                    Counter
                </p>
            </Link>

            <Link :href="route('case-converter')"
                  class="m-2 w-full md:w-1/3 lg:w-1/4 text-center py-10 md:py-30 lg:py-40 bg-violet-200 hover:bg-violet-300 active:bg-violet-400 border-solid border-2 border-violet-300 rounded-3xl">

                <p class="text-3xl md:text-5xl font-medium text-violet-800 dark:text-gray-500">
                    Case converter
                </p>
            </Link>

        </div>

    </div>
</template>

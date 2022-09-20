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
    console.log(type)
    form.type = type
    Inertia.post('case-converter', form)
}
</script>

<template>
    <Head title="Counter"/>

    <div>
        <label for="string">Text:</label>
        <input id="string" v-model="form.string"/>
        <div v-for="type in types">
            <button @click="submit(type)">{{ type }}</button>
        </div>
    </div>
    <div>
        <p>Result:</p>
        <p v-if="result">{{ result.value }}</p>
    </div>
</template>

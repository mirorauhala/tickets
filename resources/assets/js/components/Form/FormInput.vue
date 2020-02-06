<template>
    <input
        type="text"
        class="textInput"
        :class="{'textInput--error': error}"
        :name="name"
        :id="name"
        :value="value"
        @input="$emit('input', $event.target.value)"
        >
</template>

<script>
export default {
    props: {
        name: {
            type: String,
            default: 'text',
            required: true
        },
        value: {
            type: String,
            required: false,
        },
        error: {
            type: Boolean,
            default: false,
            required: false
        }
    },
    data: function () {
        return {

        }
    },

    methods: {

    }

}
</script>

<style lang="scss" scoped>
.textInput {
    @apply block px-3 py-2 border rounded outline-none w-full;

    &:focus {
        @apply border-blue-500;
    }
}

.textInput--error {
    @apply border-red-500;

    &:focus {
        @apply border-red-500 bg-red-100;
    }
}
</style>

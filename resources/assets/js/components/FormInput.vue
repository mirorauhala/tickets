<template>
    <input
        type="text"
        class="form-control"
        :class="{'is-invalid': error}"
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

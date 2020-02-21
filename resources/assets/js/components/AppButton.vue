<template>
    <button
        class="rounded-lg font-bold text-white px-4 py-2"
        :class="themes[theme]"
    >
        <slot></slot>
    </button>
</template>

<script>
export default {
    props: {
        theme: {
            type: String,
            required: false,
            default: 'secondary'
        }
    },
    data: function () {
        return {
            themes: {
                primary: 'btn-primary',
                secondary: 'btn-secondary',
                success: 'btn-success',
                danger: 'btn-danger',
                warning: 'btn-warning',
                info: 'btn-info',
                light: 'btn-light',
                dark: 'btn-dark',
                link: 'btn-link'
            }
        }
    },
}
</script>

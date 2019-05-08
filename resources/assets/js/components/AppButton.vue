<template>
    <button
        type="button"
        class="btn px-4"
        :class="themes[variant]"
    >
        <slot></slot>
    </button>
</template>

<script>
export default {
    props: {
        variant: {
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

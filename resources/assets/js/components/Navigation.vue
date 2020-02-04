<template>
    <nav class="navigation">
        <div class="container mx-auto">
            <div class="nav__row">
                <a class="nav__app" :href="app.link">{{ app.name }}</a>

                <ul class="nav__left">
                    <li class="py-1" v-for="(link, id) in leftLinks" :key="id">
                        <a class="nav__link" :class="{'nav__link--active' : link.active }" :href="link.href">{{ link.text }} <span class="sr-only" v-if="link.active">(current)</span></a>
                    </li>
                </ul>

                <ul class="nav__right">
                    <li class="py-1" v-for="link in rightLinks" :key="link.id">
                        <a class="nav__link" :class="{'nav__link--active' : link.active }" :href="link.href">{{ link.text }} <span class="sr-only" v-if="link.active">(current)</span></a>
                    </li>
                    <li class="py-1" v-if="showLogout">
                        <button class="nav__link" href="#" @click="logout" id="nav-logout">Logout</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    props: {
        app: {
            type: Object,
            default: {
                name: 'App',
                link: '#'
            },
            required: true
        },
        leftLinks: {
            type: Array,
            required: false,
        },
        rightLinks: {
            type: Array,
            required: false,
        },
        showLogout: {
            type: Boolean,
            required: false,
            default: false
        }
    },
    data: function () {
        return {

        }
    },

    methods: {
        logout() {
            axios.post('/logout')
                .then(response => {
                    if(response.status == 200) {
                        window.location.href = '/'
                    }
                })
        }
    }

}
</script>

<style lang="scss" scoped>
.navigation {
    @apply shadow bg-white;
}

.nav__row {
    @apply -mx-3 flex;
}

.nav__app {
    @apply font-bold text-lg p-3;
}

.nav__left {
    @apply flex mr-auto;
}

.nav__right {
    @apply flex ml-auto;
}

.nav__link {
    @apply block px-3 py-2 rounded-lg;

    &:hover {
        @apply bg-gray-100 text-blue-500;
    }
}

.nav__link--active {
    @apply font-medium text-blue-500;

}
</style>

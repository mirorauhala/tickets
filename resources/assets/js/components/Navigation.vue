<template>
    <nav class="navigation">
        <div class="container mx-auto">
            <div class="nav__row">
                <a class="nav__app" :href="app.link">{{ app.name }}</a>

                <ul class="nav__left">
                    <li class="py-2" v-for="(link, id) in leftLinks" :key="id">
                        <a class="nav__link" :class="{'nav__link--active' : link.active }" :href="link.href">{{ link.text }} <span class="sr-only" v-if="link.active">(current)</span></a>
                    </li>
                </ul>

                <ul class="nav__right">
                    <li class="py-2">
                        <button class="nav__link" href="#"><span class="sr-only">Cart</span> 0,00 €</button>
                    </li>
                    <li class="py-2">
                        <button class="nav__link" id="meMenu" href="#" @click="toggleDropdown">Hei, Miro</button>
                        <div class="nav__dropdown" id="dropdown">
                            <ul>
                                <li class="pt-1" v-for="link in dropdownLinks" :key="link.id">
                                    <a class="nav__dropdownLink" :class="{'nav__dropdownLink--active' : link.active }" :href="link.href">{{ link.text }} <span class="sr-only" v-if="link.active">(current)</span></a>
                                </li>
                                <li class="pt-1" v-if="showLogout">
                                    <a class="nav__dropdownLink" href="#" @click="logout" id="nav-logout">Logout</a>
                                </li>
                            </ul>
                            <div class="arrow" data-popper-arrow></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
import { createPopper } from '@popperjs/core';

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
        dropdownLinks: {
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
            dropdown: null,
            dropdownLink: null,
            popperInstance: null
        }
    },

    mounted() {
        this.dropdown = document.querySelector('#dropdown');
        this.dropdownLink = document.querySelector('#meMenu');
    },

    methods: {
        createDropdown() {
            this.popperInstance = createPopper(this.dropdownLink, this.dropdown, {
                strategy: 'absolute',
                placement: 'bottom-end',
                modifiers: [
                    {
                        name: 'offset',
                        options: {
                            offset: [0, 5],
                        },
                    },
                ],
            });
        },
        showDropdown() {
            this.dropdown.setAttribute('data-show', '')
            this.createDropdown();
        },
        hideDropdown() {
            this.dropdown.removeAttribute('data-show', '')
            this.destroyDropdown();
        },
        toggleDropdown() {
            if (this.popperInstance) {
                this.hideDropdown();
            } else {
                this.showDropdown();
            }
        },
        destroyDropdown() {
            if (this.popperInstance) {
                this.popperInstance.destroy();
                this.popperInstance = null;
            }
        },
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
    @apply bg-gray-900 text-white;
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
    @apply block font-medium rounded-lg text-gray-500 px-3 py-1 mr-1;

    transition: 150ms ease all;

    &:hover {
        @apply bg-gray-800 text-white;
    }
}

.nav__link--active {
    @apply bg-gray-800 text-gray-100 font-bold;
}

.nav__dropdownLink {
    @apply block w-full px-3 py-1 text-black rounded;

    &:hover {
        @apply bg-gray-100;
    }
}
.nav__dropdownLink--active {
    @apply bg-gray-900 text-white font-bold;

    &:hover {
        @apply bg-gray-700;
    }
}

.nav__dropdown {
    position: absolute;
    background: white;
    display: none;
    min-width: 13rem;
    @apply p-2 rounded shadow-lg;
}

.nav__dropdown[data-show] {
    display: block;
}

.arrow,
.arrow::before {
    position: absolute;
    width: 8px;
    height: 8px;
    z-index: -1;
}

.arrow::before {
    content: '';
    transform: rotate(45deg);
    background: #fff;
}

.nav__dropdown[data-popper-placement^='top'] > .arrow {
    bottom: -4px;
}

.nav__dropdown[data-popper-placement^='bottom'] > .arrow {
    top: -4px;
}

.nav__dropdown[data-popper-placement^='left'] > .arrow {
    right: -4px;
}

.nav__dropdown[data-popper-placement^='right'] > .arrow {
    left: -4px;
}

</style>

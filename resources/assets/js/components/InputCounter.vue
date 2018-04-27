<template>
    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <button class="btn btn-outline-secondary" type="button" v-on:click="decrement()">-</button>
        </div>
        <input type="number" class="form-control" name="ticket_amount" min="0" :max="max" v-model="count">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" v-on:click="increment()">+</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['max'],
        data: function () {
            return {
                count: 0,
            }
        },

        methods: {
            decrement: function() {
                if(this.count > 0) {
                    this.count--
                }
            },
            increment: function() {
                if(this.count < this.max) {
                    this.count++
                }
            }
        }

    }
</script>

<template>
    <div class="card">
        <div class="card-header">
            Account
        </div>
        <div class="card-body">
            <form method="post" action="#" @submit.prevent="onSubmit" @input="form.errors.clear($event.target.name)">
                <div class="alert alert-success" v-if="form.state == 'success'" aria-live="polite">
                    Account updated!
                </div>
                <div class="form-row">
                    <div class="form-group col-6 col-md-6">
                        <label for="first_name">First name</label>
                        <form-input name="first_name" v-model="form.fields.first_name" :error="form.errors.has('first_name')" />

                        <div class="invalid-feedback" v-text="form.errors.get('first_name')"></div>
                    </div>
                    <div class="form-group col-6 col-md-6">
                        <label for="last_name">Last name</label>
                        <form-input name="last_name" v-model="form.fields.last_name" :error="form.errors.has('last_name')" />

                        <div class="invalid-feedback" v-text="form.errors.get('last_name')"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <form-input name="email" v-model="form.fields.email" :error="form.errors.has('email')" />

                    <div class="invalid-feedback" v-text="form.errors.get('email')"></div>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <form-input name="phone" v-model="form.fields.phone" :error="form.errors.has('phone')" />

                    <div class="invalid-feedback" v-text="form.errors.get('phone')"></div>
                </div>
                <div class="form-group">
                    <app-button type="submit" variant="primary" :disabled="isLoading()">
                        Update
                        <span class="spinner-border spinner-border-sm" v-if="isLoading()" role="status" aria-hidden="true"></span>
                    </app-button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Form from '../Form.js';

export default {
    props: {
        first_name: {
            required: true,
            type: String,
            default: ''
        },
        last_name: {
            required: true,
            type: String,
            default: ''
        },
        email: {
            required: true,
            type: String,
            default: ''
        },
        phone: {
            required: false,
            type: String,
            default: ''
        },
    },

    data: function () {
        return {
            form: new Form({
                fields: {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    email: this.email,
                    phone: this.phone
                },
                state: ''
            })
        }
    },

    methods: {
        onSubmit() {
            this.form.post('/api/v1/settings-account');
        },
        isLoading() {
            return this.form.state === 'loading';
        }
    }

}
</script>

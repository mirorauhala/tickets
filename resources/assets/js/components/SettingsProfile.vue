<template>
    <form method="post" action="#" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
        <div class="alert alert-success" v-if="form.state == 'success'" aria-live="polite">
            Profile updated!
        </div>
        <div class="form-row">
            <div class="form-group col-6 col-md-6">
                <label for="first_name">First name</label>
                <input type="text" class="form-control" :class="{'is-invalid': form.errors.has('first_name')}" v-model="form.first_name" id="first_name" name="first_name">

                <div class="invalid-feedback" v-text="form.errors.get('first_name')"></div>
            </div>
            <div class="form-group col-6 col-md-6">
                <label for="last_name">Last name</label>
                <input type="text" class="form-control" :class="{'is-invalid': form.errors.has('last_name') }" v-model="form.last_name" id="last_name" name="last_name">

                <div class="invalid-feedback" v-text="form.errors.get('last_name')"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" :class="{'is-invalid': form.errors.has('email') }" v-model="form.email" id="email" name="email">

            <div class="invalid-feedback" v-text="form.errors.get('email')"></div>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input id="phone" type="text" class="form-control" :class="{'is-invalid': form.errors.has('phone') }" v-model="form.phone" name="phone">

            <div class="invalid-feedback" v-text="form.errors.get('phone')"></div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary px-4" :disabled="form.state == 'loading'">
                Update
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" v-if="form.state == 'loading'"></span>
            </button>
        </div>
    </form>
</template>

<script>
import Form from '../Form.js';

export default {
    data: function () {
        return {
            form: new Form({
                first_name: '',
                last_name: '',
                email: '',
                phone: ''
            })
        }
    },

    methods: {
        buttonClass() {
            return
        },
        onSubmit() {
            this.form.post('/api/v1/settings-profile');
        }
    }

}
</script>

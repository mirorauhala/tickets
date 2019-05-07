import Errors from './Errors.js'

class Form {
    constructor(data) {
        this.originalData = data;

        for(let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
        this.state = '';
    }

    data() {
        let data = {};

        for(let field in this.originalData) {
            data[field] = this[field]
        }

        return data;
    }

    clear() {
        for(let field in this.originalData) {
            this[field] = ''
        }
    }

    post(url) {
        this.submit('post', url)
    }

    submit(method, url) {
        this.errors.clear();
        this.state = 'loading';
        axios[method](url, this.data())
            .then(this.onSuccess.bind(this))
            .catch(this.onError.bind(this))
    }

    onSuccess(response) {
        this.state = 'success';
    }

    onError(error) {
        this.state = 'error'

        if (error.response) {
            // The request was made and the server responded with a status code
            // that falls out of the range of 2xx
            this.errors.record(error.response.data);
        } else if (error.request) {
            // The request was made but no response was received
            // `error.request` is an instance of XMLHttpRequest
            console.log(error.request);
        } else {
            // Something happened in setting up the request that triggered an Error
            console.log('Error', error.message);
        }
    }
}

export default Form;
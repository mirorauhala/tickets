export default class Errors {
    constructor() {
        this.errorData = {}
    }

    has(field) {
        return this.errorData.hasOwnProperty(field);
    }

    get(field) {
        if(this.errorData[field]) {
            return this.errorData[field][0];
        }
    }

    clear(field) {
        if(field) {
            delete this.errorData[field]
            return;
        }

        this.errorData = {}
    }

    record(errors) {
        this.errorData = errors.errors;
    }
}
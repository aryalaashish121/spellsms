
require("../bootstrap");

import Vue from 'vue';
import { ValidationProvider, ValidationObserver, extend  } from "vee-validate";
import { email, max, min, length, regex } from "vee-validate/dist/rules";

import cruds from "./cruds";
Vue.component("validation-provider", ValidationProvider);
Vue.component("validation-observer", ValidationObserver);


extend('required', {
    validate(value) {
        return {
            required: true,
            valid: ['', null, undefined].indexOf(value) === -1
        }
    },
    computesRequired: true,
    message: '{_field_} is required'
})

extend("max", {
    ...max,
    message: "This field must be {length} characters or less"
  });

extend("min", {
...min,
message: "This field must be {length} characters or more"
});

extend("email", {
...email,
    message: "Please input vaild email address"
});

extend("length", {
...length,
message: "This field must be {length} characters"
});

extend("regex", {
    ...regex,
    message: 'This field is invalid'
})

Vue.mixin(cruds);
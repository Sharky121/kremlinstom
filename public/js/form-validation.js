/* FormValidation object */

let FormValidation = (() => {

    let validators = {};

    function defineEnabledProperty(input) {
        Object.defineProperty(input,'enabled',{
            get: function () {
                return !input.hasAttribute('disabled');
            },
            set: function (value) {
                if (value) input.removeAttribute('disabled'); else input.setAttribute('disabled',true);
            }
        });
    }

    function arrayOfInputsToObjectValues(inputs) {
        let obj = {};
        inputs.forEach(input => {
            if (input.hasAttribute('name')) obj[input.getAttribute('name')] = input.value;
        });
        return obj;
    }

    function initializeForm(form) {
        let inputs = [].slice.call(document.querySelectorAll('input, select, button')), submit = null, i, index = -1, name = form.getAttribute('data-validate');
        if (!validators.hasOwnProperty(name)) return;
        for (i=0; i<inputs.length; i++)
        if (inputs[i] instanceof HTMLButtonElement || (inputs[i] instanceof HTMLInputElement && inputs[i].type==='submit')) {
            index = i;
            break;
        }
        if (index<0) return;
        submit = inputs.splice(index,1)[0];
        defineEnabledProperty(submit);
        let callValidator = function() {
            validators[name](arrayOfInputsToObjectValues(inputs),submit);
        };
        inputs.forEach(input => {
            ['input','propertychange','change'].forEach(event => {
                input.addEventListener(event,callValidator);
            });
        });
        callValidator();
    }

    return {
        addValidator: (name,validator) => {
            validators[name] = validator;
        },
        initialize: () => {
            [].slice.call(document.querySelectorAll('form[data-validate]')).forEach(initializeForm);
        }
    };
})();

/* validation functions for certain fields */

function isValidEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function isValidDate(date) {
    date = date.split('/').map(x=>{return parseInt(x);});
    if (date.length!==3) return false;
    return date[0]>0 && date[0]<13 && date[1]>0 && date[1]<32 && date[2]>2019 && date[2]<2100;
}

/* validators for certain forms */

FormValidation.addValidator('visit',(inputs,submit) => {
    submit.enabled = inputs.time!=='' && inputs.name!=='' && isValidEmail(inputs.email) && inputs.checkbox==='on' && inputs.doctors!=='Выберите врача' &&
        inputs.service!=='Выберите услугу' && inputs.tel!=='' && isValidDate(inputs.date);
    console.info(inputs);
});

FormValidation.addValidator('recommendation',(inputs,submit) => {
    submit = document.getElementById('submitBtn_recommendation'); // The button is placed outside of form. WTF?
    let valid = inputs.name!=='' && isValidEmail(inputs.email) && inputs.checkbox==='on';
    if (valid) submit.removeAttribute('disabled'); else submit.setAttribute('disabled',true);
});

/* initialize all the shit */

FormValidation.initialize();
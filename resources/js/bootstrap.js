import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const forms = document.querySelectorAll('.item-controls');

forms.forEach(form => {
    const input = form.querySelector('.number-input');
    const incrementButton = form.querySelector('.up-btn');
    const decrementButton = form.querySelector('.down-btn');

    incrementButton.addEventListener('click', () => {
        const currentValue = parseInt(input.value) || 0;
        const maxValue = parseInt(input.max);
        if (isNaN(maxValue) || currentValue < maxValue) {
            input.value = currentValue + 1;
            if(decrementButton.disabled) {
                decrementButton.disabled = false;
            }
            if(currentValue === maxValue - 1) {
                incrementButton.disabled = true;
            }
        } else {
            incrementButton.disabled = true;
            if(decrementButton.disabled) {
                decrementButton.disabled = false;
            }
        }

    });

    decrementButton.addEventListener('click', () => {
        const currentValue = parseInt(input.value) || 0;
        const minValue = parseInt(input.min);
        if (isNaN(minValue) || currentValue > minValue) {
            input.value = currentValue - 1;
            if (incrementButton.disabled) {
                incrementButton.disabled = false;
            }
            if(currentValue === minValue+1) {
                decrementButton.disabled = true;
            }
        } else {
            decrementButton.disabled = true;
            if (incrementButton.disabled) {
                incrementButton.disabled = false;
            }
        }
    });
});


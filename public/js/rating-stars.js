let RatingStars = function() {

    const ATTR_VALUE = 'data-rating';
    let items = [];

    function valueToWidth(value) {
        const STAR_WIDTH = 12, STAR_SPACE = 20 - STAR_WIDTH;
        let width = value * STAR_WIDTH;
        width += Math.floor(value) * STAR_SPACE + STAR_SPACE / 2;
        return width.toString() + '%';
    }

    function getValue() {
        return this.getAttribute(ATTR_VALUE) * 1;
    }

    function setValue(value) {
        value = value<0 ? 0 : value>5 ? 5 : value;
        this.setAttribute(ATTR_VALUE,value);
        style = this.getElementsByClassName('ratings__mask-container')[0].style.width = valueToWidth(value);
    }

    function initializeRatingStars(item) {
        let stars = document.createElement('div'), maskContainer = document.createElement('div'), mask = document.createElement('div');
        stars.className = 'ratings__stars';
        maskContainer.className = 'ratings__mask-container';
        mask.className = 'ratings__mask';
        maskContainer.appendChild(mask);
        item.appendChild(stars);
        item.appendChild(maskContainer);
        Object.defineProperty(item,'value',{get: getValue, set: setValue});
        item.value = item.value; // set initial state
    }

    return {
        initialize: function () {
            items = [].slice.call(document.querySelectorAll('div[data-rating]'));
            items.forEach(initializeRatingStars);
        }
    };
}();
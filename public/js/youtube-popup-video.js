let YoutubePopup = (() => {

    const
        ATTR_YOUTUBE = 'data-youtube-video', ATTR_SHOW = 'data-youtube-popup',
        CSS_YOUTUBE = '.youtube-popup__backdrop{align-items:center;background-color:rgba(0,0,0,0.5);display:flex;height:100vh;justify-content:center;left:0;opacity:0;pointer-events:none;position:fixed;top:0;transition:all 0.3s ease-in-out;width:100vw;z-index:10000}body[data-youtube-popup] .youtube-popup__backdrop{opacity:1;pointer-events:initial}.youtube-popup__box,.youtube-popup__box iframe{height:50.625vmin;width:90vmin}.youtube-popup__box iframe{border-radius:10px;box-shadow:3px 3px 20px rgba(0,0,0,0.2);overflow:hidden}';
    let popup = null;

    function newDiv(cls) {
        let e = document.createElement('div');
        e.className = cls;
        return e;
    }

    function createPopup() {
        let
            backdrop = newDiv('youtube-popup__backdrop'),
            box = newDiv('youtube-popup__box');
        backdrop.addEventListener('click',hidePopup);
        backdrop.appendChild(box);
        document.body.appendChild(backdrop);
        popup = box;
    }

    function createStyle() {
        let style = document.createElement('style');
        style.setAttribute('type','text/css');
        style.innerHTML = CSS_YOUTUBE;
        document.body.insertBefore(style,document.body.firstChild);
    }

    function showPopup() {
        document.body.setAttribute(ATTR_SHOW,'true');
    }

    function hidePopup() {
        let iframe = document.querySelector('.youtube-popup__box iframe');
        if (iframe!==null) delete iframe.parentNode.removeChild(iframe);
        document.body.removeAttribute(ATTR_SHOW);
    }

    function playVideo(event) {
        let video = event.currentTarget.getAttribute(ATTR_YOUTUBE), old = popup.firstChild;
        if (old!==null) delete popup.removeChild(old);
        popup.insertAdjacentHTML('beforeEnd','<iframe width="1280" height="720" src="https://www.youtube.com/embed/'+video+'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
        showPopup();
    }

    function initializeYoutubeVideo(element) {
        element.addEventListener('click',playVideo);
    }

    return {
        initialize: () => {
            [].slice.call(document.querySelectorAll('['+ATTR_YOUTUBE+']')).forEach(initializeYoutubeVideo);
            createStyle();
            createPopup();
        }
    };
})();
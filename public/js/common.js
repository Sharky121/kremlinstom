$(document).ready(function() {

$('.footer-tel a.bigblack-text').click(function(){
    void(gtag('config', 'UA-125337794-1', {'page_path': '/telefon'}));
    void(yaCounter7649464.reachGoal('telefon')); 
    return true;
});

$('.contact-content_mail a').click(function(){
    void(gtag('config', 'UA-125337794-1', {'page_path': '/napisat'}));
    void(yaCounter7649464.reachGoal('napisat')); 
    return true;
});

$('form.send_form button#submitBtn_pain').click(function(){
    void(gtag('config', 'UA-125337794-1', {'page_path': '/forma_zapisi'}));
    void(yaCounter7649464.reachGoal('forma_zapisi'));
    return true;
});


    // RANDOM COLOR

    // // HAMBURGER
    $('.c-hamburger').on('click', function(e) {
        e.preventDefault();
        $('.menu').toggleClass('open-menu');
        $('body').toggleClass('noscroll');
        if($(this).hasClass('is-active')) {
            $(this).removeClass('is-active')
        } else {
            $(this).addClass('is-active')
        }
    });

    $('.filter-block_service a').click(function() {
        $('.filter-block_service a').removeClass('active-tab');
        $(this).addClass('active-tab');
    });


    // END HAMBURGER


//    Carousel
    var $owl = $('.banner-carousel');

    $owl.owlCarousel({
        loop: true,
        nav: false,
        items: 1,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 5000,
        animateOut: 'fadeOut',
        lazyLoad: true,
        onInitialized: function(event) {
            $('.slide-preloader').remove();
        }
    });

    $owl.on('change.owl.carousel', function( event ) {
        $('.slide-text h1').addClass('animated fadeInRight');
    });

    var count_items = $('.sert-carousel .item').length;
    $('.sert-carousel').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        items: 3,
        dots: false,
        itemsScaleUp: false,
        lazyLoad: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items:  count_items >= 2 ? 2 : count_items,
            },
            1280: {
               items:  count_items >= 3 ? 3 : count_items,
            }
        }
    });

    $('.work-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        items: 1,
        dots: false,
        lazyLoad: true
    });


    $('.doctors-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        items: 2,
        dots: false,
        autoplay: true,
        lazyLoad: true,
        autoplayTimeout: 2500,
        autoplaySpeed: 2000,
        responsive: {
            0: {
                items: 1,
            },
            1200: {
                items: 2,
            }
        }
    });

    var count_items_doctor = $('.doctors-carousel_service .item').length;
    $('.doctors-carousel_service').owlCarousel({
        loop: count_items_doctor >= 4,
        margin: 10,
        nav: true,
        items: 3,
        dots: false,
        lazyLoad: true,
        responsive: {
            0: {
                items: 1,
            },
            480: {
                items: 2,
            },
            700: {
                items: 3,
            },
            1200: {
                items:  4
            }
        }
    });

    $('.news-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        items: 4,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3500,
        autoplaySpeed: 2000,
        lazyLoad: true,
        responsive: {
            0: {
                items: 1
            },
            550: {
                items: 2
            },
            800: {
                items: 3
            },
            1025: {
                items: 4
            }
        }
    });

    $('.review-carousel').owlCarousel({
        items: 3,
        nav: true,
        loop: true,
        margin: 0,
        video: true,
        center: true,
        dots: false,
        autoplay: true,
        lazyLoad: true
    });

    $('.main-carousel').owlCarousel({
        items: 1,
        nav: true,
        loop: true,
        center: true,
        lazyLoad: true
    });
    $('.service-item_review-carousel').owlCarousel({
        items: 3,
        nav: true,
        loop: true,
        center: true,
        merge: false,
        margin:50,
        dots: false,
        lazyLoad: true
    });

    $('.before_after-carousel').owlCarousel({
        items: 1,
        nav: true,
        loop: true,
        center: true,
        lazyLoad: true
    });

    $('.license-carousel').owlCarousel({
        items: 3,
        nav: true,
        loop: true,
        center: true,
        margin: 20,
        responsive: {
            0: {
                items: 1
            },
            400: {
                items: 2
            },
            800: {
                items: 3
            }
        }
    });

    $('.video-carousel').on('initialized.owl.carousel',function() {
        document.querySelector('.video-carousel').removeAttribute('style');
        YoutubePopup.initialize();
    });

    $('.video-carousel').owlCarousel({
        items: 3,
        nav: true,
        loop: true,
        center: true,
        dots: false,
        lazyLoad: true,
        margin: 20,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1025: {
                items: 3
            }
        }
    });

    $('.license-carousel').owlCarousel({
        items: 3,
        nav: true,
        loop: true,
        center: true,
        dots: false,
        lazyLoad: true,
        margin: 20
    });

    $('.welcome-carousel').owlCarousel({
        items: 1,
        nav: false,
        loop: true,
        center:true,
        dots: true,
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 3500,
        autoplaySpeed: 2000
    });

    function closeOpenedSubmenus(current) {
        [].slice.call(document.querySelectorAll('.left-column-menu > div > a.active')).forEach(a => {
            if (a!==current) {
                $(a).next().slideToggle('slow');
                $(a).toggleClass('active');
            }
        });
        /*$('.left-column-menu > div > a.active').each(() => {
            $(this).next().slideToggle('slow');
            $(this).toggleClass('active');
        });*/
    }

    $('a[data-rel^=lightcase]').lightcase({
        swipe: true
    });

    $('.main-menu_vine-ico').click(function(e){
        e.preventDefault();
        $(".gallery-vine-ico a").first().click();
    });

    $(".doctors-block_collapse > a").click(function(){
        closeOpenedSubmenus(this);
        $(this).next().slideToggle('slow');
        $(this).toggleClass('active');
        return false;
    });
    $(".service-block_collapse > a").click(function(){
        closeOpenedSubmenus(this);
        $(this).next().slideToggle('slow');
        $(this).toggleClass('active');
        return false;
    });
    $(".tech-block_collapse > a").click(function(){
        closeOpenedSubmenus(this);
        $(this).next().slideToggle('slow');
        $(this).toggleClass('active');
        return false;
    });
    $('.service_select').on('click', function(e) {
        $('.service_select + ul').slideToggle('slow');
        return false;
    });

    window.addEventListener('click',(event) => {
        let $a = $('.dropdown a.active');
        if ($a[0]===event.target) return;
        $a.toggleClass('active');
        if ($a.next().hasClass('active')) {
            $a.next().removeClass('active');
            $a.next().slideUp(350);
        } else {
            $a.parent().parent().find('.dropdown-content').removeClass('active');
            $a.parent().parent().find('.dropdown-content').slideUp(350);
            $a.next().toggleClass('active');
            $a.next().slideToggle(350);
        }
    });

    $('.dropdown a').click(function() {
        var $this = $(this);
        $this.toggleClass('active');
        if ($this.next().hasClass('active')) {
            $this.next().removeClass('active');
            $this.next().slideUp(350);
        } else {
            $this.parent().parent().find('.dropdown-content').removeClass('active');
            $this.parent().parent().find('.dropdown-content').slideUp(350);
            $this.next().toggleClass('active');
            $this.next().slideToggle(350);
        }
    });

    $('#button-back').click(function(){
        $( ".visit-doctor").show();
        $( ".visit-doctor-sucess" ).hide();
    });

    $('#btn-send_close').click(function(){
        $( "#recommendation").show();
        $( "#submitBtn_recommendation").show();
        $( ".backrec" ).hide();
        $( ".btn-send_close" ).hide();
    });

    $('#button-back_appointment').click(function(){
        $( ".appointment").show();
        $( ".appointment-sucess" ).hide();
    });

    $('#button-back_thankyou').click(function(){
        $( "#director").show();
        $( "#reg-treatment-block_wrap").show();
        $( "#reg-treatment-block_service-wrap").show();
        $( "#callback-wrap").show();
        $( "#review").show();
        $( ".thankyou" ).hide();
    });

    $('#button-back_review').click(function(){
        $( "#callback-wrap").show();
        $( ".thankyou" ).hide();
        $( "#submitBtn_recommendation").show();
    });

    $('#button-back_director').click(function(){
        $( "#director").show();
        $( ".thankyou" ).hide();
    });


    // Обновление captcha
    $('body').on('click','span.reload',function(){
        var img = $(this).find('img[alt=captcha]');
        var src = img.attr('src');
        var url = src.slice(0,src.indexOf('?'));
        img.attr('src',url+'?'+ $.now());
    });

    var the_terms = $("#checkbox");

    the_terms.click(function() {
        if ($(this).is(":checked")) {
            $("#submitBtn").removeAttr("disabled");
        } else {
            $("#submitBtn").attr("disabled", "disabled");
        }
    });

    var the_terms = $("#checkbox_callback");

    the_terms.click(function() {
        if ($(this).is(":checked")) {
            $("#submitBtn_callback").removeAttr("disabled");
        } else {
            $("#submitBtn_callback").attr("disabled", "disabled");
        }
    });

    var the_terms = $("#checkbox_gift");

    the_terms.click(function() {
        if ($(this).is(":checked")) {
            $("#submitBtn_gift").removeAttr("disabled");
        } else {
            $("#submitBtn_gift").attr("disabled", "disabled");
        }
    });

    var the_terms = $("#checkbox_pain");

    the_terms.click(function() {
        if ($(this).is(":checked")) {
            $("#submitBtn_pain").removeAttr("disabled");
        } else {
            $("#submitBtn_pain").attr("disabled", "disabled");
        }
    });

    var the_terms = $("#checkbox_reg-treatment");

    the_terms.click(function() {
        if ($(this).is(":checked")) {
            $("#submitBtn_gift_reg-treatment").removeAttr("disabled");
        } else {
            $("#submitBtn_gift_reg-treatment").attr("disabled", "disabled");
        }
    });

    var the_terms = $("#checkbox_recommendation");

    the_terms.click(function() {
        if ($(this).is(":checked")) {
            $("#submitBtn_recommendation").removeAttr("disabled");
        } else {
            $("#submitBtn_recommendation").attr("disabled", "disabled");
        }
    });

    var the_terms = $("#checkbox_appointment-btn");

    the_terms.click(function() {
        if ($(this).is(":checked")) {
            $("#submitBtn_appointment-btn").removeAttr("disabled");
        } else {
            $("#submitBtn_appointment-btn").attr("disabled", "disabled");
        }
    });

    $(".question-item p").click(function () {
        $header = $(this);
        $content = $header.next();

        $header.parent().toggleClass('active');
        $header.toggleClass('active');
        $content.slideToggle(500);
    });

    $('#service').on('change',function(){
        var id_servise = $(this).find('option:selected').eq(0).attr('rel');
        $('select#doctors option').show();
        $('select#doctors option:selected').prop('selected',false);
        $.each($('select#doctors option'),function(){
            var arr = $(this).attr('rel').split(','); console.log(arr);
                if($.inArray(id_servise,arr)==-1){
                    $(this).hide();
                }else{
                    $(this).show();
                }
        });
    });

    function scaleCaptcha(elementWidth) {
        var reCaptchaWidth = 304;
        var containerWidth = $('.formWidth').width();

        if(reCaptchaWidth > containerWidth) {
            var captchaScale = containerWidth / reCaptchaWidth;
            console.log(captchaScale);
            $('.recapt').css({
                'transform':'scale('+captchaScale+')'
            });
        }

    }
     scaleCaptcha();
     $(window).resize($.throttle(100, scaleCaptcha));
    // 13 april 2007 begin date
    var year= new Date();
    const beginDate = 2007*12;
    var currentYear = year.getFullYear()*12;
    var realYear = (currentYear - beginDate)/12;

    var currentMonth = year.getMonth()+1;
    if(currentMonth < 4) {
        currentMonth = currentMonth + 12;
    }
    currentMonth = currentMonth - 4;

    if (document.getElementById("date")) {
        document.getElementById("date").innerHTML = realYear;
    }

    switch (currentMonth) {
        case 1:
            monthName = ' месяц '
            break;
        case 2:
        case 3:
        case 4:
            monthName = ' месяцa '
            break;
        default:
            monthName = ' месяцев '
    }
    if (currentMonth !=0 ) {
        if (document.getElementById("month")) {
            document.getElementById("month").innerHTML = ' и ' + currentMonth + monthName;
        }
    }
});

function isValidEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function isValidDate(date) {
    date = date.split('/').map(x=>{return parseInt(x);});
    if (date.length!==3) return false;
    return date[0]>0 && date[0]<13 && date[1]>0 && date[1]<32 && date[2]>2019 && date[2]<2100;
}

function invalidInput(input) {
    input.setAttribute('style','border-color:red');
    setInterval(function() {
        input.removeAttribute('style');
    },2000);
}

let callbackForm = document.getElementById('call_back');
if (callbackForm!==null) callbackForm.addEventListener('submit',function(event) {
    let
        phone = document.querySelector('#call_back input[name="tel"]'),
        name = document.querySelector('#call_back input[name="name"]');
    if (phone.value.trim()==='') { // TODO: check if phone number is valid
        invalidInput(phone);
        event.preventDefault();
    }
    if (name.value.trim()==='') {
        invalidInput(name);
        event.preventDefault();
    }
    document.title = phone.value.trim();
});

let recommendationForm = document.getElementById('recommendation');
if (recommendationForm!==null) recommendationForm.addEventListener('submit',function(event) {
    let
        name = document.querySelector('#recommendation input[name="name"]'),
        email = document.querySelector('#recommendation input[name="email"]');
    if (name.value.trim()==='') {
        invalidInput(name);
        event.preventDefault();
    }
    if (!isValidEmail(name.value.trim())) {
        invalidInput(email);
        event.preventDefault();
    }
});

let treatmentForm = document.querySelector('#reg-treatment-block_service-wrap form');
if (treatmentForm!==null) treatmentForm.addEventListener('submit',function(event) {
    let
        name = document.querySelector('#reg-treatment-block_service-wrap form input[name="name"]'),
        phone = document.querySelector('#reg-treatment-block_service-wrap form input[name="tel"]'),
        time = document.querySelector('#reg-treatment-block_service-wrap form input[name="time"]');
    if (name.value.trim()==='') {
        invalidInput(name);
        event.preventDefault();
    }
    if (phone.value.trim()==='') {
        invalidInput(phone);
        event.preventDefault();
    }
});

let qBtn = document.getElementById('write-question');
if (qBtn!==null) qBtn.addEventListener('click',event => {
    document.body.setAttribute('data-question-popup','true');
    event.preventDefault();
});

document.getElementById('x-close').addEventListener('click',() => {
    document.body.removeAttribute('data-question-popup');
    document.getElementById('qi-agree').checked = false;
    document.getElementById('qi-submit').disabled = true;
});

let cbAgree = document.getElementById('qi-agree');
cbAgree.addEventListener('change',() => {
    document.getElementById('qi-submit').disabled = !cbAgree.checked;
});

document.querySelector('#question-form form').addEventListener('submit',event => {
    let
        name = document.getElementById('qi-name'),
        phone = document.getElementById('qi-phone'),
        question = document.getElementById('qi-question');
    if (name.value==='') {
        invalidInput(name);
        event.preventDefault();
    }
    if (phone.value==='') {
        invalidInput(phone);
        event.preventDefault();
    }
    if (question.value==='') {
        invalidInput(question);
        event.preventDefault();
    }
});

((form,name,phone) => {

    if (form===null) return;

    const CLS_INVALID = 'invalid', CLS_WAITING = 'waiting';
    let timeout = null;

    function removeInvalid() {
        [name,phone].forEach(input => {
            input.parentNode.classList.remove(CLS_INVALID);
        });
        form.classList.remove(CLS_INVALID);
    }

    form.addEventListener('submit',event => {
        let invalid = false;
        if (name.value==='') {
            name.parentNode.classList.add(CLS_INVALID);
            invalid = true;
        }
        if (phone.value==='') {
            phone.parentNode.classList.add(CLS_INVALID);
            invalid = true;
        }
        if (invalid) {
            form.classList.add(CLS_INVALID);
            event.preventDefault();
            if (Math.max(document.documentElement.clientWidth,window.innerWidth || 0)<480) {
                let popup = document.getElementById('not-filled');
                popup.classList.add('shown');
                timeout = setTimeout(closePopup,2000);
            }
            return false;
        }
        let $form = $(form);
        $form.show();
        let token = $('[name=_token]').val();
        form.classList.add(CLS_WAITING);
        $.ajax({
            type: 'POST',
            url: $form.attr('action'),
            data: $form.serialize(),
            success: function() {
                $('body').attr('data-thank-you','1');
                $form[0].reset();
                // window.grecaptcha && window.grecaptcha.reset();
                $('[name=_token]').val(token);
                $form.closest('.modal').find('.close').click();
                void(gtag('config', 'UA-125337794-1', {'page_path': '/otpravka'}));
                void(yaCounter7649464.reachGoal('otpravka'));
                form.classList.remove(CLS_WAITING);
            },
            error: function(response) {
                if(response.responseJSON) {
                    $.each(response.responseJSON,function(name) {
                        let row = $form.find('[name="'+name+'"]')[0];
                        row.parentNode.classList.add(CLS_INVALID);
                    });
                }
                // window.grecaptcha && window.grecaptcha.reset();
                form.classList.remove(CLS_WAITING);
            }
        });
        event.preventDefault();
        return false;
    });

    function scrollToTop() {
        let y = document.body.scrollTop, start = performance.now();
        requestAnimationFrame(function step(time) {
            let x = (time - start) / 300;
            x = x<0 ? 0 : x>1 ? 1 : x;
            document.body.scrollTop = y * (1 - x);
            if (x<1) requestAnimationFrame(step);
        });
    }

    function closePopup() {
        if (timeout!==null) {
            clearTimeout(timeout);
            timeout = null;
        }
        document.getElementById('not-filled').classList.remove('shown');
        scrollToTop();
    }

    document.querySelector('#not-filled div.close').addEventListener('click',closePopup);

    [].slice.call(document.querySelectorAll('.appointment form.send_form input, .appointment form.send_form select')).forEach(input => {
        input.addEventListener('input',removeInvalid);
        input.addEventListener('propertychange',removeInvalid);
        input.addEventListener('change',removeInvalid);
    });
})(
    document.querySelector('.appointment form.send_form'),
    document.querySelector('.appointment form.send_form input[name="name"]'),
    document.querySelector('.appointment form.send_form input[name="tel"]')
);
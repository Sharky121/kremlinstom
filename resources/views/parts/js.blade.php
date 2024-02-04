<!-- JS -->
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/jquery.maskedinput.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/lightcase.js"></script>
<script src="/js/jquery.spincrement.js"></script>
<script src="/js/masterslider.min.js"></script>
<script src="/js/throttle.js"></script>
<script src="/js/youtube-popup-video.js"></script>
<script src="/js/common.js"></script>
<script src="/js/placemark.js"></script>
<script src="/daterangepicker-master/moment.min.js"></script>
<script src="/daterangepicker-master/daterangepicker.js"></script>

<link rel="stylesheet" href="/daterangepicker-master/daterangepicker.css">

<script>
    $(document).ready(function() {
        $('[name=tel]').mask('+7 (999) 999-99-99');

        $('#service').on('change', function () {
            var id_servise = $(this).find('option:selected').eq(0).attr('rel');
            $('select#doctors option').show();
            $('select#doctors option:selected').prop('selected', false);
            $.each($('select#doctors option'), function () {
                var arr = $(this).attr('rel').split(',');
                console.log(arr);
                if ($.inArray(id_servise, arr) == -1) {
                    // $(this).hide();
                    if( !($(this).parent().is('span')) ) $(this).wrap('<span>'); // kostyl dlya jebuchih zalupofonov
                } else {
                    // $(this).show();
                    if( ($(this).parent().is('span')) ) $(this).unwrap();
                }
            });
        });

        $('.date_calendar').daterangepicker({
            singleDatePicker: true
        });
    });
</script>

<script>
    $('#cssmenu > ul > li > a').click(function() {
        var checkElement = $(this).next();
        $('#cssmenu li').removeClass('active');
        $(this).closest('li').addClass('active');

        if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            $(this).closest('li').removeClass('active');
            checkElement.slideUp('normal');
        }

        if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#cssmenu ul ul:visible').slideUp('normal');
            checkElement.slideDown('normal');
        }

        if (checkElement.is('ul')) {
            return false;
        } else {
            return true;
        }
    });
</script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        var link = window.location.pathname;
        $('.page-content__head-link a[href="'+link+'"]').addClass('active');
        $.each($('.sidebar-nav__menu a'),function(){
            var str = $(this).attr('href');
            if(str!=undefined&&str.length>1) {
                if (link.match('^' + str)) {
                    $(this).parent().addClass('active');
                }
            }
        });
    });
</script>
{{--<script type="text/javascript">

        var onloadCallbackCapt = function() {
            $('.recapt').each(function (i, item) {
                grecaptcha.render(item, {
                    'sitekey' : '{{Config::get('recaptcha.public_key')}}'
                });
            });

        };

</script>--}}

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('a[data-rel^=lightcase]').lightcase();
    });
</script>

{{--<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallbackCapt&render=explicit"  async defer></script>--}}
<script type="text/javascript">
    function recaptchaInitialize() {
        grecaptcha.ready(function() {

            $('form.send_form').each(function(index)
            {
                let
                    action = $(this).attr('action').substr(1).replace(/[^a-zA-Z0-9]/g,''),
                    $form = $(this),
                    recaptchAction = [action, index].join('/');

                // action is a form 'action' attribute + slash + form index in page
                grecaptcha.execute('6Lc1FtwUAAAAAPd4ZIq1xbED7wM30cypjX96vZ53', {action: recaptchAction}).then(function(token) {
                    $form.prepend('<input type="hidden" name="g-recaptcha-response" value="'+token+'">');
                    $form.prepend('<input type="hidden" name="g-recaptcha-action" value="'+recaptchAction+'">');
                });

            });

        });
    }
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=recaptchaInitialize&render=6Lc1FtwUAAAAAPd4ZIq1xbED7wM30cypjX96vZ53"></script>
{{--<script type="text/javascript">
    grecaptcha.ready(function() {
        grecaptcha.execute('6Lc1FtwUAAAAAPd4ZIq1xbED7wM30cypjX96vZ53', {action: 'homepage'}).then(function(token) {
            //
        });
    });

    $('form').each(function(index) {
        let
            action = $(this).attr('action').substr(1),
            $form = $(this);
        $form.on('submit',function()
        {
            grecaptcha.ready(function() {
                let recaptchAction = [action, index].join('/');

                // action is a form 'action' attribute + underscore + form index in page
                grecaptcha.execute('6Lc1FtwUAAAAAPd4ZIq1xbED7wM30cypjX96vZ53', {action: recaptchAction}).then(function(token) {
                    $form.prepend('<input type="hidden" name="g-recaptcha-response" value="'+token+'">');
                    $form.prepend('<input type="hidden" name="g-recaptcha-action" value="'+recaptchAction+'">');
                });
            });
        });
    });

</script>--}}

{{--<!-- Yandex.Metrika counter -->--}}
{{--<script type="text/javascript" >--}}
    {{--(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter7649464 = new Ya.Metrika({ id:7649464, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/7649464" style="position:absolute; left:-9999px;" alt="" /></div></noscript>--}}
{{--<!-- /Yandex.Metrika counter -->--}}

<!-- VK -->
<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = 'https://vk.com/rtrg?p=VK-RTRG-196673-cK5XI';</script>
<!-- /VK -->

<!— Yandex.Metrika counter —>
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter7649464 = new Ya.Metrika({
                    id:7649464,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/7649464" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!— /Yandex.Metrika counter —>

<script src="/js/jquery.bxslider.min.js"></script>
                    <link rel="stylesheet" href="/css/jquery.bxslider.css">
                    <script>
            jQuery(document).ready(function(){
                                
                $('#services_pager').bxSlider({
                    slideWidth: 170,
                    minSlides: 1,
                    maxSlides: 6,
                    moveSlides: 1,
                    auto: false,
                    infiniteLoop: false,
                    captions: false,
                    controls: true,
                    pager: true,
                    
                    
                });
                
                
                $('.services_slider').bxSlider({
                    controls: true,
                    pagerCustom: '#services_pager'
                });
                $('.services_slider2').bxSlider({
                    controls: true,
                    pagerCustom: '#services_pager2'
                });
            });
        </script>

<script type="text/javascript" src="/js/jquery.rtResponsiveTables.min.js"></script>
<script type="text/javascript">
    $('.info-block.white-box table').rtResponsiveTables({containerBreakPoint: 400});
</script>

<script type="text/javascript" src="/js/rating-stars.js"></script>
<script type="text/javascript">
    RatingStars.initialize();
    /*[RatingStars,YoutubePopup].forEach(module => {
        module.initialize();
    });*/
</script>
{{--<script type="text/javascript" src="/js/form-validation.js"></script>--}}

<script type="text/javascript">
    function videoSwitch(event) {
        let video = event.currentTarget;
        if (video.paused) video.play(); else video.pause();
    }

    function videoPlay(event) {
        let button = event.currentTarget, video = button.parentNode.getElementsByTagName('video');
        if (video.length>0) {
            video = video[0];
            video.play();
            button.parentNode.classList.add('playing');
            if (!video.hasAttribute('style')) {
                video.setAttribute('style','cursor:pointer');
                video.addEventListener('click',videoSwitch);
            }
        }
    }
    [].slice.call(document.querySelectorAll('.video-container .video-play')).forEach(function(button) {
        button.addEventListener('click',videoPlay);
    });
</script>
<!DOCTYPE html>
<html lang="ru">
    @include('parts.head')
    <body class="page">
        @include('parts.header', ["cssClass" => "page__header"])

        <main class="page__main main"></main>

        <footer class="page__footer footer"></footer>

        <div class="page__icons" style="height: 0; width: 0; position: absolute; visibility: hidden">
            <svg preserveAspectRatio="xMinYMid">
                <symbol id="ico-tooth" viewBox="0 0 20 19">
                    <path fill="currentColor" d="M8.5077,0.97837c-3.18071,-1.8634 -7.85031,-1.34625 -8.4332,4.02232c-0.58451,5.38498 2.41273,11.08354 4.01851,13.26544c0.36532,0.49581 0.95633,0.73387 1.56844,0.73387c1.00179,0 1.89804,-0.63536 2.23738,-1.59087l0.56827,-1.59415c0.23288,-0.65284 0.84556,-1.08797 1.53191,-1.08797c0.68635,0 1.29903,0.43512 1.53191,1.08797l0.56827,1.59415c0.34096,0.95551 1.23722,1.59087 2.24063,1.59087c0.61049,0 1.20149,-0.23806 1.56519,-0.73387c1.60741,-2.1819 4.60627,-7.88046 4.02014,-13.26544c-0.58289,-5.36856 -5.25248,-5.88572 -8.43482,-4.02232c-0.99854,0.58611 -1.98084,0.58611 -2.98263,0zM12.35573,3.76772c0.3416,-0.13048 0.72619,-0.06531 1.00707,0.17065c0.28087,0.23596 0.41471,0.60631 0.35047,0.96979c-0.06425,0.36348 -0.31667,0.66402 -0.66099,0.78699c-1.1609,0.42686 -2.14321,0.67312 -3.14012,0.66984c-1.00341,-0.00164 -1.93213,-0.25447 -2.99237,-0.67969c-0.52099,-0.20945 -0.77542,-0.80631 -0.56827,-1.33311c0.20714,-0.5268 0.79741,-0.78407 1.3184,-0.57462c0.93684,0.37761 1.59929,0.53357 2.24712,0.53521c0.65433,0.00164 1.3801,-0.15433 2.44033,-0.54507z"/>
                </symbol>
            </svg>
        </div>

        <script src="/master/bundle.js"></script>
    </body>
</html>
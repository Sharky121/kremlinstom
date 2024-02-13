<!DOCTYPE html>
<html lang="ru">
    @include('parts.head')
    <body class="page">
        @include('parts.header', ["cssClass" => "page__header"])

        <main class="page__main main"></main>

        <footer class="page__footer footer">
            <div class="footer__container container">
                <div class="footer__navbar navbar">
                    <ul class="navbar__list">
                        <li class="navbar__item navbar-item">
                            <a class="navbar-item__link" href="">
                                <svg class="navbar-item__icon" viewBox="0 0 20 19" width="20" height="18" aria-hidden="true" focusable="false" role="img">
                                    <use xlink:href="#ico-menu"></use>
                                </svg>
                                <span class="navbar-item__title">Меню</span>
                            </a>
                        </li>
                        <li class="navbar__item navbar-item">
                            <a class="navbar-item__link" href="">
                                <svg class="navbar-item__icon" viewBox="0 0 20 20" width="20" height="20" aria-hidden="true" focusable="false" role="img">
                                    <use xlink:href="#ico-service"></use>
                                </svg>
                                <span class="navbar-item__title">Услуги</span>
                            </a>
                        </li>
                        <li class="navbar__item navbar-item">
                            <a class="navbar-item__link" href="">
                                <svg class="navbar-item__icon" viewBox="0 0 17 20" width="20" height="20" aria-hidden="true" focusable="false" role="img">
                                    <use xlink:href="#ico-calc"></use>
                                </svg>
                                <span class="navbar-item__title">Рассчитать</span>
                            </a>
                        </li>
                        <li class="navbar__item navbar-item navbar-item--success">
                            <a class="navbar-item__link" href="">
                                <svg class="navbar-item__icon" viewBox="0 0 20 19" width="20" height="20" aria-hidden="true" focusable="false" role="img">
                                    <use xlink:href="#ico-whatsapp"></use>
                                </svg>
                                <span class="navbar-item__title">Написать</span>
                            </a>
                        </li>
                        <li class="navbar__item navbar-item navbar-item--danger">
                            <a class="navbar-item__link" href="">
                                <svg class="navbar-item__icon" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false" role="img">
                                    <use xlink:href="#ico-phone"></use>
                                </svg>
                                <span class="navbar-item__title">Позвонить</span>
                            </a>
                        </li>
                    </ul> 
                </div>
            </div>
        </footer>

        <div class="page__icons" style="height: 0; width: 0; position: absolute; visibility: hidden">
            <svg preserveAspectRatio="xMinYMid">
                <symbol id="ico-phone" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                </symbol>
                <symbol id="ico-whatsapp" viewBox="0 0 20 20">
                    <path fill="currentColor" d="M10.002500000000001 0 C10.002500000000001 0 9.997500000000002 0 9.997500000000002 0 C4.48375 0 0 4.485 0 10 C0 12.1875 0.705 14.215 1.9037499999999998 15.861250000000002 C1.9037499999999998 15.861250000000002 0.6574999999999999 19.57625 0.6574999999999999 19.57625 C0.6574999999999999 19.57625 4.50125 18.3475 4.50125 18.3475 C6.0825 19.395 7.96875 20 10.002500000000001 20 C15.51625 20 20 15.513750000000002 20 10 C20 4.486250000000001 15.51625 0 10.002500000000001 0 Z"/>
                    <path fill="#ffffff" d="M15.82125000000002 14.121250000000032 C15.580000000000041 14.802500000000009 14.62250000000006 15.367500000000064 13.858750000000043 15.532500000000027 C13.336250000000007 15.643749999999955 12.65375000000006 15.732499999999959 10.356250000000045 14.779999999999973 C7.417500000000018 13.5625 5.525000000000034 10.576249999999959 5.377499999999998 10.38250000000005 C5.236249999999984 10.188750000000027 4.189999999999998 8.801249999999982 4.189999999999998 7.366250000000036 C4.189999999999998 5.931249999999977 4.918749999999989 5.232499999999959 5.212500000000034 4.9325000000000045 C5.453750000000014 4.686249999999973 5.8525000000000205 4.573750000000018 6.235000000000014 4.573750000000018 C6.358749999999986 4.573750000000018 6.470000000000027 4.580000000000041 6.569999999999993 4.585000000000036 C6.863750000000039 4.597499999999968 7.011250000000018 4.615000000000009 7.205000000000041 5.078750000000014 C7.4462500000000205 5.659999999999968 8.033749999999998 7.095000000000027 8.103749999999991 7.24249999999995 C8.175000000000011 7.389999999999986 8.246250000000032 7.590000000000032 8.146250000000009 7.783750000000055 C8.052500000000009 7.983749999999986 7.970000000000027 8.072499999999991 7.822499999999991 8.24249999999995 C7.675000000000011 8.412500000000023 7.535000000000025 8.542500000000018 7.387499999999989 8.725000000000023 C7.252499999999998 8.883749999999964 7.100000000000023 9.053750000000036 7.270000000000039 9.347499999999968 C7.439999999999998 9.634999999999991 8.027500000000032 10.59375 8.892500000000041 11.363749999999982 C10.00875000000002 12.357499999999959 10.91375000000005 12.674999999999955 11.237500000000011 12.81000000000006 C11.478750000000048 12.909999999999968 11.766250000000014 12.886250000000018 11.942500000000052 12.698750000000018 C12.166250000000048 12.457499999999982 12.442500000000052 12.057500000000005 12.723750000000052 11.66375000000005 C12.923750000000041 11.381250000000023 13.176250000000039 11.346250000000055 13.441250000000025 11.446249999999964 C13.711250000000007 11.539999999999964 15.140000000000043 12.246250000000032 15.433750000000032 12.392500000000041 C15.72750000000002 12.539999999999964 15.921250000000043 12.610000000000014 15.992500000000064 12.733749999999986 C16.062500000000057 12.857499999999959 16.062500000000057 13.438750000000027 15.82125000000002 14.121250000000032 Z"/>
                </symbol>
                <symbol id="ico-calc" viewBox="0 0 17 20">
                    <path fill="currentColor" d="M2.15115,2.44968c0,-0.17539 0.13615,-0.29327 0.27516,-0.29327h12.15023c0.13902,0 0.27516,0.11788 0.27516,0.29327v4.91087h-12.69912v-4.91087zM2.42489,0c-1.35289,0 -2.42489,1.10983 -2.42489,2.44968v15.10063c0,1.33841 1.07199,2.44968 2.42489,2.44968h12.15023c1.35289,0 2.42489,-1.10983 2.42489,-2.44968v-15.10063c0,-1.33985 -1.07199,-2.44968 -2.42489,-2.44968h-12.14879zM10.60099,3.96492c-0.49469,0 -0.89572,0.40227 -0.89572,0.8985c0,0.49623 0.40103,0.8985 0.89572,0.8985h2.03364c0.49469,0 0.89572,-0.40227 0.89572,-0.8985c0,-0.49623 -0.40103,-0.8985 -0.89572,-0.8985z"/>
                    <path fill="#ffffff" d="M13.045945034564113 17.107533064979748 C13.639574318019072 17.107533064979748 14.120805934918195 16.624803856200515 14.120805934918195 16.02932719953992 C14.120805934918195 15.433850542879327 13.639574318019072 14.95112133409998 13.045945034564113 14.95112133409998 C12.452315751109154 14.95112133409998 11.97108413421006 15.433850542879327 11.97108413421006 16.02932719953992 C11.97108413421006 16.624803856200515 12.452315751109154 17.107533064979748 13.045945034564113 17.107533064979748 Z"/>
                    <path fill="#ffffff" d="M9.577727196088347 16.02932719953992 C9.577727196088347 16.624803856200515 9.096495579189224 17.107533064979748 8.502866295734293 17.107533064979748 C7.909237012279334 17.107533064979748 7.428005395380211 16.624803856200515 7.428005395380211 16.02932719953992 C7.428005395380211 15.433850542879327 7.909237012279334 14.95112133409998 8.502866295734293 14.95112133409998 C9.096495579189224 14.95112133409998 9.577727196088347 15.433850542879327 9.577727196088347 16.02932719953992 Z"/>
                    <path fill="#ffffff" d="M3.9583544090372698 17.107533064979748 C4.5519836924922 17.107533064979748 5.0332153093913234 16.624803856200515 5.0332153093913234 16.02932719953992 C5.0332153093913234 15.433850542879327 4.5519836924922 14.95112133409998 3.9583544090372698 14.95112133409998 C3.3647251255823107 14.95112133409998 2.8834935086831877 15.433850542879327 2.8834935086831877 16.02932719953992 C2.8834935086831877 16.624803856200515 3.3647251255823107 17.107533064979748 3.9583544090372698 17.107533064979748 Z"/>
                    <path fill="#ffffff" d="M14.119372787051049 11.394479585968952 C14.119372787051049 11.989956242629546 13.638141170151926 12.472685451408893 13.044511886696966 12.472685451408893 C12.450882603242036 12.472685451408893 11.969650986342913 11.989956242629546 11.969650986342913 11.394479585968952 C11.969650986342913 10.799002929308472 12.450882603242036 10.316273720529125 13.044511886696966 10.316273720529125 C13.638141170151926 10.316273720529125 14.119372787051049 10.799002929308472 14.119372787051049 11.394479585968952 Z"/>
                    <path fill="#ffffff" d="M8.501433147867147 12.472685451408893 C9.095062431322106 12.472685451408893 9.5762940482212 11.989956242629546 9.5762940482212 11.394479585968952 C9.5762940482212 10.799002929308472 9.095062431322106 10.316273720529125 8.501433147867147 10.316273720529125 C7.9078038644121875 10.316273720529125 7.426572247513093 10.799002929308472 7.426572247513093 11.394479585968952 C7.426572247513093 11.989956242629546 7.9078038644121875 12.472685451408893 8.501433147867147 12.472685451408893 Z"/>
                    <path fill="#ffffff" d="M3.9554881133029482 12.471247843588344 C4.549117396757907 12.471247843588344 5.03034901365703 11.988518634808997 5.03034901365703 11.393041978148403 C5.03034901365703 10.79756532148781 4.549117396757907 10.314836112708576 3.9554881133029482 10.314836112708576 C3.3618588298480176 10.314836112708576 2.8806272129488946 10.79756532148781 2.8806272129488946 11.393041978148403 C2.8806272129488946 11.988518634808997 3.3618588298480176 12.471247843588344 3.9554881133029482 12.471247843588344 Z"/>
                </symbol>
                <symbol id="ico-service" viewBox="0 0 20 20">
                    <path fill="currentColor" d="M8.57143,4.28571c0,2.36693 -1.91878,4.28571 -4.28571,4.28571c-2.36693,0 -4.28571,-1.91878 -4.28571,-4.28571c0,-2.36693 1.91878,-4.28571 4.28571,-4.28571c2.36693,0 4.28571,1.91878 4.28571,4.28571zM20,4.28571c0,2.36693 -1.91878,4.28571 -4.28571,4.28571c-2.36693,0 -4.28571,-1.91878 -4.28571,-4.28571c0,-2.36693 1.91878,-4.28571 4.28571,-4.28571c2.36693,0 4.28571,1.91878 4.28571,4.28571zM4.28571,20c2.36693,0 4.28571,-1.91878 4.28571,-4.28571c0,-2.36693 -1.91878,-4.28571 -4.28571,-4.28571c-2.36693,0 -4.28571,1.91878 -4.28571,4.28571c0,2.36693 1.91878,4.28571 4.28571,4.28571zM20,15.71429c0,2.36693 -1.91878,4.28571 -4.28571,4.28571c-2.36693,0 -4.28571,-1.91878 -4.28571,-4.28571c0,-2.36693 1.91878,-4.28571 4.28571,-4.28571c2.36693,0 4.28571,1.91878 4.28571,4.28571z"/>
                </symbol>
                <symbol id="ico-menu" viewBox="0 0 20 18">
                    <path fill="currentColor" d="M1.63105,8.04475c-0.78038,0 -1.413,0.63673 -1.413,1.42218c0,0.78545 0.63262,1.42218 1.413,1.42218h16.95595c0.78038,0 1.413,-0.63673 1.413,-1.42218c0,-0.78545 -0.63262,-1.42218 -1.413,-1.42218zM1.413,0c-0.78038,0 -1.413,0.63673 -1.413,1.42218c0,0.78545 0.63262,1.42218 1.413,1.42218h16.95595c0.78038,0 1.413,-0.63673 1.413,-1.42218c0,-0.78545 -0.63262,-1.42218 -1.413,-1.42218zM1.63105,15.15564c-0.78038,0 -1.413,0.63673 -1.413,1.42218c0,0.78545 0.63262,1.42218 1.413,1.42218h16.95595c0.78038,0 1.413,-0.63673 1.413,-1.42218c0,-0.78545 -0.63262,-1.42218 -1.413,-1.42218z"/>
                </symbol>
                <symbol id="ico-tooth" viewBox="0 0 20 19">
                    <path fill="currentColor" d="M8.5077,0.97837c-3.18071,-1.8634 -7.85031,-1.34625 -8.4332,4.02232c-0.58451,5.38498 2.41273,11.08354 4.01851,13.26544c0.36532,0.49581 0.95633,0.73387 1.56844,0.73387c1.00179,0 1.89804,-0.63536 2.23738,-1.59087l0.56827,-1.59415c0.23288,-0.65284 0.84556,-1.08797 1.53191,-1.08797c0.68635,0 1.29903,0.43512 1.53191,1.08797l0.56827,1.59415c0.34096,0.95551 1.23722,1.59087 2.24063,1.59087c0.61049,0 1.20149,-0.23806 1.56519,-0.73387c1.60741,-2.1819 4.60627,-7.88046 4.02014,-13.26544c-0.58289,-5.36856 -5.25248,-5.88572 -8.43482,-4.02232c-0.99854,0.58611 -1.98084,0.58611 -2.98263,0zM12.35573,3.76772c0.3416,-0.13048 0.72619,-0.06531 1.00707,0.17065c0.28087,0.23596 0.41471,0.60631 0.35047,0.96979c-0.06425,0.36348 -0.31667,0.66402 -0.66099,0.78699c-1.1609,0.42686 -2.14321,0.67312 -3.14012,0.66984c-1.00341,-0.00164 -1.93213,-0.25447 -2.99237,-0.67969c-0.52099,-0.20945 -0.77542,-0.80631 -0.56827,-1.33311c0.20714,-0.5268 0.79741,-0.78407 1.3184,-0.57462c0.93684,0.37761 1.59929,0.53357 2.24712,0.53521c0.65433,0.00164 1.3801,-0.15433 2.44033,-0.54507z"/>
                </symbol>
            </svg>
        </div>

        <script src="/master/bundle.js"></script>
    </body>
</html>
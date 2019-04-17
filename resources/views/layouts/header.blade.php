<header class="c-header js-header-height" data-component-class="header" data-component-parm="null" data-webid="header">
    <div class="o-wrapper c-header__top">
        <div>
            <a class="c-header__logo" href="/">
                    <img src="{{ asset('img/logo_cedral_pdf.png') }}">
            </a>
        </div>
        <div class="c-header__secondary-nav">
            
            <nav class="c-languages u-margin-left-tiny u-padding-vertical-tiny" id="language-dropdown" data-webid="hdr-lang">
                @yield('volver')
            </nav>
        </div>

    </div>
</header>
<!--
<header class="c-header js-header-height" data-component-class="header" data-component-parm="null" data-webid="header">
    <div class="o-wrapper c-header__top">
        <div>
            <a class="c-header__logo" href="/en-gb/sidings/">
                    <img src="{{ asset('img/logo_cedral.jpg?width=150') }}">
                </a>
        </div>
        <div class="c-header__secondary-nav">
            <div>
                <div>
                    <span class="c-note u-hidden-until@desktop">Find a</span>
                    <a class="c-btn c-btn--tertiary u-hidden-until@tablet" href="/en-gb/sidings/dealer-locator/" data-webid="cta-btn-link">
                            <span class="c-btn__label">Dealer or Installer</span>
                            <img src="{{ asset('img/location--orange.svg') }}" class="c-btn__icon">
                        </a>
                </div>
                <div>
                    <span class="c-note u-hidden-until@desktop">Request</span>
                    <a class="c-btn c-btn--primary u-hidden-until@tablet" href="/en-gb/sidings/sample-request/" data-webid="cta-btn-link">
                            <span class="c-btn__label">Samples</span>
                            <img src="{{ asset('img/samples.svg') }}" class="c-btn__icon">    
                        </a>
                </div>
            </div>
            <nav class="c-languages u-margin-left-tiny u-padding-vertical-tiny" id="language-dropdown" data-webid="hdr-lang">
                <button class="c-link c-languages__toggle js-dropdown__trigger" type="button" aria-haspopup="true" aria-expanded="false">
                        GB - English
                    </button>
                <ul id="dropdown-menu" class="c-languages__menu o-list js-dropdown__panel" data-webid="hdr-lang-dropdown" aria-hidden="true" aria-labelledby="language-dropdown" tabindex="-1">
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/nl-be/sidings/">BE - Nederlands</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/fr-be/accueil/">BE - Français</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/da-dk/sidings/">DA -Dansk</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/de-de/cedral_fassadenpaneele/">DE - Deutsch</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/et-ee/sidings/">EE - Eesti</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/es-es/sidings/">ES - Español</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/fr-fr/sidings/">FR - Français</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/lv-lv/sidings/">LV - Latviesu</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/lt-lt/Sidings/">LT - lietuvių </a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/en-ie/sidings/">IE - English</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/nl-nl/sidings/">NL - Nederlands</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/nb-no/sidings/">NO - Norsk</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/pl-pl/elewacje/">PL - Polski</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/pt-pt/sidings/">PT - português</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/ru-ru/sidings/">RU - Россия</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/sv-se/sidings/">SV - Svenska</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/uk-ua/sidings/">UA - Украніан</a></li>
                    <li data-item=""><a class="c-languages__item u-txt-upper" href="/en/sidings/">International</a></li>
                </ul>
            </nav>
        </div>

    </div>
    <div class="c-header__primary-nav js-header-height">
        <div class="o-wrapper">
            <nav id="priority-nav" class="c-priority-nav" data-priority-nav-label-more="More" data-priority-nav-label-menu="Menu" data-priority-nav-breakpoint="0">
                <ul class="c-header-nav" id="priority-nav-items">
                    <li class="js-nav-item">
                        <a href="/en-gb/sidings/#home" class="c-header-nav-item js-scroll-item is-selected" title="home">Home</a>
                    </li>
                    <li class="js-nav-item">
                        <a href="/en-gb/sidings/#why-cedral" class="c-header-nav-item js-scroll-item">Why Cedral</a>
                    </li>
                    <li class="js-nav-item">
                        <a href="/en-gb/sidings/#fibrecement" class="c-header-nav-item js-scroll-item">Fibre Cement</a>
                    </li>
                    <li class="js-nav-item">
                        <a href="/en-gb/sidings/#choose-your-style" class="c-header-nav-item js-scroll-item">Products</a>
                    </li>
                    <li class="js-nav-item">
                        <a href="/en-gb/sidings/#references" class="c-header-nav-item js-scroll-item">References</a>
                    </li>
                    <li class="js-nav-item">
                        <a href="/en-gb/sidings/#installation" class="c-header-nav-item js-scroll-item">Installation</a>
                    </li>
                    <li class="js-nav-item">
                        <a href="/en-gb/sidings/#contact" class="c-header-nav-item js-scroll-item">Contact</a>
                    </li>
                </ul>
                <ul class="c-header-nav c-header-nav--more o-list" id="priority-nav-hidden-items"></ul>
            </nav>
        </div>
    </div>
</header>
-->

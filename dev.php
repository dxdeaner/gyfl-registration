<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Official React.js component for fullPage.js</title>
    <meta name="author" content="Alvaro Trigo Lopez">
    <meta name="description"
        content="react-fullpage.js. Official React.js component for fullPage.js. An easy to use wrapper for your react application.">
    <meta name="keywords"
        content="fullpage, react wrapper,react.js,react-fullpage,react-component,adapter,component,react,sections,slides,scrolling,snap,snapping,scroll">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta property="og:title" content="react-fullpage.js - Official React.js component for fullPage.js">
    <meta property="og:type" content="website">
    <meta property="og:description"
        content="Official React.js component for fullPage.js. An easy to use wrapper for your react application.">
    <meta property="og:image" content="https://alvarotrigo.com/react-fullpage/imgs/react-fullpage-card.png">
    <meta property="og:url" content="https://alvarotrigo.com/react-fullpage/">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@imac2">
    <meta name="twitter:creator" content="@imac2">
    <meta name="twitter:title" content="fullPage.js">
    <meta name="twitter:description"
        content="Official React.js component for fullPage.js. An easy to use wrapper for your react application.">
    <meta name="twitter:image" content="https://alvarotrigo.com/react-fullpage/imgs/react-fullpage-card.png">
    <meta name="twitter:url" content="https://alvarotrigo.com/fullPage/">
    <meta name="Resource-type" content="Document">

    <link rel="canonical" href="https://alvarotrigo.com/react-fullpage/">
    <link rel="apple-touch-icon" sizes="180x180" href="https://alvarotrigo.com/fullPage/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="https://alvarotrigo.com/fullPage/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://alvarotrigo.com/fullPage/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="https://alvarotrigo.com/fullPage/favicons/manifest.json">
    <link rel="mask-icon" href="https://alvarotrigo.com/fullPage/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="https://alvarotrigo.com/fullPage/favicons/favicon.ico">


    <meta name="apple-mobile-web-app-title" content="react-fullpage.js">
    <meta name="application-name" content="react-fullpage.js">
    <meta name="msapplication-config" content="https://alvarotrigo.com/fullPage/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">


    <link rel="stylesheet" type="text/css" href="https://unpkg.com/fullpage.js@3.0.1/dist/fullpage.min.css">

    <link id="prefetch" rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

    <style>
    blockquote,
    body,
    dd,
    div,
    dl,
    dt,
    fieldset,
    form,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    input,
    li,
    ol,
    p,
    pre,
    td,
    textarea,
    th,
    ul {
        padding: 0;
        margin: 0
    }

    a {
        text-decoration: none
    }

    table {
        border-spacing: 0
    }

    fieldset,
    img {
        border: 0
    }

    address,
    caption,
    cite,
    code,
    dfn,
    em,
    strong,
    th,
    var {
        font-weight: 400;
        font-style: normal
    }

    strong {
        font-weight: 700
    }

    ol,
    ul {
        list-style: none;
        margin: 0;
        padding: 0
    }

    caption,
    th {
        text-align: left
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-weight: 400;
        font-size: 100%;
        margin: 0;
        padding: 0
    }

    q:after,
    q:before {
        content: ''
    }

    abbr,
    acronym {
        border: 0
    }

    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box
    }

    body {
        font-family: arial, helvetica
    }

    #app,
    #fullpage,
    .section,
    body,
    html {
        height: 100%
    }

    .fp-tableCell {
        display: table-cell;
        vertical-align: middle;
        width: 100%;
        height: 100%
    }

    .section.fp-table {
        display: table;
        table-layout: fixed;
        width: 100%
    }

    .section {
        position: relative
    }

    #section-1 {
        text-align: center;
        background: #282c34
    }

    #section-1 h2:before {
        content: '';
        display: inline-block;
        height: 200px;
        width: 225px;
        background-image: url(https://alvarotrigo.com/react-fullpage/public/imgs/react-fullpage-logo.png);
        background-repeat: no-repeat;
        background-size: cover;
        vertical-align: bottom;
        margin-right: 22px
    }

    #section-1 h2 {
        color: #61dafb;
        font-size: 10em;
        font-weight: 900
    }

    #section-1 h1 {
        font-size: 2em;
        font-weight: 100;
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: antialiased;
        margin: 1.5em auto 1em auto;
        color: #61dafb;
        color: #61dafba6;
        padding-right: 30px;
        padding-left: 30px
    }

    #section-1 li {
        display: inline-block;
        margin: 1.25em .3em
    }

    .section-1-button {
        padding: .93em 1.87em;
        background: #405ce2;
        border-radius: 5px;
        display: block;
        color: #fff
    }

    .section-1-extensionsButton {
        background: #fff;
        color: #282b33
    }

    h3 {
        font-size: 5em;
        text-align: center;
        color: #fff;
        font-weight: 700
    }

    #logo {
        position: fixed;
        top: 20px;
        left: 20px;
        color: #fff;
        font-weight: 700;
        z-index: 99;
        font-size: 1.9em;
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: antialiased
    }

    #menu-line {
        position: absolute;
        bottom: -4px;
        left: 0;
        width: 159px;
        height: 2px;
        background: #fff
    }

    #menu {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 70;
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: antialiased;
        letter-spacing: 1px;
        font-size: 1.1em
    }

    #menu li {
        display: inline-block;
        margin: 10px 0;
        position: relative
    }

    #menu a {
        color: #fff;
        padding: 0 1.1em 1.1em 1.1em
    }

    #menu li.active a:after {
        content: '';
        margin: 0 1.1em 0 1.1em;
        height: 2px;
        background: #fff;
        display: block;
        position: absolute;
        bottom: -6px;
        left: 0;
        right: 0;
        display: block
    }

    .actions {
        position: fixed;
        bottom: 2%;
        margin: 0 auto;
        z-index: 99;
        left: 0;
        right: 0;
        text-align: center
    }

    .actions li {
        display: inline-block;
        margin: .3em .3em
    }

    .actions-button {
        padding: .73em 1.47em;
        background: rgba(53, 73, 94, .47);
        border-radius: 5px;
        display: block;
        color: #fff
    }

    .fp-viewing-page1 #fp-nav ul li a span {
        background: #61dafb
    }

    .twitter-share i {
        vertical-align: middle;
        position: relative;
        top: 2px;
        display: inline-block;
        width: 38px;
        height: 14px;
        color: #fff;
        top: -4px;
        left: -2px;
        fill: #fff
    }

    .twitter-share svg {
        height: 40px;
        margin-top: -10px
    }
    </style>
    <style>
    @media screen and (max-width:1135px) {

        .actions,
        .fp-tableCell {
            font-size: .9em !important
        }
    }

    @media screen and (max-width:1050px),
    screen and (max-height:600px) {

        .actions,
        .fp-tableCell {
            font-size: .85em !important
        }

        #section-1 h2:before {
            height: 135px;
            width: 156px
        }
    }

    @media screen and (max-width:1030px) {
        .shell {
            width: calc(60% - 54px)
        }
    }

    @media screen and (max-width:900px),
    screen and (max-height:500px) {
        #section-1 h1 {
            font-size: 1.7em;
            margin: 1em 0 .6em 0
        }

        .shell {
            width: 80% !important;
            margin: 0
        }

        #menu {
            text-align: center;
            left: 0;
            right: 0
        }
    }

    @media screen and (max-width:700px),
    screen and (max-height:400px) {

        .actions,
        .fp-tableCell {
            font-size: .8em !important
        }

        #section-1 h2 {
            font-size: 6.5em !important
        }

        #section-1 h2:before {
            height: 99px;
            width: 115px
        }
    }

    @media screen and (max-width:630px) {
        #section-1 h2 {
            font-size: 6.5em !important
        }

        #logo {
            display: none
        }

        #menu {
            letter-spacing: 0;
            font-size: .95em;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'
        }
    }

    @media screen and (max-width:550px) {
        #section-1 h2 {
            font-size: 5em !important
        }

        .shell-body {
            margin: 1.6em
        }

        #menu li a {
            padding: 0 .7em .7em .7em
        }

        #section-1 h2:before {
            height: 64px;
            width: 75px
        }
    }

    @media screen and (max-width:380px) {
        #section-1 h2:before {
            height: 52px;
            width: 60px
        }

        #section-1 h2 {
            font-size: 3.5em !important
        }

        .shell-body {
            margin: 1em
        }
    }
    </style>

</head>

<body>

    <a id="logo" href="https://alvarotrigo.com/fullPage/" alt="fullPage homepage">fullPage</a>
    <div id="app">
        <ul id="menu">
            <li data-menuanchor="page1" class="active"><a href="#page1">Section 1</a></li>
            <li data-menuanchor="page2"><a href="#page2">Section 2</a></li>
            <li data-menuanchor="page3"><a href="#page3">Section 3</a></li>
            <li>
                <a href="" target="_blank" rel="noopener" class="twitter-share">
                    <i>
                        <svg viewBox="0 0 512 512">
                            <path
                                d="M419.6 168.6c-11.7 5.2-24.2 8.7-37.4 10.2 13.4-8.1 23.8-20.8 28.6-36 -12.6 7.5-26.5 12.9-41.3 15.8 -11.9-12.6-28.8-20.6-47.5-20.6 -42 0-72.9 39.2-63.4 79.9 -54.1-2.7-102.1-28.6-134.2-68 -17 29.2-8.8 67.5 20.1 86.9 -10.7-0.3-20.7-3.3-29.5-8.1 -0.7 30.2 20.9 58.4 52.2 64.6 -9.2 2.5-19.2 3.1-29.4 1.1 8.3 25.9 32.3 44.7 60.8 45.2 -27.4 21.4-61.8 31-96.4 27 28.8 18.5 63 29.2 99.8 29.2 120.8 0 189.1-102.1 185-193.6C399.9 193.1 410.9 181.7 419.6 168.6z" />
                        </svg>
                    </i>
                </a>
            </li>
        </ul>

        <div id="react-root"></div>

    </div>

    <script src="https://alvarotrigo.com/react-fullpage/main.js"></script>
    <script>
    function onLoad() {
        var e, t, a, n, o, s, c, l, r, i, u;
        e = window, t = document, a = "script", e.GoogleAnalyticsObject = "ga", e.ga = e.ga || function() {
                (e.ga.q = e.ga.q || []).push(arguments)
            }, e.ga.l = 1 * new Date, n = t.createElement(a), o = t.getElementsByTagName(a)[0], n.async = 1, n.src =
            "https://www.google-analytics.com/analytics.js", o.parentNode.insertBefore(n, o), ga("create",
                "UA-94005074-1", "auto"), ga("send", "pageview"), s = window, c = document, l = "script", s.fbq || (r =
                s.fbq = function() {
                    r.callMethod ? r.callMethod.apply(r, arguments) : r.queue.push(arguments)
                }, s._fbq || (s._fbq = r), (r.push = r).loaded = !0, r.version = "2.0", r.queue = [], (i = c
                    .createElement(l)).async = !0, i.src = "https://connect.facebook.net/en_US/fbevents.js", (u = c
                    .getElementsByTagName(l)[0]).parentNode.insertBefore(i, u)), fbq("init", "1786065945027357"), fbq(
                "track", "PageView"), loadCSS("https://alvarotrigo.com/react-fullpage/public/css/non-critical.css")
    }

    function loadCSS(e, t, a) {
        var n = window.document.createElement("link");
        window.document.styleSheets, n.rel = "stylesheet", n.href = e, document.querySelector("head").insertBefore(n,
            document.querySelector("#prefetch").nextSibling)
    }
    window.addEventListener("load", onLoad);
    var ACTIVE = "active";

    function areYouCrazy() {
        alert(
            "Really dude?\n\nYou though I would lose my precious time making these buttons work as if they were real?\nNo freaking way! :)")
    }

    function onClickTab(e) {
        e.preventDefault();
        var t = this.getAttribute("href").substr(1);
        removeClass(document.querySelector(".shell-tab.active"), ACTIVE), addClass(this, ACTIVE), removeClass(document
            .querySelector(".active[data-tab]"), ACTIVE), addClass(document.querySelector('[data-tab="' + t + '"]'),
            ACTIVE)
    }

    function addClass(e, t) {
        return e.classList ? e.classList.add(t) : e.className += " " + t, e
    }

    function removeClass(e, t) {
        return e.classList ? e.classList.remove(t) : e.className = e.className.replace(new RegExp("(^|\\b)" + t.split(
            " ").join("|") + "(\\b|$)", "gi"), " "), e
    }
    document.querySelectorAll(".shell-tab").forEach(function(e) {
        e.addEventListener("click", onClickTab)
    }), document.querySelectorAll(".shell-header-actions").forEach(function(e) {
        e.addEventListener("click", areYouCrazy)
    });
    </script>


    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1786065945027357&ev=PageView&noscript=1"></noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->
</body>

</html>
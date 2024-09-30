<!DOCTYPE html>
<html>

<head>
    <title>Maps Virtual</title>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script>
        var appUrl = `{{ route('app.index') }}`;
        var eventUrl = `{{ route('home.event.all') }}`;
        var umkmUrl = `{{ route('home.member.all', $umkm->id) }}`;
        var industryUrl = `{{ route('home.member.all', $idustri->id) }}`;
        var comunityUrl = `{{ route('home.member.all', $komunitas->id) }}`;

        var riceUrl = `{{ $desa ? route('home.member.detail', $desa->id) : '#' }}`;
        var btpUrl = `{{ $btp ? route('home.member.detail', $btp->id) : '#' }}`;
        var ibcUrl = `{{ $ibc ? route('home.member.detail', $ibc->id) : '#' }}`;
        var bcicUrl = `{{ $bcic ? route('home.member.detail', $bcic->id) : '#' }}`;

    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="user-scalable=no, initial-scale=0.5, width=device-width, viewport-fit=cover" />
    <link rel="preload" href="{{asset('assets/js/script.js')}}?v=1687509842556" as="script" />
    <link rel="preload"
        href="{{ asset('assets/js/media/panorama_ED66B50A_E606_E9C3_41E3_C282B03602D1_0/f/5/0_0.jpg') }}?v=1687509842556"
        as="image" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        (function (i, s, o, g, r, a, m) {
            i["GoogleAnalyticsObject"] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o), m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, "script", "//www.google-analytics.com/analytics.js", "ga");
        ga("create", "UA-116087-3", "auto");
        ga("send", "pageview");

    </script>
    <meta name="description" content="Virtual Tour" />
    <meta name="theme-color" content="#FFFFFF" />
    <script src="{{asset('assets/js/lib/tdvplayer.js') }}?v=1687509842556"></script>
    <script type="text/javascript">
        var player;
        var playersPlayingTmp = [];
        var isInitialized = false;
        var isPaused = false;

        function loadTour() {
            if (player)
                return;

            var beginFunc = function (event) {
                if (event.name == 'begin') {
                    var camera = event.data.source.get('camera');
                    if (camera && camera.get('initialSequence') && camera.get('initialSequence').get('movements').length > 0)
                        return;
                }

                if (event.sourceClassName == "MediaAudio")
                    return;

                isInitialized = true;

                player.unbind('preloadMediaShow', beginFunc, player, true);
                player.unbindOnObjectsOf('PanoramaPlayListItem', 'begin', beginFunc, player, true);
                player.unbind('stateChange', beginFunc, player, true);
                window.parent.postMessage("tourLoaded", '*');

                disposePreloader();

                onVirtualTourLoaded();
            };

            var settings = new TDV.PlayerSettings();

            settings.set(TDV.PlayerSettings.CONTAINER, document.getElementById('viewer'));
            settings.set(TDV.PlayerSettings.SCRIPT_URL, "{{asset('assets/js/script.js')}}?v=1687509842556");
            settings.set(TDV.PlayerSettings.WEBVR_POLYFILL_URL, "{{ asset('assets/js/lib/WebVRPolyfill.js')}}?v=1687509842556");
            settings.set(TDV.PlayerSettings.HLS_URL, "{{ asset('assets/js/lib/Hls.js') }}?v=1687509842556");
            settings.set(TDV.PlayerSettings.QUERY_STRING_PARAMETERS, 'v=1687509842556');
            window.tdvplayer = player = TDV.PlayerAPI.create(settings);
            player.bind('preloadMediaShow', beginFunc, player, true);
            player.bind('stateChange', beginFunc, player, true);
            player.bindOnObjectsOf('PanoramaPlayListItem', 'begin', beginFunc, player, true);
            player.bindOnObject('rootPlayer', 'start', function (e) {
                var queryDict = {}; location.search.substr(1).split("&").forEach(function (item) { var k = item.split("=")[0], v = decodeURIComponent(item.split("=")[1]); queryDict[k] = v });
                var item = undefined;
                if ("media-index" in queryDict) {
                    item = setMediaByIndex(parseInt(queryDict["media-index"]) - 1);
                }
                else if ("media-name" in queryDict) {
                    item = setMediaByName(queryDict["media-name"]);
                }
                else {
                    item = setMediaByIndex(0);
                }
                if (item != undefined && "trigger-overlay-name" in queryDict) {
                    triggerOverlayByName(item, queryDict["trigger-overlay-name"], "trigger-overlay-event" in queryDict ? queryDict["trigger-overlay-event"] : "click");
                }

                player.getById('rootPlayer').bind('tourEnded', function () {
                    onVirtualTourEnded();
                }, player, true);
            }, player, false);

            /* Listen messages */
            window.addEventListener('message', function (e) {
                //Listen to messages for make actions to player in the format function:param1,param2
                var action = e.data;
                if (action == 'pauseTour' || action == 'resumeTour') {
                    this[action].apply(this);
                }
            });
        }

        function pauseTour() {
            isPaused = true;
            if (!isInitialized)
                return;

            var playLists = player.getByClassName('PlayList');
            for (var i = 0, count = playLists.length; i < count; i++) {
                var playList = playLists[i];
                var index = playList.get('selectedIndex');
                if (index != -1) {
                    var item = playList.get('items')[index];
                    var itemPlayer = item.get('player');
                    if (itemPlayer && itemPlayer.pause) {
                        playersPlayingTmp.push(itemPlayer);
                        itemPlayer.pause();
                    }
                }
            }

            player.getById('pauseGlobalAudios')();
        }

        function resumeTour() {
            isPaused = false;
            if (!isInitialized)
                return;

            while (playersPlayingTmp.length) {
                var viewer = playersPlayingTmp.pop();
                viewer.play();
            }

            player.getById('resumeGlobalAudios')();
        }

        function onVirtualTourLoaded() {
            if (isPaused)
                pauseTour();
        }

        function onVirtualTourEnded() {

        }

        function getRootPlayer() {
            return window.tdvplayer !== undefined ? window.tdvplayer.getById('rootPlayer') : undefined;
        }

        function setMediaByIndex(index) {
            var rootPlayer = getRootPlayer();
            if (rootPlayer !== undefined) {
                return rootPlayer.setMainMediaByIndex(index);
            }
        }

        function setMediaByName(name) {
            var rootPlayer = getRootPlayer();
            if (rootPlayer !== undefined) {
                return rootPlayer.setMainMediaByName(name);
            }
        }

        function triggerOverlayByName(item, name, eventName) {
            var rootPlayer = getRootPlayer();
            if (rootPlayer !== undefined) {
                item.bind('begin', function (e) {
                    item.unbind('begin', arguments.callee, this);
                    var overlay = rootPlayer.getPanoramaOverlayByName(item.get('media'), name);
                    if (overlay)
                        rootPlayer.triggerOverlay(overlay, eventName);
                }, rootPlayer);
            }
        }

        function showPreloader() {
            var preloadContainer = document.getElementById('preloadContainer');
            if (preloadContainer != undefined)
                preloadContainer.style.opacity = 1;
        }

        function disposePreloader() {
            var preloadContainer = document.getElementById('preloadContainer');
            if (preloadContainer == undefined)
                return;

            var transitionEndName = transitionEndEventName();
            if (transitionEndName) {
                preloadContainer.addEventListener(transitionEndName, hide, false);
                preloadContainer.style.opacity = 0;
                setTimeout(hide, 500); //Force hide. Some cases the transitionend event isn't dispatched with an iFrame.
            }
            else {
                hide();
            }

            function hide() {

                preloadContainer.style.visibility = 'hidden';
                preloadContainer.style.display = 'none';
            }

            function transitionEndEventName() {
                var el = document.createElement('div');
                var transitions = {
                    'transition': 'transitionend',
                    'OTransition': 'otransitionend',
                    'MozTransition': 'transitionend',
                    'WebkitTransition': 'webkitTransitionEnd'
                };

                var t;
                for (t in transitions) {
                    if (el.style[t] !== undefined) {
                        return transitions[t];
                    }
                }

                return undefined;
            }
        }

        function onBodyClick() {
            document.body.removeEventListener("click", onBodyClick);
            document.body.removeEventListener("touchend", onBodyClick);
            loadTour();
        }

        function onLoad() {
            if (/AppleWebKit/.test(navigator.userAgent) && /Mobile\/\w+/.test(navigator.userAgent)) {
                var inIFrame = false;
                try {
                    inIFrame = (window.self !== window.top);
                }
                catch (e) {
                    inIFrame = true;
                }
                if (!inIFrame) {
                    var onResize = function (async) {
                        [0, 250, 1000, 2000].forEach(function (delay) {
                            setTimeout(function () {
                                var viewer = document.querySelector('#viewer');
                                var scale = window.innerWidth / document.documentElement.clientWidth;
                                var width = document.documentElement.clientWidth;
                                var height = Math.round(window.innerHeight / scale);
                                viewer.style.width = width + 'px';
                                viewer.style.height = height + 'px';
                                viewer.style.left = Math.round((window.innerWidth - width) * 0.5) + 'px';
                                viewer.style.top = Math.round((window.innerHeight - height) * 0.5) + 'px';
                                viewer.style.transform = 'scale(' + scale + ', ' + scale + ')';
                                window.scrollTo(0, 0);
                            }, delay);
                        });
                    };
                    window.addEventListener('resize', onResize);
                    onResize();
                }
            }


            if (isOVRWeb()) {
                showPreloader();
                loadTour();
                return;
            }

            showPreloader();
            loadTour()
        }

        function playVideo(video) {
            function isSafariDesktopV11orGreater() {
                return /^((?!chrome|android|crios|ipad|iphone).)*safari/i.test(navigator.userAgent) && parseFloat(/Version\/([0-9]+\.[0-9]+)/i.exec(navigator.userAgent)[1]) >= 11;
            }

            function detectUserAction() {
                var onVideoClick = function (e) {
                    if (video.paused) {
                        video.play();
                    }
                    video.muted = false;
                    e.stopPropagation();
                    e.stopImmediatePropagation();
                    e.preventDefault();
                    video.removeEventListener('click', onVideoClick);
                    video.removeEventListener('touchend', onVideoClick);
                };
                video.addEventListener("click", onVideoClick);
                video.addEventListener("touchend", onVideoClick);
            }

            if (isSafariDesktopV11orGreater()) {
                video.muted = true;
                video.play();
            } else {
                var canPlay = true;
                var promise = video.play();
                if (promise) {
                    promise.catch(function () {
                        video.muted = true;
                        video.play();
                        detectUserAction();
                    });
                } else {
                    canPlay = false;
                }

                if (!canPlay || video.muted) {
                    detectUserAction();
                }
            }
        }

        function isOVRWeb() {
            return window.location.hash.substring(1).split('&').indexOf('ovrweb') > -1;
        }
    </script>
    <style type="text/css">
        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            padding: env(safe-area-inset-top) env(safe-area-inset-right) env(safe-area-inset-bottom) env(safe-area-inset-left);
        }

        #viewer {
            background-color: #FFFFFF;
            z-index: 1;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
        }

        #preloadContainer {
            z-index: 2;
            position: relative;
            width: 100%;
            height: 100%;
            transition: opacity 0.5s;
            -webkit-transition: opacity 0.5s;
            -moz-transition: opacity 0.5s;
            -o-transition: opacity 0.5s;
        }
    </style>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/fav.png')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/flaticon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/off-canvas.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/rsmenu-main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/rs-spacing.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('assets/js/sweetalert/sweetalert.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body onload="onLoad()" class="defult-home">
    <div class="offwrap"></div>
    <div id="pre-load">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class='loader-icon'><img src="{{asset('assets/images/fav.png')}}" alt="Evenio - Events & Conference" width="500"></div>
            </div>
        </div>
    </div>

    <div class="main-content">
        @include('landing-page.layouts.navbar')
        <div class="rs-banner banner-home-style2" style="background: transparent; height: 100vh;" id="home">
            <div id="preloadContainer" style="background-color:rgba(255,255,255,1)">
                <div style="z-index: 4; position: absolute; left: 0%; top: 50%; width: 100.00%; height: 10.00%">
                    <div style="text-align:left; color:#000; ">
                        <DIV STYLE="text-align:center;"><SPAN STYLE="letter-spacing:0vmin;color:#777777;font-size:1.39vmin;font-family:Arial, Helvetica, sans-serif;">Loading
                                virtual tour. Please wait...</SPAN></DIV>
                        <p STYLE="margin:0; line-height:1.02vmin;"><BR STYLE="letter-spacing:0vmin;color:#000000;font-size:1.02vmin;font-family:Arial, Helvetica, sans-serif;" />
                        </p>
                    </div>
                </div>
            </div>
            <div id="viewer"></div>
        </div>
    </div>
    @include('landing-page.layouts.footer')
    <div class="modal fade search-modal" id="searchModal" tabindex="-1">
        <button type="button" class="close" data-bs-dismiss="modal">
            <span class="flaticon-cross"></span>
        </button>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="search-block clearfix">
                    <form>
                        <div class="form-group">
                            <input class="form-control" placeholder="Search Here..." type="text">
                            <button type="submit" value="Search"><i class="flaticon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/paralax.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/time-circle.js') }}"></script>
    <script src="{{ asset('assets/js/skill.bars.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/contact.form.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('assets/js/sweetalert/sweetalert.min.js')}}"></script>
    <script>
        AOS.init();

    </script>
    <script src="{{ asset('assets/js/home.js') }}"></script>
</body>

</html>
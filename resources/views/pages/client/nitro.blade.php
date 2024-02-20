@php($showCmsToggleButton = config('hotel.client.nitro.cms_toggle_button'))
@php($showOnlineCountButton = config('hotel.client.nitro.online_count_button'))
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/player/reset.css">
    <link rel="stylesheet" type="text/css" href="/player/style.css?v=18">
    <link rel="stylesheet" type="text/css" href="/player/tipped.css?v=1">
</head>
<body>
    <div style="display: none">
        <audio autoplay controls id="player2" src=""></audio>
    </div>
    <div id="area_player">
        <div id="player" class="draggable ui-widget-content" style="left: 45%;z-index: 99999">
            <div class="player_min">
                <div class="guy"></div>
                <div class="txt">LubboFM</div>
                <div class="handle tip" title="Move"></div>
                <div class="open o-c tip" title="Maximize"></div>
            </div>
            <div class="player">
                <div class="plus tip" title="Zet harder" style="cursor:pointer" onclick="SetVolumeHigher()"></div>
                <div class="min tip" title="Zet zachter" style="cursor:pointer" onclick="SetVolumeLower()"></div>
                <a id="playerButton" data-enable="1">
                    <div class="play pause tip" title="Start/Stop Radio" style="cursor:pointer"></div>
                </a>
                <div class="separa"></div>
                <div class="info djplaying tip" title="De DJ">
                    <span id="currentspeaker" style="cursor:pointer"></span>
                    </a>
                </div>
                <div class="info playingartist tip" title="Artiest">
                    <span id="currentartist" style="cursor:pointer"></span>
                    </a>
                </div>
                <div class="info playingsong tip" title="Nummer">
                    <span id="currentplaying" style="cursor:pointer"></span>
                    </a>
                </div>
                <div class="info listeners tip" title="Speelt nu">
                    <span id="currentlistners" style="cursor:pointer"></span>
                    </a>
                </div>
                <div class="close o-c tip" title="Minimize"></div>
                <div class="handle tip" title="Verplaats"></div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script src="/player/tipped.js?v=20"></script>
    <script src="/player/player.js?v=25"></script>
</body>
</html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nitro - {{ getSetting('hotel_name') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}" />
    @vite(['resources/scss/app.scss'])
</head>
<body
    class="w-full h-full dark:bg-slate-950 overflow-x-hidden"
    x-data="client(
        '{{ $showOnlineCountButton ? route('api.hotel.online-count') : null }}'
    )"
>
    <main>
        <div class="fixed z-50 top-0 left-0 pl-2 pt-2 h-12 flex gap-2">
            @if ($showCmsToggleButton)
            <x-ui.buttons.default
                class="dark:bg-orange-500 bg-orange-500 border-orange-700 hover:bg-orange-400 dark:hover:bg-orange-400 dark:shadow-orange-700/75 shadow-orange-600/75 py-2 text-white"
                @click="toggleCms"
            >
                <template x-if="!showCmsFrame">
                    <i class="fa-solid fa-house-user"></i>
                </template>

                <template x-if="showCmsFrame">
                    <i class="fa-solid fa-rotate-left"></i>
                </template>
            </x-ui.buttons.default>
            @endif

            @if ($showOnlineCountButton)
            <div
                x-transition.duration.1000ms
                x-show="!showCmsFrame"
            >
                <x-ui.buttons.default
                    class="dark:bg-slate-500 bg-slate-500 border-slate-700 hover:bg-slate-400 dark:hover:bg-slate-400 dark:shadow-slate-700/75 shadow-slate-600/75 py-2 text-white"
                    @click="reloadOnlineCount()"
                >
                    <i class="fa-solid fa-users relative">
                        <i class="fa fa-solid fa-circle text-green-400 absolute right-0 bottom-0 fa-2xs"></i>
                    </i>
                    <span x-text="onlineCount"></span>
                </x-ui.buttons.default>
            </div>
            @endif
        </div>

        <div
            x-transition.origin.top.center
            x-show="!showCmsFrame"
        >
            <iframe
                id="nitro-client"
                src="{{ $nitroClientUrl }}?sso={{ $authTicket }}"
                class="w-screen dark:bg-slate-950 h-screen overflow-hidden left-0 top-0 border-none m-0 p-0"
            ></iframe>
        </div>

        @if ($showCmsToggleButton)
        <div
            x-show="showCmsFrame"
            style="display: none"
        >
            <iframe
                src="/?fromClient=1"
                class="overflow-hidden dark:bg-slate-950 left-0 top-0 w-screen h-screen border-none m-0 p-0 z-20"
            >
            </iframe>
        </div>
        @endif

        <div class="fixed z-[150] bg-black/[0.9] top-0 left-0 w-full h-full flex justify-center items-center flex-col gap-4"
            x-transition
            x-show="isDisconnected"
            style="display: none"
        >
            <span class="text-4xl text-center text-white font-bold flex gap-2 animate__animated animate__pulse animate__infinite">
                {{ __('You have been disconnected.') }}
            </span>

            <div class="flex gap-4">
                <x-ui.buttons.redirectable
                    class="dark:bg-emerald-500 bg-emerald-500 border-emerald-700 hover:bg-emerald-400 dark:hover:bg-emerald-400 dark:shadow-emerald-700/75 shadow-emerald-600/75 py-2 text-white"
                    href="{{ route('hotel.nitro') }}"
                >
                    {{ __('Reload') }}
                </x-ui.buttons.redirectable>

                <x-ui.buttons.redirectable
                    class="dark:bg-orange-500 bg-orange-500 border-orange-700 hover:bg-orange-400 dark:hover:bg-orange-400 dark:shadow-orange-700/75 shadow-orange-600/75 py-2 text-white"
                    href="{{ route('index') }}"
                >
                    {{ __('Back to website') }}
                </x-ui.buttons.redirectable>
            </div>
        </div>
    </main>

    @vite(['resources/js/client.js'])
    <script src="{{ asset('assets/js/nitro-external.js') }}"></script>
</body>
</html>

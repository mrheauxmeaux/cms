<div class="w-full mt-12 p-2 border-t-2 border-gray-200 shadow dark:border-slate-800 bg-white dark:bg-slate-950" x-data="footer">
    <x-ui.buttons.default
        class="bottom-3 right-3 z-10 bg-blue-400 border-blue-600 hover:bg-blue-300 text-white"
        x-bind:class="{ '!hidden': !showScrollButton, '!fixed': showScrollButton }"
        @click="scrollToTop"
    >
        <i class="fa-solid fa-chevron-up"></i>
    </x-ui.buttons.default>

    <x-container class="flex justify-center gap-1 items-center text-sm flex-col">
        <span class="dark:text-gray-200">
            {!! __('© OrionCMS - Developed by :orion', [
                    'orion' => <<<HTML
                        <a
                            target="_blank"
                            href="https://github.com/orion-server"
                            class="underline underline-offset-4 text-blue-400"
                        >
                            Orion Server
                        </a>
                    HTML
                ])
            !!}</span>
        <span class="font-semibold dark:text-white">{{ __('We are in no way affiliated with Habbo or Sulake Corporation.') }}</span>
        <span class="dark:text-gray-200">
            {{ __('Click here for our') }}
            <a
                data-tippy
                target="_blank"
                href="https://lubbohotel.co/terms.html"
                class="underline underline-offset-4 text-blue-400"
            >
                {{ __('Terms') }}
            </a>
            {{ __(' and ') }}
            <a
                data-tippy
                target="_blank"
                href="https://lubbohotel.co/privacy.html"
                class="underline underline-offset-4 text-blue-400"
            >
                {{ __('Privacy') }}
            </a>
			{{ __(' statement. ') }}
        </span>
    </x-container>
</div>

@include('components.select-language-modal')

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
<<<<<<< HEAD
            {!! __('© Lubbo Group 2024 - Design by :a. All rights reserved.', [
=======
            {!! __('© OrionCMS :y - Development by :a. All rights reserved.', [
                    'y' => date('Y'),
>>>>>>> 59c2797d4f514e5b0f207320f608034b5754119b
                    'a' => <<<HTML
                        <a
                            data-tippy
                            target="_blank"
                            href="https://github.com/nicollassilva"
                            data-tippy-content='<i class="fa-brands fa-discord mr-1"></i> inicollas'
                            class="underline underline-offset-4 text-blue-400"
                        >
                            iNicollas
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

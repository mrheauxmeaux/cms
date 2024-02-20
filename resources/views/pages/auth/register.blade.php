@extends('layouts.app')

@section('title', __('Maak een gratis account'))

@section('content')
<x-container class="flex justify-center items-center mt-12" x-data="authentication('{{ getFigureUrl('%figure%', '%params%') }}')">
    <div class="bg-white dark:bg-slate-850 overflow-hidden rounded-lg shadow w-full relative border border-slate-300 dark:border-slate-600">
        <div class="w-full p-6 bg-[#25b8ee] border-b border-slate-300 dark:border-slate-600 relative">
            <h2 class="text-xl font-semibold text-slate-100">{{ __('Register with :h', ['h' => config('app.name')]) }}</h2>
            <img src="/assets/images/register-img.png" class="absolute right-0 bottom-0 z-0"></img>
        </div>

        <template x-if="!! registerReferrerData.username">
            <div class="flex-1 text-center bg-green-500 border-b-4 border-green-600 p-2 text-white text-sm">
                {{ __('You are being invited by') }} <span class="font-semibold" x-text="registerReferrerData.username"></span>
            </div>
        </template>

        <form
            method="POST"
            id="register-form"
            class="w-full h-full grid grid-cols-1 lg:grid-cols-3 divide-x divide-slate-300 dark:divide-slate-600"
            @submit.prevent="onFormRegisterSubmit"
        >
            <div class="col-span-2 p-4 flex flex-col gap-6">

                <div class="flex flex-col">
                    <x-ui.input
                        label="{{ __('Username') }}"
                        autocomplete="username"
                        id="register-username"
                        icon="fa-regular fa-user"
                        alpine-model="registerData.username"
                        placeholder="{{ __('Think of a unique username') }}"
                        type="text"
                    />

                    <span class="w-full col-span-2 pt-2 text-slate-800 dark:text-slate-200 rounded-lg text-xs">
                        {{ __("Your username is visible to all Lubbo Players! Do not use an offensive username.") }}
                    </span>
                </div>

                <div class="flex flex-col">
                    <x-ui.input
                        label="{{ __('Email') }}"
                        autocomplete="email"
                        id="register-email"
                        icon="fa-regular fa-envelope"
                        alpine-model="registerData.email"
                        placeholder="{{ __('Enter your Email') }}"
                        type="email"
                    />

                    <span class="w-full col-span-2 pt-2 text-slate-800 dark:text-slate-200 rounded-lg text-xs">
                        {{ __("Use your own email. We use your own email in case you lost your password.") }}
                    </span>
                </div>

                <div class="flex flex-col">
                    <x-ui.input
                        label="{{ __('Date of Birth') }}"
                        autocomplete="birthday"
                        id="register-birthday"
                        icon="fa-regular fa-calendar-days"
                        alpine-model="registerData.birthday"
                        type="date"
                    />

                    <span class="w-full col-span-2 pt-2 text-slate-800 dark:text-slate-200 rounded-lg text-xs">
                        {{ __("You need to be atleast 13 years or above to play Lubbo.") }}
                    </span>
                </div>

                <div class="flex flex-col gap-4 bg-slate-100 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 p-4 rounded-lg">
                    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex flex-col">
                            <x-ui.input
                                label="{{ __('Password') }}"
                                autocomplete="password"
                                id="register-password"
                                icon="fa-solid fa-key"
                                alpine-model="registerData.password"
                                placeholder="{{ __('Password') }}"
                                placeholder="{{ __('Enter a valid password') }}"
                                type="password"
                            />
                        </div>
                        <div class="flex flex-col">
                            <x-ui.input
                                label="{{ __('Confirm Password') }}"
                                autocomplete="password"
                                id="register-password-confirmation"
                                icon="fa-solid fa-key"
                                alpine-model="registerData.password_confirmation"
                                placeholder="{{ __('Confirm Password') }}"
                                @keyup.enter="onRegisterSubmit()"
                                type="password"
                            />
                        </div>
                    </div>
                    <span class="w-full col-span-2 p-1 text-slate-800 dark:text-slate-200 rounded-lg text-xs">
                        <i class="fa-solid fa-triangle-exclamation mr-1 animate-bounce text-red-400"></i>
                        {{ __("Do not share you password with anyone. Lubbo staff will never ask for your personal details.") }}
                    </span>
                </div>
            </div>

            <div class="p-4 flex flex-col gap-4">

                <div class="flex flex-col">
                    <label class="text-gray-700 w-full text-left font-semibold mb-2 dark:text-gray-200 text-sm">
                        <i class="fa-solid fa-venus-mars mr-1"></i>
                        {{ __('Gender') }}
                    </label>
                    <div class="flex gap-2">
                        <div class="flex-1">
                            <x-ui.input-radio
                                id="register-gender-male"
                                title="{{ __('Male') }}"
                                image-icon="small male"
                                value="M"
                                alpine-model="registerData.gender"
                                selected-classes="peer-checked:!text-blue-400 peer-checked:border-blue-400"
                            />
                        </div>
                        <div class="flex-1">
                            <x-ui.input-radio
                                id="register-gender-female"
                                title="{{ __('Female') }}"
                                image-icon="small female"
                                value="F"
                                alpine-model="registerData.gender"
                                selected-classes="peer-checked:!text-pink-400 peer-checked:border-pink-400"
                            />
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-4">
                    <div class="w-full relative grid grid-cols-4 gap-2">
                        <template x-for="(look, index) of getDefaultLooksByGender()" :key="index">
                            <div class="flex justify-center items-center">
                                <div
                                    x-bind:class="{
                                        'hover:!border-blue-400': genderSelectedIs('M'),
                                        'hover:!border-pink-400': genderSelectedIs('F'),
                                        '!border-blue-400': lookIsActiveByGender('M', look),
                                        '!border-pink-400': lookIsActiveByGender('F', look)
                                    }"
                                    class="w-[84px] h-[130px] border-2 cursor-pointer bg-slate-100 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded bg-center bg-no-repeat"
                                    x-bind:style="{ backgroundImage: `url(${getFigureUrl(look)})` }"
                                    @click="registerData.look = look"
                                ></div>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="flex justify-center mt-2">
                    @includeWhen(config('hotel.recaptcha.enabled'), 'components.ui.recaptcha')
                    @includeWhen(config('hotel.turnstile.enabled'), 'components.ui.turnstile')
                </div>

                <div class="flex gap-4 mt-4">
                    <x-ui.buttons.loadable
                        alpine-model="loading"
                        type="submit"
                        class="dark:bg-blue-600 bg-blue-500 border-blue-700 hover:bg-blue-400 dark:hover:bg-blue-500 dark:shadow-blue-700/75 shadow-blue-600/75 flex-1 py-3 text-white">
                        <i class="fa-solid fa-user-plus"></i>
                        {{ __('Register') }}
                    </x-ui.buttons.loadable>
                </div>
            </div>
        </form>

    </div>
</x-container>
@endsection

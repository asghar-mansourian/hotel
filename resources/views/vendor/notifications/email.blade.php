@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# {{__('member.hello')}}
@endif
@endif

{{-- Intro Lines --}}
{{__('member.resetPasswordDescription')}}
{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ __('member.resetPassword') }}
@endcomponent
@endisset

{{-- Outro Lines --}}
{{__('member.resetPasswordExpireDescription')}}

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
{{__('member.regards')}},<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    __('member.troubleClicking1'). __('member.resetPassword') .__('member.troubleClicking2').
         $actionText
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent

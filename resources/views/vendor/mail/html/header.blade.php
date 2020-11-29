<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{url('front/image/logo.svg')}}" class="logo" alt="Shtormex">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>

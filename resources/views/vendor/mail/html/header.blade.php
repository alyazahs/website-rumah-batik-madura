@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('images/batik3.png') }}" class="logo" alt="RBM">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>

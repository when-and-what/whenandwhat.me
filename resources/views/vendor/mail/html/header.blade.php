@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block; text-decoration: none;">
    <img src="{{ rtrim(config('app.url'), '/') }}images/logo.png" alt="When and What" class="logo">
    <span style="font-size: 15px; font-weight: 700; color: #ffffff; letter-spacing: -0.02em; vertical-align: middle;">When and What</span>
</a>
</td>
</tr>

@component('mail::message')
# Welcome to InstaDeck!

This is one of the portfolio websites made by Decki Herdiawan Soepandi and I thank you for checking this one out.<br>
Go check another portfolio on <a href="https://decki.id" style="text-decoration: none;">decki.id</a>!

Best regards,<br>
{{ env('MAIL_FROM_NAME') }}
@endcomponent

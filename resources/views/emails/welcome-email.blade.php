@component('mail::message')
# Welcome to InstaDeck!

This is one of the portfolio websites made by Decki Herdiawan Soepandi and I thank you for checking this one out.<br>
Go check another portfolio in <a href="https://deckiherdiawans.com" style="text-decoration: none;">deckiherdiawans.com</a>!

Best regards,<br>
{{ env('MAIL_FROM_NAME') }}
@endcomponent

[{if $aVariantSelections.blPerfectFit}]
    [{include file="subscription_buttons.tpl"}]
[{else}]
    [{include file="payment_buttons.tpl"}]
[{/if}]
<div id="paypal-button-container" class="[{$buttonClass}]"></div>
[{oxscript add=$smarty.capture.paypal_init}]

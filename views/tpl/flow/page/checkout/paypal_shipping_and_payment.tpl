[{assign var="sPaymentID" value=$payment->getId()}]
<div class="row">
    <div class="col-xs-12 col-md-6" id="orderShipping">
        <form action="[{$oViewConf->getSslSelfLink()}]" method="post">
            <div class="hidden">
                [{$oViewConf->getHiddenSid()}]
                <input type="hidden" name="cl" value="payment">
                <input type="hidden" name="fnc" value="">
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        [{oxmultilang ident="SHIPPING_CARRIER"}]
                        <button type="submit" class="btn btn-xs btn-warning pull-right submitButton largeButton" title="[{oxmultilang ident="EDIT"}]">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </h3>
                </div>
                <div class="panel-body">
                    [{assign var="oShipSet" value=$oView->getShipSet()}]
                    [{$oShipSet->oxdeliveryset__oxtitle->value}]
                </div>
            </div>
        </form>
    </div>
    <div class="col-xs-12 col-md-6" id="orderPayment">


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        [{oxmultilang ident="PAYMENT_METHOD"}]
                        <form action="[{$oViewConf->getSslSelfLink()}]" method="post">
                            <div class="hidden">
                                [{$oViewConf->getHiddenSid()}]
                                <input type="hidden" name="cl" value="payment">
                                <input type="hidden" name="fnc" value="">
                            </div>
                            <button type="submit" class="btn btn-xs btn-warning pull-right submitButton largeButton" title="[{oxmultilang ident="EDIT"}]">
                                <i class="fa fa-pencil"></i>
                            </button>
                        </form>
                    </h3>
                </div>
                <div class="panel-body">
                    [{$payment->oxpayments__oxdesc->value}]
                    [{if $sPaymentID == "oxidpaypal_acdc"}]
                       [{include file="modules/osc/paypal/oscpaypalacdc.tpl"}]
                    [{/if}]
                </div>
            </div>
    </div>
</div>
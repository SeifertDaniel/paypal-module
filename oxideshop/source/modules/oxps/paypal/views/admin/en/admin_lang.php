<?php

/**
 * This file is part of OXID eSales Paypal module.
 *
 * OXID eSales Paypal module is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eSales Paypal module is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eSales Paypal module.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2020
 */
$sLangName = 'English';

$aLang = [
    'charset'                        => 'UTF-8',
    'paypal'                         => 'PayPal',
    'OXPS_PAYPAL_ACTIONS'            => 'Actions',
    'OXPS_PAYPAL_CAPTURE_PAYMENT'    => 'Capture payment',
    'OXPS_PAYPAL_CAPTURE'            => 'Capture',
    'OXPS_PAYPAL_ISSUE_REFUND'       => 'Issue refund',
    'OXPS_PAYPAL_REFUND'             => 'Refund',
    'OXPS_PAYPAL_SHOW_BALANCE_AFFECTING_RECORDS' => 'Only Balance Affecting',
    'OXPS_PAYPAL_REPORT_REFERENCE'   => 'Report reference',
    'OXPS_PAYPAL_TRANSACTION_TO_PRICE' => 'Price to',
    'OXPS_PAYPAL_TRANSACTION_FROM_PRICE' => 'Price from',
    'OXPS_PAYPAL_AVAILABLE_BALANCE'  => 'Available',
    'OXPS_PAYPAL_WITHHELD_BALANCE'   => 'Withheld',
    'OXPS_PAYPAL_TOTAL_BALANCE'      => 'Total',
    'OXPS_PAYPAL_PRIMARY'            => 'Primary',
    'OXPS_PAYPAL_MORE'               => 'More',
    'OXPS_PAYPAL_LAST_REFRESH_TIME'  => 'Last refresh',
    'OXPS_PAYPAL_CURRENCY_CODE'      => 'Currency Code',
    'OXPS_PAYPAL_AS_OF_TIME'         => 'As of time',
    'OXPS_PAYPAL_PAYMENT_INSTRUMENT_CREDIT_CARD' => 'Credit Card',
    'OXPS_PAYPAL_PAYMENT_INSTRUMENT_DEBIT_CARD'  => 'Debit Card',
    'OXPS_PAYPAL_TRANSACTION_STATUS_P' => 'Pending',
    'OXPS_PAYPAL_TRANSACTION_STATUS_F' => 'Partially Refunded',
    'OXPS_PAYPAL_TRANSACTION_STATUS_D' => 'Denied',
    'OXPS_PAYPAL_TRANSACTION_STATUS_S' => 'Completed',
    'OXPS_PAYPAL_TRANSACTION_STATUS_V' => 'Refunded',
    'OXPS_PAYPAL_DATE_SELECT_HELP'   => 'Maximum period of 31 days is allowed!',
    'OXPS_PAYPAL_APPLY'              => 'Apply',
    'OXPS_PAYPAL_TRANSACTION_DATE_FROM' => 'Date From',
    'OXPS_PAYPAL_TRANSACTION_DATE_TO'   => 'Date To',
    'OXPS_PAYPAL_TRANSACTION_TYPE'   => 'Transaction Type',
    'OXPS_PAYPAL_TERMINAL_ID'        => 'Terminal ID',
    'OXPS_PAYPAL_PAYMENT_INSTRUMENT_TYPE' => 'Instrument Type',
    'OXPS_PAYPAL_TRANSACTION_CURRENCY' => 'Transaction Currency',
    'OXPS_PAYPAL_TRANSACTION_AMOUNT' => 'Transaction Amount',
    'OXPS_PAYPAL_TRANSACTION_DATE'   => 'Transaction Date',
    'OXPS_PAYPAL_STORE_ID'           => 'Store ID',
    'OXPS_PAYPAL_ACCOUNT_ID'         => 'Account ID',
    'OXPS_PAYPAL_TRANSACTION_ID'     => 'Transaction ID',
    'OXPS_PAYPAL_REFERENCE_ID'       => 'Reference ID',
    'OXPS_PAYPAL_REFERENCE_ID_TYPE'  => 'Reference ID Type',
    'OXPS_PAYPAL_EVENT_CODE'         => 'Event Code',
    'OXPS_PAYPAL_INITIATION_DATE'    => 'Initiation Date',
    'OXPS_PAYPAL_UPDATED_DATE'       => 'Updated Date',
    'OXPS_PAYPAL_TRANSACTION_NOTE'   => 'Note',
    'OXPS_PAYPAL_BANK_REFERENCE_ID'  => 'Bank Reference ID',
    'OXPS_PAYPAL_INVOICE_ID'         => 'Invoice ID',
    'OXPS_PAYPAL_CUSTOM_FIELD'       => 'Custom Field',
    'OXPS_PAYPAL_CREDIT_TERM'        => 'Credit Term',
    'OXPS_PAYPAL_INSTRUMENT_TYPE'    => 'Instrument Type',
    'OXPS_PAYPAL_TRANSACTION_STATUS' => 'Status',
    'OXPS_PAYPAL_PAYMENT_TRACKING_ID' => 'Payment Tracking ID',
    'OXPS_PAYPAL_PAYMENT_METHOD_TYPE' => 'Payment Method Type',
    'OXPS_PAYPAL_INSTRUMENT_SUB_TYPE' => 'Instrument Sub Type',
    'OXPS_PAYPAL_TRANSACTION_SUBJECT' => 'Subject',
    'OXPS_PAYPAL_PROTECTION_ELIGIBILITY' => 'Protection Eligibility',
    'tbclorder_paypal'               => 'PayPal',
    // Paypal Config
    'OXPS_PAYPAL_CONFIG'             => 'Configuration',
    'OXPS_PAYPAL_SUBSCRIBE'          => 'PayPal Subscriptions',
    'PAYPAL_SUBSCRIBE_MAIN'          => 'PayPal Subscriptions',
    'OXPS_PAYPAL_TRANSACTIONS'       => 'Transactions',
    'OXPS_PAYPAL_BALANCES'           => 'Balances',
    'OXPS_PAYPAL_GENERAL'            => 'General',
    'OXPS_PAYPAL_WEBHOOK_ID'         => 'Webhook ID',
    'OXPS_PAYPAL_OPMODE'             => 'Operation Mode',
    'OXPS_PAYPAL_OPMODE_LIVE'        => 'Live',
    'OXPS_PAYPAL_OPMODE_SANDBOX'     => 'Sandbox',
    'OXPS_PAYPAL_CLIENT_ID'          => 'Client ID',
    'OXPS_PAYPAL_CLIENT_SECRET'      => 'Secret',
    'OXPS_PAYPAL_CREDENTIALS'        => 'API credentials',
    'OXPS_PAYPAL_WEBHOOK_TITLE'      => 'Webhook settings',
    'OXPS_PAYPAL_WEBHOOK_URL'        => 'Webhook listener URL',
    'HELP_OXPS_PAYPAL_WEBHOOK_URL'   => 'Use this URL to setup webhook listener on PayPal portal.',
    'OXPS_PAYPAL_LIVE_CREDENTIALS'   => 'Live API credentials',
    'OXPS_PAYPAL_SANDBOX_CREDENTIALS'        => 'Sandbox API credentials',
    'OXPS_PAYPAL_LIVE_BUTTON_CREDENTIALS'    => 'SignUp Merchant Integration (Live)',
    'OXPS_PAYPAL_SANDBOX_BUTTON_CREDENTIALS' => 'SignUp Merchant Integration (Sandbox)',
    'OXPS_PAYPAL_ERR_CONF_INVALID'   =>
        'One or more configuration values are either not set or incorrect. Please double check them.<br>
        <b>Module inactive.</b>',
    'OXPS_PAYPAL_CONF_VALID'         => 'Configuration values OK.<br><b>Module is active</b>',
    'OXPS_PAYPAL_BUTTON_PLACEMEMT_TITLE' => 'Button placement settings',
    'OXPS_PAYPAL_PRODUCT_DETAILS_BUTTON_PLACEMENT' => 'Product details page',
    'OXPS_PAYPAL_ADD_TO_BASKET_MODAL_PLACEMENT' => 'Add to basket modal',
    'OXPS_PAYPAL_MINI_BASKET_BUTTON_PLACEMENT' => 'Mini basket',
    'HELP_OXPS_PAYPAL_BUTTON_PLACEMEMT' => 'Toggle the display of PayPal buttons',
    'HELP_OXPS_PAYPAL_CREDENTIALS'   =>
        'If you already have the API credentials, you can enter them directly.<br>
        Alternatively, use one of the following links to generate the API credentials for live or sandbox mode.',
    'HELP_OXPS_PAYPAL_CLIENT_ID'     => 'Client ID for live mode.',
    'HELP_OXPS_PAYPAL_CLIENT_SECRET' => 'Secret for live mode.',
    'HELP_OXPS_PAYPAL_SANDBOX_CLIENT_ID'     => 'Client ID for sandbox mode.',
    'HELP_OXPS_PAYPAL_SANDBOX_CLIENT_SECRET' => 'Secret for sandbox mode.',
    'HELP_OXPS_PAYPAL_OPMODE'        => 'To configure and test PayPal, use Sandbox (test). When you\'re ready
        to receive real transactions, switch to Production (live).',
    'OXPS_PAYPAL_WEBHOOK_ID_HELP'    => 'The ID of the webhook as configured in your Developer Portal account',
    // Paypal ORDER
    'OEPAYPAL_AMOUNT'                      => 'Amount',
    'OEPAYPAL_SHOP_PAYMENT_STATUS'         => 'Shop payment status',
    'OEPAYPAL_ORDER_PRICE'                 => 'Full order price',
    'OEPAYPAL_ORDER_PRODUCTS'              => 'Ordered products',
    'OEPAYPAL_CAPTURED'                    => 'Captured',
    'OEPAYPAL_REFUNDED'                    => 'Refunded',
    'OEPAYPAL_CAPTURED_NET'                => 'Resulting payment amount',
    'OEPAYPAL_CAPTURED_AMOUNT'             => 'Captured amount',
    'OEPAYPAL_REFUNDED_AMOUNT'             => 'Refunded amount',
    'OEPAYPAL_VOIDED_AMOUNT'               => 'Voided amount',
    'OEPAYPAL_MONEY_CAPTURE'               => 'Money capture',
    'OEPAYPAL_MONEY_REFUND'                => 'Money refund',
    'OEPAYPAL_CAPTURE'                     => 'Capture',
    'OEPAYPAL_REFUND'                      => 'Refund',
    'OEPAYPAL_DETAILS'                     => 'Details',
    'OEPAYPAL_AUTHORIZATION'               => 'Authorization',
    'OEPAYPAL_CANCEL_AUTHORIZATION'        => 'Void',
    'OEPAYPAL_PAYMENT_HISTORY'             => 'PayPal history',
    'OEPAYPAL_HISTORY_DATE'                => 'Date',
    'OEPAYPAL_HISTORY_ACTION'              => 'Action',
    'OEPAYPAL_HISTORY_PAYPAL_STATUS'       => 'PayPal status',
    'OEPAYPAL_HISTORY_PAYPAL_STATUS_HELP'  => 'Payment status returned from PayPal. For more details see: <a href="https://www.paypal.com/webapps/helpcenter/article/?articleID=94021&m=SRE" target="_blank" >PayPal status</a>',
    'OEPAYPAL_HISTORY_COMMENT'             => 'Comment',
    'OEPAYPAL_HISTORY_ACTIONS'             => 'Actions',
    'OEPAYPAL_HISTORY_NOTICE'              => 'Note',
    'OEPAYPAL_HISTORY_NOTICE_TEXT'         => 'In case of error, please see "Details" for more information',
    'OEPAYPAL_MONEY_ACTION_FULL'           => 'full',
    'OEPAYPAL_MONEY_ACTION_PARTIAL'        => 'partial',
    'OEPAYPAL_LIST_STATUS_ALL'             => 'All',
    'OEPAYPAL_STATUS_CREATED'              => 'Created',
    'OEPAYPAL_STATUS_SAVED'                => 'Saved',
    'OEPAYPAL_STATUS_APPROVED'             => 'Approved',
    'OEPAYPAL_STATUS_VOIDED'               => 'Voided',
    'OEPAYPAL_STATUS_COMPLETED'            => 'Completed',
    'OEPAYPAL_STATUS_PAYER_ACTION_REQUIRED'=> 'Payer Action required',
    'OEPAYPAL_STATUS_PARTIALLY_COMPLETED'  => 'Partially completed',
    'OEPAYPAL_PAYMENT_METHOD'              => 'Payment method',
    'OEPAYPAL_CLOSE'                       => 'Close',
    'OEPAYPAL_COMMENT'                     => 'Comment',
    'OEPAYPAL_RESPONSE_FROM_PAYPAL'        => 'Error message from PayPal: ',
    'OEPAYPAL_AUTHORIZATIONID'             => 'Authorization ID',
    'OEPAYPAL_TRANSACTIONID'               => 'Transaction ID',
    'OEPAYPAL_CORRELATIONID'               => 'Correlation ID',
    'OXPS_PAYPAL_REFUND_AMOUNT'            => 'Refund amount',
    'OXPS_PAYPAL_INVOICE_ID'               => 'Invoice ID',
    'OXPS_PAYPAL_NOTE_TO_BUYER'            => 'Note to buyer',
    'OXPS_PAYPAL_REFUND_ALL'               => 'Refund all',
];

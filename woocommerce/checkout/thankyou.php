<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined('ABSPATH') || exit;
?>

<div class="thank-you-message">

    <div class="woocommerce-order">
        <?php
        if ($order) :

        do_action('woocommerce_before_thankyou', $order->get_id());
        ?>

        <?php if ($order->has_status('failed')) : ?>

            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>

            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
                <a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>"
                   class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
                <?php if (is_user_logged_in()) : ?>
                    <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>"
                       class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
                <?php endif; ?>
            </p>

        <?php else : ?>


        <h1 class="elementor-heading-title elementor-size-default">Thank you!</h1>

        <div class="elementor-text-editor elementor-clearfix"><p>Your order request was successful and is now being processed for you. You will receive a confirmation email for the resources ordered and your delivery address shortly.</p></div>


        <div class="rounded-button-container " _colorbg="neutral blue" style="width: max-content;height:max-content;">
            <a href="/tavi-resources/">
                <div class="rounded-button">
                    <div class="rounded-button-title">Return to Resources</div>
                </div>
            </a>
        </div>


        <?php
        $products = [];
        foreach($order->get_items() as $values) {
            $datas = $values->get_data();
            $products[] =
                ["quantity" => $datas['quantity'],
                    "title" => $datas['name'],
                    "ppeNum" => get_post_meta( intval($datas['product_id']), 'ppe_number', true )];
        }

        ?>  <script>
            var order = <?php
            echo json_encode(
                array(
                    "email" => $order->get_billing_email(),
                    "firstName" => $order->get_billing_first_name(),
                    "lastName" => $order->get_billing_last_name(),
                    "address1" => $order->get_billing_address_1(),
                    "address2" => $order->get_billing_address_2(),
                    "city" => $order->get_billing_city(),
                    "postCode" => $order->get_billing_postcode(),
                    "country" => $order->get_billing_country(),
                    "newsletterSignup" => get_post_meta( intval($order->get_id()), 'signup_checkbox', true ),
                    "occupation" => get_post_meta( intval($order->get_id()), 'occupation', true ),
                    "items"=> $products
                ));?>;
    </script>
        <?php endif; ?>

    <?php else : ?>

        <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters('woocommerce_thankyou_order_received_text', esc_html__('Thank you. Your order has been received.', 'woocommerce'), null); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

    <?php endif; ?>

    </div>
</div>

<script src="//app-sj02.marketo.com/js/forms2/js/forms2.min.js"></script>  <!-- Load Marketo Forms js-->
<form id="mktoForm_6869" style="display:none;"></form>
<script type="text/javascript">
    var marketoWebvisits = [];
    var marketoOrder = '';
    const convertISOtoMarketoCountry = {
        "AF":"Afghanistan",
        "AX":"Aland Islands",
        "AL":"Albania",
        "DZ":"Algeria",
        "AS":"American Samoa",
        "AD":"Andorra",
        "AO":"Angola",
        "AI":"Anguilla",
        "AQ":"Antarctica",
        "AG":"Antigua and Barbuda",
        "AR":"Argentina",
        "AM":"Armenia",
        "AW":"Aruba",
        "AU":"Australia",
        "AT":"Austria",
        "AZ":"Azerbaijan",
        "BS":"Bahamas",
        "BH":"Bahrain",
        "BD":"Bangladesh",
        "BB":"Barbados",
        "BY":"Belarus",
        "BE":"Belgium",
        "BZ":"Belize",
        "BJ":"Benin",
        "BM":"Bermuda",
        "BT":"Bhutan",
        "BO":"Bolivia",
        "BQ":"Bonaire, Sint Eustatius and Saba",
        "BA":"Bosnia and Herzegovina",
        "BW":"Botswana",
        "BV":"Bouvet Island",
        "BR":"Brazil",
        "IO":"British Indian Ocean Territory",
        "BN":"Brunei Darussalam",
        "BG":"Bulgaria",
        "BF":"Burkina Faso",
        "BI":"Burundi",
        "KH":"Cambodia",
        "CM":"Cameroon",
        "CA":"Canada",
        "CV":"Cape Verde",
        "KY":"Cayman Islands",
        "CF":"Central African Republic",
        "TD":"Chad",
        "CL":"Chile",
        "CN":"China",
        "CX":"Christmas Island",
        "CC":"Cocos (Keeling) Islands",
        "CO":"Colombia",
        "KM":"Comoros",
        "CG":"Congo",
        "CD":"Congo, the Democratic Republic of the",
        "CK":"Cook Islands",
        "CR":"Costa Rica",
        "CI":"Cote d'Ivoire",
        "HR":"Croatia",
        "CU":"Cuba",
        "CW":"Curaçao",
        "CY":"Cyprus",
        "CZ":"Czech Republic",
        "DK":"Denmark",
        "DJ":"Djibouti",
        "DM":"Dominica",
        "DO":"Dominican Republic",
        "EC":"Ecuador",
        "EG":"Egypt",
        "SV":"El Salvador",
        "GQ":"Equatorial Guinea",
        "ER":"Eritrea",
        "EE":"Estonia",
        "ET":"Ethiopia",
        "FK":"Falkland Islands (Malvinas)",
        "FO":"Faroe Islands",
        "FJ":"Fiji",
        "FI":"Finland",
        "FR":"France",
        "GF":"French Guiana",
        "PF":"French Polynesia",
        "TF":"French Southern Territories",
        "GA":"Gabon",
        "GM":"Gambia",
        "GE":"Georgia",
        "DE":"Germany",
        "GH":"Ghana",
        "GI":"Gibraltar",
        "GR":"Greece",
        "GL":"Greenland",
        "GD":"Grenada",
        "GP":"Guadeloupe",
        "GU":"Guam",
        "GT":"Guatemala",
        "GG":"Guernsey",
        "GN":"Guinea",
        "GW":"Guinea-Bissau",
        "GY":"Guyana",
        "HT":"Haiti",
        "HM":"Heard Island and McDonald Islands",
        "VA":"Holy See (Vatican City State)",
        "HN":"Honduras",
        "HK":"Hong Kong",
        "HU":"Hungary",
        "IS":"Iceland",
        "IN":"India",
        "ID":"Indonesia",
        "IR":"Iran",
        "IQ":"Iraq",
        "IE":"Ireland",
        "IM":"Isle of Man",
        "IL":"Israel",
        "IT":"Italy",
        "JM":"Jamaica",
        "JP":"Japan",
        "JE":"Jersey",
        "JO":"Jordan",
        "KZ":"Kazakhstan",
        "KE":"Kenya",
        "KI":"Kiribati",
        "KP":"Korea, Democratic People's Republic of",
        "KR":"Korea, Republic of",
        "XK":"Kosovo",
        "KW":"Kuwait",
        "KG":"Kyrgyzstan",
        "LA":"Lao People's Democratic Republic",
        "LV":"Latvia",
        "LB":"Lebanon",
        "LS":"Lesotho",
        "LR":"Liberia",
        "LY":"Libya",
        "LI":"Liechtenstein",
        "LT":"Lithuania",
        "LU":"Luxembourg",
        "MO":"Macao",
        "MK":"Macedonia",
        "MG":"Madagascar",
        "MW":"Malawi",
        "MY":"Malaysia",
        "MV":"Maldives",
        "ML":"Mali",
        "MT":"Malta",
        "MH":"Marshall Islands",
        "MQ":"Martinique",
        "MR":"Mauritania",
        "MU":"Mauritius",
        "YT":"Mayotte",
        "MX":"Mexico",
        "FM":"Micronesia",
        "MD":"Moldova",
        "MC":"Monaco",
        "MN":"Mongolia",
        "ME":"Montenegro",
        "MS":"Montserrat",
        "MA":"Morocco",
        "MZ":"Mozambique",
        "MM":"Myanmar",
        "NA":"Namibia",
        "NR":"Nauru",
        "NP":"Nepal",
        "NL":"Netherlands",
        "NC":"New Caledonia",
        "NZ":"New Zealand",
        "NI":"Nicaragua",
        "NE":"Niger",
        "NG":"Nigeria",
        "NU":"Niue",
        "NF":"Norfolk Island",
        "MP":"Northern Mariana Islands",
        "NO":"Norway",
        "OM":"Oman",
        "PK":"Pakistan",
        "PW":"Palau",
        "PS":"Palestine",
        "PA":"Panama",
        "PG":"Papua New Guinea",
        "PY":"Paraguay",
        "PE":"Peru",
        "PH":"Philippines",
        "PN":"Pitcairn",
        "PL":"Poland",
        "PT":"Portugal",
        "PR":"Puerto Rico",
        "QA":"Qatar",
        "RE":"Reunion",
        "RO":"Romania",
        "RU":"Russian Federation",
        "RW":"Rwanda",
        "BL":"Saint Barthélemy",
        "SH":"Saint Helena, Ascension and Tristan da Cunha",
        "KN":"Saint Kitts and Nevis",
        "LC":"Saint Lucia",
        "SX":"Saint Martin (French part)",
        "MF":"Sint Maarten (Dutch part)",
        "PM":"Saint Pierre and Miquelon",
        "VC":"Saint Vincent and the Grenadines",
        "WS":"Samoa",
        "SM":"San Marino",
        "ST":"Sao Tome and Principe",
        "SA":"Saudi Arabia",
        "SN":"Senegal",
        "RS":"Serbia",
        "SC":"Seychelles",
        "SL":"Sierra Leone",
        "SG":"Singapore",
        "SK":"Slovakia",
        "SI":"Slovenia",
        "SB":"Solomon Islands",
        "SO":"Somalia",
        "ZA":"South Africa",
        "GS":"South Georgia and the South Sandwich Islands",
        "SS":"South Sudan",
        "ES":"Spain",
        "LK":"Sri Lanka",
        "SD":"Sudan",
        "SR":"Suriname",
        "SJ":"Svalbard and Jan Mayen",
        "SZ":"Swaziland",
        "SE":"Sweden",
        "CH":"Switzerland",
        "SY":"Syria",
        "TW":"Taiwan",
        "TJ":"Tajikistan",
        "TZ":"Tanzania",
        "TH":"Thailand",
        "TL":"Timor-Leste",
        "TG":"Togo",
        "TK":"Tokelau",
        "TO":"Tonga",
        "TT":"Trinidad and Tobago",
        "TN":"Tunisia",
        "TR":"Turkey",
        "TM":"Turkmenistan",
        "TC":"Turks and Caicos Islands",
        "TV":"Tuvalu",
        "UG":"Uganda",
        "UA":"Ukraine",
        "AE":"United Arab Emirates",
        "GB":"United Kingdom",
        "US":"United States",
        "UM":"United States Minor Outlying Islands",
        "UY":"Uruguay",
        "UZ":"Uzbekistan",
        "VU":"Vanuatu",
        "VE":"Venezuela",
        "VN":"Vietnam",
        "VG":"Virgin Islands, British",
        "VI":"Virgin Islands (U.S.)",
        "WF":"Wallis and Futuna",
        "EH":"Western Sahara",
        "YE":"Yemen",
        "ZM":"Zambia",
        "ZW":"Zimbabwe"
    }
    MktoForms2.loadForm("//app-sj02.marketo.com", "769-NOZ-917", 6869, function(form) {
        console.log("Marketo form loaded");

        for (let i = 0; i < order.items.length; i++) {
            let marketoOrderLineItem = order.items[i]
            let marketoResourceID = marketoOrderLineItem.ppeNum;
            let marketoQuantity = marketoOrderLineItem.quantity;
            let marketoResource = marketoOrderLineItem.title;

            marketoWebvisits.push('resourceID='+marketoResourceID+'&type=printed&resource='+marketoResource+'&quantity='+marketoQuantity);
            marketoOrder = marketoOrder + (marketoOrder == '' ? '':'\n') + 'Resource : '+ marketoResource + ' | Format : printed | Quantity : '+ marketoQuantity +' | ID :'+ marketoResourceID;  // add to the order that will be sent to Marketo
        }

        form.addHiddenFields({ // create hidden fields in Marketo form and populate with values from Wordpress form for all fields except address and opt in
            "FirstName": order.firstName,
            "LastName": order.lastName,
            "Email": order.email,
            "Address_lead": order.address1 + ((order.address1 || order.address2) ? '\n' : '') + order.address2,
            "PostalCode": order.postCode,
            "City": order.city,
            "Country": convertISOtoMarketoCountry[order.country],
            "THV_Role__c": order.occupation ,
            "tHVResourcesFulfilment" : marketoOrder,
            "Lead_Source_Details__c" : "Resource library : " +window.location.href.split(/[?#]/)[0]
        });

        if(order.newsletterSignup==1) { // If opt in
            form.addHiddenFields({ // create hidden fields in Marketo form and populate with values from Wordpress form for opt-in field
                "marketingRequested": 'yes'
            });
        }

        form.onSuccess(function( ) {  // prevent default Marketo form submit action
            console.log( "Marketo form submitted" );
            for (let i = 0; i < marketoWebvisits.length; i++) {
                console.log('params: :'+marketoWebvisits[i]);
                Munchkin.munchkinFunction('visitWebPage', { // log a page visit to Marketo with details passed as parameters
                        'url': window.location.href.split(/[?#]/)[0],
                        'params': marketoWebvisits[i]
                    }
                );
            }
            return false;  // prevent default Marketo form submit action
        });
        form.submit(); // submit the Marketo form
    });
</script>
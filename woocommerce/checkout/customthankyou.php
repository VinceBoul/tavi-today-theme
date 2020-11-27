<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/customthankyou.php.
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

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">

    <?php
    if ( $order ) :

        do_action( 'woocommerce_before_thankyou', $order->get_id() );
        ?>

        <?php if ( $order->has_status( 'failed' ) ) : ?>

        <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

        <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
            <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
            <?php if ( is_user_logged_in() ) : ?>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
            <?php endif; ?>
        </p>

    <?php else : ?>



        <h1 class="elementor-heading-title elementor-size-default">Thank you!</h1></div>

        <div class="elementor-text-editor elementor-clearfix"><p>Your order has been placed and materials will be sent to you in the within 14 days.</p></div>


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

        ?>  <script>var order = <?php
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
                    "items"=> $products
                ));?>;
            </script>

    <?php endif; ?>

        <?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
        <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

    <?php else : ?>

        <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

    <?php endif; ?>

</div>
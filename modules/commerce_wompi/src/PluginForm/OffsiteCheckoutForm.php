<?php

namespace Drupal\commerce_wompi\PluginForm;

use Drupal\commerce_payment\PluginForm\PaymentOffsiteForm as BasePaymentOffsiteForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountProxy;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;

/**
 * Offsite Redeban Form.
 */
class OffsiteCheckoutForm extends BasePaymentOffsiteForm implements ContainerInjectionInterface {

  protected AccountProxy $currentUser;

  /**
   * Constructs a new OffsiteCheckoutForm object.
   *
   * @param \Drupal\Core\Session\AccountProxy $current_user
   *   The entity type manager.
   */
  public function __construct(AccountProxy $current_user) {
    $this->currentUser = $current_user;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): static {
    return new static(
      $container->get('current_user')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state): array {
    $form = parent::buildConfigurationForm($form, $form_state);
    /** @var \Drupal\commerce_payment\Entity\Payment $payment */
    $payment = $this->entity;
    $payment_gateway_plugin = $payment->getPaymentGateway()->getPlugin();

    $public_key = $payment_gateway_plugin->getConfiguration()['public_key'];
    /** @var \Drupal\commerce_order\Entity\Order $order */
    $order = $payment->getOrder();

    $form['#attributes'] = ['class' => ['wompi-button']];
    $form['#attached']['library'][] = 'commerce_wompi/checkout';

    $form['help'] = [
      '#markup' => $this->t('<h3>Select the payment method by clicking on the following button.</h3>')
    ];

    $form['payment_form'] = [
      '#type' => 'inline_template',
      '#template' =>
      '<script
          src="https://checkout.wompi.co/widget.js"
          data-render="button"
          data-public-key="' . $public_key . '"
          data-currency="COP"
          data-amount-in-cents="' . intval($order->getTotalPrice()->getNumber()) . '00"
          data-reference="' . $order->id() . '"
          data-redirect-url="' . $form['#return_url'] . '"
          >
        </script>',
    ];

    $form['actions'] = [
      '#type' => 'actions',
    ];

    $form['actions']['cancel'] = [
      '#type' => 'link',
      '#title' => $this->t('Cancelar'),
      '#url' => $form['#cancel_url'],
    ];

    return $form;
  }

}

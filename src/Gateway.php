<?php
/**
 * Gateway Class Doc Comment
 *
 * @category Class
 * @package  Omnipay\Payzw
 * @author   pnrhost <privyreza@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://github.com/pnrhost/omnipay-payzw
 */
namespace Omnipay\Payzw;

use Omnipay\Common\AbstractGateway;
use Omnipay\Payzw\Message\AuthorizeRequest;


/**
 * Omninpay-payzw Gateway.php
 * 
 * Class summary
 * A longer class description 
 *
 * @category Class
 * @package  Omnipay\Payzw
 * @author   pnrhost <privyreza@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://github.com/pnrhost/omnipay-payzw
 *
 * 
 * ### Example
 *
 * <code>
 * // Create a gateway for the Dummy Gateway
 * // (routes to GatewayFactory::create)
 * $gateway = Omnipay::create('Dummy');
 *
 * // Initialise the gateway
 * $gateway->initialize(array(
 *     'testMode' => true, // Doesn't really matter what you use here.
 * ));
 *
 * // Create a credit card object
 * // This card can be used for testing.
 * $card = new CreditCard(array(
 *             'firstName'    => 'Example',
 *             'lastName'     => 'Customer',
 *             'number'       => '4242424242424242',
 *             'expiryMonth'  => '01',
 *             'expiryYear'   => '2020',
 *             'cvv'          => '123',
 * ));
 *
 * // Do a purchase transaction on the gateway
 * $transaction = $gateway->purchase(array(
 *     'amount'                   => '10.00',
 *     'currency'                 => 'AUD',
 *     'card'                     => $card,
 * ));
 * $response = $transaction->send();
 * if ($response->isSuccessful()) {
 *     echo "Purchase transaction was successful!\n";
 *     $sale_id = $response->getTransactionReference();
 *     echo "Transaction reference = " . $sale_id . "\n";
 * }
 * </code>
 */
class Gateway extends AbstractGateway
{
    /**
     * Get the name for the gateway
     * 
     * @return string
     */
    public function getName()
    {
        return 'Payzw';
    }
    /**
     * Set default gateway parameters
     *
     * @return type
     */
    public function getDefaultParameters()
    {
        return array();
    }
    /**
     * Create an authorize request.
     *
     * @param array $parameters send data from website to be authorised
     * 
     * @return \Omnipay\Payzw\Message\AuthorizeRequest
     */
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('AuthorizeRequest', $parameters);
    }
    /**
     * Create a purchase request.
     *
     * @param array $parameters purchase details
     * 
     * @return \Omnipay\Payzw\Message\AuthorizeRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->authorize($parameters);
    }
}

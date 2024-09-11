<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Aissistant\Communication;

use Aissistant\Client\Aissistant\AissistantClientInterface;
use Pyz\Zed\AddressValidator\Business\AddressValidatorFacadeInterface;
use Pyz\Zed\Aissistant\AissistantDependencyProvider;
use Pyz\Zed\StripePayment\Business\StripePaymentFacadeInterface;
use Pyz\Zed\StripePayment\StripePaymentDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use Spryker\Zed\Translator\Business\TranslatorFacadeInterface;

/**
 * @method \Pyz\Shared\StripePayment\StripePaymentConfig getConfig()
 * @method \Pyz\Zed\StripePayment\Business\StripePaymentFacadeInterface getFacade()
 */
class AissistantCommunicationFactory extends AbstractCommunicationFactory
{

    /**
     * @return \Pyz\Zed\StripePayment\Business\StripePaymentFacadeInterface
     */
    public function getAissistantClient(): AissistantClientInterface
    {
        return $this->getProvidedDependency(AissistantDependencyProvider::AISSISTANT_CLIENT);
    }
}

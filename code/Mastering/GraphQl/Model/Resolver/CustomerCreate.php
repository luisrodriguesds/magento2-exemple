<?php

declare(strict_types=1);

namespace Mastering\GraphQl\Model\Resolver;

// use Magento\Authorization\Model\UserContextInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
// use Magento\Framework\Exception\NoSuchEntityException;
// use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Config\Element\Field;
// use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
// use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\Resolver\ValueFactory;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Customer\Model\CustomerFactory;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;
// use Magento\Framework\Webapi\ServiceOutputProcessor;
// use Magento\Framework\Api\ExtensibleDataObjectConverter;

/**

 * Customers field resolver, used for GraphQL request processing.

 */

class CustomerCreate implements ResolverInterface {

    /**

     * @var ValueFactory

     */
    private $valueFactory;

    /**

     * @var CustomerFactory

     */
    private $customerFactory;

    /**

     * @param ValueFactory $valueFactory

     * @param CustomerFactory $customerFactory

     */
    public function __construct(
        ValueFactory $valueFactory,
        CustomerFactory $customerFactory,
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->valueFactory = $valueFactory;
        $this->customerFactory = $customerFactory;
        $this->customerRepository = $customerRepository;
    }

    /**

     * {@inheritdoc}

     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)  {
        print_r(array(0 => $args, 1 => count($args)));
        $customerResolve['entity_id'] = 3;
        $customerResolve['website_id'] = 3;
        $customerResolve['firstname'] = 'Firstname teste';
        $customerResolve['lastname'] = 'Lastname teste';
        $customerResolve['email'] = 'test@test.com';

        return $customerResolve;
    }

    /* Obs array
    * is_array($array) = verifica se uma determinada variável é um array.
    * in_array($valor, $array) = verifica se um determinado valor existe em alguma posição do array.
    * array_keys($array) = retorna um novo arrays com as chaves do arrays passado como parâmetro.
    * array_values($array) = retorna um novo array com os valores do array passado como parâmetro.
    * array_merge($array1, $array2) = agrega o conteúdo dos dois arrays.
    * array_pop($array) = exlui a ultima posição do array.
    * array_shift($array) = exclui a primeira posição do array.
    * array_unshift($array, "valor") = adiciona um ou mais elementos no início do array.
    * array_push($array, "valor1", "valor2") = adiciona um ou mais elementos no final do array.
    * array_combine($keys, $values) = mescla os dois arrays passados.
    * array_sum() = calcula a soma dos elementos de array.
    * explode("/", "20/01/2001") = transforma strings em array.
    * implode("-", $array) = transforma array em string.
    */
}

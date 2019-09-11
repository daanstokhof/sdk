<?php

declare(strict_types=1);

namespace PayNL\Sdk\Hydrator;

use PayNL\Sdk\Exception\InvalidArgumentException;
use PayNL\Sdk\Validator\ObjectInstance as ObjectInstanceValidator;
use Zend\Hydrator\ClassMethods;
use PayNL\Sdk\Model\Statistics as StatisticsModel;

/**
 * Class Statistics
 *
 * @package PayNL\Sdk\Hydrator
 *
 * @deprecated
 */
class Statistics extends ClassMethods
{
    /**
     * Address constructor.
     *
     * @param bool $underscoreSeparatedKeys
     * @param bool $methodExistsCheck
     */
    public function __construct($underscoreSeparatedKeys = true, $methodExistsCheck = false)
    {
        // override the given params
        parent::__construct(false, true);
    }

    /**
     * @inheritDoc
     *
     * @throws InvalidArgumentException when given object is not an instance of Statistics model
     *
     * @return StatisticsModel
     */
    public function hydrate(array $data, $object): StatisticsModel
    {
        $instanceValidator = new ObjectInstanceValidator();
        if (false === $instanceValidator->isValid($object, StatisticsModel::class)) {
            throw new InvalidArgumentException(
                implode(PHP_EOL, $instanceValidator->getMessages())
            );
        }

        $optionalFields = [
            'promoterId',
            'info',
            'tool',
            'extra1',
            'extra2',
            'extra3',
        ];

        foreach ($optionalFields as $optionalField) {
            if (false === array_key_exists($optionalField, $data) || true === empty($data[$optionalField])) {
                $data[$optionalField] = '';
            }
        }
        if (false === array_key_exists('transferData', $data)) {
            $data['transferData'] = [];
        }

        /** @var StatisticsModel $statistics */
        $statistics = parent::hydrate($data, $object);
        return $statistics;
    }
}

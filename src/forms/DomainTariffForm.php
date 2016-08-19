<?php

namespace hipanel\modules\finance\forms;

use hipanel\modules\finance\models\DomainResource;
use hipanel\modules\finance\models\Tariff;
use yii\web\UnprocessableEntityHttpException;

class DomainTariffForm extends AbstractTariffForm
{
    /**
     * @var array Domain zones
     * Key - zone name (com, net, ...)
     * Value - zone id
     * @see getZones
     */
    protected $zones;

    /**
     * @param array $zones
     * @param Tariff $baseTariff
     * @param Tariff $tariff
     * @return $this
     */
    public function fill($zones, Tariff $baseTariff, Tariff $tariff = null)
    {
        $this->tariff = isset($tariff) ? $tariff : $baseTariff;
        $this->baseTariff = $baseTariff;
        $this->zones = array_flip($zones);

        if (isset($tariff)) {
            $this->id = $this->tariff->id ?: null;
            $this->name = $this->tariff->name;
        }

        $this->parent_id = $this->baseTariff->id;

        return $this;
    }

    public function load($data)
    {
        $this->setAttributes($data[$this->formName()]);
        $this->setResources($data[(new DomainResource())->formName()]);

        return true;
    }

    public function setResources($resources)
    {
        $result = [];
        foreach ($resources as $resource) {
            if ($resource instanceof DomainResource) {
                $result[] = $resource;
                continue;
            }

            $model = new DomainResource(['scenario' => 'create']);

            if ($model->load($resource, '') && $model->validate()) {
                $result[] = $model;
            } else {
                throw new UnprocessableEntityHttpException('Failed to load resource model');
            }
        }

        $this->_resources = $result;

        return $this;
    }

    public function getZoneResources($zone)
    {
        $id = $this->zones[$zone];

        $result = [];

        foreach ($this->tariff->resources as $resource) {
            if ($resource->object_id == $id && $resource->isTypeCorrect()) {
                $result[$resource->type] = $resource;
            }
        }

        // sorts $result by order of $resource->getAvailableTypes()
        $result = array_merge($resource->getAvailableTypes(), $result);

        return $result;
    }

    public function getZoneBaseResources($zone)
    {
        $id = $this->zones[$zone];

        $result = [];

        foreach ($this->baseTariff->resources as $resource) {
            if ($resource->object_id == $id && $resource->isTypeCorrect()) {
                $result[$resource->type] = $resource;
            }
        }

        // sorts $result by order of $resource->getAvailableTypes()
        $result = array_merge($resource->getAvailableTypes(), $result);

        return $result;
    }

    public function getZones()
    {
        return $this->zones;
    }
}

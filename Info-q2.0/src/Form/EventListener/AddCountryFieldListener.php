<?php

namespace App\Form\EventListener;

use App\Entity\Country;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;

class AddCountryFieldListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT => 'preSubmit'
        );
    }

    private function addCountryForm($form, $country = null)
    {
        $formOptions = array(
            'class' => Country::class,
            'placeholder' => 'Selecciona...',
            'mapped' => false,
            'choice_label' => 'name'
        );

        if ($country) {
            $formOptions['data'] = $country;
        }

        $form->add('country', EntityType::class, $formOptions);
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $accessor = PropertyAccess::createPropertyAccessor();

        $city = $accessor->getValue($data, 'city');
        $country = ($city) ? $city->getCountry() : null;

        $this->addCountryForm($form, $country);
    }

    public function preSubmit(FormEvent $event)
    {
        $form = $event->getForm();

        $this->addCountryForm($form);
    }
}
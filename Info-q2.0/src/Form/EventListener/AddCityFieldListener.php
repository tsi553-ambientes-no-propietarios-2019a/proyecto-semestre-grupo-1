<?php

namespace App\Form\EventListener;

use App\Entity\City;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;

class AddCityFieldListener implements EventSubscriberInterface {

    public static function getSubscribedEvents(){
        return array(
            FormEvents::PRE_SET_DATA  => 'preSetData',
            FormEvents::PRE_SUBMIT    => 'preSubmit'
        );
    }

    private function addCityForm($form, $country_id){
        $formOptions = array(
            'class'         => City::class,
            'query_builder' => function (EntityRepository $repository) use ($country_id) {
                return $repository->createQueryBuilder('city')
                    ->innerJoin('city.country', 'country')
                    ->where('country.id = :country')
                    ->setParameter('country', $country_id)
                ;
            },
           // 'choice_label' => 'name'
        );

        $form->add('city', EntityType::class, $formOptions);
    }

    public function preSetData(FormEvent $event){
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $accessor    = PropertyAccess::createPropertyAccessor();

        $city        = $accessor->getValue($data, 'city');
        $country_id = ($city) ? $city->getCountry()->getId() : null;

        $this->addCityForm($form, $country_id);
    }

    public function preSubmit(FormEvent $event){
        $data = $event->getData();
        $form = $event->getForm();

        $country_id = array_key_exists('country', $data) ? $data['country'] : null;

        $this->addCityForm($form, $country_id);
    }
}
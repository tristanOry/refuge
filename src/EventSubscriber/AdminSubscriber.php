<?php

namespace App\EventSubscriber;

use App\Entity\Animal;
use App\Entity\Article;
use App\Entity\Race;
use App\Interfaces\TimestampedInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AdminSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents(): array
    {
        return [
            BeforeEntityPersistedEvent::class => [
                'setDefaultValues',
            ],
            BeforeEntityUpdatedEvent::class => [
                'setDefaultValues',
            ]
        ];
    }

    public function setDefaultValues(BeforeEntityPersistedEvent|BeforeEntityUpdatedEvent $event): void
    {
        $entity = $event->getEntityInstance();

        switch ($entity::class) {
            case Animal::class:
                dd($entity);
                $this->completeAnimal($entity);
                break;
            case Article::class:
                $this->setTimestamp($entity);
                break;
            case Race::class:
                break;
        }
    }

    public function setTimestamp(TimestampedInterface $entity): void
    {
        $entity->setUpdatedAt(new \DateTime());
        if(is_null($entity->getCreatedAt())) {
            $entity->setCreatedAt($entity->getUpdatedAt());
        }
    }

    public function completeAnimal(Animal $animal): void
    {
        if(is_null($animal->getIncomeDate())) {
            dd($animal);
            $animal->setIncomeDate(new \DateTime());
        }
    }
}
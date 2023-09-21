<?php

namespace Drupal\ccc_custom\EventSubscriber;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Drupal\views\Views;
use Drupal\views\ViewExecutable;
use Drupal\user\Entity\User;
use Drupal\Core\Url;


class ProfileSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public function checkForRedirection(GetResponseEvent $event) {


    //entity.user.canonical
    $route_name = \Drupal::routeMatch()->getRouteName();

    $user = User::load(\Drupal::currentUser()->id());
    $userID = $user->id();
    $roles = $user->getRoles();

    if (($route_name == 'user.page' || $route_name == 'entity.user.canonical') && ($userID !== '1' && !in_array('administrator', $roles))){

      $response =  new RedirectResponse('/owners');
      $response->send();
      return;
    }

  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = array('checkForRedirection');
    return $events;
  }

}
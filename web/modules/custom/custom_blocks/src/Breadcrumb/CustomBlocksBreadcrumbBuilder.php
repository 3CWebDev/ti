<?php


namespace Drupal\custom_blocks\Breadcrumb;


use Drupal\Core\Breadcrumb\Breadcrumb;
use Drupal\Core\Breadcrumb\BreadcrumbBuilderInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Link;
use LinkGeneratorTrait;
use StringTranslationTrait;

class CustomBlocksBreadCrumbBuilder implements BreadcrumbBuilderInterface {


  /**
   * @inheritdoc
   */
  public function applies(RouteMatchInterface $route_match) {
    // This breadcrumb apply only for some views.
    $parameters = $route_match->getParameters()->all();

    if (isset($parameters['node'])) {

      if ($parameters['node']->type->getString() == 'owner_doc') {
        return TRUE;
      }
      return FALSE;
    }
  }

  /**
   * @inheritdoc
   */
  public function build(RouteMatchInterface $route_match) {

    // Breadcrumbs set up (cache settings are so important!).
    //$breadcrumb->addCacheTags(["view_id:{$parameters['view_id']}"]);

    $breadcrumb = new Breadcrumb();
    $breadcrumb->addCacheContexts(["url"]);


    $parameters = $route_match->getParameters()->all();

    if (isset($parameters['node'])) {
      if ($parameters['node']->type->getString() == 'owner_doc') {

        $breadcrumb->addLink(Link::createFromRoute('Home', '<front>'));
        $breadcrumb->addLink(Link::createFromRoute(t('All Documents'), 'view.owner_documents.page_1'));

        
      }
    }

    // Reverse order for this to work!!!.
    //$breadcrumb->addLink(Link::createFromRoute('Home', '<front>'));
    return $breadcrumb;
  }

}
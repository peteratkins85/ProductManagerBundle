<?php

namespace App\Oni\ProductManagerBundle\Datatables;

use Sg\DatatablesBundle\Datatable\View\AbstractDatatableView;
use Sg\DatatablesBundle\Datatable\View\Style;

/**
 * Class ProductCategoryDatatable
 *
 * @package Oni\ProductManagerBundle\Datatables
 */
class ProductCategoryDatatable extends AbstractDatatableView
{
    /**
     * {@inheritdoc}
     */
    public function buildDatatable(array $options = [])
    {
        $this->topActions->set([
            'start_html' => '<div class="row"><div class="col-sm-3">',
            'end_html'   => '<hr></div></div>',
            'actions'    => [
                [
                    'route'      => $this->router->generate('oni_add_category'),
                    'label'      => $this->translator->trans('datatables.actions.new'),
                    'icon'       => 'glyphicon glyphicon-plus',
                    'attributes' => [
                        'rel'   => 'tooltip',
                        'title' => $this->translator->trans('datatables.actions.new'),
                        'class' => 'btn btn-primary',
                        'role'  => 'button'
                    ],
                ]
            ]
        ]);

        $this->features->set([
            'auto_width'      => true,
            'defer_render'    => false,
            'info'            => true,
            'jquery_ui'       => true,
            'length_change'   => true,
            'ordering'        => true,
            'paging'          => true,
            'processing'      => true,
            'scroll_x'        => false,
            'scroll_y'        => '',
            'searching'       => true,
            'state_save'      => false,
            'delay'           => 0,
            'extensions'      => [],
            'highlight'       => false,
            'highlight_color' => 'red',
        ]);

        $this->ajax->set([
            'url'      => $this->router->generate('oni_ajax_get_product_categories'),
            'type'     => 'GET',
            'pipeline' => 0
        ]);

        $this->options->set([
            'display_start'                 => 0,
            'defer_loading'                 => -1,
            'dom'                           => 'lfrtip',
            'length_menu'                   => [10, 25, 50, 100],
            'order_classes'                 => true,
            'order'                         => [[0, 'asc']],
            'order_multi'                   => true,
            'page_length'                   => 10,
            'paging_type'                   => Style::FULL_NUMBERS_PAGINATION,
            'renderer'                      => '',
            'scroll_collapse'               => false,
            'search_delay'                  => 0,
            'state_duration'                => 7200,
            'stripe_classes'                => [],
            'class'                         => Style::BOOTSTRAP_3_STYLE. ' tabl-condensed',
            'individual_filtering'          => false,
            'individual_filtering_position' => 'head',
            'use_integration_options'       => false,
            'force_dom'                     => false,
            'row_id'                        => 'id'
        ]);

        $this->columnBuilder
            ->add('id', 'column', [
                'title' => 'Id',
            ])
            ->add('name', 'column', [
                'title' => 'Name',
            ])
            ->add('parent.name', 'column', [
                'title' => 'Parent Category',
            ])
            ->add('url', 'column', [
                'title' => 'Url',
            ])
            ->add(null, 'action', [
                'title'   => $this->translator->trans('datatables.actions.title'),
                'actions' => [
                    [
                        'route'            => 'oni_edit_category',
                        'route_parameters' => [
                            'id' => 'id'
                        ],
                        'label'            => $this->translator->trans('datatables.actions.edit'),
                        'icon'             => 'icon-edit',
                        'attributes'       => [
                            'rel'   => 'tooltip',
                            'title' => $this->translator->trans('datatables.actions.edit'),
                            'class' => 'btn btn-primary btn-mini',
                            'role'  => 'button'
                        ],
                    ],
                    [
                        'route'            => 'oni_delete_category',
                        'route_parameters' => [
                            'id' => 'id'
                        ],
                        'label'            => $this->translator->trans('datatables.actions.delete'),
                        'icon'             => 'icon-remove',
                        'attributes'       => [
                            'rel'   => 'tooltip',
                            'title' => $this->translator->trans('datatables.actions.edit'),
                            'class' => 'btn btn-danger btn-mini',
                            'role'  => 'button'
                        ],
                    ]
                ]
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getEntity()
    {
        return 'Oni\ProductManagerBundle\Entity\ProductCategory';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'productcategory_datatable';
    }
}

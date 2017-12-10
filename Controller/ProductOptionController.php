<?php

namespace App\Oni\ProductManagerBundle\Controller;

use App\Oni\CoreBundle\Common\DataTable;
use App\Oni\CoreBundle\Controller\CoreController;
use App\Oni\ProductManagerBundle\Entity\ProductOption;
use App\Oni\ProductManagerBundle\Entity\ProductOptionGroup;
use App\Oni\ProductManagerBundle\Form\ProductOptionGroupForm;
use App\Oni\ProductManagerBundle\Service\DataTable\ProductOptionGroupDataTable;
use App\Oni\ProductManagerBundle\Service\ProductOptionService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ProductOptionController
 * @package Oni\ProductManagerBundle\Controller
 * @author peter.atkins85@gmail.com
 */
class ProductOptionController extends CoreController
{

    /**
     * @var ProductOptionService
     */
    private $productOptionService;

    /**
     * @var ProductOptionGroupDataTable
     */
    protected $productOptionGroupDataTable;

    /**
     * ProductOptionController constructor.
     * @param ProductOptionService $productOptionService
     * @param ProductOptionGroupDataTable $productOptionGroupDataTable
     */
    public function __construct(
        ProductOptionService $productOptionService,
        DataTable $productOptionGroupDataTable
    )
    {
        $this->productOptionService = $productOptionService;
        $this->productOptionGroupDataTable = $productOptionGroupDataTable;
    }

    public function indexAction()
    {
        return $this->render('@ProductManager/ProductOption/index.html.twig', [
            'name' => 'Product Option Groups'
        ]);
    }

    public function getOptionGroupListAction(Request $request)
    {
        $response = $this->productOptionGroupDataTable->getResults();

        return new JsonResponse($response);
    }

    public function addOptionAction(Request $request)
    {
        $productOptionGroup = new ProductOption();
        $productOptionGroupForm = $this->createForm(ProductOptionGroupForm::class, $productOptionGroup);

        if ($request->isMethod('POST')) {

            $productOptionGroupForm->handleRequest($request);

            if ($productOptionGroupForm->isSubmitted() && $productOptionGroupForm->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $em->persist($productOptionGroup);

                $em->flush();

                $this->addFlash('notice', $this->translator->trans('product_group_option_added'));

                return $this->redirectToRoute('oni_product_list');

            } else {
                $this->flashErrors($productOptionGroupForm);
            }

        }

        return $this->render('ProductManagerBundle:ProductOption:add-group.html.twig', array(
            'pageName' => $this->get('translator')->trans('product_bundle.add.product.category'),
            'form' => $productOptionGroupForm->createView()
        ));
    }

    public function addGroupAction(Request $request)
    {
        $productOptionGroup = new ProductOptionGroup();
        $productOptionGroupForm = $this->createForm(ProductOptionGroupForm::class, $productOptionGroup);

        if ($request->isMethod('POST')) {

            $productOptionGroupForm->handleRequest($request);

            if ($productOptionGroupForm->isSubmitted() && $productOptionGroupForm->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $em->persist($productOptionGroup);

                $em->flush();

                $this->addFlash('notice', $this->translator->trans('product_group_option_added'));

                return $this->redirectToRoute('oni_add_product_option_group_list');

            } else {
                $this->flashErrors($productOptionGroupForm);
            }

        }

        return $this->render('ProductManagerBundle:ProductOption:add-group.html.twig', array(
            'pageName' => $this->get('translator')->trans('product_bundle.add.product.category'),
            'form' => $productOptionGroupForm->createView()
        ));
    }


    public function editGroupAction($id, Request $request)
    {
        $productOptionGroup = $this->productOptionService->getProductOptionGroupsById($id);
        $productOptionGroupForm = $this->createForm(ProductOptionGroupForm::class, $productOptionGroup);

        if ($request->isMethod('POST')) {

            $productOptionGroupForm->handleRequest($request);

            if ($productOptionGroupForm->isSubmitted() && $productOptionGroupForm->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $em->persist($productOptionGroup);

                $em->flush();

                $this->addFlash('notice', $this->translator->trans('product_group_option_added'));

                return $this->redirectToRoute('oni_add_product_option_group_list');

            } else {
                $this->flashErrors($productOptionGroupForm);
            }

        }

        return $this->render('ProductManagerBundle:ProductOption:add-group.html.twig', array(
            'pageName' => $this->get('translator')->trans('product_bundle.add.product.category'),
            'form' => $productOptionGroupForm->createView()
        ));
    }

    public function deleteGroupAction($id)
    {
        $this->denyAccessUnlessGranted('ROLE_ONI_ADMIN', null, 'Unable to access!');
        $productOptionGroup = $this->productOptionService->getProductOptionGroupsById($id);

        if ($productOptionGroup) {

            $em = $this->getDoctrine()->getManager();
            $em->remove($productOptionGroup);
            $em->flush();
            $this->addFlash('notice', $this->translator->trans('product_bundle.product.option.group.deleted'));

        } else {

            $this->addFlash('error', $this->translator->trans('product_bundle.invalid.product.option.group.id'));

        }

        return $this->redirectToRoute('oni_add_product_option_group_list');
    }

}

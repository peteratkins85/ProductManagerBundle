<?php

namespace Oni\ProductManagerBundle\Controller;

use Oni\CoreBundle\Controller\CoreController;
use Oni\ProductManagerBundle\Entity\ProductPrices;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductPriceController extends CoreController
{


    public function deleteAction($id)
    {
        $productPrice = $this->getDoctrine()->getRepository(ProductPrices::class)->find($id);

        if ($productPrice) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($productPrice);
            $em->flush();

            return new JsonResponse([
                'status' => true,
                'messages' => $this->translator->trans('product_bundle.product.price.deleted'),
            ]);

        } else {
            return new JsonResponse([
                'status' => false,
                'messages' => $this->translator->trans('product_bundle.invalid.product.price.id', ['id' => $id]),
            ]);
        }
    }
}

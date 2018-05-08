<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use AppBundle\Entity\Review;



/**
 * Listing controller.
 *
 * @Route("review")
 */

class ReviewController extends Controller
{

    /**
     * List one reservation with one flight and one planemodel, with few IDs.
     *
     * @Route("/{review_id}", name="review_index", requirements={"review_id": "\d+"})
     * @Method("GET")
     * @ParamConverter("review", options={"mapping": {"review_id": "id"}})
     */
    public function indexAction(Review $review)
    {
        return $this->render('review/index.html.twig', array(
            'review' => $review
        ));
    }

    /**
     * Creates a new review entity.
     *
     * @Route("/new/", name="review_new")
     * @Method({"GET", "POST"})
     */
    public function newAction()
    {

        return $this->render('review/new.html.twig');
    }

}

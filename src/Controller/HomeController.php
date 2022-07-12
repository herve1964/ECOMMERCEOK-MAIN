<?php
// pour creer HomeController faire symfony 
//console make:controller HomeController


namespace App\Controller;

use Faker\Faker;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(EntityManagerInterface $em)
    {

        /* echo \Faker\Name::name();*/
        $productRepository = $em->getRepository(Product::class);
        $product = $productRepository->find(3);
        /*  $em->remove($product);
*/
        $em->flush();

        return $this->render('home.html.twig');
    }
}

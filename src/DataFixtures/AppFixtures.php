<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    protected $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }


    public function load(ObjectManager $manager): void

    {


        // $faker = Factory::create();
        // $faker->addProvider(new Liior\Faker\Prices($faker));

        for ($p = 0; $p < 100; $p++) {

            $product = new Product;
            //  $product->setname($faker->name)
            //     ->setPrice(mt_rand(100, 200))
            //     ->setSlug($this->slugger->slug($product->getName()));
            //$manager->persist($product);
        }



        // $manager->flush();
    }
}

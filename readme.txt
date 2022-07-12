composer create-project symfony/website-skeleton ecommerceok
pour la barre debug installer :  composer require symfony/apache-pack
base de donéé
php bin/console doctrine:database:create
composer require maker
php bin/console make:entity
creer class Product   
champs : name  string tout par defaut
champs : price  integer tout par defaut
php bin/console make:migration
php bin/console doctrine:migrations:migrate
pour recuper des enregistrement
public function homepage(ProductRepository $productRepository)
  
    {
        $product = $productRepository->findAll();
        dump($product);
        return $this->render('home.html.twig');
    }
    public function homepage(ProductRepository $productRepository)
    {
        $product = $productRepository->findAll();
        dump($product);
        return $this->render('home.html.twig');
    }

    creer un produit dans la base de donnee
     public function homepage(EntityManagerInterface $em)
    {
        $product = new Product;
        $product
            ->setName('Table en métal')
            ->setPrice('5000')
            ->setSlug('Table-en-métal');
        $em->persist($product);
        $em->flush();
        dd($product);
        return $this->render('home.html.twig');
    }
    modifier un produits en BD
    public function homepage(EntityManagerInterface $em)
    {
        $productrepository = $em->getRepository(Product::class);
        $product = $productrepository->find(3);
        $product->setprice(2500);
        $em->flush();

        dd($product);
        return $this->render('home.html.twig');
    }
    retirer product de la BD 
     public function homepage(EntityManagerInterface $em)
    {
        $productRepository = $em->getRepository(Product::class);
        $product = $productRepository->find(3);
        $em->remove($product);

        $em->flush();
creation Fixture
composer require orm-fixtures
ensuite dans AppFixture
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($p = 0; $p < 100; $p++) {

            $product = new Product;
            $product->setname("Produit N°$p")
                ->setPrice(mt_rand(100, 200))
                ->setSlug("produit-n-$p");
            $manager->persist($product);
        }
        $manager->flush();
    }
}

php bin/console doctrine:fixtures:load pour executer fixtures

plus de realiste avec fixtures
sur packagist.org il y une biblio faker
fzaninotto/faussaire marche plus
composer require fakerphp/faker 
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($p = 0; $p < 100; $p++) {

            $product = new Product;
            $product->setname($faker->name)
                ->setPrice(mt_rand(100, 200))
                ->setSlug($faker->name);
            $manager->persist($product);
        }
composer require mbezhanov/faker-provider-collection
composer require liorchamla/faker-prices mbezhanov/faker-provider-collection
ca ne marche plus ....
Creer des slug
composer require string
php bin/console debug:autowiring slug
relation entre Category et product
php bin/console make:entity Category
ajouter champs products 
type relation avec la class Product
selectionner OneToMany
Champs par defaut category

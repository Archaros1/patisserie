<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Entity\User;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $admin = new User();

        $admin->setEmail("jungfamily@live.fr")
        ->setPassword($this->passwordEncoder->encodePassword($admin, "2001garou*"))
        ->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);


        $manager->flush();

    }

}

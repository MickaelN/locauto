<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\ByteString;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager)
    {
        $userList = [
            'Abdul Lepez',
            'Abel Zebuth',
            'Abraham Kivive',
            'Achille Ahonte',
            'Achille Londumur',
            'Achille Parmentier',
            'Adélaïde Elkebir',
            'Adèle Hiriome',
            'Adelina Ottension',
            'Adelphe Yadépity',
            'Adhémar Entrombe',
            'Adolf Herkanmem',
            'Adolphine Champagne',
            'Agatha Stroff',
            'Agathe Patsurlamokett',
            'Agathe Youbeybe',
            'Agathe Zeblouse',
            'Agénor Mandy',
            'Agostinho Ranscras',
            'Ahmed Ametlatable',
            'Ahmed Encow\'uaté',
            'Ahmed Epan',
            'Aimée Voulaizin-Lézoth',
            'Akim Enculbien',
            'Alain Continent'
        ];
        foreach ($userList as $user) {

            $users = new Users();
            $users->setFullName($user);
            $users->setPassword($this->passwordHasher->hashPassword($users, ByteString::fromRandom(12)));
            $users->setRoles(['ROLE_USER']);
            $users->setEmail($users->getFirstname() . substr($users->getLastname(), 0, 2) . '@laposte.net');
            $manager->persist($users);

            $manager->flush();
        }
    }
}

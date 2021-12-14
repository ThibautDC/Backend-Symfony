<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTime;
use DateTimeInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**@var UserPasswordEncoderInterface */
    private $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this -> userPasswordEncoder = $userPasswordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        $date = new \DateTimeImmutable(NULL);

        $user = new User();
        $user -> setEmail('user@ex.com');
        $user -> setPassword($this->userPasswordEncoder->encodePassword($user, 'user'));
        $user -> setLastname('normal');
        $user -> setFirstname('user');
        $user -> setUsername('userExemple');
        $user -> setGender('male');
        $user -> setDateOfBirth($date);
        $user -> setPhone('0123456789');
        $user -> setAdress('pas tres loin');
        $user -> setZip(012345);
        $user -> setCity('aix');
        $user -> setCountry('France');
        $user -> setCreatedAt($date);
        $user -> setUpdatedAt($date);

        $manager->persist($user);

        $admin = new User();
        $admin -> setEmail('admin@ex.com');
        $admin -> setPassword($this->userPasswordEncoder->encodePassword($admin, 'admin'));
        $admin->setRoles(["ROLE_ADMIN"]);
        $admin -> setLastname('admin');
        $admin -> setFirstname('role');
        $admin -> setUsername('adminExemple');
        $admin -> setGender('female');
        $admin -> setDateOfBirth($date);
        $admin -> setPhone('9876543210');
        $admin -> setAdress('un peu plus loin');
        $admin -> setZip(012345);
        $admin -> setCity('aix');
        $admin -> setCountry('France');
        $admin -> setCreatedAt($date);
        $admin -> setUpdatedAt($date);

        $manager->persist($admin);

        $manager->flush();
    }
}

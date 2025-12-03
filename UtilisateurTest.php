<?php

namespace GreenTeuf\Tests;

require_once __DIR__.'/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use GreenTeuf\Model\Utilisateur;

class UtilisateurTest extends TestCase
{
    public function testAdd()
    {
        $db = require __DIR__.'/../db-connection.php';

        $user = array(
            'emailU' => 'user@example.com',
            'passwordU' => 'password',
            'nomU' => 'NomT',
            'prenomU' => 'PrénomT',
        );

        $id = Utilisateur::add($db, $user['emailU'], $user['passwordU'], $user['nomU'], $user['prenomU']);

        $this->assertEquals('1', $id);
    }

    public function testGetAll()
    {
        $db = require __DIR__.'/../db-connection.php';

        $user = array(
            0 => array(
                'idU' => '1',
                'emailU' => 'user@example.com',
                'passwordU' => 'password',
                'nomU' => 'NomT',
                'prenomU' => 'PrénomT',
                'adminU' => '0',
                'archiveU' => '0',
            ),
        );

        $data = Utilisateur::getAll($db);

        $this->assertEquals($user, $data);
    }

    public function testGetById()
    {
        $db = require __DIR__.'/../db-connection.php';

        $user = array(
            'idU' => '1',
            'emailU' => 'user@example.com',
            'passwordU' => 'password',
            'nomU' => 'NomT',
            'prenomU' => 'PrénomT',
            'adminU' => '0',
            'archiveU' => '0',
        );

        $data = Utilisateur::getById($db, $user['idU']);

        $this->assertEquals($user, $data);
    }

    public function testGetByEmail()
    {
        $db = require __DIR__.'/../db-connection.php';

        $user = array(
            'idU' => '1',
            'emailU' => 'user@example.com',
            'passwordU' => 'password',
            'nomU' => 'NomT',
            'prenomU' => 'PrénomT',
            'adminU' => '0',
            'archiveU' => '0',
        );

        $data = Utilisateur::getByEmail($db, $user['emailU']);

        $this->assertEquals($user, $data);
    }

    public function testSetEmail()
    {
        $db = require __DIR__.'/../db-connection.php';

        $user = array(
            'idU' => '1',
            'emailU' => 'utilisateur@example.com',
            'passwordU' => 'password',
            'nomU' => 'NomT',
            'prenomU' => 'PrénomT',
            'adminU' => '0',
            'archiveU' => '0',
        );

        Utilisateur::setEmail($db, $user['idU'], $user['emailU']);
        $data = Utilisateur::getById($db, $user['idU']);

        $this->assertEquals($user, $data);
    }

    public function testSetPassword()
    {
        $db = require __DIR__.'/../db-connection.php';

        $user = array(
            'idU' => '1',
            'emailU' => 'utilisateur@example.com',
            'passwordU' => 'pwd',
            'nomU' => 'NomT',
            'prenomU' => 'PrénomT',
            'adminU' => '0',
            'archiveU' => '0',
        );

        Utilisateur::setPassword($db, $user['idU'], $user['passwordU']);
        $data = Utilisateur::getById($db, $user['idU']);

        $this->assertEquals($user, $data);
    }

    public function testSetNom()
    {
        $db = require __DIR__.'/../db-connection.php';

        $user = array(
            'idU' => '1',
            'emailU' => 'utilisateur@example.com',
            'passwordU' => 'pwd',
            'nomU' => 'TNom',
            'prenomU' => 'PrénomT',
            'adminU' => '0',
            'archiveU' => '0',
        );

        Utilisateur::setNom($db, $user['idU'], $user['nomU']);
        $data = Utilisateur::getById($db, $user['idU']);

        $this->assertEquals($user, $data);
    }

    public function testSetPrenom()
    {
        $db = require __DIR__.'/../db-connection.php';

        $user = array(
            'idU' => '1',
            'emailU' => 'utilisateur@example.com',
            'passwordU' => 'pwd',
            'nomU' => 'TNom',
            'prenomU' => 'TPrénom',
            'adminU' => '0',
            'archiveU' => '0',
        );

        Utilisateur::setPrenom($db, $user['idU'], $user['prenomU']);
        $data = Utilisateur::getById($db, $user['idU']);

        $this->assertEquals($user, $data);
    }

    public function testSetAdmin()
    {
        $db = require __DIR__.'/../db-connection.php';

        $user = array(
            'idU' => '1',
            'emailU' => 'utilisateur@example.com',
            'passwordU' => 'pwd',
            'nomU' => 'TNom',
            'prenomU' => 'TPrénom',
            'adminU' => '1',
            'archiveU' => '0',
        );

        Utilisateur::setAdmin($db, $user['idU'], $user['adminU']);
        $data = Utilisateur::getById($db, $user['idU']);

        $this->assertEquals($user, $data);
    }
}
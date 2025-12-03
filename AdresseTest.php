<?php

namespace GreenTeuf\Tests;

require_once __DIR__.'/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use GreenTeuf\Model\Adresse;

class AdresseTest extends TestCase
{
    public function testAdd()
    {
        $db = require __DIR__.'/../db-connection.php';

        $address = array(
            'libelleAd' => 'Maison',
            'contactAd' => 'NomT PrénomT',
            'rueAd' => 'RueT',
            'cpAd' => '12345',
            'villeAd' => 'VilleT',
            'idU' => '1',
        );

        $id = Adresse::add($db, $address['libelleAd'], $address['contactAd'], $address['rueAd'], $address['cpAd'], $address['villeAd'], $address['idU']);

        $this->assertEquals('1', $id);
    }

    public function testGetById()
    {
        $db = require __DIR__.'/../db-connection.php';

        $address = array(
            'idAd' => '1',
            'libelleAd' => 'Maison',
            'contactAd' => 'NomT PrénomT',
            'rueAd' => 'RueT',
            'cpAd' => '12345',
            'villeAd' => 'VilleT',
            'idU' => '1',
            'archiveAd' => '0',
        );

        $data = Adresse::getById($db, $address['idAd']);

        $this->assertEquals($address, $data);
    }

    public function testGetByUtil()
    {
        $db = require __DIR__.'/../db-connection.php';

        $address = array(
            0 => array(
                'idAd' => '1',
                'libelleAd' => 'Maison',
                'contactAd' => 'NomT PrénomT',
                'rueAd' => 'RueT',
                'cpAd' => '12345',
                'villeAd' => 'VilleT',
                'idU' => '1',
                'archiveAd' => '0',
            ),
        );

        $data = Adresse::getByUtil($db, $address[0]['idU']);

        $this->assertEquals($address, $data);
    }

    public function testUpdateById()
    {
        $db = require __DIR__.'/../db-connection.php';

        $address = array(
            'idAd' => '1',
            'libelleAd' => 'Maison',
            'contactAd' => 'PrénomT NomT',
            'rueAd' => 'T Rue',
            'cpAd' => '54321',
            'villeAd' => 'TVille',
            'idU' => '1',
            'archiveAd' => '0',
        );

        Adresse::updateById($db, $address['idAd'], $address['libelleAd'], $address['contactAd'], $address['rueAd'], $address['cpAd'], $address['villeAd'], $address['idU']);
        $data = Adresse::getById($db, $address['idAd']);

        $this->assertEquals($address, $data);
    }

    public function testDeleteById()
    {
        $db = require __DIR__.'/../db-connection.php';

        Adresse::deleteById($db, '1');
        $data = Adresse::getById($db, '1');

        $this->assertEmpty($data);
    }
}
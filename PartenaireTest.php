<?php

namespace GreenTeuf\Tests;

require_once __DIR__.'/../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use GreenTeuf\Model\Partenaire;

class PartenaireTest extends TestCase
{
    public function testAdd()
    {
        $db = require __DIR__.'/../db-connection.php';

        $partner = array(
            'nomP' => 'PartenaireT',
            'urlP' => 'http://example.com',
            'logoP' => 'logo.png',
        );

        $id = Partenaire::add($db, $partner['nomP'], $partner['urlP'], $partner['logoP']);

        $this->assertEquals('1', $id);
    }

    public function testGetAll()
    {
        $db = require __DIR__.'/../db-connection.php';

        $partner = array(
            0 => array(
                'idP' => '1',
                'nomP' => 'PartenaireT',
                'urlP' => 'http://example.com',
                'logoP' => 'logo.png',
            ),
        );

        $data = Partenaire::getAll($db);

        $this->assertEquals($partner, $data);
    }

    public function testGetById()
    {
        $db = require __DIR__.'/../db-connection.php';

        $partner = array(
            'idP' => '1',
            'nomP' => 'PartenaireT',
            'urlP' => 'http://example.com',
            'logoP' => 'logo.png',
        );

        $data = Partenaire::get($db, $partner['idP']);

        $this->assertEquals($partner, $data);
    }

    public function testSetUrl()
    {
        $db = require __DIR__.'/../db-connection.php';

        $partner = array(
            'idP' => '1',
            'nomP' => 'PartenaireT',
            'urlP' => 'http://example.org',
            'logoP' => 'logo.png',
        );

        $data = Partenaire::setUrl($db, $partner['idP'], $partner['urlP']);
        $data = Partenaire::get($db, $partner['idP']);

        $this->assertEquals($partner, $data);
    }

    public function testSetLogo()
    {
        $db = require __DIR__.'/../db-connection.php';

        $partner = array(
            'idP' => '1',
            'nomP' => 'PartenaireT',
            'urlP' => 'http://example.org',
            'logoP' => 'logo.jpg',
        );

        $data = Partenaire::setLogo($db, $partner['idP'], $partner['logoP']);
        $data = Partenaire::get($db, $partner['idP']);

        $this->assertEquals($partner, $data);
    }

    public function testDelete()
    {
        $db = require __DIR__.'/../db-connection.php';

        $data = Partenaire::delete($db, '1');
        $data = Partenaire::get($db, '1');

        $this->assertEmpty($data);
    }
}
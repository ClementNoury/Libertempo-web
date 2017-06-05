<?php
namespace Tests\Units\App\Libraries\Calendrier\Collection\Heure;

use App\Libraries\Calendrier\Collection\Heure\Additionnelle as _Additionnelle;

/**
 * Classe de test des collections d'heures additionnelles
 */
class Additionnelle extends \Tests\Units\TestUnit
{
    public function beforeTestMethod($method)
    {
        parent::beforeTestMethod($method);
        $this->result = new \mock\MYSQLIResult();
        $this->db = new \mock\includes\SQL();
        $this->calling($this->db)->query = $this->result;
    }

    private $db;
    private $result;

    public function testGetListeVoid()
    {
        $this->calling($this->result)->fetch_all = [];
        $date = new \DateTimeImmutable();

        $heures = new _Additionnelle($this->db, []);

        $this->array($heures->getListe($date, $date, [], false))->isEmpty();
    }

    public function testGetListeFilled()
    {
        $statut = \App\Models\AHeure::STATUT_VALIDATION_FINALE;
        $this->calling($this->result)->fetch_all = [[
            'login' => 'Provencal le Gaulois',
            'debut' => 11912929182,
            'fin' =>   11909128919,
        ],];

        $heures = new _Additionnelle($this->db);

        $nomComplet = 'Provencal le Gaulois';
        $expected = [
            '2017-02-12' => [[
                'employe' => $nomComplet,
            ]],
        ];
        $date = new \DateTimeImmutable();
        $liste = $heures->getListe($date, $date, [], false);

        $this->array($liste)->isIdenticalTo($expected);
    }
}
<?php
# Fichier /Many2OneBundle/DataFixtures/ORM/LoadingFixtures.php
/* Les Fixtures doivent êtres stockées dans le namespace suivant */
namespace Dev\PCultBundle\DataFixtures\ORM;
/*
* On a besoin de recourir à l'interface FixtureInterface pour définir une fixture alors on le déclare
* Si nous n'avions pas mis ce use, on aurait dû taper
* class LoadingFixtures implements Doctrine\Common\DataFixtures\FixtureInterface pour l'implémentation
* de l'interface FixtureInterface, ce qui avouons-le n'est pas toujours très pratique, surtout si on
* veut utiliser plusieurs fois l'objet / interface en question.
*/
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
/*
* Nous aurons besoin de nos entités Etudiant et SectionBts également, on le déclare donc ici aussi...
*/
use Dev\PCultBundle\Entity\Spectacle;

/*
* Les fixtures sont des objets qui doivent obligatoireemnt implémenter l'interface FixtureInterface
*/
class LoadingFixtures implements FixtureInterface {
public function load(ObjectManager $manager) {
 // création 
$aSpectacles = array(
    array(
      "Nom" => "Tintin en Espagne",
      "MetteurEnScene" => "Hergé",
      "Synopsis" => "Ben c'est Tintin qui part en Espagne",
      "Image"   => "tintin.jpg"  
    ),
    array(
      "Nom" => "Tintin en Australie",
      "MetteurEnScene" => "Hergé",
      "Synopsis" => "Ben c'est Tintin qui part en Australie",
      "Image"   => "tintin.jpg"  
    )    
);

// création des objets Spectacle et persistance en mémoire vive dans la base
foreach ($aSpectacles as $thespectacle) {
$spectacle = new Spectacle();
$spectacle->setNom($thespectacle["Nom"]);
$spectacle->setMetteurEnScene($thespectacle["MetteurEnScene"]);
$spectacle->setSynopsis($thespectacle["Synopsis"]);
$spectacle->setImage($thespectacle["Image"]);
$manager->persist($spectacle);
}

// On persiste physiquement en base de donnée
$manager->flush();
}
}
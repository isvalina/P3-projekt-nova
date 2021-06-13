<?php
require 'vendor/autoload.php';
require 'bootstrap.php';
use Svalina\Ontologija;
use Composer\Autoload\ClassLoader;

Flight::route('/', function () {

  $foaf = \EasyRdf\Graph::newAndLoad('https://oziz.ffos.hr/nastava20202021/isvalina_20/ontologija/svalina_rdf/isvalina.rdf');
  $info = $foaf->dump();
  echo "<h2>Ontologija korištena za projektni zadatak iz P3:</h2> <br/><br/>" . $info;
});

Flight::route('GET /search', function () {

  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $repozitorij = $em->getRepository('Svalina\Ontologija');
  $zapisi = $repozitorij->findAll();
  echo $doctrineBootstrap->getJson($zapisi);
});


Flight::route(
  'GET /table', function () {

    $foaf = \EasyRdf\Graph::newAndLoad('https://oziz.ffos.hr/nastava20202021/isvalina_20/ontologija/svalina_rdf/isvalina.rdf');

    foreach ($foaf->resources() as $resource) {

      //if($foaf->get($resource, 'rdf:type') != ''){
        $i = 0;
        // $url = parse_url($foaf->get($resource, '<http://oziz.ffos.hr/isvalina/ontologija-mcu#Film>'));
        // $film = str_replace('_', ' ', $url["fragment"]);
        $film = ''.$foaf->get($resource, '<http://oziz.ffos.hr/isvalina/ontologija-mcu#imaNaslov>');

        //$url = parse_url($foaf->get($resource, '<http://oziz.ffos.hr/isvalina/ontologija-mcu#imaGlumce>'));
        //$glumac = str_replace('#', ' ', $url["fragment"]);

        $glumac = ''.$foaf->get($resource, '<http://oziz.ffos.hr/isvalina/ontologija-mcu#imaIme>');
        
        $zanr = ''.$foaf->get($resource, '<http://oziz.ffos.hr/isvalina/ontologija-mcu#zanr>');
        $nagrada = ''.$foaf->get($resource, '<http://oziz.ffos.hr/isvalina/ontologija-mcu#nagrada>');
        $godinaIzlaska = ''.$foaf->get($resource, '<http://oziz.ffos.hr/isvalina/ontologija-mcu#godinaIzlaska>');
        $trajanje = ''.$foaf->get($resource, '<http://oziz.ffos.hr/isvalina/ontologija-mcu#trajanjeFilma>');



        $ontologija = new Ontologija();
        $ontologija->setPodaci(Flight::request()->data);

        $ontologija->setFilm($film);
        $ontologija->setGlumac($glumac);
        $ontologija->setZanr($zanr);
        $ontologija->setNagrada($nagrada);
        $ontologija->setGodinaIzlaska($godinaIzlaska);
        $ontologija->setTrajanje($trajanje);


        $doctrineBootstrap = Flight::entityManager();
        $em = $doctrineBootstrap->getEntityManager();
  
        $em->persist($ontologija);
        $em->flush();
        //}
      }

      echo "Uspjeh!";

});

Flight::route('GET /search/@film', function($film){

  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $repozitorij=$em->getRepository('Svalina\Ontologija');
  $zapisi = $repozitorij->createQueryBuilder('p')
                        ->where('p.film LIKE :film')
                        ->setParameter('film', '%'.$film.'%')
                        ->getQuery()
                        ->getResult();
  echo $doctrineBootstrap->getJson($zapisi);

});


$cl = new ClassLoader('Svalina', __DIR__, '/src');
$cl->register();
require_once 'bootstrap.php';
Flight::register('entityManager', 'DoctrineBootstrap');

Flight::start();
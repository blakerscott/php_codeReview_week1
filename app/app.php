<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/contact.php";

    session_start();

    if (empty($_SESSION['list_of_contacts'])) {
        $_SESSION['list_of_contacts'] = array();
    }

    $app = new Silex\Application();


    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {



        return $app['twig']->render('home.html.twig', array('contacts' => Contact::getAll()));
    });

    $app->post("/newcontact", function() use ($app) {
        $contact = new Contact($_POST['name'],$_POST['phonenumber'],$_POST['address']);
        $contact->save();
        return $app['twig']->render('new_contact.html.twig', array('newcontact' => $contact));
    });



    $app->post("/delete_all_contacts", function() use ($app) {
        Contact::deleteAll();
        return $app['twig']->render('delete_all_contacts.html.twig');
    });



    return $app;
?>

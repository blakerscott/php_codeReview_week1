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
        $task = new Contact($_POST['description']);
        $task->save();
        return $app['twig']->render('new_contact.html.twig', array('newcontact' => $contact));
    });



    $app->post("/delete_tasks", function() use ($app) {
        Contact::deleteAll();
        return $app['twig']->render('delete_tasks.html.twig');
    });



    return $app;
?>

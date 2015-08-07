<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/cd.php";

	session_start();
    if (empty($_SESSION['cd_list'])) {
        $_SESSION['cd_list'] = array();
    }
	
    $app = new Silex\Application();
	$app['debug'] = true;
	
	$app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));
	
	
	
	
	
    $app->get("/", function() use ($app) {
		
		$first_cd = new CD("Master of Reality", "Black Sabbath", "images/reality.jpg", 10.99);
        $second_cd = new CD("Electric Ladyland", "Jimi Hendrix", "images/ladyland.jpg", 10.99);
        $third_cd = new CD("Nevermind", "Nirvana", "images/nevermind.jpg", 10.99);
        $fourth_cd = new CD("I don't get it", "Pork Lion", "images/porklion.jpg", 49.99);
        $cds = array($first_cd, $second_cd, $third_cd, $fourth_cd);

//        $output = "";
//        foreach ($cds as $album) {
//            $output .= "
//                <div class='col-md-4'>
//                    <strong>" . $album->getTitle() . "</strong>				
//                </div>
//                <div class='col-md-4'>
//					<img src=" . $album->getCoverArt() . ">
//                    <div>By " . $album->getArtist() . "</div>
//                    <div>$" . $album->getPrice() . "</div>
//                </div><br><br>
//            ";
//        }
        return $app['twig']->render('list_cds.html.twig', array('cd_list' => $cds));

    });

    return $app;

?>

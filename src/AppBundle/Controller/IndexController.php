<?php

namespace AppBundle\Controller;

use AppBundle\Model\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class IndexController
 * @package AppBundle\Controller
 *
 * @Route("/",name="index")
 */
class IndexController extends Controller
{
    /**
     * @Route("/accueil",name="index_accueil")
     * @Route("/",name="index_home")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function accueilAction()
    {
        //todo get articles from API

        return $this->render(':index:accueil.html.twig', [
            'articles'  => $this->aVirerGetArticles()
        ]);
    }

    /**
     * @return Article[]
     */
    protected function aVirerGetArticles()
    {
        $a1 = new Article();
        $a1->setId(1);
        $a1->setAuthor('bob');
        $a1->setTitle('Article 1');
        $a1->setDateCreation(new \DateTime());
        $a1->setDatePublished(new \DateTime());
        $a1->setContent("The content of article 1:

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sit amet elit vitae ligula pharetra varius. Pellentesque et condimentum diam, sed fermentum nisi. Curabitur ipsum tellus, varius nec ultricies ut, interdum a nunc. Donec sollicitudin venenatis lectus, ut cursus augue viverra ac. Vestibulum et eleifend diam. Vivamus nec metus quis libero tempus facilisis eu quis urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam at hendrerit sapien, non gravida nunc. Fusce et dignissim libero. Aliquam a urna in arcu tincidunt semper ac vitae mi. In aliquam neque enim, non pharetra purus aliquam sed. Duis ultrices condimentum leo. Praesent in dui eros.

Etiam egestas nisi et vestibulum mollis. Duis tincidunt gravida tellus, sed tincidunt leo semper ut. Cras tincidunt, ante ut commodo interdum, nisl nisl venenatis arcu, quis dignissim arcu ligula gravida odio. Cras purus leo, scelerisque sed erat venenatis, tempor laoreet neque. Nulla convallis non libero sed venenatis. Nulla luctus iaculis ipsum semper ultrices. Mauris vestibulum facilisis eros, a suscipit quam consectetur quis. Aenean a posuere turpis. Duis quam leo, porttitor sed diam et, iaculis vehicula neque. Sed id ultricies turpis. Nullam cursus nisl felis, a dignissim nisl varius eu. Nam sit amet laoreet urna. Pellentesque aliquam eget eros eu molestie. Nullam et augue erat.

Nunc bibendum sapien lectus, in tincidunt velit scelerisque eget. Sed maximus ante nisi, nec luctus dui hendrerit a. Integer a turpis faucibus, tempus lorem sagittis, lacinia velit. Vestibulum finibus neque vel orci ullamcorper tempor. Mauris eu dui eget lorem porttitor tempus et sit amet arcu. Nulla rhoncus erat non felis scelerisque, vel facilisis elit lacinia. In tincidunt felis arcu, ut imperdiet tortor tempor sit amet. Morbi vulputate tortor vel turpis lobortis, et maximus metus pellentesque. Maecenas non nunc eu magna tincidunt auctor id vitae nisi. Sed condimentum pellentesque lacus, non vehicula mi vestibulum vitae. Sed scelerisque velit mauris, et hendrerit turpis tincidunt id. Sed ultricies nunc tortor, in tristique massa semper quis.

Duis suscipit posuere auctor. Sed vestibulum massa metus, et condimentum felis sagittis quis. Aliquam fermentum egestas consequat. Vivamus nisl magna, condimentum id molestie at, viverra a est. Mauris molestie consequat scelerisque. Pellentesque sapien nibh, sagittis nec aliquam in, dignissim id nisl. Suspendisse tincidunt pretium arcu sed maximus. Curabitur sit amet elit in urna congue laoreet. Nulla vel mollis ipsum. Phasellus libero risus, egestas eu luctus eu, ullamcorper nec nibh. Maecenas a euismod massa, eget elementum elit. Suspendisse vestibulum eget risus in lacinia.

Mauris aliquet luctus laoreet. Etiam volutpat et dolor sit amet venenatis. Donec at aliquam risus, at finibus risus. Quisque massa urna, pulvinar a sollicitudin non, scelerisque sollicitudin justo. Integer id sagittis dui. Nam mauris est, rhoncus a orci sed, pharetra tempor lorem. Vestibulum et interdum neque, id ornare ligula. Donec condimentum a risus egestas maximus. Sed varius metus leo, nec cursus tortor scelerisque vitae. Ut quis eros vel tortor posuere sodales in ut mauris. ");


        $a2 = new Article();
        $a2->setId(2);
        $a2->setAuthor('bob');
        $a2->setTitle('Article 2');
        $a2->setDateCreation(new \DateTime());
        $a2->setDatePublished(new \DateTime());
        $a2->setContent("The content of article 2:

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sit amet elit vitae ligula pharetra varius. Pellentesque et condimentum diam, sed fermentum nisi. Curabitur ipsum tellus, varius nec ultricies ut, interdum a nunc. Donec sollicitudin venenatis lectus, ut cursus augue viverra ac. Vestibulum et eleifend diam. Vivamus nec metus quis libero tempus facilisis eu quis urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam at hendrerit sapien, non gravida nunc. Fusce et dignissim libero. Aliquam a urna in arcu tincidunt semper ac vitae mi. In aliquam neque enim, non pharetra purus aliquam sed. Duis ultrices condimentum leo. Praesent in dui eros.

Etiam egestas nisi et vestibulum mollis. Duis tincidunt gravida tellus, sed tincidunt leo semper ut. Cras tincidunt, ante ut commodo interdum, nisl nisl venenatis arcu, quis dignissim arcu ligula gravida odio. Cras purus leo, scelerisque sed erat venenatis, tempor laoreet neque. Nulla convallis non libero sed venenatis. Nulla luctus iaculis ipsum semper ultrices. Mauris vestibulum facilisis eros, a suscipit quam consectetur quis. Aenean a posuere turpis. Duis quam leo, porttitor sed diam et, iaculis vehicula neque. Sed id ultricies turpis. Nullam cursus nisl felis, a dignissim nisl varius eu. Nam sit amet laoreet urna. Pellentesque aliquam eget eros eu molestie. Nullam et augue erat.

Nunc bibendum sapien lectus, in tincidunt velit scelerisque eget. Sed maximus ante nisi, nec luctus dui hendrerit a. Integer a turpis faucibus, tempus lorem sagittis, lacinia velit. Vestibulum finibus neque vel orci ullamcorper tempor. Mauris eu dui eget lorem porttitor tempus et sit amet arcu. Nulla rhoncus erat non felis scelerisque, vel facilisis elit lacinia. In tincidunt felis arcu, ut imperdiet tortor tempor sit amet. Morbi vulputate tortor vel turpis lobortis, et maximus metus pellentesque. Maecenas non nunc eu magna tincidunt auctor id vitae nisi. Sed condimentum pellentesque lacus, non vehicula mi vestibulum vitae. Sed scelerisque velit mauris, et hendrerit turpis tincidunt id. Sed ultricies nunc tortor, in tristique massa semper quis.

Duis suscipit posuere auctor. Sed vestibulum massa metus, et condimentum felis sagittis quis. Aliquam fermentum egestas consequat. Vivamus nisl magna, condimentum id molestie at, viverra a est. Mauris molestie consequat scelerisque. Pellentesque sapien nibh, sagittis nec aliquam in, dignissim id nisl. Suspendisse tincidunt pretium arcu sed maximus. Curabitur sit amet elit in urna congue laoreet. Nulla vel mollis ipsum. Phasellus libero risus, egestas eu luctus eu, ullamcorper nec nibh. Maecenas a euismod massa, eget elementum elit. Suspendisse vestibulum eget risus in lacinia.

Mauris aliquet luctus laoreet. Etiam volutpat et dolor sit amet venenatis. Donec at aliquam risus, at finibus risus. Quisque massa urna, pulvinar a sollicitudin non, scelerisque sollicitudin justo. Integer id sagittis dui. Nam mauris est, rhoncus a orci sed, pharetra tempor lorem. Vestibulum et interdum neque, id ornare ligula. Donec condimentum a risus egestas maximus. Sed varius metus leo, nec cursus tortor scelerisque vitae. Ut quis eros vel tortor posuere sodales in ut mauris. ");

        $a3 = new Article();
        $a3->setId(3);
        $a3->setAuthor('bob');
        $a3->setTitle('Article 3');
        $a3->setDateCreation(new \DateTime());
        $a3->setDatePublished(new \DateTime());
        $a3->setContent("The content of article 3:

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sit amet elit vitae ligula pharetra varius. Pellentesque et condimentum diam, sed fermentum nisi. Curabitur ipsum tellus, varius nec ultricies ut, interdum a nunc. Donec sollicitudin venenatis lectus, ut cursus augue viverra ac. Vestibulum et eleifend diam. Vivamus nec metus quis libero tempus facilisis eu quis urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam at hendrerit sapien, non gravida nunc. Fusce et dignissim libero. Aliquam a urna in arcu tincidunt semper ac vitae mi. In aliquam neque enim, non pharetra purus aliquam sed. Duis ultrices condimentum leo. Praesent in dui eros.

Etiam egestas nisi et vestibulum mollis. Duis tincidunt gravida tellus, sed tincidunt leo semper ut. Cras tincidunt, ante ut commodo interdum, nisl nisl venenatis arcu, quis dignissim arcu ligula gravida odio. Cras purus leo, scelerisque sed erat venenatis, tempor laoreet neque. Nulla convallis non libero sed venenatis. Nulla luctus iaculis ipsum semper ultrices. Mauris vestibulum facilisis eros, a suscipit quam consectetur quis. Aenean a posuere turpis. Duis quam leo, porttitor sed diam et, iaculis vehicula neque. Sed id ultricies turpis. Nullam cursus nisl felis, a dignissim nisl varius eu. Nam sit amet laoreet urna. Pellentesque aliquam eget eros eu molestie. Nullam et augue erat.

Nunc bibendum sapien lectus, in tincidunt velit scelerisque eget. Sed maximus ante nisi, nec luctus dui hendrerit a. Integer a turpis faucibus, tempus lorem sagittis, lacinia velit. Vestibulum finibus neque vel orci ullamcorper tempor. Mauris eu dui eget lorem porttitor tempus et sit amet arcu. Nulla rhoncus erat non felis scelerisque, vel facilisis elit lacinia. In tincidunt felis arcu, ut imperdiet tortor tempor sit amet. Morbi vulputate tortor vel turpis lobortis, et maximus metus pellentesque. Maecenas non nunc eu magna tincidunt auctor id vitae nisi. Sed condimentum pellentesque lacus, non vehicula mi vestibulum vitae. Sed scelerisque velit mauris, et hendrerit turpis tincidunt id. Sed ultricies nunc tortor, in tristique massa semper quis.

Duis suscipit posuere auctor. Sed vestibulum massa metus, et condimentum felis sagittis quis. Aliquam fermentum egestas consequat. Vivamus nisl magna, condimentum id molestie at, viverra a est. Mauris molestie consequat scelerisque. Pellentesque sapien nibh, sagittis nec aliquam in, dignissim id nisl. Suspendisse tincidunt pretium arcu sed maximus. Curabitur sit amet elit in urna congue laoreet. Nulla vel mollis ipsum. Phasellus libero risus, egestas eu luctus eu, ullamcorper nec nibh. Maecenas a euismod massa, eget elementum elit. Suspendisse vestibulum eget risus in lacinia.

Mauris aliquet luctus laoreet. Etiam volutpat et dolor sit amet venenatis. Donec at aliquam risus, at finibus risus. Quisque massa urna, pulvinar a sollicitudin non, scelerisque sollicitudin justo. Integer id sagittis dui. Nam mauris est, rhoncus a orci sed, pharetra tempor lorem. Vestibulum et interdum neque, id ornare ligula. Donec condimentum a risus egestas maximus. Sed varius metus leo, nec cursus tortor scelerisque vitae. Ut quis eros vel tortor posuere sodales in ut mauris. ");


        return [$a1, $a2, $a3];
    }
}

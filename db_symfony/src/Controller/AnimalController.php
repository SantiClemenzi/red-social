<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Form\AnimalType as FormAnimalType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Session\Session;

use App\Form\AnimalType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Email;

class AnimalController extends AbstractController
{
    public function validarEmail($email)
    {
        $validator = Validation::createValidator();
        $errores = $validator->validate($email, [new Email()]);

        if (count($errores) != 0) {
            $message =  'El email no es valido';
        } else {
            $message = 'Email valido';
        }

        echo $message;
        die();
    }


    public function create(Request $request, ManagerRegistry $doctrine)
    {
        $animal = new Animal();
        $form   = $this->createForm(AnimalType::class, $animal);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($animal);
            $em->flush();

            // session flash
            $session = new Session();
            $session->getFlashBag()->add('message', 'Animal creado');

            $redi = $this->redirect($this->generateUrl('animalCreate'));
            return $redi;
        }
        return $this->render('animal/crearAnimal.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function index(ManagerRegistry $doctrine): Response
    {
        $animal_repo = $doctrine->getRepository(Animal::class);

        $animales = $animal_repo->findAll();

        return $this->render('animal/index.html.twig', [
            'controller_name' => 'Welcome to your ANIMAL controller!',
            'animales' => $animales,
        ]);
    }
    public function save(ManagerRegistry $doctrine): Response
    {
        // gardamos datos en una tabla de db

        // cargo el entity manager
        $entityManager =  $doctrine->getManager();

        // creo el objeto y le doy valores
        $animal = new Animal();
        $animal->setTipo($_POST['tipo']);
        $animal->setColor($_POST['color']);
        $animal->setRaza($_POST['raza']);

        // guardamos objeto en el doctrine
        $entityManager->persist($animal);

        // volcamos los datos en la tabla / guradar en la db
        $entityManager->flush();

        return new Response('Ejecuto metodo save ID = ' . $animal->getId());
    }
    public function animal($id, ManagerRegistry $doctrine)
    {
        // cargar repositorio
        $animal_repo = $doctrine->getRepository(Animal::class);

        // consulta 
        $animal = $animal_repo->find($id);

        // comprobamos resultado
        if (!$animal) {
            $message = 'El animal no existe';
        } else {
            $message = 'El animal es: ' . $animal->getTipo() . ' ' . $animal->getRaza();
        }

        return new Response($message);
    }

    public function upDate($id, ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();

        // caragamos repo animal
        $animal_repo = $em->getRepository(Animal::class);

        // hacemos el find
        $animal = $animal_repo->find($id);

        // comprobamos resultado
        if (!$animal) {
            $message = 'El animal no existe';
        } else {
            // asignamos los nuevos valores
            $animal->setTipo("XXX $id");
            $animal->setColor(" XXX ");
            $animal->setRaza(" XXX ");

            // persistimos en doctrine
            $em->persist($animal);

            // guardar en la db
            $em->flush();

            $message = 'Haz actualizado el animal con el id' . $animal->getId();
        }

        return new Response($message);
    }
    public function delete($id, ManagerRegistry $doctrine)
    {
        $em = $doctrine->getManager();
        $animal_repo = $em->getRepository(Animal::class);
        $animal = $animal_repo->find($id);

        if ($animal && is_object($animal)) {
            $em->remove($animal);
            $em->flush();

            $message = 'El animal fue eliminado.';
        } else {
            $message = 'Error no se pudo realizar la consulta';
        }

        return new Response($message);
    }
}

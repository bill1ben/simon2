<?php

namespace App\Form\DataTransformer;

use App\Entity\Todo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;


class TodoToIdTransformer implements DataTransformerInterface {

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Transforms an object (issue) to a string (number).
     *
     * @param  Todo|null $todo
     * @return string
     */
    public function transform($todo)
    {
        if (null === $todo) {
            return '';
        }

        return $todo->getId();
    }

    /**
     * Transforms a string (number) to an object (issue).
     *
     * @param  string $todoId
     * @return Todo|null
     * @throws TransformationFailedException if object (shape) is not found.
     */
    public function reverseTransform($todoId)
    {
        // no issue number? It's optional, so that's ok
        if (!$todoId) {
            return;
        }

        $todo = $this->entityManager
            ->getRepository(Todo::class)
            // query for the issue with this id
            ->find($todoId)
        ;

        if (null === $todo) {
            // causes a validation error
            // this message is not shown to the user
            // see the invalid_message option
            throw new TransformationFailedException(sprintf(
                'An issue with number "%s" does not exist!',
                $todoId
            ));
        }

        return $todo;
    }
}
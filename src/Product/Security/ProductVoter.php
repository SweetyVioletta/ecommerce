<?php

namespace App\Product\Security;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

final class ProductVoter extends Voter
{
    public const LIST = 'LIST';
    public const VIEW = 'VIEW';
    public const UPDATE = 'UPDATE';
    public const DELETE = 'DELETE';
    public const CREATE = 'CREATE';

    protected function supports(string $attribute, $subject): bool
    {
        // implement logic here
        return true;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        // implement logic here
        return true;
    }
}

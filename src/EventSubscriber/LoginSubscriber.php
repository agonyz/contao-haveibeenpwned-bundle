<?php

declare(strict_types=1);

/*
 * This file is part of agonyz/contao-haveibeenpwned-bundle.
 *
 * (c) agonyz
 *
 * @license LGPL-3.0-or-later
 */

namespace Agonyz\ContaoHaveIBeenPwnedBundle\EventSubscriber;

use Agonyz\ContaoHaveIBeenPwnedBundle\Service\PasswordValidator;
use Contao\Message;
use Contao\UserModel;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginSubscriber implements EventSubscriberInterface
{
    private PasswordValidator $passwordValidator;
    private string $userNotice;

    public function __construct(PasswordValidator $passwordValidator, string $userNotice)
    {
        $this->passwordValidator = $passwordValidator;
        $this->userNotice = $userNotice;
    }

    /**
     * @return array<string>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            InteractiveLoginEvent::class => 'onLogin',
        ];
    }

    public function onLogin(InteractiveLoginEvent $event): void
    {
        // only trigger if the request is in the backend
        if ('frontend' === $event->getRequest()->attributes->get('_scope')) {
            return;
        }

        $user = null;
        $userIdentifier = $event->getAuthenticationToken()->getUserIdentifier();
        $user = UserModel::findOneByEmail($userIdentifier);

        if (!$user) {
            $user = UserModel::findByUsername($userIdentifier);
        }

        // skip if user does not exist or user notification is not enabled
        if (!$user || !$user->agonyzHaveIBeenPwnedNotification) {
            return;
        }

        /** @var mixed $password */
        $password = $event->getRequest()->request->get('password');

        if (!$this->passwordValidator->isPasswordLeaked($password)) {
            return;
        }

        Message::addError($this->userNotice);
    }
}

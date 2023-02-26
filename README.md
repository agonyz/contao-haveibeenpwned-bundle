# Contao Have I Been Pwned Bundle
## Extension for the [Contao CMS](https://www.contao.org)

The extension can be used to check if a user's password has been leaked using the [Have I Been Pwned Api](https://haveibeenpwned.com/).
It utilizes the [NotCompromisedPassword - Feature](https://symfony.com/doc/current/reference/constraints/NotCompromisedPassword.html) by Symfony for doing so.
This functionality is automatically triggered after an user logs into the backend.

## Installation
Run ```composer require agonyz/contao-haveibeenpwned-bundle``` in your CLI to install the extension.

## Configuration

```yml
# config/config.yml
# Agonyz Contao Have I Been Pwned Bundle
agonyz_contao_have_i_been_pwned:
  user_notice: 'Hello User<br>Your Password was found on a leaked password list<br>Please change your password.' # the notice that should be displayed to the user in the backend
```

Please remember to always clear the cache after each change in the ```config.yml```.

### Disable Notifications
You can disable the notifications for the users in the user settings.

## Example
This screenshot shows an example after a user has logged in with a leaked password.

![hibpbundle](docs/agonyz_contao_haveibeenpwned.png?raw=true "hibpbundle")

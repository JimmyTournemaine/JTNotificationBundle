#Installation

##Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

	$ composer require jimmytournemaine/notification-bundle "master"

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

##Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:


	<?php
	// app/AppKernel.php
	
	// ...
	class AppKernel extends Kernel
	{
	    public function registerBundles()
	    {
	        $bundles = array(
	            // ...
	            new JT\NotificationBundle\NotificationBundle(),
	        );
	
	        // ...
	    }
	
	    // ...
	}
	```

##Step 3: Routing

```yaml
# app/config/routing.yml

jt_notification:
    resource: "@JTNotificationBundle/Resources/config/routing.yml"
```

##Step 4: Link your user entity

```yaml
# app/config/config.yml

doctrine:
    orm:
        resolve_target_entities:
            JT\NotificationBundle\Model\NotifyableInterface: AppBundle\Entity\User
```

## Step 5: Update your database

```bash
php bin/console doctrine:schema:update --force
```

# Create your notification type

```php
<?php
namespace AppBundle\Notification\Type;

use JT\NotificationBundle\Builder\NotificationBuilderInterface;
use JT\NotificationBundle\Notification\Type\AbstractType;

class PostType extends AbstractType
{

    public function buildNotification(NotificationBuilderInterface $builder, array $options)
    {
        $builder
            ->addIcon('bell', array(
                'type' => 'icon',
                'prefix' => 'fa',
                'alt' => '+'
            ))
            ->addTitle('notification.post.title', array(
                'trans_parameters' => array('%name%' => 'Jimmy')
            ))
            ->addDescription('notification.post.description', array(
                'trans_domain' => "MyDomain"
            ))
            ->addLink('homepage', array(
                'type' => 'route'
            ))
            ->addUsers($options['users'])
        ;
    }
}
```

#Send your notification

```php
$this->get('jt_notification.helper')->send(PostType::class, $options, $users);
```

#Display the user's notifications

```twig
{% if is_granted('IS_AUTHENTICATED_REMEMBERED') %}
    {{ jt_notification_render() }}
{% endif %}
```

#Override the rendering

You can edit the rendering of your notifications by override **JTNotification::macros.html.twig** like it is described in the [Symfony documentation](http://symfony.com/doc/current/templating/overriding.html)

# rero-ils-drupal
Drupal Modules and theme for rero-ils.

## Installation

- using docker see kubernetes files in the deploy machine
- ask IT to create proxy
- copy the files in the persistent storage (/var/www/html)
- install drush: composer require drush/drush
- install debian packages in the container
    - apt-get install git npm nodejs vim
    - install gulp: npm i --global gulp
- install extensions
    - composer require 'drupal/openagenda:^3.4' && drush en openagenda -y && drush updb -y && drush cr
    - composer require 'drupal/miniorange_oauth_client:^4.0' && drush en openagenda -y && drush updb -y && drush cr
    - composer require 'dupal/bootstrap'
- install rero theme
    - cd /root; git clone https://github.com/jma/rero-ils-drupal.git
    - cp -r /root/rero-ils-drupal/rero /var/www/html/themes/custom/.
    - cd /var/www/html/themes/custom/rero
    - gulp styles && dush cr #compile css and clear cache
    - enable rero theme in: https://cms.test.rero.ch/admin/appearance
    - disable the search input in the main page (using edit button)
- apache
    - a2enmod ssl
    - a2enmod proxy
    - a2enmod proxy_http
    - cp apache/000-default-conf /etc/apache2/sites-available/000-default.conf
    - apache2ctl restart

- la vue
    - installer le module block: cp -r html/modules/contrib/rero_ils_block /var/www/html/modules/contrib/
    - installer notre block: drush en rero_ils_block
    - activer layout builder dans extensions
    - dans structure, type de contenu et page de base activer layout builder et "Autoriser chaque élément de contenu à avoir sa mise en page personnalisée."
    - dans contenu ajouter du contenu
        - page de base
        - titre: RERO ILS
        - ajouter dans alias URL: /global/search/documents
        - sauver
        - editer la page et dans Mise en page ajouter le block RERO ILS

## Création du bundle rero-ils-ui

Le bundle a été créé en modifiant le base href.

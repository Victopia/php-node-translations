<?php /*! locales.php | Translation locale bundle web service. */

namespace services;

use core\Database;

use framework\exceptions\ResolverException;

class locales extends \framework\WebService {

  public function translations($name) {
    if ( !preg_match('/^(\w+)-(\w+\**)\.json$/', $name, $name) ) {
      throw new ResolverException(404);
    }

    $name[2] = preg_replace('/\\*+/', '%', Database::escapeValue($name[2]));
    // $name[2] = preg_replace('/([^\\\\]?)\*/', '$1%', Database::escapeValue($name[2]));

    return (object) Database::query(
      'SELECT `key`, `value` FROM `Translations` WHERE `bundle` = :bundle AND `locale` LIKE :locale',
      [ 'bundle' => $name[1]
      , 'locale' => $name[2]
      ]
    )->fetchAll(\PDO::FETCH_KEY_PAIR);
  }

}

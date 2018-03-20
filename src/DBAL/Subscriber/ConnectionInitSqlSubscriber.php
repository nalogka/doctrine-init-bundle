<?php
/**
 * @copyright  2018 Nalogka
 * @author     Anton Tyutin <anton@tyutin.ru>
 * @license    http://opensource.org/licenses/MIT
 */

namespace Nalogka\DoctrineConnectionInit\DBAL\Subscriber;

use Doctrine\DBAL\Event\ConnectionEventArgs;
use Doctrine\DBAL\Events;
use Doctrine\Common\EventSubscriber;

class ConnectionInitSqlSubscriber implements EventSubscriber
{

    private $sqls = [];

    public function __construct(array $sqls)
    {
        $this->sqls = $sqls;
    }

    /**
     * @param \Doctrine\DBAL\Event\ConnectionEventArgs $args
     *
     * @return void
     * @throws \Doctrine\DBAL\DBALException
     */
    public function postConnect(ConnectionEventArgs $args)
    {
        $args->getConnection()->exec(
            implode(
                ';',
                array_map(function ($sql) {
                    return trim($sql, ';');
                }, $this->sqls)
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getSubscribedEvents()
    {
        return array(Events::postConnect);
    }
}

<?php
/**
 * @copyright  2018 Nalogka
 * @author     Anton Tyutin <anton@tyutin.ru>
 * @license    http://opensource.org/licenses/MIT
 */

namespace Nalogka\DoctrineConnectionInit;

use Nalogka\ApiData\DependencyInjection\SwaggerPhpDescriberCompilerPass;
use Nalogka\ApiData\DependencyInjection\SerializerNameConverterCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class NalogkaConnectionInitBundle extends Bundle
{

}

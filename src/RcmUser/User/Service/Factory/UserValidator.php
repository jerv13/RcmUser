<?php
 /**
 * @category  RCM
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2012 Reliv International
 * @license   License.txt New BSD License
 * @version   GIT: reliv
 * @link      http://ci.reliv.com/confluence
 */

namespace RcmUser\User\Service\Factory;

    use RcmUser\User\InputFilter\UserInputFilter;
    use RcmUser\User\Service\UserValidatorService;
    use Zend\InputFilter\Factory;
    use Zend\ServiceManager\FactoryInterface;
    use Zend\ServiceManager\ServiceLocatorInterface;

class UserValidator implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        $service = new UserValidatorService();

        $config = $serviceLocator->get('RcmUser\UserConfig')->get('InputFilter', array());
        $inputFilter = new UserInputFilter();
        $factory = new Factory();

        $service->setUserInputFilterConfig($config);
        $service->setUserInputFilter($inputFilter);
        $service->setUserInputFilterFactory($factory);

        return $service;
    }
}

<?php

namespace pKit\System\Patterns\MVC\Controllers
{

    use App\Models\User\User;
    use pKit\System\App;
    use App\Models\User\UserFactory;
    use pKit\System\Utils\Password\HashedPassword;
    use pKit\System\Utils\Password\RawPassword;

    abstract class Controller
    {
        private $controllerParameters;

        private $session = -1;

        /**
         * Controller constructor.
         * @param ControllerParameters $controllerParameters
         */
        public function __construct(ControllerParameters $controllerParameters)
        {
            $this->controllerParameters = $controllerParameters;

            $this->_prepare();
        }

        /**
         * @return User|null
         */
        public function getMyUser()
        {
            return $this->getSession();
        }

        /**
         * @param bool $refresh
         * @return null|User
         */
        private function getSession($refresh = false)
        {
            if((gettype($this->session) != 'object' && $this->session == -1) || $refresh)
            {
                if(isset($_SESSION['sessionid'], $_SESSION['uid'], $_SESSION['timestamp']))
                {
                    $userFactory = $this->getControllerParameters()->getModelsManager()->get(UserFactory::class);
                    $user = $userFactory->getByColumn('id', $_SESSION['uid']);

                    if($user != null)
                    {
                        $sessionIdHash = new RawPassword($user->getRow()->id.$user->getRow()->username.$_SESSION['timestamp']);

                        if($sessionIdHash->equals(new HashedPassword($user->getRow()->sessionid)))
                        {
                            $this->session = $user;
                        }
                    }
                }
                else
                {
                    $this->session = null;
                }
            }

            return $this->session;
        }

        protected function _prepare()
        {
            $user = $this->getMyUser();
            $this->getControllerParameters()->getView()->getMyUser = function() use ($user)
            {
                return $user;
            };
        }

        /**
         * @param bool|int $cond
         * @param callable $callback
         * @return mixed|bool
         */
        public function checkAuth($cond, callable $callback = null)
        {
            if(is_numeric($cond))
            {
                if($cond > 0 || $cond == -1)
                {
                    if($cond > 0 && $this->getSession() != null && $cond <= $this->getSession()->getRow()->rank)
                    {

                        return true;
                    }
                    else if($cond == -1 && $this->getSession() == null)
                    {
                        return true;
                    }
                }
                else if($cond == 0)
                {
                    return true;
                }
            }
            else if($cond == true OR $cond == false)
            {
                if($cond == true)
                {
                    if($this->getSession() != null)
                    {
                        if($callback != null)
                        {
                            return $callback();
                        }
                        else
                        {
                            return true;
                        }
                    }
                }
                else
                {
                    if($this->getSession() == null)
                    {
                        if($callback != null)
                        {
                            return $callback();
                        }
                        else
                        {
                            return true;
                        }
                    }
                }
            }

            return false;
        }

        /**
         * @return ControllerParameters
         */
        public function getControllerParameters()
        {
            return $this->controllerParameters;
        }
    }
}
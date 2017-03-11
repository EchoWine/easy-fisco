<?php

namespace Core\User;

use Core\User\Exceptions\MissingParamException;
use Core\User\Exceptions\UsernameAlreadyUsedException;
use Core\User\Exceptions\EmailAlreadyUsedException;
use Core\User\Exceptions\EmailInvalidException;
use Core\User\Exceptions\WeakPasswordException;
use Core\User\Exceptions\MismatchRepeatPasswordException;

use Core\User\User;
use Core\User\UserRepository;

class UserManager
{

    /**
     * @var Repository
     */
    protected $repository;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    /**
     * Retrieve repository
     *
     * @return Repository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * Throw an exception if a parameter is missing
     *
     * @param array $required
     * @param array $sent
     *
     * @return void
     */
    public function throwExceptionMissingParam($required, $sent)
    {
        foreach($required as $param) {
            if(!isset($sent[$param])) {
                throw new MissingParamException("Missing parameter: {$param}");
            }
        }
    }

    /**
     * Throw an exception if email already exists
     *
     * @param string $username
     *
     * @return void
     */
    public function throwExceptionEmailAlreadyUsed($username)
    {
        if($this->getRepository()->findByEmail($username))
            throw new EmailAlreadyUsedException();
    }

    /**
     * Throw an exception if username already exists
     *
     * @param string $username
     *
     * @return void
     */
    public function throwExceptionUsernameAlreadyUsed($username)
    {
        if($this->getRepository()->findByUsername($username))
            throw new UsernameAlreadyUsedException();
    }

    /**
     * Throw an exception if email is invalid
     *
     * @param string $email
     *
     * @return void
     */
    public function throwExceptionEmailInvalid($email)
    {
        //throw new EmailInvalidException();
    }

    /**
     * Throw an exception if password is weak
     *
     * @param string $password
     *
     * @return void
     */
    public function throwExceptionPasswordTooWeak($password)
    {

        if(strlen($password) < 3)
            throw new PasswordTooWeakException();
    }

    /**
     * Throw an exception if password is weak
     *
     * @param string $password
     * @param string $password_repeat
     *
     * @return void
     */
    public function throwExceptionMismatchRepeatPassword($password, $password_repeat)
    {
        if($password !== $password_repeat)
            throw new MismatchRepeatPasswordException();
    }

    /**
     * Create a new user
     *
     * @param array $params
     *
     * @return User
     */
    public function create($params)
    {
        
        $this->throwExceptionMissingParam(['username', 'password', 'password_repeat', 'email'], $params);
        $this->throwExceptionUsernameAlreadyUsed($params['username']);
        $this->throwExceptionEmailAlreadyUsed($params['email']);
        $this->throwExceptionEmailInvalid($params['email']);
        $this->throwExceptionPasswordTooWeak($params['password']);
        $this->throwExceptionMismatchRepeatPassword($params['password'], $params['password_repeat']);
 
        $user = new User();
        $user->name=$params['username'];
        $params['password'] = bcrypt($params['password']);
        $user->fill($params);
        $user->save();

        return $user;
    }
}

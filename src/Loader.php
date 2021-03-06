<?php

namespace Rougin\Credo;

/**
 * Loader
 *
 * An extension of the Loader Class of CodeIgniter.
 *
 * @package Credo
 * @author  Rougin Royce Gutib <rougingutib@gmail.com>
 */
class Loader extends \CI_Loader
{
    /**
     * Repository Loader
     *
     * Loads and instantiates Doctrine-based repositories.
     * It's designed to be called from application controllers.
     *
     * @param   string|array $repository
     * @return  object
     */
    public function repository($repository)
    {
        if (is_array($repository)) {
            foreach ($repository as $key => $value) {
                $this->repository($value);
            }

            return $this;
        }

        require APPPATH . 'repositories/' . ucfirst($repository) . '_repository.php';

        return $this;
    }
}

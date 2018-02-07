<?php

namespace Application\View\Model;

interface ViewModelInterface
{
    /**
     * Gets content type
     *
     * @return string
     */
    public function getContentType();

    /**
     * Renders view model content into a string
     *
     * @return string
     */
    public function toString();
}
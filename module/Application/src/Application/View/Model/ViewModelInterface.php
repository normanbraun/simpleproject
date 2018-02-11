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
     * Returns view model content as a string
     *
     * @return string
     */
    public function getContent();
}
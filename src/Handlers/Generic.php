<?php

namespace Handlers;

class Generic
{
    public function notFound()
    {
        return "Not found.";
    }

    public function forbidden()
    {
        return "Forbidden.";
    }
}

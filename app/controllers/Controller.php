<?php

/**
 * Interface Controller
 */
interface Controller
{
    /**
     * Handle the request
     * @param array $request the request
     */
    public function handle(array $request);

}

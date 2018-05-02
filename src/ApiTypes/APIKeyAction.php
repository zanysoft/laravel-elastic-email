<?php
namespace ZanySoft\ElasticEmail\ApiTypes;
/**
 * Enum class
 */
abstract class APIKeyAction
{
    /**
     * Add an additional APIKey to your Account.
     */
    const Add = 1;

    /**
     * Change this APIKey to a new one.
     */
    const Change = 2;

    /**
     * Delete this APIKey
     */
    const EEDelete = 3;

}
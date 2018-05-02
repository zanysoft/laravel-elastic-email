<?php
namespace ZanySoft\ElasticEmail\ApiTypes;

/**
 * FileResponse compression format
 * Enum class
 */
abstract class CompressionFormat
{
    /**
     * No compression
     */
    const None = 0;

    /**
     * Zip compression
     */
    const Zip = 1;

}
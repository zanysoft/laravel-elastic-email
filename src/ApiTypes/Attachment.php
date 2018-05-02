<?php
namespace ZanySoft\ElasticEmail\ApiTypes;

/**
 * Attachment data
 */
class Attachment
{
    /**
     * Name of your file.
     */
    public /*string*/
        $FileName;

    /**
     * ID number of your attachment
     */
    public /*long*/
        $ID;

    /**
     * Size of your attachment.
     */
    public /*int*/
        $Size;

}
<?php
namespace ZanySoft\ElasticEmail\ApiTypes;

/**
 * Collection of lists and segments
 */
class ContactCollection
{
    /**
     * Lists which contain the requested contact
     */
    public /*Array<ApiTypes\ContactContainer>*/
        $Lists;

    /**
     * Segments which contain the requested contact
     */
    public /*Array<ApiTypes\ContactContainer>*/
        $Segments;

}
<?php
/**
 * File containing the ezcWorkflowDatabaseUtil class.
 *
 * @package WorkflowDatabaseTiein
 * @version //autogen//
 * @copyright Copyright (C) 2005-2007 eZ systems as. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 */

/**
 * Utility methods for WorkflowDatabaseTiein.
 *
 * @package WorkflowDatabaseTiein
 * @version //autogen//
 */
abstract class ezcWorkflowDatabaseUtil
{
    /**
     * Wrapper for serialize() that returns an empty string
     * for empty arrays and null values.
     *
     * @param  mixed $var
     * @return string
     */
    public static function serialize( $var )
    {
        $var = serialize( $var );

        if ( $var == 'a:0:{}' || $var == 'N;' )
        {
            $var = '';
        }

        return $var;
    }

    /**
     * Wrapper for unserialize().
     *
     * @param  string $serializedVar
     * @param  mixed  $defaultValue
     * @return mixed
     */
    public static function unserialize( $serializedVar, $defaultValue = array() )
    {
        if ( !empty( $serializedVar ) )
        {
            return unserialize( $serializedVar );
        }
        else
        {
            return $defaultValue;
        }
    }
}
?>
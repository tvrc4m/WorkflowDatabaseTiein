<?php
/**
 * @package WorkflowDatabaseTiein
 * @subpackage Tests
 * @version //autogentag//
 * @copyright Copyright (C) 2005-2007 eZ systems as. All rights reserved.
 * @license http://ez.no/licenses/new_bsd New BSD License
 */

require_once 'case.php';

/**
 * @package WorkflowDatabaseTiein
 * @subpackage Tests
 */
class ezcWorkflowDatabaseTieinDefinitionTest extends ezcWorkflowDatabaseTieinTestCase
{
    public static function suite()
    {
        return new PHPUnit_Framework_TestSuite(
          'ezcWorkflowDatabaseTieinDefinitionTest'
        );
    }

    public function testSaveAndLoadStartEnd()
    {
        $this->setUpStartEnd();
        $this->definition->save( $this->workflow );
        $workflow = $this->definition->loadByName( 'StartEnd' );

        $this->assertEquals( $this->workflow, $workflow );
    }

    public function testSaveAndLoadStartEnd2()
    {
        $this->setUpStartEnd();
        $this->definition->save( $this->workflow );
        $workflow = $this->definition->loadByName( 'StartEnd' );

        $this->assertEquals( $this->workflow, $workflow );

        $this->definition->save( $workflow );
    }

    public function testSaveAndLoadStartEndVariableHandler()
    {
        $this->setUpStartEndVariableHandler();
        $this->definition->save( $this->workflow );
        $workflow = $this->definition->loadByName( 'StartEndVariableHandler' );

        $this->assertEquals( $this->workflow, $workflow );
    }

    public function testSaveAndLoadStartInputEnd()
    {
        $this->setUpStartInputEnd();
        $this->definition->save( $this->workflow );
        $workflow = $this->definition->loadByName( 'StartInputEnd' );

        $this->assertEquals( $this->workflow, $workflow );
    }

    public function testSaveAndLoadStartSetUnsetEnd()
    {
        $this->setUpStartSetUnsetEnd();
        $this->definition->save( $this->workflow );
        $workflow = $this->definition->loadByName( 'StartSetUnsetEnd' );

        $this->assertEquals( $this->workflow, $workflow );
    }

    public function testSaveAndLoadIncrementingLoop()
    {
        $this->setUpLoop( 'increment' );
        $this->definition->save( $this->workflow );
        $workflow = $this->definition->loadByName( 'IncrementingLoop' );

        $this->assertEquals( $this->workflow, $workflow );
    }

    public function testSaveAndLoadDecrementingLoop()
    {
        $this->setUpLoop( 'decrement' );
        $this->definition->save( $this->workflow );
        $workflow = $this->definition->loadByName( 'DecrementingLoop' );

        $this->assertEquals( $this->workflow, $workflow );
    }

    public function testSaveAndLoadSetAddSubMulDiv()
    {
        $this->setUpSetAddSubMulDiv();
        $this->definition->save( $this->workflow );
        $workflow = $this->definition->loadByName( 'SetAddSubMulDiv' );

        $this->assertEquals( $this->workflow, $workflow );
    }

    public function testSaveAndLoadParallelSplitSynchronization()
    {
        $this->setUpParallelSplitSynchronization();
        $this->definition->save( $this->workflow );
        $workflow = $this->definition->loadByName( 'ParallelSplitSynchronization' );

        $this->assertEquals( $this->workflow, $workflow );
    }

    public function testSaveAndLoadExclusiveChoiceBranchSimpleMerge()
    {
        $this->setUpExclusiveChoiceSimpleMerge();
        $this->definition->save( $this->workflow );
        $workflow = $this->definition->loadByName( 'ExclusiveChoiceSimpleMerge' );

        $this->assertEquals( $this->workflow, $workflow );
    }

    public function testExceptionWhenLoadingNotExistingWorkflow()
    {
        try
        {
            $this->definition->loadById( 1 );
        }
        catch ( ezcWorkflowDefinitionException $e )
        {
            return;
        }

        $this->fail();
    }

    public function testExceptionWhenLoadingNotExistingWorkflow2()
    {
        try
        {
            $this->definition->loadByName( 'NotExisting' );
        }
        catch ( ezcWorkflowDefinitionException $e )
        {
            return;
        }

        $this->fail();
    }

    public function testExceptionWhenLoadingNotExistingWorkflowVersion()
    {
        $this->setUpStartEnd();
        $this->definition->save( $this->workflow );

        try
        {
            $workflow = $this->definition->loadByName( 'StartEnd', 2 );
        }
        catch ( ezcWorkflowDefinitionException $e )
        {
            return;
        }

        $this->fail();
    }
}
?>
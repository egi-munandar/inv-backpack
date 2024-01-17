<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ItemInventoryDetRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ItemInventoryDetCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ItemInventoryDetCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\ItemInventoryDet::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/item-inventory-det');
        CRUD::setEntityNameStrings('item inventory det', 'item inventory dets');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
        $this->crud->setColumnDetails('item_id', [
            'entity' => 'item',
            'attribute' => 'item_name',
            'type' => 'select'
        ]);
        $this->crud->setColumnDetails('location_id', [
            'entity' => 'location',
            'attribute' => 'path',
            'type' => 'select'
        ]);
        $this->crud->setColumnDetails('head_id', [
            'entity' => 'head',
            'attribute' => 'unique_id',
            'type' => 'select'
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation([
            'item_id' => 'required',
            'location_id' => 'required',
            'qty' => 'required',
            'date' => 'required',
        ]);
        CRUD::setFromDb(); // set fields from db columns.
        CRUD::field('date')->type('datetime');
        CRUD::field([
            'label' => 'Header',
            'type' => 'select',
            'name' => 'head_id',
            'model' => "App\Models\ItemInventoryHead",
            'attribute' => 'unique_id',
        ]);
        CRUD::field([
            'label' => 'Location',
            'type' => 'select',
            'name' => 'location_id',
            'model' => "App\Models\Location",
            'attribute' => 'path',
        ]);
        CRUD::field([
            'label' => 'Item',
            'type' => 'select',
            'name' => 'item_id',
            'model' => "App\Models\Item",
            'attribute' => 'item_name',
        ]);
        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}

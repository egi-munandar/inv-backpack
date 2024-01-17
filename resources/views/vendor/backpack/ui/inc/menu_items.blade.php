{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Items" icon="la la-box" :link="backpack_url('item')" />
<x-backpack::menu-item title="Locations" icon="la la-map" :link="backpack_url('location')" />
<x-backpack::menu-dropdown title="Inventory" icon="la la-boxes">
    <x-backpack::menu-item title="Headers" icon="la la-sign-in-alt" :link="backpack_url('item-inventory-head')" />
    <x-backpack::menu-item title="Inventory Details" icon="la la-exchange-alt" :link="backpack_url('item-inventory-det')" />
</x-backpack::menu-dropdown>

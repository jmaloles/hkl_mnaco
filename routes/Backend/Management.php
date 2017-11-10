<?php
Route::group([
   'prefix'    => 'management',
   'as'        => 'management.',
   'namespace' => 'Management'
], function() {

   Route::group([
      'prefix'    => 'inventory',
      'as'        => 'inventory.',
      'namespace' => 'Inventory'
   ], function() {

      // Asset
      Route::group([
         'namespace' => 'Asset'
      ], function() {
         Route::post('asset/get', 'AssetTableController')->name('asset.get');

         Route::get('asset/deleted', 'AssetStatusController@getDeleted')->name('asset.deleted');

         Route::resource('asset', 'AssetController');

         Route::group(['prefix' => 'asset/{deletedAsset}'], function () {
            Route::get('delete', 'AssetStatusController@delete')->name('asset.delete-permanently');
            Route::get('restore', 'AssetStatusController@restore')->name('asset.restore');
         });
      });

      // Category
      Route::group([
         'namespace' => 'Category'
      ], function() {
         Route::post('category/get', 'CategoryTableController')->name('category.get');

         Route::get('category/deleted', 'CategoryStatusController@getDeleted')->name('category.deleted');
         //Route::get('category/associate_assets', 'CategoryController@getAssociateAssets')->name('category.associate_assets');

         Route::resource('category', 'CategoryController');

         Route::group(['prefix' => 'category/{deletedCategory}'], function () {
            Route::get('delete', 'CategoryStatusController@delete')->name('category.delete-permanently');
            Route::get('restore', 'CategoryStatusController@restore')->name('category.restore');
         });
      });

   });

   Route::group([
         'namespace' => 'Customer'
      ], function() {
         Route::post('customer/get', 'CustomerTableController')->name('customer.get');

         Route::get('customer/deleted', 'CustomerStatusController@getDeleted')->name('customer.deleted');
         //Route::get('customer/associate_assets', 'CustomerController@getAssociateAssets')->name('customer.associate_assets');

         Route::resource('customer', 'CustomerController');

         Route::group(['prefix' => 'customer/{deletedCustomer}'], function () {
            Route::get('delete', 'CustomerStatusController@delete')->name('customer.delete-permanently');
            Route::get('restore', 'CustomerStatusController@restore')->name('customer.restore');
         });
      });

});

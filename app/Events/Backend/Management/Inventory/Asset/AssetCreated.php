<?php

namespace App\Events\Backend\Management\Inventory\Asset;

use Illuminate\Queue\SerializesModels;

/**
* Class AssetCreated.
*/
class AssetCreated
{
   use SerializesModels;

   /**
   * @var
   */
   public $asset;

   /**
   * @param $asset
   */
   public function __construct($asset)
   {
      $this->asset = $asset;
   }
}

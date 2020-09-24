<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DataasetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'kode_aset' => $this->kode_aset,
            'nama_aset' => $this->nama_aset,
		    'jumlah' => $this->jumlah,
            'merk' => $this->merk,
            'desc' => $this->desc,
            'user' => new UserResource($this->user), 
        ];
    }
}

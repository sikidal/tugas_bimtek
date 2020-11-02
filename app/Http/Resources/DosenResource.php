<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DosenResource extends JsonResource
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
            'id_dosen' => $this->id_dosen,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'jabatan' => $this->jabatan,
            'no_telp' => $this->no_telp,
            'created_at' => $this->created_at,
            'update_at' => $this->updated_at,
        ];
    }
}

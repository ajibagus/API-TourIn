<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\RekomenModel;
use App\Models\ListWisataModel;

class Rekomendasi extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        $model = new RekomenModel();
        $data = $model->findAll();
        $data2 = $model->query('SELECT list_rekomen.kode_user, list_rekomen.kode_wisata ,wisata, lat, longi, url_image, rating FROM list_wisata INNER JOIN list_rekomen ON list_wisata.id_wisata = list_rekomen.kode_wisata ORDER BY kode_user ASC;')->getResultArray();
        return $this->respond($data2, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($kode = null)
    {
        $model = new RekomenModel();
        $data = $model->getWhere(['kode_user' => $kode])->getResult();
        $data2 = $model->query('SELECT list_rekomen.kode_user, list_rekomen.kode_wisata ,wisata, lat, longi, url_image, rating FROM list_wisata INNER JOIN list_rekomen ON list_wisata.id_wisata = list_rekomen.kode_wisata WHERE kode_user = '.$kode.' ORDER BY kode_user ASC;')->getResultArray();
        #$data2 = $model->where('kode_wisata', $kode)->find();
        if($data2){
            return $this->respond($data2);
        }else{
            return $this->failNotFound('No Data Found with id '.$kode);
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}

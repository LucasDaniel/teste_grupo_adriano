<?php

namespace App\Services;

use Illuminate\Http\Request;

class BaseService
{

    /**
     * Service variables
     */
    protected $repository;

    /**
     * List all datas of repositrory
     */
    public function list() {
        return $this->repository->all();
    }

    /**
     * Get the data of repository by id
     * @param int
     */
    public function show(int $id) {
        return $this->repository->find($id);
    }

    public function create(Request $request) {
        return $this->repository->create($request->all());
    }

    public function update(Request $request,int $id) {
        return 1;//$this->repository->update($id);
    }

    public function patch(Request $request,int $id) {
        return 1;//$this->repository->patch($id);
    }

    public function service(int $id) {
        return $this->repository->delete($id);
    }
}

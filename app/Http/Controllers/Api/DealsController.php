<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use Illuminate\Http\Request;

class DealsController extends Controller
{
    private $allowedFilters = [
        'title' => ['=','LIKE'],
        'sale_price' => ['<','>','=','<=', '>='],
    ];

    public function index(Request $request)
    {
        $query = Deal::query();
        if ($request->has('q') && $request->query('q')){
            $queryString = $request->query('q');

            $filters = $this->parseQueryString($queryString);
            if($filters == null){
                return response()->json([]);
            }

            foreach ($filters as $filter) {
                if ($filter['operator'] === '=') {
                    $query->whereRaw("BINARY {$filter['property']} = ?", [$filter['value']]);
                } else {
                    $query->where($filter['property'], $filter['operator'], $filter['value']);
                }
            }
        }
        if ($request->has('per_page') || $request->has('page')) {
            $perPage = $request->input('per_page', 9);
            $deals = $query->paginate($perPage);
        } else {
            $deals = $query->get();
        }

        return response()->json($deals);
    }

    function parseQueryString($queryString)
    {
        $filters = [];

        if (!$queryString) {
            return $filters;
        }

        $filterParts = explode(',', $queryString);
        foreach ($filterParts as $filterPart) {
            $filter = $this->parseFilter($filterPart);

            if(!$this->validateFilter($filter)){
                return null;
            }

            if ($filter) {
                $filters[] = $filter;
            }
        }

        return $filters;
    }

    private function validateFilter($filter) : bool
    {
        return (array_key_exists($filter['property'], $this->allowedFilters ) &&
        in_array($filter['operator'],$this->allowedFilters[$filter['property']]));
    }

    private function parseFilter($filterPart)
    {
        $property = 'title';
        $operator = 'LIKE';
        $value = '%'.trim($filterPart).'%';

        if (strpos($filterPart, '=') !== false) {
            list($property, $value) = explode('=', $filterPart);
            $operator = '=';
        }
        if (strpos($filterPart, '>=') !== false) {
            list($property, $value) = explode('>=', $filterPart);
            $operator = '>=';
        }elseif (strpos($filterPart, '<=') !== false) {
            list($property, $value) = explode('<=', $filterPart);
            $operator = '<=';
        }else{
            if (strpos($filterPart, '>') !== false) {
                list($property, $value) = explode('>', $filterPart);
                $operator = '>';
            }
            if (strpos($filterPart, '<') !== false) {
                list($property, $value) = explode('<', $filterPart);
                $operator = '<';
            }
        }
        if (strpos($filterPart, ':') !== false) {
            list($property, $value) = explode(':', $filterPart);
            $operator = 'LIKE';
            $value = '%'.trim($value).'%';
        }

        $property =lcfirst($property);

        return compact('property', 'operator', 'value');
    }
}

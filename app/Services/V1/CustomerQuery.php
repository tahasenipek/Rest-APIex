<?php

namespace App\Services\V1;

use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Operator;

class CustomerQuery
{
    protected $safeParms = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postcode' => ['eq', 'gt', 'lt']
    ];

    protected $columnMap = [
        'postacode' => 'posta_code',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '≤',
        'gt' => '>',
        'gte' => '≥',
    ];

    public function transform(Request $request)
    {
        $eloQuery = [];

        foreach ($this->safeParms as $parm => $operators)
        {
            $query = $request->query($parm);

            if (!isset($query))
                continue;
            $column = $this->columnMap[$parm] ?? $parm;

            foreach ($operators as $operator)
            {
                    if (isset($query[$operator]))
                    {
                        $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                    }
            }
        }
        return $eloQuery;
    }
}
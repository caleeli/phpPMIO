<?php
namespace ProcessMaker\PMIO;

class ApiPackage
{
    /**
     * @var ApiBase
     */
    protected $api;

    public function __construct(PMIO $api)
    {
        $this->api = $api;
    }

    protected function cleanData($data)
    {
        foreach ($data as $key => $value) {
            if ($value === null) {
                unset($data[$key]);
            }
        }
        return $data;
    }

    function buildQuery($array, $withQuestion = true)
    {
        $result = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                foreach($value as $k=>$v) {
                    $result[] = urlencode($key).'['.(is_numeric($k)?'':$k).']'
                        . '=' . urlencode($v);
                }
            } elseif ($value !== null) {
                $result[] = urlencode($key) . '=' . urlencode($value);
            }
        }
        return ($withQuestion && $result ? '?' : '') . implode('&', $result);
    }
}

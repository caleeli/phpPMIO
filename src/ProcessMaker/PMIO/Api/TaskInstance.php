<?php
namespace ProcessMaker\PMIO\Api;

use ProcessMaker\PMIO\ApiPackage;

class TaskInstance extends ApiPackage
{
    public function delegated()
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/task_instances/delegated';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function started()
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/task_instances/started';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function index($include=null, $fields=null, $page=null, $sort=null, $filter=null)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/task_instances'.$this->buildQuery(['include'=>$include,'fields'=>$fields,'page'=>$page,'sort'=>$sort,'filter'=>$filter,]);
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function show($task_instance)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/task_instances/' . $task_instance ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function update($task_instance, $id, $task_id, $instance_id, $user_id, $group_id, $status, $priority, $delegate_date, $start_date, $finish_date, $task_due_date, $risk_date, $data, $duration, $instance_overdue_percentage)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "PUT";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/task_instances/' . $task_instance ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "task_instance",
                "id" => $id,
                "attributes" => $this->cleanData([
                    "task_id" => $task_id,
                    "instance_id" => $instance_id,
                    "user_id" => $user_id,
                    "group_id" => $group_id,
                    "status" => $status,
                    "priority" => $priority,
                    "delegate_date" => $delegate_date,
                    "start_date" => $start_date,
                    "finish_date" => $finish_date,
                    "task_due_date" => $task_due_date,
                    "risk_date" => $risk_date,
                    "data" => $data,
                    "duration" => $duration,
                    "instance_overdue_percentage" => $instance_overdue_percentage,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
}

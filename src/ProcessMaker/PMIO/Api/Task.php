<?php
namespace ProcessMaker\PMIO\Api;

use ProcessMaker\PMIO\ApiPackage;

class Task extends ApiPackage
{
    public function index($process)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/tasks';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function show($process, $task)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "GET";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/tasks/' . $task ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
    public function store($process, $name, $description, $created_at, $updated_at, $process_id, $type, $priority_variable, $assign_type, $assign_variable, $group_variable, $mi_instance_variable, $mi_complete_variable, $transfer_fly, $last_assigned_user_id, $can_upload, $view_upload, $view_additional_documentation, $can_cancel, $can_pause, $can_send_message, $can_delete_docs, $start, $send_last_email, $derivation_screen_tpl, $selfservice_timeout, $selfservice_time, $selfservice_time_unit, $selfservice_execution, $script)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "POST";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/tasks';
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "task",
                "attributes" => $this->cleanData([
                    "name" => $name,
                    "description" => $description,
                    "created_at" => $created_at,
                    "updated_at" => $updated_at,
                    "process_id" => $process_id,
                    "type" => $type,
                    "priority_variable" => $priority_variable,
                    "assign_type" => $assign_type,
                    "assign_variable" => $assign_variable,
                    "group_variable" => $group_variable,
                    "mi_instance_variable" => $mi_instance_variable,
                    "mi_complete_variable" => $mi_complete_variable,
                    "transfer_fly" => $transfer_fly,
                    "last_assigned_user_id" => $last_assigned_user_id,
                    "can_upload" => $can_upload,
                    "view_upload" => $view_upload,
                    "view_additional_documentation" => $view_additional_documentation,
                    "can_cancel" => $can_cancel,
                    "can_pause" => $can_pause,
                    "can_send_message" => $can_send_message,
                    "can_delete_docs" => $can_delete_docs,
                    "start" => $start,
                    "send_last_email" => $send_last_email,
                    "derivation_screen_tpl" => $derivation_screen_tpl,
                    "selfservice_timeout" => $selfservice_timeout,
                    "selfservice_time" => $selfservice_time,
                    "selfservice_time_unit" => $selfservice_time_unit,
                    "selfservice_execution" => $selfservice_execution,
                    "script" => $script,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function update($process, $task, $id, $name, $description, $created_at, $updated_at, $process_id, $type, $priority_variable, $assign_type, $assign_variable, $group_variable, $mi_instance_variable, $mi_complete_variable, $transfer_fly, $last_assigned_user_id, $can_upload, $view_upload, $view_additional_documentation, $can_cancel, $can_pause, $can_send_message, $can_delete_docs, $start, $send_last_email, $derivation_screen_tpl, $selfservice_timeout, $selfservice_time, $selfservice_time_unit, $selfservice_execution, $script)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "PUT";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/tasks/' . $task ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        $settings[CURLOPT_POSTFIELDS] = json_encode([
            "data" => [
                "type" => "task",
                "id" => $id,
                "attributes" => $this->cleanData([
                    "name" => $name,
                    "description" => $description,
                    "created_at" => $created_at,
                    "updated_at" => $updated_at,
                    "process_id" => $process_id,
                    "type" => $type,
                    "priority_variable" => $priority_variable,
                    "assign_type" => $assign_type,
                    "assign_variable" => $assign_variable,
                    "group_variable" => $group_variable,
                    "mi_instance_variable" => $mi_instance_variable,
                    "mi_complete_variable" => $mi_complete_variable,
                    "transfer_fly" => $transfer_fly,
                    "last_assigned_user_id" => $last_assigned_user_id,
                    "can_upload" => $can_upload,
                    "view_upload" => $view_upload,
                    "view_additional_documentation" => $view_additional_documentation,
                    "can_cancel" => $can_cancel,
                    "can_pause" => $can_pause,
                    "can_send_message" => $can_send_message,
                    "can_delete_docs" => $can_delete_docs,
                    "start" => $start,
                    "send_last_email" => $send_last_email,
                    "derivation_screen_tpl" => $derivation_screen_tpl,
                    "selfservice_timeout" => $selfservice_timeout,
                    "selfservice_time" => $selfservice_time,
                    "selfservice_time_unit" => $selfservice_time_unit,
                    "selfservice_execution" => $selfservice_execution,
                    "script" => $script,
                ])
            ]
        ]);
        return $this->api->call($settings);
    }
    public function destroy($process, $task)
    {
        $settings = $this->api->getSettings();
        $settings[CURLOPT_CUSTOMREQUEST] = "DELETE";
        $settings[CURLOPT_URL] = $this->api->getBaseUrl() . '/' . 'api/v1/processes/' . $process . '/tasks/' . $task ;
        $settings[CURLOPT_HTTPHEADER][] = "Authorization: Bearer " . $this->api->getAccessToken();
        return $this->api->call($settings);
    }
}

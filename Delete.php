<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	include_once '../includes/DBConnection.php';
	include_once '../objects/Student.php';

	$database = new Database();
	$db = $database->getConnection();
	$obj = new Studente($db);

	$data = json_decode(file_get_contents("php://input"));

	$obj->id = $data->id;

	if($obj->delete()) {
		http_response_code(200);
		echo json_encode(array("message" => "Studente rimosso con successo."));
	} else {
		http_response_code(503);
		echo json_encode(array("message" => "Impossibile eliminare lo studente."));
	}
?>
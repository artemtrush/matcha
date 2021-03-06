<?php

include_once (ROOT.'/models/Profile.php');

abstract class Search {

	static public function showSearchResults($filters, $user) {
		//populating filters if any for the bd query
		$tagsSQL = "";
		foreach ($filters as $key => $value) {
			if (strpos($key, "tag") !== false) {
				$tagsSQL .= " AND ".$key." = 1";
			}
		}
		$ageAndRate .= " AND age = ".$filters['age']." AND rate >= ".$filters['rate'];

		/*sex_pref
		**1 - hetero
		**2 - homo
		**0 - bi
		**gender
		**1 - female
		**0 - male
		*/
		$opposite_gender = 1 - $user['gender'];
		switch ($user['sex_pref']) {
			case 0: {
				$gender_cond = "gender = 0 OR gender = 1";
				$sex_pref_cond = "sex_pref = 0 
								OR (sex_pref = 1 AND gender = {$opposite_gender}) 
								OR (sex_pref = 2 AND gender = {$user['gender']})";
				break;
			}
			case 1: {
				$gender_cond = "gender = {$opposite_gender}";
				$sex_pref_cond = "sex_pref = 0 OR sex_pref = 1";
				break;
			}
			case 2: {
				$gender_cond = "gender = {$user['gender']}";
				$sex_pref_cond = "sex_pref = 0 OR sex_pref = 2";
				break;
			}
		}
		$query = "SELECT * FROM user WHERE id != :id AND ({$gender_cond}) AND ({$sex_pref_cond})".$tagsSQL.$ageAndRate;
		$data = array(
			':id' => $user['id']
		);
		if (($result = DB::query($query, $data)) !== false)
		{
			$result_array = $result->fetchAll(PDO::FETCH_ASSOC);
			return $result_array;
		}
		return "There is no match for you :(";
	}

	static public function searchFilters() {
		$_SESSION['filters'] = $_POST;
		header ('Location: /search'); 
		return true;
	}
}

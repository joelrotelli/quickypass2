<?php
class Model_Access extends Model_Crud
{
	protected static $_table_name = 'accesses';
	protected static $_belong_to = array('projects', 'clients');

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('desc', 'Desc', 'required');
		$val->add_field('project_id', 'Project Id', 'required|valid_string[numeric]');

		return $val;
	}

}
